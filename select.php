<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30/030
 * Time: 14:52
 */
error_reporting(0);
$id=$_GET["id"];
session_start();
$user=$_SESSION["user"];
include "db.php";
if(isset($id)){
    $sql="select * from todolist where id='$id'";
}else{
//    $sql="select * from todolist order by id asc";
    $sql="select * from todolist where user='$user'";
}

$result=$db->query($sql);
$r=$result->fetch_all(MYSQLI_ASSOC);
//MYSQLI_ASSOC 查询结果是一个索引数组类型
echo json_encode($r);
//json_encode()把一个对象格式转化成字符串