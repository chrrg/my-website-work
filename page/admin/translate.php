<?php
include_once "../config.php";
include_once "../main.php";
utf8();
ini_set('max_execution_time', '0');
$con=connect($databaseconfig);

if (isset($_GET['id'])){
	if (is_numeric($_GET['id'])){
		$id=$_GET['id'];
		$row=mysqli_fetch_assoc($con->query("select * from page where id = $id"));
		if (strpos($row['title'],'->')!==false){//有，即标题
			$rr=explode('->',$row['title']);
			$title_en='';
			foreach($rr as $rri){
				if ($rri=='不忘初心'){
					$string='Past';
				}elseif($rri=='继续前行'){
					$string='Future';
				}else{
					$string=translate("http://gutdx.club/chuxin/page/admin/get.php?word=".urlencode($rri));
				}
				if ($title_en=='')
					$title_en=$title_en.$con->real_escape_string($string);//标题
				else
					$title_en=$title_en.'->'.$con->real_escape_string($string);//标题
			}
		}else{
			$url="http://gutdx.club/chuxin/page/admin/gettitle.php?pageid=$id";
			$title_en=$con->real_escape_string(translate($url));//标题
		}
		$url="http://gutdx.club/chuxin/page/admin/get.php?pageid=$id";
		$pagecode_en=$con->real_escape_string(translate($url));
		$sql="update `page` set `pagecode_en`='$pagecode_en',`title_en`='$title_en' where `id` = '$id'";
		$con->query($sql);
		print($title_en);
		print('<hr />');
		print($pagecode_en);
	}else{
		die('not num');
	}
}else{
	$begin=1;
	$end=327;
	for ($id=$begin;$id<=$end;$id++){//循环！
		$row=mysqli_fetch_assoc($con->query("select * from page where id = $id"));
		if (strpos($row['title'],'->')!==false){//有，即标题
			$rr=explode('->',$row['title']);
			$title_en='';
			foreach($rr as $rri){
				if ($rri=='不忘初心'){
					$string='Past';
				}elseif($rri=='继续前行'){
					$string='Future';
				}else{
					$string=translate("http://gutdx.club/chuxin/page/admin/get.php?word=".urlencode($rri));
				}
				if ($title_en=='')
					$title_en=$title_en.$con->real_escape_string($string);//标题
				else
					$title_en=$title_en.'->'.$con->real_escape_string($string);//标题
			}
		}else{
			$url="http://gutdx.club/chuxin/page/admin/gettitle.php?pageid=$id";
			$title_en=$con->real_escape_string(translate($url));//标题
		}
		$url="http://gutdx.club/chuxin/page/admin/get.php?pageid=$id";
		$pagecode_en=$con->real_escape_string(translate($url));
		$sql="update `page` set `pagecode_en`='$pagecode_en',`title_en`='$title_en' where `id` = '$id'";
		$con->query($sql);
	}
}



function strip_selected_tags($text, $tags = array()){
	$args = func_get_args();
	$text = array_shift($args);
	$tags = func_num_args()>2?array_diff($args,array($text)):(array)$tags;
	foreach ($tags as $tag){
		if(preg_match_all('/<'.$tag.'[^>]*>(.*)<\/'.$tag.'>/iU', $text, $found)){$text = str_replace($found[0],$found[1],$text);}
	}
	return $text;
}
function translate($url){
	$a=file_get_contents('http://translate.baiducontent.com/transpage?query='.urlencode($url).'&from=zh&to=en&source=url&frzj=cfy');
	$b=explode('<trans',$a);
	$row=$b[0];
	for($i=1;$i<count($b);$i++){
		$c=substr(strstr($b[$i],'">'),2);
		$c=explode('</trans>',$c);
		$row=$row.$c[0].$c[1];
	}
	$a=$row;
	$b=explode('<a href="http://translate.baiducontent.com/transpage?cb=translateCallback&ie=utf8&source=url&query=',$a);
	$row=$b[0];
	for($i=1;$i<count($b);$i++){
		$c=strstr($b[$i],'&from=',true);
		$url=urldecode($c);
		$c=substr(strstr($b[$i],'"'),1);
		$row=$row.'<a href="'.$url.'"'.$c;
	}
	$a=$row;
	$a=substr(strstr($a,'</script>'),9);
	$a=explode('<!--"\'>-->',$a);
	$a=reset($a);
	$a=explode("document.createElement('trans');</script>\n",$a);
	return trim($a[1]);
}
?>