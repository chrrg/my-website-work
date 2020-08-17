<?php
include_once "page/config.php";
include_once "page/main.php";
utf8();
$con=connect($databaseconfig);
$ismobile=isMobile();
include 'page/indexform.php';//这里是加载首页布局——继往开来 走向新时代——桂林理工大学
?>
