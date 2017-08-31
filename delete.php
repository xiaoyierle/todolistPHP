<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30/030
 * Time: 17:40
 */
$id=$_GET["id"];
include "db.php";
$sql="delete from todolist where id='$id'";
$db->query($sql);
if($db->affected_rows==1){
    echo 1;
}else{
    echo 0;
}