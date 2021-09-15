<?php
include("head.php");
// 检测连接
if (!$conn) {
exit(json_encode("数据库连接失败！"));
}else{
$cw_md5_key =$_GET["md5_key"];
$sql = "SELECT *  FROM `admin_cw` WHERE `id` = 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {//返回行数
$kpl = mysqli_fetch_assoc($result);
$arr = $kpl["md5"];
if($cw_md5_key==$arr){

$cw_xg=$_GET["cw_xg"];
if($cw_xg=="value"){
$cw_title =  $_GET["cw_title"];
$cw_describe = $_GET["cw_describe"];
$cw_headportrait =  $_GET["cw_headportrait"];
$cw_head_title = $_GET["cw_head_title"];
$cw_yl_title = $_GET["cw_yl_title"];
$cw_time = $_GET["cw_time"];
$cw_bottom_title = $_GET["cw_bottom_title"];
$cw_bottom_img = $_GET["cw_bottom_img"];
$cw_zdy_title = $_GET["cw_zdy_title"];
$cw_tc = $_GET["cw_tc"];
$cw_huabang = $_GET["cw_huabang"];
if($cw_title==null){
exit(json_encode("1"));
}else if($cw_describe==null){
exit(json_encode("2"));
}else if($cw_headportrait==null){
exit(json_encode("3"));
}else if($cw_head_title==null){
exit(json_encode("4"));
}else if($cw_yl_title==null){
exit(json_encode("5"));
}else if($cw_time==null){
exit(json_encode("6"));
}else if($cw_bottom_title==null){
exit(json_encode("7"));
}else if($cw_bottom_img==null){
exit(json_encode("8"));
}else if($cw_tc==null){
exit(json_encode("10"));
}else if($cw_huabang==null){
exit(json_encode("11"));
}else{
$sql = "UPDATE `cw_zdy_title` SET `cw_title` = '$cw_title', `cw_describe` = '$cw_describe', `cw_headportrait` = '$cw_headportrait', `cw_head_title` = '$cw_head_title', `cw_yl_title` = '$cw_yl_title', `cw_time` = '$cw_time', `cw_bottom_title` = '$cw_bottom_title', `cw_bottom_img` = '$cw_bottom_img', `cw_zdy_title` = '$cw_zdy_title', `cw_tc` = '$cw_tc', `cw_huabang` = '$cw_huabang' WHERE `cw_zdy_title`.`id` = 1";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("修改成功。"));
}
}

}else if($cw_xg=="dhtj"){
$dh_id = $_GET["cw_id"];
$dh_leixin = $_GET["cw_leixin"];
$dh_img = $_GET["dh_img"];
$dh_text = $_GET["dh_text"];
$dh_lj = $_GET["dh_lj"];
if($dh_img==null){
exit(json_encode("未填写图标地址。"));
}else if($dh_text==null){
exit(json_encode("未填写导航名称。"));
}else if($dh_lj==null){
exit(json_encode("未填写链接地址。"));
}else{
if($dh_leixin == "bj"){
$sql = "UPDATE `daohang` SET `img` = '$dh_img', `text` = '$dh_text', `lj` = '$dh_lj' WHERE `daohang`.`id` = $dh_id";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("修改成功。"));
}else{
exit(json_encode("修改失败。"));
}
}else if($dh_leixin == "tj"){
$sql = "INSERT INTO `daohang` (`id`, `img`, `text`, `lj`) VALUES (NULL, '$dh_img', '$dh_text', '$dh_lj')";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("添加成功。"));
}else{
exit(json_encode("添加失败。"));
}
}
}
}else if($cw_xg=="sc"){
$dh_id = $_GET["cw_id"];
$sql = "DELETE FROM `daohang` WHERE `daohang`.`id` = $dh_id";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("删除成功。"));
}else{
exit(json_encode("删除失败。"));
}
}else if($cw_xg=="music"){
$music_id = $_GET["music_id"];
$music_leixin = $_GET["music_leixin"];
$music_img = $_GET["music_img"];
$music_gem = $_GET["music_gem"];
$music_zhe = $_GET["music_zhe"];
$music_src = $_GET["music_src"];
if($music_img==""||$music_gem==""||$music_zhe==""||$music_src==""){
exit(json_encode("302。"));
}else{
if($music_leixin=="music_tj"){
$sql = "INSERT INTO `music_cw` (`id`, `title`, `cover`, `mp3`, `artist`) VALUES (NULL, '$music_gem', '$music_img', '$music_src', '$music_zhe')";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("添加成功。"));
}else{
exit(json_encode("添加失败。"));
}
}else if($music_leixin=="music_bj"){
$sql = "UPDATE `music_cw` SET `title` = '$music_gem', `cover` = '$music_img', `mp3` = '$music_src', `artist` = '$music_zhe' WHERE `music_cw`.`id` = $music_id";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("修改成功。"));
}else{
exit(json_encode("修改失败。"));
}
}
}

}else if($cw_xg=="music_sc"){
$music_id = $_GET["cw_id"];
$sql = "DELETE FROM `music_cw` WHERE `music_cw`.`id` = $music_id";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("删除成功。"));
}else{
exit(json_encode("删除失败。"));
}
}else if($cw_xg=="lunbo"){
$lunbo_id = $_GET["lunbo_id"];
$lunbo_leixin = $_GET["lunbo_leixin"];
$lunbo_img = $_GET["lunbo_img"];
$lunbo_text = $_GET["lunbo_text"];
$lunbo_lj = $_GET["lunbo_lj"];
if($lunbo_img==""||$lunbo_text==""||$lunbo_lj==""){
exit(json_encode("302。"));
}else{
if($lunbo_leixin=="lunbo_tj"){
$sql = "INSERT INTO `lunbo_cw` (`id`, `img`, `text`, `lj`) VALUES (NULL, '$lunbo_img', '$lunbo_text', '$lunbo_lj')";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("添加成功。"));
}else{
exit(json_encode("添加失败。"));
}
}else if($lunbo_leixin=="lunbo_bj"){
$sql = "UPDATE `lunbo_cw` SET `img` = '$lunbo_img', `text` = '$lunbo_text', `lj` = '$lunbo_lj' WHERE `lunbo_cw`.`id` = $lunbo_id";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("修改成功。"));
}else{
exit(json_encode("修改失败。"));
}
}
}
}else if($cw_xg=="lunbo_sc"){
$lunbo_id = $_GET["cw_id"];
$sql = "DELETE FROM `lunbo_cw` WHERE `lunbo_cw`.`id` = $lunbo_id";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("删除成功。"));
}else{
exit(json_encode("删除失败。"));
}
}else if($cw_xg=="md5_key"){
$key = $_GET["md5_key"];
$sql = "SELECT *  FROM `admin_cw` WHERE `id` = 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {//返回行数
$kpl = mysqli_fetch_assoc($result);
$arr = $kpl["md5"];
if($key==$arr){
exit(json_encode("200"));
}else{
exit(json_encode("202"));
}
}
}else if($cw_xg=="mima_cw"){
$admin_name = $_GET["name"];
$admin_password = $_GET["password"];
$admin_md5 = $_GET["md5_key_s"];
if($admin_name==""||$admin_password==""||$admin_md5==""){
exit(json_encode("302。"));
}else{
$sql = "UPDATE `admin_cw` SET `name` = '$admin_name', `password` = '$admin_password', `md5` = '$admin_md5' WHERE `admin_cw`.`id` = 1";
$result = mysqli_query($conn, $sql);
if($result) {
exit(json_encode("200"));
}else{
exit(json_encode("202"));
}
}

}

}else{
exit(json_encode("接口异常。"));
}
}
}
?>