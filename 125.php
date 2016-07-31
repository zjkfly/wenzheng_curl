<?php






        function getkebiao($xuehao){
	header("content-type:text/html; charset=utf-8");
            $ch=curl_init("www.gosky.top/index.php?xuehao=".$xuehao);
		//	$ch=curl_init("http://wzjw.sdwz.cn/student/student_qm_cj.aspx");30.159.132/web_cjgl/cx_cj_xh_gly.aspx?whfs=%E5%AD%A6%E7%94%9F%E5%88%97%E8%A1%A8%E6%88%90%E7%BB%A9&xsxh=13457102&xsbh
		//$ch=curl_init("http://wzjw.sdwz.cn/student/xsksap.aspx");
		curl_setopt($ch, CURLOPT_HEADER,1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//回去返回输出流,注释便会输出页面内容
		//curl_setopt($ch,CURLOPT_COOKIE,"ASP.NET_SessionId=retsp31odn31a22n0lb4z5s1");
		$txt=curl_exec($ch);
            // var_dump($txt);
		 return  $txt; 
			 }		 
		 





?>
