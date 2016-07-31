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
                $contentStr = "发送 例如绑定+学号+教务网密码 即可绑定账号，以后可直接登录查询成绩绩点";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            
            if($keyword == "帮助")
            {
                $msgType = "text";
                $contentStr = "发送 例如绑定+学号+教务网密码 即可绑定账号，以后可直接登录查询成绩绩点";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            
            if($keyword == "绑定")
            {
                $msgType = "text";
                $contentStr = "发送 例如绑定+学号+教务网密码 即可绑定账号，以后可直接登录查询成绩绩点";
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
                    
                    $subscribe_ok=sprintf($textTpl,$fromUsername,$toUsername, $time,$msgType,$cmdArr[1]."绑定成功,发送查询成绩，行为学分，查课表，等等命令有惊喜哦");
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
            
           if($keyword == "查询绩点")
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
            if($keyword == "行为学分")
                {
                    $a=new WenZheng();
                   
                   if(!$a->judge1($fromUsername)){
                        $msgType = "text";
                        $contentStr = "未绑定账号";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                   
                   }
                   else{
                    $msgType = "text";
                    $contentStr = $a->getBehavior("zjkkg1");
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                   
                   }
                   
                   
                }
            
            //以下为查询课表
        
            if($keyword == "查课表")
                    {
                        $a=new WenZheng();
                       
                       if(!$a->judge1($fromUsername)){
                            $msgType = "text";
                            $contentStr = "未绑定账号";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                       
                       }
                       else{
                        $msgType = "text";
                        $contentStr = $a->getKeBiao("zjkkg1");
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                       
                       }
                       
                       
                    }
            //以下为查询常州大学的学位绩点
             if($keyword == "查询成绩")
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
                                    <Title><![CDATA[查询成绩]]></Title> 
                                    <Description><![CDATA[别慌张，点击进入成绩单]]></Description>
                                    <PicUrl><![CDATA[https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png]]></PicUrl>
                                    <Url><![CDATA[%s]]></Url>
                                    </item>
                                    <item>
                                    <Title><![CDATA[title]]></Title>
                                    <Description><![CDATA[description]]></Description>
                                    <PicUrl><![CDATA[picurl]]></PicUrl>
                                    <Url><![CDATA[url]]></Url>
                                    </item>
                                    </Articles>
                                    </xml>";
                           
                        $msgType = "text";
                        $contentStr = $a->get123($fromUsername);
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time,  $contentStr);
                        echo $resultStr;
                       
                       }
                       
                       
                    }
            //关注微信号接受信息推送
            
            
             if($event== "subscribe")
            {
                $msgType = "text";
                $contentStr = "发送 例如绑定+学号+教务网密码 即可绑定账号，以后可直接登录查询成绩绩点";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
        
        
        
      
            
        
        
        
        
        
        
        
        
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
        

                          //以上为对于发送消息的判断及实现功能
        }else{
            echo "";
            exit;
        }
    }
}
?>