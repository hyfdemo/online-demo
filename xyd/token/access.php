<?php
define("TOKEN", "xuexiao");
valid();
function valid()
	{
		$echoStr = $_GET["echostr"];
		if(checkSignature()){
			echo $echoStr;
			exit;
			//以上的if,只在验证token的时候用,验证通过即永不再使用,所以valid()默认进入else中的内容
		}
		else{
			include 'response_msg.php';
			response_msg();
			//调用回复的页面
		}
	}

    
function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

?>