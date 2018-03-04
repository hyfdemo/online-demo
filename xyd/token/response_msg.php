<?php
function response_msg(){ 
    
	//get post data, May be due to the different environments 
	$postStr = $GLOBALS["HTTP_RAW_POST_DATA"]; //接收微信发来的XML数据 
  
	//extract post data 
	if(!empty($postStr)){ 
      
		//解析post来的XML为一个对象$postObj 
		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA); 
    
		$fromUsername = $postObj->FromUserName; //请求消息的用户 
		$toUsername = $postObj->ToUserName; //"我"的公众号id 
		$keyword = trim($postObj->Content); //消息内容 
		$time = time(); //时间戳 
		$msgtype = 'text'; //消息类型：文本 
		$textTpl = "<xml> 
					<ToUserName><![CDATA[%s]]></ToUserName> 
					<FromUserName><![CDATA[%s]]></FromUserName> 
					<CreateTime>%s</CreateTime> 
					<MsgType><![CDATA[%s]]></MsgType> 
					<Content><![CDATA[%s]]></Content> 
					</xml>"; 

		//下段代码判断msgtype事件是否为关注,如果为关注公众号,则回复自定义的内容
  		if($postObj->MsgType == 'event'){ //如果XML信息里消息类型为event  
			if($postObj->Event == 'subscribe'){ //如果是订阅事件   
				$contentStr = "欢迎订阅misaka去年夏天！\n更多精彩内容：http://m.baidu.com/";   
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgtype, $contentStr);   
				echo $resultStr;   
				exit();
			} 
		}
		//以上为判断关注
				
		switch(trim($keyword)){
			case '1';
			$contentStr = 'one';
			break;
			case '2';
			$contentStr = 'two';
			break;
			case '3';
			$contentStr = 'three';
			break;
			case '4';
			$contentStr = 'four';
			break;
			case '5';
			$contentStr = 'five';
			break;
			default:
			$contentStr = '没有相关信息';
			break;
		}
		
		
		
		//$contentStr=mysql_query("select * from abc where id='$keyword'")
		//上面的语句即为从库中查询东西,再返回内容
				
		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgtype, $contentStr); 
		echo $resultStr; 
	}
	else { 
		echo ""; 
		exit;
	}
}
?>
