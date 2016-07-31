<?php
	
	//查询剩余点数
	function get_info($user,$pass)
	{
		$http = curl_init();
		curl_setopt($http,CURLOPT_URL,'http://api2.sz789.net:88/GetUserInfo.ashx');
		curl_setopt($http,CURLOPT_RETURNTRANSFER,1); 
		$postData = 'username='.$user.'&password='.$pass;
		curl_setopt($http,CURLOPT_POSTFIELDS,$postData);
		$data = curl_exec($http);
		curl_close($http);
		return $data;
	}
	
	//识别验证码
	function recv_byte($user,$pass,$softid,$imgdata)
	{
		$http = curl_init();
		curl_setopt($http,CURLOPT_URL,'http://api2.sz789.net:88/RecvByte.ashx');
		curl_setopt($http,CURLOPT_RETURNTRANSFER,1); 
		$postData = 'username='.$user.'&password='.$pass.'&softId='.$softid.'&imgdata='.$imgdata;
		curl_setopt($http,CURLOPT_POSTFIELDS,$postData);
		$data = curl_exec($http);
		curl_close($http);
		return $data;
	}
	
	//报告错误,只在验证码识别错误的时候使用该函数
	function report_err($user,$pass,$imgid)
	{
		$http = curl_init();
		curl_setopt($http,CURLOPT_URL,'http://api2.sz789.net:88/ReportError.ashx');
		curl_setopt($http,CURLOPT_RETURNTRANSFER,1); 
		$postData = '&username='.$user.'&password='.$pass.'&imgid='.$imgid;
		curl_setopt($http,CURLOPT_POSTFIELDS,$postData);
		$data = curl_exec($http);
		curl_close($http);
		return $data;
	}
	
	//QQ超人打码账号配置信息
	$user = 'zjkkg1'; //QQ超人打码账号
	$pass = 'qq766166'; //QQ超人打码密码
	$softid = '0';//缺省为0,作者必填自己的软件id,以保证分成收入.
	
	$bin = file_get_contents("http://1.sudawzxy.applinzi.com/image.php");
	$imgdata = bin2hex($bin); //将图片二进制转为十六进制字符串上传到服务器
	
	
	//查询帐号信息
	echo '----帐号信息----<br />';
	$info = get_info($user,$pass);
	$infoArray = json_decode($info,true);
	var_dump($infoArray);

	//识别验证码
	echo '<br />----识别验证码----<br />';
	$result = recv_byte($user,$pass,$softid,$imgdata);
	$reArray = json_decode($result,true);
	if($reArray["info"]==1)
	{
		echo "识别结果:".$reArray["result"].",验证码ID:".$reArray["imgId"]."<br />";
	}
	else
	{
		echo "识别失败<br />";
	}
	echo '<br />识别完成...<br />';
	
	/*
	//报告错误,只有识别成功并且验证码错误时,调用此函数才有效
	if($reArray["info"]!=1)
	{
		report_err($user,$pass,$reArray["imgId"]);
		echo "已报告错误";
	}
	*/
?>