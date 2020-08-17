<?php
if (!isset($_GET['pageid'])||!is_numeric($_GET['pageid']))die;
include_once "../config.php";
include_once "../main.php";
utf8();
$con=connect($databaseconfig);
$arr = [];
$sql = "select * from page where id = '".$con->real_escape_string($_GET['pageid'])."'";
$rs = $con->query($sql);
$row = mysqli_fetch_assoc($rs);
if(mysqli_num_rows($rs)==0){die("数据库中无此数据！");}
echo $row['title'];?>