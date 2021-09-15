<?php
//允许所有域名访问
header('Access-Control-Allow-Origin:*');
//设置文件头-默认中文编码
header('Content-Type:application/json; charset=utf-8');

$servername = "localhost";
$username = "s7602900";
$dbname = "s7602900";
$password = "qq12345678";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);

?>
