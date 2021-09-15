<?php
include("head.php");
if (!$conn) {
exit(json_encode("数据库连接失败！"));
}else{
$sql = "SELECT *  FROM `cw_zdy_title` WHERE `id` = 1";
$result = mysqli_query($conn, $sql);
$value_cw = array();
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
		$value_cw[] = $row;
    }
}
 
//导航数据
$sql = "SELECT * FROM `daohang`";
$result = mysqli_query($conn, $sql);
$daohang = array();
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
    $daohang[] = $row;
    }
}

//音乐数据
$sql = "SELECT * FROM `music_cw`";
$result = mysqli_query($conn, $sql);
$music = array();
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
    $music[] = $row;
    }
}

//轮播图数据
$sql = "SELECT * FROM `lunbo_cw`";
$result = mysqli_query($conn, $sql);
$lunbo = array();
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
    $lunbo[] = $row;
    }
}

//组合数据
/*
$apis_val = [
"cw_value" => $value_cw,
"daohang" => $daohang,
"music" => $music,
"lunbo" => $lunbo,
];
*/
$apis_val = array();
$apis_val = array('cw_value'=>$value_cw,'daohang'=>$daohang,'music'=>$music,'lunbo'=> $lunbo);
exit(json_encode($apis_val));
/*
//网站基本数据
$sql = "SELECT *  FROM `cw_zdy_title` WHERE `id` = 1";
$result = mysqli_query($conn, $sql);
$arr = array();
if (mysqli_num_rows($result) > 0) {//返回行数
$kpl = mysqli_fetch_assoc($result);
$arr = array('cw_title'=>$kpl["cw_title"],'cw_describe'=>$kpl["cw_describe"],'cw_headportrait'=>$kpl["cw_headportrait"],'cw_head_title'=>$kpl["cw_head_title"],'cw_yl_title'=>$kpl["cw_yl_title"],'cw_time'=>$kpl["cw_time"],'cw_bottom_title'=>$kpl["cw_bottom_title"],'cw_bottom_img'=>$kpl["cw_bottom_img"],'cw_weather'=>$kpl["cw_weather"],'cw_tc'=>$kpl["cw_tc"],'cw_zdy_title'=>$kpl["cw_zdy_title"],'cw_huabang'=>$kpl["cw_huabang"]);
//返回json数据
}

//导航数据
$sql = "SELECT * FROM `daohang`";
$result = mysqli_query($conn, $sql);
$daohang = array();
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
    $daohang[] = $row;
    }
}

//音乐数据
$sql = "SELECT * FROM `music_cw`";
$result = mysqli_query($conn, $sql);
$music = array();
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
    $music[] = $row;
    }
}

//轮播图数据
$sql = "SELECT * FROM `lunbo_cw`";
$result = mysqli_query($conn, $sql);
$lunbo = array();
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
    $lunbo[] = $row;
    }
}

//组合数据
$api_val = [
"cw_value" => $arr,
"daohang" => $daohang,
"music" => $music,
"lunbo" => $lunbo,
];

exit(json_encode($api_val));
*/

mysqli_close($conn);
}
?>