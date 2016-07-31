<?php
//以下为模拟登陆

header("content-type:text/html; charset=utf-8");
$cookie_jar = dirname(__FILE__)."/pic.cookie";

$ch = curl_init("http://my.sdwz.cn/userPasswordValidate.portal");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);       
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//回去返回输出流,注释便会输出页面内容   
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "Login.Token1=1317443033&Login.Token2=fbd18b34f0295edaff602adf993bf42e1d873706&goto=http%3A%2F%2Fmy.sdwz.cn%2FloginSuccess.portal&gotoOnFail=http%3A%2F%2Fmy.sdwz.cn%2FloginFailure.portal");
$backtxt=curl_exec($ch);
//preg_match_all('/学位课程(.*?)点击此处查看学分获取情况和其它所有成绩信息/',$backtxt,$match);
//echo $backtxt;



curl_exec($ch);


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
