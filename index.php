<?php
/*
    方倍工作室 http://www.cnblogs.com/txw1958/
    CopyRight 2013 www.doucube.com  All Rights Reserved
*/
//require "125.php";
require "wenzhengxueyaun.class.php";
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            header('content-type:text');
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $event = trim($postObj->Event);
            $time = time();
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
            if($keyword == "?" || $keyword == "？")
            {
                $msgType = "text";
                $contentStr = "发送 绑定+学号+身份证后六位\n例如：我的学号为1317443000，身份证后6位为123456，\n所以发送下列文字：\n绑定+1317443000+123456 \n即可绑定文正教务账号，可直接查询成绩和课表哦，还有最新的的文正官网信息的推送。后期本公众号将开放更多功能，抢课也算哦";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            
            if($keyword == "帮助")
            {
                $msgType = "text";
                $contentStr = "发送 绑定+学号+身份证后六位\n例如：我的学号为1317443000，身份证后6位为123456，\n所以发送下列文字：\n绑定+1317443000+123456 \n即可绑定文正教务账号，可直接查询成绩和课表哦，还有最新的的文正官网信息的推送。后期本公众号将开放更多功能，抢课也算哦";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            
            if($keyword == "绑定")
            {
                $msgType = "text";
                $contentStr = "发送 绑定+学号+身份证后六位\n例如：我的学号为1317443000，身份证后6位为123456，\n所以发送下列文字：\n绑定+1317443000+123456 \n即可绑定文正教务账号，可直接查询成绩和课表哦，还有最新的的文正官网信息的推送。后期本公众号将开放更多功能，抢课也算哦";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            
            }
            if(strlen($keyword)>15)
            {
              $cmdArr = explode("+",$keyword);
            if(count($cmdArr)>1){
                  $msgType = "text";
                  $a=new WenZheng();
                 if($a->insert($fromUsername,$cmdArr[1],$cmdArr[2]))
                    
                    {
                    
                     $subscribe_ok=sprintf($textTpl,$fromUsername,$toUsername, $time,$msgType,$cmdArr[1]."绑定成功,发送以下命令：\n1或者查询成绩\n2或者行为学分，\n3或者课程表，\n等等命令有惊喜哦\n");
                echo $subscribe_ok;
                    }
                    
                    
                else{
               $subscribe_ok=sprintf($textTpl,$fromUsername,$toUsername, $time,$msgType,"绑定失败1");
                echo $subscribe_ok;
                     }

                   
                     
                                 }
           
            }
            
            
            //以上为绑定学号
            //以下为查询账号绩点
            
           if($keyword == "查询绩点"||$keyword == "999")
            {
                $a=new WenZheng();
               
               if($a->judge1($fromUsername)){
                    $msgType = "text";
                    $contentStr = "未绑定账号";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
               
               }
               else{
                $msgType = "text";
                $contentStr = $a->getGPA("zjkkg1");
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
               
               }
               
               
            }
        
              //以下为查询行为学分
            if($keyword == "行为学分"||$keyword == "2")
                {
                    $a=new WenZheng();
                   
                    if($a->judge1($fromUsername)){
                            $msgType = "text";
                            $contentStr = "未绑定账号";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                       
                                                   }
                   else{
                      //通过图文消息展示行为学分
                         $textTpl ="<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[news]]></MsgType>
                                    <ArticleCount>2</ArticleCount>
                                    <Articles>
                                    <item>
                                    <Title><![CDATA[点击进入查询个人行为学分]]></Title> 
                                    <Description><![CDATA[别慌张，点击进入行为学分表]]></Description>
                                    <PicUrl><![CDATA[http://www.sdwz.cn/files/104126/1309/x_4614267886.png]]></PicUrl>
                                    <Url><![CDATA[%s]]></Url>
                                    </item>
                                    <item>
                                    <Title><![CDATA[谢谢你的支持]]></Title>
                                    <Description><![CDATA[description]]></Description>
                                    <PicUrl><![CDATA[picurl]]></PicUrl>
                                    <Url><![CDATA[url]]></Url>
                                    </item>
                                    </Articles>
                                    </xml>";
                           
                        $msgType = "text";
                        $contentStr = $a->behavior($fromUsername);
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time,  $contentStr);
                        echo $resultStr;
                       
                       }
                   
                   
                }
            
            //以下为查询课表
        
            if($keyword == "课程表"||$keyword == "3")
                {
                    $a=new WenZheng();
                   
                    if($a->judge1($fromUsername)){
                            $msgType = "text";
                            $contentStr = "未绑定账号";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                       
                                                   }
                   else{
                      //通过图文消息展示成绩单
                         $textTpl ="<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[news]]></MsgType>
                                    <ArticleCount>2</ArticleCount>
                                    <Articles>
                                    <item>
                                    <Title><![CDATA[点击进入查询本周课程表]]></Title> 
                                    <Description><![CDATA[别慌张，点击进入课程表]]></Description>
                                    <PicUrl><![CDATA[http://www.sdwz.cn/files/104126/1309/x_4614267886.png]]></PicUrl>
                                    <Url><![CDATA[%s]]></Url>
                                    </item>
                                    <item>
                                    <Title><![CDATA[谢谢你的支持]]></Title>
                                    <Description><![CDATA[description]]></Description>
                                    <PicUrl><![CDATA[picurl]]></PicUrl>
                                    <Url><![CDATA[url]]></Url>
                                    </item>
                                    </Articles>
                                    </xml>";
                           
                        $msgType = "text";
                        $contentStr = $a->getKebiao($fromUsername);
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time,  $contentStr);
                        echo $resultStr;
                       
                       }
                   
                   
                }
            
            //以下为查询常州大学的学位绩点
             if($keyword == "查询成绩"||$keyword == "1")
                    {
                        $a=new WenZheng();
                       
                       if($a->judge1($fromUsername)){
                            $msgType = "text";
                            $contentStr = "未绑定账号";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                       
                                                   }
                   else{
                      //通过图文消息展示成绩单
                         $textTpl ="<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[news]]></MsgType>
                                    <ArticleCount>2</ArticleCount>
                                    <Articles>
                                    <item>
                                    <Title><![CDATA[点击进入查询成绩]]></Title> 
                                    <Description><![CDATA[别慌张，点击进入成绩单]]></Description>
                                    <PicUrl><![CDATA[%s]]></PicUrl>
                                    <Url><![CDATA[%s]]></Url>
                                    </item>
                                    <item>
                                    <Title><![CDATA[谢谢你的支持]]></Title>
                                    <Description><![CDATA[description]]></Description>
                                    <PicUrl><![CDATA[picurl]]></PicUrl>
                                    <Url><![CDATA[url]]></Url>
                                    </item>
                                    </Articles>
                                    </xml>";
                           
                        $msgType = "text";
                        $contentStr = $a->get123($fromUsername);
                       $xh=$a->get_xuehao($fromUsername);
                       $url="http://bcscdn.baidu.com/weipai/%2Fpspic_1395870892914152506.jpg?sign=MBO:bkmeswufx5ky1aIYnShwheC:RpkEE%2F5%2B2rMct2T2Ag0ieJsD7M8%3D";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $url, $contentStr);
                        echo $resultStr;
                       
                       }
                       
                       
                    }
            //查询汽车站的实时进站情况
            if($keyword >5)
                    {
                        $line=$keyword;
                        $a=new WenZheng();
                       if($a->judge2($line)){
                            $msgType = "text";
                            $contentStr = "未开发此路线";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                       
                                                   }
                   else{
                        $line=$keyword;
                      //通过图文消息展示进站情况
                         $textTpl ="<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[news]]></MsgType>
                                    <ArticleCount>2</ArticleCount>
                                    <Articles>
                                    <item>
                                    <Title><![CDATA[%s]]></Title> 
                                    <Description><![CDATA[别慌张，点击进入成绩单]]></Description>
                                    <PicUrl><![CDATA[%s]]></PicUrl>
                                    <Url><![CDATA[%s]]></Url>
                                    </item>
                                    <item>
                                    <Title><![CDATA[%s]]></Title>
                                    <Description><![CDATA[description]]></Description>
                                    <PicUrl><![CDATA[http://www.sdwz.cn/files/104126/1205/x_f534268019.JPG]]></PicUrl>
                                    <Url><![CDATA[%s]]></Url>
                                    </item>
                                    </Articles>
                                    </xml>";
                           
                        $msgType = "text";
                        $contentStr = $a->getdata($line);
                       $link_1="http://www.szjt.gov.cn/apts/APTSLine.aspx?LineGuid=".$contentStr[0]['line_go'];
                       $line_go_1="汽车行驶方向:".$contentStr[0]['line_goal'];
                       $link_2="http://www.szjt.gov.cn/apts/APTSLine.aspx?LineGuid=".$contentStr[1]['line_go'];
                       $line_go_2="汽车行驶方向:".$contentStr[1]['line_goal'];
                       $url="http://static.zhulong.com/photo/small/201204/20/58221_0_0_560_0.jpg";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time,  $line_go_1,$url,  $link_1,  $line_go_2,$link_2);
                        echo $resultStr;
                       
                       }
                       
                       
                    }
            //关注微信号接受信息推送
            
            
             if($event== "subscribe")
            {
                $msgType = "text";
                $contentStr = "发送 绑定+学号+身份证后六位\n例如：我的学号为1317443000，身份证后6位为123456，\n所以发送下列文字：\n绑定+1317443000+123456 \n即可绑定文正教务账号，可直接查询成绩和课表哦，还有最新的的文正官网信息的推送。后期本公众号将开放更多功能，抢课也算哦";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);;
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
        
             if($keyword == "解除绑定")
                    {
                        $a=new WenZheng();
                       
                       if($a->judge1($fromUsername)){
                            $msgType = "text";
                            $contentStr = "未绑定账号";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                       
                       }
                       else{
                        
                           $a->delete($fromUsername);
                           $msgType = "text";
                            $contentStr = "已经解绑账号";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                       
                       }
                       
                       
                    }
        
      
            
        
        
        
        
        
        
        
        
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
        

                          //以上为对于发送消息的判断及实现功能
        }else{
            echo "";
            exit;
        }
    }
}
?>