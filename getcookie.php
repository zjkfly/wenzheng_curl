<?php
require("vcode.php");
    function getwaste(){//获取网站的cookie和本身的标记号__EVENTVALIDATION 和  _VIEWSTATE
	//header("content-type:text/html; charset=utf-8");
	$ch=curl_init("http://wzjw.sdwz.cn/");	
	curl_setopt($ch,CURLOPT_HEADER,1); //将头文件的信息作为数据流输出
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//回去返回输出流,注释便会输出页面内容
	$txt=curl_exec($ch);
	$jieguo=preg_match_all('/value="(.*?)"/',$txt,$match);
	preg_match_all('/Set-Cookie:(.*?);/', $txt, $match1);
	//Set-Cookie:ASP.NET_SessionId=p1toht2xn42mad4wuiv41qs2; path=/; HttpOnly
	//echo $txt."<hr>";
	//echo $jieguo;
	$match[1][0]=str_replace("/","%2F",$match[1][0]);
	 $match[1][2]= str_replace("/","%2F",$match[1][2]);
	
	echo $match[1][0]."<br>".$match[1][2]."<br>";
	echo $match[1][2];
	//curl_close($ch);
	echo "<hr>".$match1[1][0];
			
		curl_close($ch);	 
			 //以上已经得到了变量value和设置的cookie
			 //以下为登陆页面
			 
		$http = curl_init();
		curl_setopt($http,CURLOPT_URL,'http://wzjw.sdwz.cn/');
		//curl_setopt($http,CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($http,CURLOPT_COOKIE,$match1[1][0]);
		curl_setopt($http,CURLOPT_HEADER,0);
		$postData = "__VIEWSTATE=".$macth[1][0]."&__VIEWSTATEGENERATOR=CA0B0334&__EVENTVALIDATION=".$macth[1][2]."&txtuserid=1317443033&txtpwd=3776869705&txtjym=99756&btnlogin=%E7%99%BB%E5%BD%95";
		curl_setopt($http,CURLOPT_POSTFIELDS,$postData);
		$data = curl_exec($http);
		curl_close($http);
		
			 
			 return $data;
			 
			 
			 
		 }	 
	getwaste();
	function getkebiao(){
	header("content-type:text/html; charset=utf-8");
		$ch=curl_init("http://wzjw.sdwz.cn/student/xscoursetable.aspx");
		//	$ch=curl_init("http://wzjw.sdwz.cn/student/student_qm_cj.aspx");
		//$ch=curl_init("http://wzjw.sdwz.cn/student/xsksap.aspx");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//回去返回输出流,注释便会输出页面内容
		curl_setopt($ch,CURLOPT_COOKIE,"ASP.NET_SessionId=mazs4noruvr4iktdfgzsh2v0");
		curl_exec($ch);  
			 }		 
		 


//getkebiao();




?>
