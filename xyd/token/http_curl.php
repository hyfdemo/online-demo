<?php
function http_curl($url,$gp='0',$arr=''){
  		$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if($gp=1){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $arr);
		}
        $output = curl_exec($curl);
		$output = json_decode($output,true);
		return $output;       
        curl_close($curl);
}
//$url为要使用的网址
//$gp为判断该次操作是get还是post,默认是get
//如果该操作是post,$arr为要传过去的内容,默认为空

?>