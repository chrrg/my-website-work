<?php
include "../page/config.php";

session_start();
header("Content-Type: text/html; charset=UTF-8");

?>
<div id="page">
<html>
<head>
<title>不忘初心查页面</title>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
</head>
<body>
<div class="text-center"><h1>网页后台管理</h1></div>

<?php

$perpagenum = 10;//定义每页显示几条
$con = mysql_connect($database_path,$database_username,$database_password);
if (!$con){die('Could not connect: ' . mysql_error());}
mysql_select_db("chuxin", $con);
mysql_query("set names 'utf8'");

if(isset($_GET['style'])&&$_GET['style']!=''){
	$rs=mysql_query("select count(*) from page where pagestyle like '%".$_GET['style']."%' and pagestyle<>'del'",$con);
}elseif(isset($_GET['id'])&&$_GET['id']!=''){
	$rs=mysql_query("select count(*) from page where id like '%".$_GET['id']."%' and pagestyle<>'del'",$con);
}elseif(isset($_GET['title'])&&$_GET['title']!=''){
	$rs=mysql_query("select count(*) from page where title like '%".$_GET['title']."%' and pagestyle<>'del'",$con);
}else{
	$rs=mysql_query("select count(*) from page where pagestyle<>'del'",$con);
}

$Total = mysql_fetch_array($rs);//查询数据库中一共有多少条数据 
$Total = $Total[0];
$Totalpage = ceil($Total/$perpagenum);//上舍，取整
if(!isset($_GET['page'])||!intval($_GET['page'])||$_GET['page']>$Totalpage)//page可能的四种状态    
{$page=1;}else{$page=$_GET['page'];}
$startnum = ($page-1)*$perpagenum;//开始条数

	
if(isset($_GET['style'])&&$_GET['style']!=''){
	$sql="select * from page where pagestyle like '%".$_GET['style']."%' and pagestyle<>'del' order by id DESC limit $startnum,$perpagenum";
}elseif(isset($_GET['id'])&&$_GET['id']!=''){
	$sql="select * from page where id like '%".$_GET['id']."%' and pagestyle<>'del' order by id DESC limit $startnum,$perpagenum";
}elseif(isset($_GET['title'])&&$_GET['title']!=''){
	$sql="select * from page where title like '%".$_GET['title']."%' and pagestyle<>'del' order by id DESC limit $startnum,$perpagenum";
}else{
	$sql = "select * from page where pagestyle<>'del' order by id DESC limit $startnum,$perpagenum";//查询出所需要的条数
}
//print(mysql_error());
$rs = mysql_query($sql, $con);
$contents = mysql_fetch_assoc($rs);
$xinxinum=0;
if($Total)//如果$total不为空则执行以下语句    
{
	$pageid=($page-1)*$perpagenum;
	do
    {
		print('<div class="card bg-dark text-white"><div class="card-header">id：'.$contents['id']."&nbsp;&nbsp;&nbsp;样式：".$contents['pagestyle']."</div><div class=\"card-body\">标题：".$contents['title']."</div><div class=\"card-footer\"><a href='index.php?id=".$contents['id']."' target='_blank'>编辑</a></div></div><hr />");
		
		
		}while($contents = mysql_fetch_array($rs));
echo("</div>");
$per=$page-1; //上一页
$next=$page+1;//下一页
echo "<center>共有".$Total."条记录,每页".$perpagenum."条,共".$Totalpage."页 ";  
print('<div class="btn-group">');
if($page != 1)
{?>
<button type="button" class="btn btn-default" id="back0">首页</button>
<button type="button" class="btn btn-default" id="back1">上一页</button>
<script>
$("#back0").click(function(){
	$.ajax({url:"?action=12",type: "GET",cache:false,
        success: function (data){$("#page").html(data);}  
	});
});
$("#back1").click(function(){
	$.ajax({url:"?action=12&page=<?php print($per);?>",type: "GET",cache:false,
        success: function (data){$("#page").html(data);}
	});
});</script>
<?php } 
if($page != $Totalpage){?>
<button type="button" class="btn btn-default" id="back2">下一页</button>
<button type="button" class="btn btn-default" id="back3">尾页</button>
<script>
$("#back2").click(function(){
	$.ajax({url:"?action=12&page=<?php print($next);?>",type: "GET",cache:false,
        success: function (data){$("#page").html(data);}  
	});
});

$("#back3").click(function(){
	$.ajax({url:"?action=12&page=<?php print($Totalpage);?>",type: "GET",cache:false,
        success: function (data){$("#page").html(data);}  
	});
});</script>
<?php }

}else{print('还没有任何数据！');}?>
<br />
	<a href="index.php" target="_blank"><button type="button" class="btn btn-default">新增一条数据</button></a>
</div>