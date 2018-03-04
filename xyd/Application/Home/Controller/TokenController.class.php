<?php
namespace Home\Controller;
use Think\Controller;
class TokenController extends Controller {
    //入口函数
    public function index(){
        $echoStr = $_GET["echostr"];
        if($this->checkSignature() && $echoStr){
            ob_clean();
            echo $echoStr;
            exit;
        }else{
            //$this->responseMsg();
        }
    }
    // 自动回复消息
    private function responseMsg(){
        //获取到微信推送过来的POST数据
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postObj = simplexml_load_string($postStr);
        $weixin = D('Weixin');
        if (strtolower($postObj->MsgType) == 'event') {
            if (strtolower($postObj->Event) == 'subscribe') {
                //主意进行多图文回复时 子图文个数不能超过10个
                $arr = array(
                    array(
                        'title' => 'Ala订',
                        'description' => '让我们共同享受美好的开始！',
                        'picUrl' =>'http://www.51zrg.com/Public/Image/Alading.jpg',
                        'url'=>'http://www.51zrg.com',
                    ),
                );
                $weixin->responseNews($postObj, $arr);
            }
        }
        //自动回复
        if (strtolower($postObj->MsgType) == 'text') {
            //回复用户消息
            switch (trim($postObj->Content)){
                /*case '彩蛋':
                    $content = '彩蛋人人有，就是你没有';
                    break;
                case '优惠':
                    $content = '优惠天天见，今天你最贱';
                    break;
                case '赏金' :
                    $content = '赏金是个逗逼，你也是么？';
                    break;
                case '斗鱼':
                    $content = '每天晚上六点赏金术士开始直播';
                    break;
                case '众人合':
                    $content = '<a href="http://www.5fwc.com/">众人合官网</a>';
                    break;*/
                default :
                    //根据输入城市 查询当前天气情况
                    $url = 'http://apis.baidu.com/apistore/weatherservice/cityname?cityname='.urlencode(trim($postObj->Content));
                    $header = array(
                        'apikey: 7fe923b42b62b64eccd0b4a248501b7a',
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch , CURLOPT_URL , $url);
                    $res = curl_exec($ch);
                    $resultArr = json_decode($res,true);
                    if($resultArr['errMsg'] == 'success'){
                        $content = $resultArr['retData']['city']."\n日期：".$resultArr['retData']['date']."\n天气情况：".$resultArr['retData']['weather']."\n气温：".$resultArr['retData']['temp']."\n最低温度：".$resultArr['retData']['l_tmp']."\n最高温度：".$resultArr['retData']['h_tmp'];
                    }else{
                        $content = '没有查询到相关信息';
                    }
            }
            $weixin->responseText($postObj, $content);
        }
    }

    private function checkSignature(){
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = 'xuexiao';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
    public function getOrder($appid,$appsecret){
        $weixin = D('Weixin');
        $access_token = $weixin->checkAccessToken($appid,$appsecret);
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
        $postarr = array(
            'button' => array(
                array(
                    'type' => 'view',
                    'name' => urlencode('主页'),
                    'url'  => 'http://www.51zrg.com/Index/index'
                ),
                array(
                    'type' => 'view',
                    'name' => urlencode('活动中心'),
                    'url'  => 'http://www.51zrg.com/Index/activiti'
                ),
                array(
                    'type' => 'view',
                    'name' => urlencode('个人中心'),
                    'url'  => 'http://www.51zrg.com/Index/member'
                ),
            ),
        );
        $postjson = urldecode(json_encode($postarr));
        $res = $weixin->http_curl($url,'post','json',$postjson);
        var_dump($res);
    }


}