<?php
include_once "config.php";
include_once "main.php";
utf8();
$con=connect($databaseconfig);
$ismobile=isMobile();
if(isset($_POST['pageid']))$id=$_POST['pageid'];else die;
if(isset($_POST['text'])){
	$text=$_POST['text'];
	$text=$con->real_escape_string($text);
}else die;

if(!isset($_POST['chuxin_nickname'])||$_POST['chuxin_nickname']==''){
	$aa=rand(0,9);
	switch($aa){
		case 0:
			$nickname="小猪 佩奇";
			break;
		case 1:
			$nickname="小羊 苏西";
			break;
		case 2:
			$nickname="小马 佩德罗";
			break;
		case 3:
			$nickname="小狗 丹尼";
			break;
		case 4:
			$nickname="小狐狸 弗雷迪";
			break;
		case 5:
			$nickname="小猫 凯迪";
			break;
		case 6:
			$nickname="小兔 瑞贝卡";
			break;
		case 7:
			$nickname="小象 艾米丽";
			break;
		case 8:
			$nickname="小斑马 苏怡";
			break;
		case 9:
			$nickname="小毛驴 戴芬";
			break;
		default:
			$nickname="匿名";
			break;
	}
}else $nickname=$_POST['chuxin_nickname'];


$sql = "INSERT INTO `speak`(`targetid`, `ip`, `nickname`, `text`, `timestamp`) VALUES ('$id','".get_ip()."','$nickname','$text','".time()."')";
$rs = $con->query($sql);
print('ok');
?>