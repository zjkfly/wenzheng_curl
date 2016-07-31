<?php
class cat{
public $name;
public $age;
public $geight;

}
$cat1=new cat();
$cat1->name="小白";
$cat1->age=100;
$cat1->geight=180;
if($cat1->name=="小白"){
echo $cat1->name."||".$cat1->age;}

?>