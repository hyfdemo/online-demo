<?php
namespace Home\Model;
use Think\Model;
class WeixinModel {
    //判断access_token超时没有
    public function checkAccessToken($appid,$appsecret){
        $Model = new Model();
        $condition = array('appid' => $appid, 'appsecret' => $appsecret);
        $access_token_set = $Model->table('accesstoken')->where($condition)->find();//获取数据
        if ($access_token_set) {
            //检查是否超时，超时了重新获取
            if (strtotime($access_token_set['accessexpires'])+7100 >= time()) {
                //未超时，直接返回access_token
                return $access_token_set['access_token'];
            } else {
                //已超时，重新获取
                $access_token = $this->getAccessToken($appid,$appsecret);
                $data['access_token'] = $access_token;
                $result = $Model->table('accesstoken')->where($condition)->save($data);//更新数据
                if ($result) {
                    return $access_token;
                } else {
                    return $access_token;
                }
            }
        } else {
            //如果数据库没有查到access_token 重新生成 并存入数据库
            $access_token=$this->getAccessToken($appid,$appsecret);
            $res['access_token'] = $access_token;
            $res['appid'] = $appid;
            $res['appsecret'] = $appsecret;
            $Model->table('accesstoken')->add($res);
            return $access_token;
        }
    }

    //获取access_token
    public function getAccessToken($appid,$appsecret){
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret.'';
        $result = $this->http_curl($url);
        return $result['access_token'];
    }

    /**
     * 上传图片到服务器
     * @return string 返回图片位置的绝对路径
     */
    public function uploadsimg(){
        $url_name=$_SERVER['DOCUMENT_ROOT'];
        $upload = new \Think\Upload();      // 实例化上传类
        $upload->rootPath  =    './';
        $upload->savePath  =      'Public/Uploads/';   // 设置附件上传目录
        $upload->maxSize   =     3145728;   // 设置附件上传大小
        $upload->exts      =     array('jpg','png',);// 设置附件上传类型
        $info = $upload->upload();
        if (!$info) {
            $this->error($upload->getError());
        } else {
            $img['img'] = $url_name . '/' . $info['img']['savepath'] . $info['img']['savename'];
        }
        return  $img['img'] ;
    }

    //上传图文素材 获取newsid
    public function uploads($result){
        //获取图片的media_id
        $uploadurl = 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token='.$result['access_token'];
        $result1 = $this->http_curl($uploadurl,'post','json',$result['media']);
        //准备上传图文素材的post值
        $data = array(
            'articles' =>array(
                array('title'=>urlencode(I('post.title')),
                    'author' =>urlencode(I('author')),
                    'digest' =>urlencode(I('digest')),
                    'show_cover_pic'=>1,
                    'thumb_media_id'=>$result1['media_id'],
                    'content'=>urlencode(I('post.content')),
                    'content_source_url'=>I('post.content_source_url')
                )
            )
        );
        $res = urldecode(json_encode($data));
        $url = 'https://api.weixin.qq.com/cgi-bin/material/add_news?access_token='.$result['access_token'];
        $ret1 = $this->http_curl($url,'post','json', $res);
        return $ret1['media_id'];
    }

    //万能curl函数
    public function http_curl($url,$type='get',$res='json',$arr='')
    {
        $curl = curl_init();
        //curl_setopt($curl, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if ($type =='post'){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $arr);
        }
        $output = curl_exec($curl);
        //关闭cURL资源，并且释放系统资源
        curl_close($curl);
        if($res == 'json'){
            return json_decode($output,true);
        }
    }

    //多图文消息处理
    public function responseNews($postObj,$arr){
        //回复用户消息
        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;
        $time = time();
        $textTpl = '<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <ArticleCount>'.count($arr).'</ArticleCount>
                    <Articles>';
        foreach ($arr as $k => $v){
            $textTpl .= '<item>
                        <Title><![CDATA['.$v['title'].']]></Title>
                        <Description><![CDATA['.$v['description'].']]></Description>
                        <PicUrl><![CDATA['.$v['picUrl'].']]></PicUrl>
                        <Url><![CDATA['.$v['url'].']]></Url>
                        </item>';
        }
        $textTpl .= '</Articles>
					 </xml>';
        echo sprintf($textTpl, $toUser, $fromUser, $time, 'news');
    }

    //创建自定义菜单
    public function definedItem($order,$access_token){
        //$access_token = $this->checkAccessToken();
        //post请求的接口url
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
        /*$postarr = array(
            'button' => array(
                array(
                    'type' => 'view',
                    'name' => urlencode('主页'),
                    'url'  => 'http://www.51zrg.com/Index/index/'
                ),
                array(
                    'type' => 'view',
                    'name' => urlencode('活动中心'),
                    'media_id'  => 'http://www.51zrg.com/Index/test/',
                ),
                array(
                    'type' => 'view',
                    'name' => urlencode('个人中心'),
                    'url'  => 'http://www.51zrg.com/Index/member/'
                ),
            ),
        );
        $postjson = urldecode(json_encode($postarr));*/
        $res = $this->http_curl($url,'post','json',$order);
        return $res;
    }

    //回复文本消息
    public function responseText($postObj,$content){
        if(is_object($postObj)){
            $toUser = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
        }else{
            $toUser = $postObj['FromUserName'];
            $fromUser = $postObj['ToUserName'];
        }
        //回复用户消息
        $time = time();
        $msgType = 'text';
        $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
        $resultStr = sprintf($textTpl, $toUser, $fromUser, $time, $msgType, $content);
        echo $resultStr;
    }

    //获取永久素材总数
    public function getMaterialCount($access_token,$type){
        $url = 'https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token='.$access_token;
        $result = $this->http_curl($url);
        return $result;
    }

    //根据$type获取第一条永久素材media_id
    public function getMediaidByType($access_token,$type,$end){
        $url = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token='.$access_token;
        $postarr = array(
            'type'   => $type,
            'offset' => $end,
            'count'  => 1,
        );
        $postjson = json_encode($postarr);
        $result = $this->http_curl($url,'post','json',$postjson);
        return $result['item'][0]['media_id'];
    }

    //根据media_id 删除永久素材
    public function deleteMaterial($access_token,$media_id){
        $deleteUrl = 'https://api.weixin.qq.com/cgi-bin/material/del_material?access_token='.$access_token;
        $postarr = array(
            'media_id' => $media_id,
        );
        $postjson = json_encode($postarr);
        $result = $this->http_curl($deleteUrl,'post','json',$postjson);
        return $result;
    }
    
    //群发消息
    public function sentAllMsg($media_id,$access_token){
        $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token='.$access_token;
        $postarr = array(
            'filter'=>array(
                'is_to_all' => true
            ),
            'mpnews'=>array(
                'media_id' => $media_id
            ),
            'msgtype' => 'mpnews'
        );
        $postjson = json_encode($postarr);
        $result = $this->http_curl($url,'post','json',$postjson);
        return $result;
    }

    //预览消息
    public function testSee($access_token,$media_id){
        $seeurl = 'https://api.weixin.qq.com/cgi-bin/message/mass/preview?access_token='.$access_token;
        $arr = array(
            //o10ShwQeedXqGH9zEktAnCqJzlNU
            'touser'=> 'oAfGdszweJVqLQAApwvg4PCr0pb0',//
            'mpnews' =>array('media_id' =>$media_id),
            'msgtype'=>'mpnews'
        );
        $json = json_encode($arr);
        $result = $this->http_url($seeurl,$json);
        return json_decode($result, true);
    }
    public function getBaseInfo($url,$type){
        $redirect_uri = urlencode('http://www.51zrg.com/index/'.$url);
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.APPID.'&redirect_uri='.$redirect_uri.'&response_type=code&scope='.$type.'&state=123#wechat_redirect';
        header('location:'.$url);
    }
    //上传图文消息到微信 返回media_id
    public function getMedia_id($arr,$access_token){
        /*if(isset($_FILES)){
            $thumb_id = $this->getThumb_id($access_token);
        }
        if(isset($arr['content'])){
            $content = $this->handleContent($arr['content'],$access_token);
        }*/
        $url="https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=".$access_token;
        /*$json = '{
		    "articles": [{
                 "title":"'.$arr['title'].'",
                 "thumb_media_id":"'.$thumb_id.'",
                 "content":"'.$content.'",
                 "show_cover_pic":0
                 },]
			}';*/
        $res = $this->http_curl($url,'post','json',urldecode(json_encode($arr)));
        return $res['media_id'];
    }
    //上传缩略图到微信服务器 获取id
    public function getThumb_id($access_token,$img_url){
        //$img_url = str_replace('/','\\' ,$img_url );
        $media = array('media'=>'@'.$img_url);
        $url="https://api.weixin.qq.com/cgi-bin/media/upload?access_token=$access_token&type=thumb";
        $res = json_decode($this->http_url($url, $media), true);
        return $res['thumb_media_id'];
    }

    public function http_url($url,$data = null){
        $ch1 = curl_init ();
        curl_setopt ( $ch1, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($ch1, CURLOPT_URL, $url);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($ch1, CURLOPT_POST, 1);
            curl_setopt($ch1, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec ( $ch1 );
        curl_close ( $ch1 );
        return $result;
    }
    //处理文本编辑框里面的图片路径 和样式
    public function handleContent($content,$access_token,$name){
        preg_match_all('/img.*? src=\"?(.*?\.(jpg|png|jpeg))\"?.*?/',$content,$match);
        if (!empty($match)){
            $result_media = $match[1];
            foreach($result_media as $key_media=>$val_media){
                $url_media = explode('&quot;',$val_media);
                $last_name = preg_split("/$name/", $url_media[1],-1);
                $url_me    = $_SERVER['DOCUMENT_ROOT']."/$name/".$last_name[1];
                $urldata   = array("media"=>"@".$url_me);
                $url       = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token='.$access_token;
                $res       = json_decode($this->http_url($url,$urldata),true);
                $replace   = '\''.$res['url'];
                $content   = str_replace($val_media,$replace,$content);
            }
        }
        $content = str_replace('&quot;',"'",$content);
        return $content;
    }
    //获取微信JsApiTicket
    public function getJsApiTicket(){
        $condition = array('appid' => APPID, 'appsecret' => APPSECRET);
        $jsapi_ticket_set = M('apiticket')->where($condition)->find();//获取数据
        if ($jsapi_ticket_set) {
            //检查是否超时，超时了重新获取
            if (strtotime($jsapi_ticket_set['ticketexpires'])+7100 >= time()) {
                //未超时，直接返回access_token
                return $jsapi_ticket_set['apiticket'];
            } else {
                //已超时，重新获取
                $access_token = $this->getAccessToken();
                $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi';
                $res = $this->http_curl($url);
                $data['apiticket'] = $res['ticket'];
                M('apiticket')->where($condition)->save($data);//更新数据
                return $res['ticket'];
            }
        } else {
            //如果数据库没有查到apiticket 重新生成 并存入数据库
            $access_token = $this->getAccessToken();
            $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi';
            $result = $this->http_curl($url);
            $res['apiticket'] = $result['ticket'];
            $res['appid'] = APPID;
            $res['appsecret'] = APPSECRET;
            M('apiticket')->add($res);
            return $access_token;
        }
    }

    //获取随机码 默认16位
    public function getRoundCode($length=16){
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $roundCode = '';
        for ( $i = 0; $i < $length; $i++ ) {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $roundCode .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
            $roundCode .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $roundCode; 
    }

    /**
     * @param $touser  发送到用户的openid
     * @param $name 好友名字
     * @param $bname 商家名字
     * @param $template_id 模板编号
     * @param string $topcolor 标题颜色
     * @return bool
     */
    public function doSend($touser,$data,$tmp_id,$topcolor = '#7B68EE'){
        $access_token = $this->checkAccessToken();
        $template = array(
            'touser' => $touser,
            'template_id' => $tmp_id,
            'url' => 'http://www.51zrg.com/Index/index',
            'topcolor' => $topcolor,
            'data' => $data
        );
        $json_template = json_encode($template);
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
        $res = $this->http_curl($url,'post','json',urldecode($json_template));
        return $res;
    }
    //设置模板消息所属行业
    public function api_set_industry(){
        $access_token = $this->checkAccessToken();
        $url = 'https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token='.$access_token;
        $data = array(
            "industry_id1" => 1,
            "industry_id2" => 10
        );
        $json = json_encode($data);
        $res = $this->http_curl($url,'post','json',$json);
        return $res;
    }
    //获取模板消息所有信息
    public function getall(){
        $access_token = $this->checkAccessToken();
        $url = 'https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token='.$access_token;
        $res = $this->http_curl($url);
        return $res;
    }

    //发送客服消息
    public function sendText($data){
        $access_token = $this->checkAccessToken();
        $url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
        $res = $this->http_curl($url,'post','json',$data);
        return $res;
    }

    //添加客服账号
    public function insertKFaccount($account,$name,$pwd){
        $access_token = $this->checkAccessToken();
        $url = 'https://api.weixin.qq.com/customservice/kfaccount/add?access_token='.$access_token;
        $AlaD = '@gh_3b096761a269';
        $postArr = array(
            "kf_account" => $account.$AlaD,
             "nickname"  => urlencode($name),
             "password"  => md5($pwd),
        );
        $jsonArr = json_encode($postArr);
        $res = $this->http_curl($url,'post','json',$jsonArr);
        return $res;
    }

    //退款curl函数
    /**
     * 	作用：使用证书，以post方式提交xml到对应的接口url
     */
    public function postXmlSSLCurl($xml,$url,$second=30){
        $ch = curl_init();
        //超时时间
        curl_setopt($ch,CURLOPT_TIMEOUT,$second);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        //设置header
        curl_setopt($ch,CURLOPT_HEADER,FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        //设置证书
        //使用证书：cert 与 key 分别属于两个.pem文件
        //默认格式为PEM，可以注释
        curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
        curl_setopt($ch,CURLOPT_SSLCERT, $this->SSLCERT_PATH);
        //默认格式为PEM，可以注释
        curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
        curl_setopt($ch,CURLOPT_SSLKEY, $this->SSLKEY_PATH);
        //post提交方式
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$xml);
        $data = curl_exec($ch);
        //返回结果
        if($data){
            curl_close($ch);
            return $data;
        }else{
            $error = curl_errno($ch);
            echo "curl出错，错误码:$error"."<br>";
            echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
            curl_close($ch);
            return false;
        }
    }
    /**
     * 	作用：以post方式提交xml到对应的接口url
     */
    public function postXmlCurl($xml,$url,$second=30){
        //初始化curl
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOP_TIMEOUT, $second);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        //运行curl
        $data = curl_exec($ch);
        curl_close($ch);
        //返回结果
        if($data) {
            curl_close($ch);
            return $data;
        }else {
            $error = curl_errno($ch);
            echo "curl出错，错误码:$error"."<br>";
            echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
            curl_close($ch);
            return false;
        }
    }
    /**
     * 	作用：将xml转为array
     */
    public function xmlToArray($xml){
        //将XML转为array
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $array_data;
    }
    /**
     * 	作用：array转xml
     */
    public function arrayToXml($arr){
        $xml = "<xml>";
        foreach ($arr as $key=>$val) {
            if (is_numeric($val)) {
                $xml.="<".$key.">".$val."</".$key.">";
            }else
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
        }
        $xml.="</xml>";
        return $xml;
    }
    /**
     * 	作用：生成签名
     */
    public function getSign($Obj){
        foreach ($Obj as $k => $v) {
            $Parameters[$k] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);
        //echo '【string1】'.$String.'</br>';
        //签名步骤二：在string后加入KEY
        $String = $String."&key=".$this->KEY;
        //echo "【string2】".$String."</br>";
        //签名步骤三：MD5加密
        $String = md5($String);
        //echo "【string3】 ".$String."</br>";
        //签名步骤四：所有字符转为大写
        $result_ = strtoupper($String);
        //echo "【result】 ".$result_."</br>";
        return $result_;
    }

    /**
     * 	作用：格式化参数，签名过程需要使用
     */
    public function formatBizQueryParaMap($paraMap, $urlencode){
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v) {
            if($urlencode) {
                $v = urlencode($v);
            }
            //$buff .= strtolower($k) . "=" . $v . "&";
            $buff .= $k . "=" . $v . "&";
        }
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        return $reqPar;
    }

    public function trimString($value){
        $ret = null;
        if (null != $value) {
            $ret = $value;
            if (strlen($ret) == 0) {
                $ret = null;
            }
        }
        return $ret;
    }

    /**
     * 	作用：产生随机字符串，不长于32位
     */
    public function createNoncestr( $length = 32 ){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ )  {
            $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }



}