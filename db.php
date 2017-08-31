<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30/030
 * Time: 9:11
 */
$db=new mysqli("localhost","root","","db");//数据库的连接
$db->query("set names utf8");
if($db->connect_errno){
    echo "数据库连接错误".$db->connect_error;
    exit();
}
//connect_errno数据库连接错误的编号
//connect_error数据库连接错误的信息
