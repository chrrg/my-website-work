<?php
include_once "config.php";
include_once "main.php";
utf8();
$con=connect($databaseconfig);
$ismobile=isMobile();
if(isset($_GET['pageid']))$id=$_GET['pageid'];else die;

$sql = "update speak set zan=zan+1 where id = '$id'";
$rs = $con->query($sql);
?>