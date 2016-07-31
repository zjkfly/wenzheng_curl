<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,'http://ids1.suda.edu.cn/amserver/UI/Login?goto=http://myauth.suda.edu.cn/default.aspx?app=wzjw');
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);

//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
//curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36");
//curl_setopt ( $ch,CURLOPT_POST,1 );
curl_setopt($ch, CURLOPT_POSTFIELDS, "IDButton=Submit&encoded=false&goto=&gx_charset=UTF-8&IDToken0=&IDToken1=1317443033&IDToken9=3776869705&IDToken2=c2c47a58de688f27730244f168ac2b23");
curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1); 

$data = curl_exec($ch);
$ch_temp=curl_copy_handle($ch); 
curl_close($ch); 
$ch=$ch_temp;

//$last_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch, CURLOPT_URL,'http://wzjw.sdwz.cn/student/xwxf_detail.aspx');
curl_setopt($ch, CURLOPT_HEADER,0);
$data = curl_exec($ch);
curl_close($ch);
/*
$ch_temp=curl_copy_handle($ch_temp1); 
curl_setopt($ch_temp, CURLOPT_URL,'http://ids1.suda.edu.cn/amserver/UI/Login?goto=http://myauth.suda.edu.cn/default.aspx?app=wzjw');
curl_setopt($ch_temp, CURLOPT_HEADER,1);
$data = curl_exec($ch_temp);

$ch_temp2=curl_copy_handle($ch_temp); 
curl_setopt($ch_temp2, CURLOPT_URL,'http://wzjw.sdwz.cn/student/xwxf_detail.aspx');
curl_setopt($ch_temp2, CURLOPT_HEADER,1);
$data = curl_exec($ch_temp2);
curl_close($ch_temp2);
*/
echo $data;
?>