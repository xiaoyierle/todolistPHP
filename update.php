<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30/030
 * Time: 17:00
 */
$id=$_GET["id"];
$attr=$_GET["attr"];
$val=$_GET["val"];
echo $attr,$val;
include "db.php";
$sql="update todolist set $attr='$val' where id='$id'";
echo $sql;
$db->query($sql);
if($db->affected_rows==1){
    echo 1;
}else{
    echo 0;
}