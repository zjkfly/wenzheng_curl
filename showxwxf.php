<?php
//以下为模拟登陆
header("content-type:text/html; charset=utf-8");
$xuehao=$_GET['a'];
$password=$_GET['b'];
$password1=md5($password);
$ch = curl_init("http://tool.runoob.com/compile.php");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//回去返回输出流,注释便会输出页面内容   
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "code=%23+coding%3Dutf-8%0Aimport+urllib%0Aimport+urllib2%0Aimport+cookielib%0A%0Afilename+%3D+'cookie.txt'%0A%23%E5%A3%B0%E6%98%8E%E4%B8%80%E4%B8%AAMozillaCookieJar%E5%AF%B9%E8%B1%A1%E5%AE%9E%E4%BE%8B%E6%9D%A5%E4%BF%9D%E5%AD%98cookie%EF%BC%8C%E4%B9%8B%E5%90%8E%E5%86%99%E5%85%A5%E6%96%87%E4%BB%B6%0Acj+%3D+cookielib.LWPCookieJar()%0Acookie_support+%3D+urllib2.HTTPCookieProcessor(cj)%0Aopener+%3D+urllib2.build_opener(cookie_support%2C+urllib2.HTTPHandler)%0A%23urllib2.install_opener(opener)%0Apostdata+%3D+urllib.urlencode(%7B%0A%09%09%09'IDButton'%3A'Submit'%2C%0A+++++++++++'encoded'%3A'false'%2C%0A++++++++++++'goto'%3A''%2C%0A++++++++++++'gx_charset'%3A'UTF-8'%2C%0A++++++++++++'IDToken0'%3A''%2C%0A++++++++++++'IDToken1'%3A'".$xuehao."'%2C%0A++++++++++++'IDToken9'%3A'".$password."'%2C%0A++++++++++++'IDToken2'%3A'".$password1."'%0A%09%09%7D)%0A%23%E7%99%BB%E5%BD%95%E6%95%99%E5%8A%A1%E7%B3%BB%E7%BB%9F%E7%9A%84URL%0AloginUrl+%3D+'http%3A%2F%2Fids1.suda.edu.cn%2Famserver%2FUI%2FLogin%3Fgoto%3Dhttp%3A%2F%2Fmyauth.suda.edu.cn%2Fdefault.aspx%3Fapp%3Dwzjw'%0A%23%E6%A8%A1%E6%8B%9F%E7%99%BB%E5%BD%95%EF%BC%8C%E5%B9%B6%E6%8A%8Acookie%E4%BF%9D%E5%AD%98%E5%88%B0%E5%8F%98%E9%87%8F%0Aresult+%3D+opener.open(loginUrl%2Cpostdata)%0A%23%E4%BF%9D%E5%AD%98cookie%E5%88%B0cookie.txt%E4%B8%AD%0A%23cookie.save(ignore_discard%3DTrue%2C+ignore_expires%3DTrue)%0A%23%E5%88%A9%E7%94%A8cookie%E8%AF%B7%E6%B1%82%E8%AE%BF%E9%97%AE%E5%8F%A6%E4%B8%80%E4%B8%AA%E7%BD%91%E5%9D%80%EF%BC%8C%E6%AD%A4%E7%BD%91%E5%9D%80%E6%98%AF%E6%88%90%E7%BB%A9%E6%9F%A5%E8%AF%A2%E7%BD%91%E5%9D%80%0AgradeUrl+%3D+'http%3A%2F%2Fwzjw.sdwz.cn%2Fstudent%2Fxwxf_detail.aspx'%0A%23%E8%AF%B7%E6%B1%82%E8%AE%BF%E9%97%AE%E6%88%90%E7%BB%A9%E6%9F%A5%E8%AF%A2%E7%BD%91%E5%9D%80%0Aresult+%3D+opener.open(gradeUrl)%0Aprint+result.read()&language=0");
$backtxt=curl_exec($ch);
preg_match_all('/学生行为学分浏览(.*?)langid/',$backtxt,$match);
$replace_a='<tr bgcolor=\"White\">';
$replace_b='<tr bgcolor="White">';
$replace_c='<tr bgcolor=\"#CCCCFF\">';
$replace_d='<tr bgcolor="#CCCCFF">';
$replace_e='<font color=\"Black\">';
$replace_f='<font color="Black">';
$backtxt=str_replace($replace_a,$replace_b,$match[1][0]);
$backtxt=str_replace($replace_c,$replace_d,$backtxt);
$backtxt=str_replace($replace_e,$replace_f,$backtxt);
echo $backtxt."Demo";
curl_close($ch);
//以下为验证是否登录成功的页面
/*$ch=curl_init("http://bbs.php100.com/thread-htm-fid-17.html");
curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie_file);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close();*/

/*1、CURL模拟登陆的流程和步骤
2、tempnam 创建一个临时文件
3、使用CURL模拟登陆到PHP100论坛*/
/*$url='http://bbs.php100.com/userpay.php';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
$contents = curl_exec($ch);
preg_match("/<li>金钱：(.*)<\/li>/",$contents,$arr);
echo $arr[1];
curl_close($ch);*/
?>
