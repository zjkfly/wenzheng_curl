<?php






        
	header("content-type:text/html; charset=utf-8");
		$ch=curl_init("http://219.230.159.132/web_cjgl/cx_cj_xh_gly.aspx?whfs=%E5%AD%A6%E7%94%9F%E5%88%97%E8%A1%A8%E6%88%90%E7%BB%A9&xsxh=13457102&xsbh=&kcdm
");
		//	$ch=curl_init("http://wzjw.sdwz.cn/student/student_qm_cj.aspx");
		//$ch=curl_init("http://wzjw.sdwz.cn/student/xsksap.aspx");
        $header = array(
            //'Content-Type: application/json',
            'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
'Accept-Encoding:gzip, deflate, sdch',
'Accept-Language:zh-CN,zh;q=0.8',
'Cache-Control:no-cache',
'Connection:keep-alive',
'Cookie:ASP.NET_SessionId=govkne45gvxlf2zlr0n2qn55',
'Host:219.230.159.132',
'Pragma:no-cache',
'Upgrade-Insecure-Requests:1',
'User-Agent:Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'
        );

//curl_setopt($ch, CURLOPT_HEADER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
            /*curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');*/
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//回去返回输出流,注释便会输出页面内容
		//curl_setopt($ch,CURLOPT_COOKIE,"ASP.NET_SessionId=retsp31odn31a22n0lb4z5s1");
		$txt=curl_exec($ch);
		  var_dump($txt);
        echo $txt;  
		 





?>
