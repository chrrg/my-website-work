<?php
session_start();
if(isset($_GET['language'])){
	$_SESSION['language']=$_GET['language'];
}
if (!isset($_SESSION['language'])){
	$_SESSION['language']=0;
}
?>