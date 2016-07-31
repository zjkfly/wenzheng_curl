<?php
$mysql = new SaeMysql();



    /*$from_user="java31";
$xuehao="zjkkg1";
$mima="13231dasd2";*/
//$sql="INSERT INTO `app_sudawzxy`.`test_mysql` (`from_user`, `account`, `password`) VALUES ( 'dasdsa1', 'zjkkg11', '13231dasd12'）;";
/*$sql="INSERT INTO `test_mysql` (`from_user`, `account`, `password`) VALUES ( 'dasdsa1', 'xuehao', 'mima');";
$data = $mysql->runSql( $sql );
if($data){
    echo "successful";}//判断是否插入失败
else{

echo "fail";}
*/


$sql="SELECT * FROM `test_mysql` where id='2'";//查询数据库数据
$data = $mysql->getData( $sql );       //返回的数据存放在二维数组之中，例如a[0]['paaword']中，如果详细查询也是一样。
var_dump($data[0]['password']);

?>