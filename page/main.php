<?php
include_once "config.php";
function utf8(){
	header("Content-Type: text/html; charset=UTF-8");
}
function session(){
	session_start();
}
function GND(){return date("Y-m-d",time()+6*60*60);}
function GNT(){return date("H:i:s",time()+6*60*60);}
function GetNowTimeStamp(){return time();}
function connect($databaseconfig){
	$con = mysqli_connect($databaseconfig[0],$databaseconfig[1],$databaseconfig[2],$databaseconfig[3]);
	if (!$con){die('<span style="color：red;font-size:40px;"><br />Sorry，数据库未连接成功！试试<a href="page/setup/">一键安装</a><br />如果无法本地演示，<a href="http://www.gutdx.club/chuxin/">演示地址1</a>&nbsp;<a href="http://yiban.glut.edu.cn/chuxin/">演示地址2</a>—— 桂林理工大学 继往开来 走向新时代</span>');}
	$con->query("set names 'utf8'");
	return $con;
}
function iif($tiaojian,$shuchu1,$shuchu2){if ($tiaojian)return $shuchu1;else return $shuchu2;}
function isMobile()
{
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])){return true;}
    if (isset ($_SERVER['HTTP_VIA'])){return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;}
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {$clientkeywords = array (
            'android','iphone','samsung','ucweb','wap','mobile','nokia','sony','ericsson','mot','htc','sgh','lg','sharp','sie-',
			'philips','panasonic','alcatel','lenovo',  'ipod','blackberry','meizu','netfront',
			'symbian','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp');
    if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))){return true;}}
    if (isset ($_SERVER['HTTP_ACCEPT'])){if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))){return true;}}return false;
}
function get_hash(){
  $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()+-';
  $random = $chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)];
  $content = uniqid().$random;
  return sha1($content);
}
function get_ip() {
	static $res = NULL;
	if($res !== NULL){return $res;}
    if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $ip = getenv('REMOTE_ADDR');
    } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $res =  preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
	return $res;
}


?>