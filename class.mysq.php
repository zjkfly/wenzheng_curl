<?php
class Mysql1{
public $a;
    public function insert($name1,$xuehao1,$pwd1){
$mysql = new SaeMysql();
        /* $id1=$id
$name1=$name;
$xuehao1=$xuehao;
$pwd1=$pwd;*/



$sql="INSERT INTO `app_sudawzxy`.`test_mysql` (`from_user`, `account`, `password`) VALUES ('$name1', '$xuehao1', '$pwd1');";
$data = $mysql->runSql( $sql );
if($data){
    return true;}//判断是否插入失败
else{

return false;}
}
}

?>