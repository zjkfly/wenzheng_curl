<?php  
     $ch = curl_init();  
     curl_setopt($ch, CURLOPT_URL, "http://www.baidu.com");  
     curl_setopt($ch, CURLOPT_HEADER, false);  
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出  
     $result=curl_exec($ch);  
     curl_close($ch);  
     ?>