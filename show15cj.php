<?php
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
require "wenzhengxueyaun.class.php";
$xuehao=$_GET['account'];
$a=new WenZheng();
$arr=$a->getgpaof15($xuehao);
echo "<h1 align='center'>你好，".$arr[0]['username']."</h2>";
echo "<h1 align='center'>你好，你整个年级的成绩为以下：</h2>";
for($i=0;$i<count($arr);$i++){
   echo "<h2 align='center'>课程名：".$arr[$i]['kcm']."----".$arr[$i]['grade']."</h2>";
}
echo "<br><br><br>";

for($i=0;$i<count($arr);$i++){
   $count15=$count15+$arr[$i]['grade'];
}
$average=($count15/count($arr));
echo "<h2 align='center'>你的平均分为：".$average."</h2>";

if($average>87){
    echo "<h2 align='center'>进入全校100人中的前".(0.7*(89.5-$average)/1.12)."</h2>";}
else if($average>64){
    echo "<h2 align='center'>进入全校100人中的前".((87.5-$average)/0.22)."</h2>";
}
else if($average>42){
    echo "<h2 align='center'>进入全校100人中的前".((387-$average)/3.36)."</h2>";
}

if($average>90){
echo "<h2 align='center'>毕竟学霸，，，我服</h2>";}
else if($average>80){
echo "<h2align='center'>中规中矩，，，不错</h2>";
}
else if($average>60){
    echo "<h2 align='center'>好好学习，，，努力</h2>";
}
else if($average<60){
    echo "<h2 align='center'>成绩爆炸，，，学渣</h2>";
}
?>