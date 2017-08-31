<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30/030
 * Time: 11:55
 */
$val=$_GET["val"];
$isDone=$_GET["isDone"];
$isStar=$_GET["isStar"];
session_start();
$user=$_SESSION["user"];
include "db.php";
//$sql="insert into todolist(text,time,isDone,isStar)values('','','','')";
$sql="insert into todolist(val,isDone,isStar,user)values('$val','$isDone','$isStar','$user')";
$db->query($sql);
if($db->affected_rows==1){
    echo 1;
}else{
    echo 0;
}