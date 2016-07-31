<?php
class Mysql{
public $a;
    public function count1(){
$mysql = new SaeMysql();




$sql="INSERT INTO `test_mysql` (`from_user`, `account`, `password`) VALUES ( 'dasdsa11', 'xue1hao', 'm1ima');";
$data = $mysql->runSql( $sql );
if($data){
    echo "successful";}//判断是否插入失败
else{

echo "fail";}
}
}

?>