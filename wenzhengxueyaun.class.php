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
    
    
    //用来绑定bus station的方法
    public function charu($lianjie){
    $mysql = new SaeMysql();
       
         list($a,$b,$line_go,$c,$line,$line_goal) = split( '[?=(&)]', $lianjie );
        $sql = "INSERT INTO `app_sudawzxy`.`test_bus` ( `line`, `line_go`, `line_goal`, `preserve`) VALUES ('$line', '$line_go', '$line_goal','');";
        $data = $mysql->runSql($sql);
    }
    //查询所插入的数据
    public function getdata($line){
    $mysql = new SaeMysql();
       $sql = "SELECT * FROM `app_sudawzxy`.`test_bus` WHERE line='$line';";
        $data = $mysql->getData($sql);
        return $data;
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
    //判断是否有此路线
    public function judge2($line){
        $mysql = new SaeMysql();
        $sql="SELECT * FROM `test_bus` where line='$line'";
        $data = $mysql->getData( $sql );       //返回的数据存放在二维数组之中，例如a[0]['paaword']中，如果详细查询也是一样。
        if($data[0]['line']>7){
            return false;}
        else{   
            return true;}

                }
    //得到15届大学生的成绩单
    public function getgpaof15($xuehao1){
    $mysql = new SaeMysql();
        $sql="SELECT * FROM `studentgpa` where account='$xuehao1'";
        $data = $mysql->getData( $sql );
    return $data;
    }
    public function getGPA($name){
        $GPA="希望你获得高分";
        return $GPA;	
    
    }
    public function getKebiao($name){
        $mysql = new SaeMysql();
        $sql="SELECT * FROM `test_mysql` where from_user='$name'";
        $data = $mysql->getData( $sql );       //返回的数据存放在二维数组之中，例如a[0]['paaword']中，如果详细查询也是一样。
        $xuehao=$data[0]['account'];       
         $mima=$data[0]['password'];
         // $jieguo="http://www.gosky.top/index.php?xuehao=".$xuehao;
         $jieguo="http://1.sudawzxy.applinzi.com/showkebiao.php?a=".$xuehao."&b=".$mima;
         //  $jieguo="<a href='$jieguo'>点击查看成绩</a>" ;  
         //  $jieguo="    <link>$jieguo</link>";
            // var_dump($txt);
		 return $jieguo; 
        
        
    }
    public  function behavior($name){
        
        
         $mysql = new SaeMysql();
        $sql="SELECT * FROM `test_mysql` where from_user='$name'";
        $data = $mysql->getData( $sql );       //返回的数据存放在二维数组之中，例如a[0]['paaword']中，如果详细查询也是一样。
        $xuehao=$data[0]['account'];       
         $mima=$data[0]['password'];
         // $jieguo="http://www.gosky.top/index.php?xuehao=".$xuehao;
         $jieguo="http://1.sudawzxy.applinzi.com/showxwxf.php?a=".$xuehao."&b=".$mima;
         //  $jieguo="<a href='$jieguo'>点击查看成绩</a>" ;  
         //  $jieguo="    <link>$jieguo</link>";
            // var_dump($txt);
		 return $jieguo; 
			 }
  
    
   
     public  function get123($name){
        
        
         $mysql = new SaeMysql();
        $sql="SELECT * FROM `test_mysql` where from_user='$name'";
        $data = $mysql->getData( $sql );       //返回的数据存放在二维数组之中，例如a[0]['paaword']中，如果详细查询也是一样。
        $xuehao=$data[0]['account'];       
         $mima=$data[0]['password'];
         // $jieguo="http://www.gosky.top/index.php?xuehao=".$xuehao;
         $jieguo="http://1.sudawzxy.applinzi.com/showcj.php?a=".$xuehao."&b=".$mima;
         //  $jieguo="<a href='$jieguo'>点击查看成绩</a>" ;  
         //  $jieguo="    <link>$jieguo</link>";
            // var_dump($txt);
		 return $jieguo; 
			 }
    
    //获取绑定的学号
    public function get_xuehao($name){
    $mysql = new SaeMysql();
        $sql="SELECT * FROM `test_mysql` where from_user='$name'";
        $data = $mysql->getData( $sql );       //返回的数据存放在二维数组之中，例如a[0]['paaword']中，如果详细查询也是一样。
        $xuehao=$data[0]['account'];
        return $xuehao;
    
    }
    
    public function delete($name){
        $mysql = new SaeMysql();
        //$sql="INSERT INTO `app_sudawzxy`.`test_mysql` (`from_user`, `account`, `password`) VALUES ('$name1', '$xuehao1', '$pwd1');";
        $sql=  "DELETE FROM `app_sudawzxy`.`test_mysql` WHERE `test_mysql`.`from_user` = '$name';";
        $data = $mysql->runSql( $sql );
        if($data){
            return true;}//判断是否插入失败
        else{
        return false;}
             }
  
    


}

?>