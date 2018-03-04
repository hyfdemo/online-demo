<?php
namespace Home\Controller;
use Think\Controller;
header("Access-Control-Allow-Origin: *");
class IndexController extends Controller {
	
	public function index(){
		$this->display();
	}
	
	public function show(){
		$this->display();
	}
	
	public function wait(){
		$this->display();
	}
	public function first(){
		$this->display();
	}
	
	public function show_s(){
		$openid=session(openid);
		$data=M('name')->where("openid='$openid'")->field("img,content")->find();
		$this->ajaxReturn($data);
	}
	
	public function index_s(){
		$appid     = 'wx9ac09a4e036f816b';
		 $redirect_uri = urlencode ( 'http://www.51bszx.com/cx/index/code' );
		$url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect';
		header("Location:".$url);
	}
	
	public function code(){
			$weixin = D('Weixin');
			$appid     = 'wx9ac09a4e036f816b';
          $appsecret = 'e1f98dd9a0c22d4b49d646181881f68d';
			$code=$_GET['code'];
			$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
			$res =$weixin->http_curl($url);
			$access_token=$res['access_token'];
			$openid=$res['openid'];
			 $userinfo_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
             $res = $weixin->http_curl($userinfo_url);
			session(nickname,$res['nickname']);
			session(openid,$openid);
			$data=M('name')->where("openid='$openid'")->find();
			if(!empty($res['nickname']) and empty($data)){
				//$this->success('操作完成','./index',0);
				header("location: /cx/index/index");
			}else{
				header("location: /cx/index/wait");
			}
	}
	
	public function name(){
		$user['nickname']=session(nickname);
		$user['openid']=session(openid);
		$user['name']=I('post.name');
		$user['coll']=I('post.coll');
		$user['address']=I('post.address');
		$user['img']=I('post.img');
		$user['content']=I('post.content');
		$openid=session(openid);
		$new=M('name')->where("openid='$openid'")->find();
		if(empty($new) and !empty($user['nickname'])){
			$data=M('name')->add($user);
		}
		$this->ajaxReturn(1);
	}
	
	public function img(){
		$url_name = "http://" . $_SERVER['SERVER_NAME'];
        $upload = new \Think\Upload();      // 实例化上传类
        $upload->rootPath = './';
        $upload->savePath = 'Public/Uploads/';   // 设置附件上传目录
        $upload->maxSize = 5145728;   // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $info = $upload->upload();
        if($info){
                $head = $url_name . '/cx/' . $info['file']['savepath'] . $info['file']['savename'];
            }else{
                $head=1;
            }
        $this->ajaxReturn($head);
	}
   
}