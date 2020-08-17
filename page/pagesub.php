<?php
include_once "config.php";
include_once "main.php";
utf8();
$con=connect($databaseconfig);
$ismobile=isMobile();
/*	$rs=mysql_query("select count(*) from page",$con);
	$Total = mysql_fetch_array($rs);//查询数据库中一共有多少条数据 

	$sql = "select * from message where zh='".$_POST["zh"]."' and readtime=''";
	$rs = mysql_query($sql, $con);
	print(mysql_num_rows($rs));//查询数据库中一共有多少条数据 

	$sql = "select * from page where id='".$_GET["id"]."'";
	$rs = mysql_query($sql, $con);
	$row = mysql_fetch_assoc($rs);
	if(mysql_num_rows($rs)==0){die("抱歉，无此文章，可能已被发布者删除！");}
	do{
	
	}while($row = mysql_fetch_array($rs));
	mysql_close($con);
*/
$titlesqlname='title';
$indexname="首页";
if($lan==1){
	$mainpartname=$mainpartname_en;
	$titlesqlname='title_en';
	$indexname="Home Page";
}
?>

<br />

<?php print($pagesub_location_title[$lan]);?><span class="toindex" onclick="topage(1,'index.php');"><?php print($pagesub_location_home[$lan]);?></span>-><?php echo($mainpartname);?>
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-12">
<?php

	$arr = [];
	$sql = "select * from page where $titlesqlname like '$indexname->".$mainpartname."%'";
	$rs = $con->query($sql);
	$row = mysqli_fetch_assoc($rs);
	if(mysqli_num_rows($rs)==0){die("数据库中无此数据！");}
	do{
		$i=0;
		foreach($arr as $aitem){
			if($aitem[0]==$row[$titlesqlname])$i=1;
		}
		if($i==0){
			$arr[]=[$row[$titlesqlname],$row['id']];
		}
	}while($row = mysqli_fetch_array($rs));

	$part=[];
	foreach($arr as $arritem){
		if (substr_count($arritem[0],'->')==2){
			$temparr=explode("->",$arritem[0]);
			$part[]=end($temparr);
		}
	}
	$ii=0;
	foreach($part as $partitem){
		
		print("<fieldset class=\"layui-elem-field layui-field-title\"><legend><h3>".$partitem."</h3></legend><div class=\"layui-field-box\">");
		foreach($arr as $arritem){
			if (substr_count($arritem[0],'->')==3&&strpos($arritem[0],"$indexname->".$mainpartname."->".$partitem) !== false){
				//print($partitem."|".$arritem[0]."<br />");
				$temparr=explode("->",$arritem[0]);
				?>
<div class="layui-card">
  <div class="layui-card-header"><h3><?php print(end($temparr));?></h3></div>
  <div class="layui-card-body" id="position<?php print($mainpartname.$i++);?>">
<?php
				foreach($arr as $arritem){
					//print_r($arritem);
					if (substr_count($arritem[0],'->')==4&&strpos($arritem[0],"$indexname->".$mainpartname."->".$partitem."->".end($temparr)) !== false){
						//print($arritem[0]."|".$arritem[1]."<br />");
						$temparr2=explode("->",$arritem[0]);
						
						print('<blockquote class="layui-elem-quote layui-quote-nm"><span onclick="gotosubid('.$arritem[1].');" style="color:blue;text-decoration:underline;cursor:pointer;">'.end($temparr2)."</span></blockquote>");
						//$part[]=end($temparr);
					}
					
				}
				print('</div></div>');
			}
		}
		print("</div></fieldset>");
	}
?>
</div>
<div class="col-lg-4 col-md-12">
	<div style="padding-top:100px;"></div>
	<div class="layui-card">
	  <div class="layui-card-header"><?php echo $pagesub_location2_home[$lan];?></div>
	  <div class="layui-card-body">
		<?php
			if ($mainpartname_en=='Past'){
				$sql="select * from page where pagestyle='2' and left(title,4)<1980 order by (select count(*) from speak where targetid=page.id) DESC LIMIT 0,10";
			}else{
				$sql="select * from page where pagestyle='2' and left(title,4)>1980 order by (select count(*) from speak where targetid=page.id) DESC LIMIT 0,10";
			}
			$rs = $con->query($sql);
			$row = mysqli_fetch_assoc($rs);
			if(mysqli_num_rows($rs)==0){
				print('暂无热议话题！');
			}else{
				do{
					if ($lan==0){
						$tit=explode(' ',$row['title']);
						$tit=$tit[1];
					}else $tit=$row['title_en'];
					print('<div><span class="openlink" style="cursor: pointer;" data-title="'.$tit.'" data-id="'.$row['id'].'" onmouseover="this.style.cssText=\'color:gray; text-decoration:underline;cursor: pointer;\'" onmouseout="this.style.cssText=\'color:black;text-decoration:none;\'">'.$tit.'</span></div>');
				}while($row = mysqli_fetch_array($rs));
			}
		?>
	  </div>
	</div>


</div>
</div>
</div>
<script>
var entersubpage;
var backpage;
function gotosubid(pageid){
	entersubpage=localpage;
	laymsg('<?php print($pagesub_loading_title[$lan]);?>');
	$.ajax({
		type: 'get',
		url: 'page/pageid.php',
		data: 'pageid='+pageid,//obj.serizlize(),
		success: function (data) {
			//$('#ajaxsub').css('opacity','1');
			//$('#ajaxsub').css('top','120px');
			$('#ajaxsub').css('display','block');
			$('#ajax'+localpage).css('display','none');
			//从主页进下一级动画
			backpage=localpage;
			localpage=5;
			$('#ajaxsub').html(data);
			
		},
		//timeout: 15000,
		error: function ( data ) {}
	});
	
}
$('.openlink').click(function(){
	var datatitleobj = $(this);
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
</script>
<?php include "foot.php"?>