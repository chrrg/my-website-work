<?php
include_once "config.php";
include_once "main.php";
utf8();
$con=connect($databaseconfig);
$ismobile=isMobile();
function GetPartStr($str,$len){//$str字符串   $len 控制长度
	$one=0;
	$partstr='';
	for($i=0;$i<$len;$i++){
		$sstr=substr($str,$one,1);
		if(ord($sstr)>224){
			$partstr.=substr($str,$one,3);
			$one+=3;
		}elseif(ord($sstr)>192){
			$partstr.=substr($str,$one,2);
			$one+=2;
		}elseif(ord($sstr)<192){
			$partstr.=substr($str,$one,1);
			$one+=1;
		}
	}
	if(strlen($str)<$one){
		return $partstr;
	}else{
		return $partstr.'....';
	}
}
function DeleteHtml($str){
	$str = trim($str); //清除字符串两边的空格
	$str = preg_replace("/\r\n/","",$str); 
	$str = preg_replace("/\r/","",$str); 
	$str = preg_replace("/\n/","",$str); 
	return trim($str); //返回字符串
}
if (!isset($_GET['ajax'])){
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>继往开来 走向新时代 时间线</title>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/timeline.css">
</head>
<body>
<?php }//ajax php结束?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<h2><?php print($timeline_title_1[$lan]);?></h2>
			<div class="timeline timeline-line-dotted">
				<span class="timeline-label">
					<span class="label label-primary"><?php print($timeline_title_2[$lan]);?></span>
				</span>
				<?php
				$dire=0;
				$dires[0]='fadeInLeft';
				$dires[1]='fadeInRight';
				$sql = "select * from page where pagestyle = '2'";
				$rs = $con->query($sql);
				$row = mysqli_fetch_assoc($rs);
				if(mysqli_num_rows($rs)==0){die("数据库中时间线数据！");}
				do{
				?>
				<div class="timeline-item">
					<div class="timeline-point timeline-point-success">
						<i class="fa fa-money"></i>
					</div>
					<div class="timeline-event wow <?php if($ismobile)print('fadeInRight');else{print($dires[$dire]);$dire=!$dire;}?>" style="visibility:hidden;" data-wow-duration="0.5s">
						<div class="timeline-heading">
							<h4><?php if ($lan==0)print($row['title']);else print($row['title_en']);?></h4>
						</div>
						<div class="timeline-body">
							<p><span class="openlink" style="cursor: pointer;" data-title="<?php if ($lan==0)print($row['title']);else print($row['title_en']);?>" data-id="<?php print($row['id']);?>" onmouseover="this.style.cssText='color:gray; text-decoration:underline;cursor: pointer;'" onmouseout="this.style.cssText='color:black;text-decoration:none;'"><?php
							if ($lan==0){
								$pagetext = $row['pagecode'];
							}else{
								$pagetext = $row['pagecode_en'];
							}
							$pagetext=preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', '&nbsp;[图片]&nbsp;', $pagetext);
							$pagetext=preg_replace('/<\s*video\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', '&nbsp;[视频]&nbsp;', $pagetext);
							$pagetext=DeleteHtml($pagetext);
							$pagetext=strip_tags($pagetext);
							if ($lan==0)
								$pagetext=GetPartStr($pagetext,80);
							else
								$pagetext=GetPartStr($pagetext,160);
							print($pagetext);
						?></span></p>
						</div>
						<div class="timeline-footer">
							<p class="text-right"><?php $tda=explode(' ',$row['title']);print(reset($tda));?></p>
						</div>
					</div>
				</div>
				<?php
				}while($row = mysqli_fetch_array($rs));
				?>
				<span class="timeline-label">
					<span class="label label-primary"><?php print($timeline_title_3[$lan]);?></span>
				</span>
			</div>
		</div>
	</div>
</div>

<script>
var wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset: -100,
    mobile: true,
    live: true
});
wow.init();
$('.openlink').click(function(){
	var datatitleobj = $(this);
	laymsg('<?php echo $pagesub_loading_title[$lan];?>',3000);
	$.ajax({
		type: 'get',
		url: 'page/pageajax.php',
		data: 'pageid='+datatitleobj.attr('data-id'),
		success: function (data) {
			layid=layer.open({
				id:3
				,type:1
				,area:['70%','<?php echo $ismobile?'300':'500';?>px']
				,title: datatitleobj.attr('data-title')
				,content: '<div style="padding:25px;">'+data+'</div>'
				,scrollbar: false
				,shadeClose:true
				,end:function(){
					removeUnScroll();
				}
			});
			unScroll();
		},
		error: function (data) {}
	});
});

$("#modaldivdata").click(function(event){
	event.stopPropagation();    //  阻止事件冒泡
});
</script>


<?php include "foot.php"?>
<?php if (!isset($_GET['ajax'])){?>
</body>
</html><?php }?>
