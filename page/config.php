<?php
$domain="localhost";//域名
$ishttps=false;//是否开启https支持
$force_ssl=false;//是否强制https
$program_name="继往开来 走向新时代";//项目名称

$language=array('简体中文','English');//语言
/****************database********************///下面是数据库设置



$database_path="localhost";//这里是您的数据库地址，默认localhost
$database_username="root";//数据库用户名，默认root
$database_password="root";//数据库密码，默认root



/********************************************///上面数据库设置

$database_name="chuxin";//本网站存放的数据库名，勿改，已固定
$databaseconfig=array($database_path,$database_username,$database_password,$database_name);
/********************************************/
include "language.php";//引入语言包

session_start();
if(isset($_GET['language'])){
	$_SESSION['language']=$_GET['language'];
}
if (!isset($_SESSION['language'])){
	$_SESSION['language']=0;
}
$lan=$_SESSION['language'];
?>