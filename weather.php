  <?php/*$msgType = "text";
               $cityname=urlencode($keyword);
            $weather=substr($cityname,0,18);
               //echo $weather;4

            if($weather=="%E5%A4%A9%E6%B0%94"){//判断是否为天气的字符串
                   $cityname=substr($cityname,18);
                   echo $cityname."<hr/>";
                      //$cityname=urlencode(iconv("gbk","utf-8",$cityname));//把中文gbk编码转为utf8，在这里，有很多不同。感谢http://www.lamp99.com/php-chinese-url-encoding-conversion.html
                        $url = "http://apix.sinaapp.com/weather/?appkey=r&city=".$cityname; 
                        $output = file_get_contents($url);
                        $content = json_decode($output, true);             
                       $contentStr=$content[0]['Title']."\n".$content[1]["Title"]."\n".$content[2]["Title"];
               $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
               echo $resultStr;   
                   
                   
              }*/
?>