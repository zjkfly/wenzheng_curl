<?
$headers['Host'] = '219.230.159.132'; 
//$headers['X-FORWARDED-FOR'] = '219.230.159.132:80';

$headerArr = array(); 

foreach( $headers as $n => $v ) { 

    $headerArr[] = $n .':' . $v;  

}

  

ob_start();

$ch = curl_init();

curl_setopt ($ch, CURLOPT_URL, "http://219.230.159.132/web_cjgl/cx_cj_xh_gly.aspx?whfs=%E5%AD%A6%E7%94%9F%E5%88%97%E8%A1%A8%E6%88%90%E7%BB%A9&xsxh=13457102&xsbh=&kcdm
");

curl_setopt ($ch, CURLOPT_HTTPHEADER , $headerArr );  //构造IP

curl_setopt ($ch, CURLOPT_REFERER, "http://www.baidu.com/ ");   //构造来路

curl_setopt( $ch, CURLOPT_HEADER, 1);

curl_exec($ch);

curl_close ($ch);

$out = ob_get_contents();

ob_clean();

echo $out;



?>