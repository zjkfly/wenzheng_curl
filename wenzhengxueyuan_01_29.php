<?php
class WenZheng{
    //将信息插入数据库
    public function insert($name1,$xuehao1,$pwd1){
        $mysql = new SaeMysql();
        $sql="INSERT INTO `app_sudawzxy`.`test_mysql` (`from_user`, `account`, `password`) VALUES ('$name1', '$xuehao1', '$pwd1');";
        $data = $mysql->runSql( $sql );
        if($data){
            return true;}//判断是否插入失败
        else{
        return false;}
             }
    //查询信息是否已经绑定
    public function judge1($xuehao1){
        $mysql = new SaeMysql();
        $sql="SELECT * FROM `test_mysql` where account='$xuehao1'";
        $data = $mysql->getData( $sql );       //返回的数据存放在二维数组之中，例如a[0]['paaword']中，如果详细查询也是一样。
        if($data[0]['password']==null){
            return false;}
        else{   
            return true;}

                }
    public function getGPA($name){
        $GPA="希望你获得高分";
        return $GPA;	
    
    }
    public function getKebiao($name){
        $Kebiao="本学期没有课了，放假了。";
        return $Kebiao;	
    
    }
    public function getBehavior($name){
        $Behavior="该生行为学分无法获知。";
        return $Behavior;	
    
    }
  
    
    }
     public  function get123($name){
        
        
         $mysql = new SaeMysql();
        $sql="SELECT * FROM `test_mysql` where from_user='$name'";
        $data = $mysql->getData( $sql );       //返回的数据存放在二维数组之中，例如a[0]['paaword']中，如果详细查询也是一样。
        $xuehao=$data[0]['account'];
        //header("content-type:text/html; charset=utf-8");
         //   $ch=curl_init("www.gosky.top/index.php?xuehao=13457102");
		//	$ch=curl_init("http://wzjw.sdwz.cn/student/student_qm_cj.aspx");30.159.132/web_cjgl/cx_cj_xh_gly.aspx?whfs=%E5%AD%A6%E7%94%9F%E5%88%97%E8%A1%A8%E6%88%90%E7%BB%A9&xsxh=13457102&xsbh
		//$ch=curl_init("http://wzjw.sdwz.cn/student/xsksap.aspx");
         /*curl_setopt($ch, CURLOPT_HEADER,0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
		$txt=curl_exec($ch);*/
         
       
         
      $jieguo="http://www.gosky.top/index.php?xuehao=".$xuehao;
         //  $jieguo="<a href='$jieguo'>点击查看成绩</a>" ;  
         //  $jieguo="    <link>$jieguo</link>";
            // var_dump($txt);
		 return $jieguo; 
			 }
    


}
// $a=new WenZheng();
//    var_dump($a->insert("romUserna","mdArr","mdAr"));

?>