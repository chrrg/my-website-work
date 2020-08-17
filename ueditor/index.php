<?php
include "../page/config.php";

session_start();
header("Content-Type: text/html; charset=UTF-8");
?>

<!doctype>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加页面</title>
<meta name="keywords" content="初心比赛添加动态页面" />
<meta name="description" content="初心比赛添加动态页面 初心" />
<link rel="icon" href="/ico/favicon128.ico" type="image/x-icon"/>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
<style type="text/css">
	body{background:url(/images/back.jpg) repeat center 0}
</style>


<script>window.UEDITOR_HOME_URL = "../ueditor/";</script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>

<style type="text/css">
	div{width:100%;}
</style>
	</head>
	<body>

<?php
global $idnum;
$idnum=0;
$pageid="";
$pagetitle='这里必需填你的标题';
$contents='这里必需填你的内容';
$style='普通样式';
$con = mysql_connect($database_path,$database_username,$database_password);
mysql_select_db("chuxin", $con);
mysql_query("set names 'utf8'");
if(isset($_GET['id'])){
	$pageid=$_GET['id'];
	if (!is_numeric($pageid)){
		die('查询的id必须是输字！！！！！！！！！！<input type="button" value="返回" onclick="javascript:history.back();">');
	}
	if ($pageid!=''&&$pageid!=0){
		//想要修改
		
		$sql = "select * from page where id='$pageid'";
		$rs = mysql_query($sql, $con);
		if(mysql_num_rows($rs)==0){die("<strong>失败</strong>&nbsp;查询未找到该页面id，不要乱填哦。。。。。。。。你输入的是：".$pageid.'<input type="button" value="返回" onclick="javascript:history.back();">');}else{
			$row = mysql_fetch_assoc($rs);
			$pageid=$row['id'];
			$pagetitle=$row['title'];
			$contents=$row['pagecode'];
			$style=$row['pagestyle'];
			
		}
	}
}
if(isset($_GET['fabiao'])&&isset($_POST['title'])){
	$pageid=$_POST['pageid'];
	$title=$_POST['title'];
	$editor=$_POST['editor'];
	$style=$_POST['style'];
	if($title=='这里必需填你的标题'||$title==''){
		die('你没填标题。。<input type="button" value="返回" onclick="javascript:history.back();">');
	}
	if ($editor==''){
		die('你没填内容。。<input type="button" value="返回" onclick="javascript:history.back();">');
	}
	if ($style==''){
		die('你没填样式。。<input type="button" value="返回" onclick="javascript:history.back();">');
	}
	if ($pageid!=''&&$pageid!=0){
		//想要修改
		if ($pageid!=''&&!is_numeric($pageid)){
			die('id必须是输字！！！！！！！！！！<input type="button" value="返回" onclick="javascript:history.back();">');
		}
		$sql = "select * from page where id='$pageid'";
		$rs = mysql_query($sql, $con);
		if(mysql_num_rows($rs)==0){die("<strong>失败</strong>&nbsp;未找到该页面id，不要乱填哦！你输入的是：".$pageid);}else{
			$sql = "UPDATE page SET title='".html_entity_decode($title)."', pagecode='". html_entity_decode($editor) ."',cdate='".GND()."',ctime='".GNT()."' ,pagestyle='$style' WHERE id='$pageid'" ;
			mysql_query($sql, $con);
			//print('已修改');
			fabiaook();
			die();
		}
	}else{
		//想要新增
		$sql="INSERT INTO page (title, timestamp,cdate,ctime,pagestyle,pagecode)
VALUES ('".html_entity_decode($title)."','".GN()."','".GND()."','".GNT()."','".$style."','".html_entity_decode($editor)."')";
		mysql_query($sql, $con);
		$idnum=mysql_insert_id();
		//print('已添加');
		fabiaook();
		//print($sql);
		die();
		
		
		
	}
}
mysql_close($con);
function GND(){
	return date("Y-m-d",time()+6*60*60);
}
function GNT(){
	return date("H:i:s",time()+6*60*60);
}
function GN(){
	return time();
}
?>

<br />

<form id="okpage" name="fabiao" action="?fabiao=1" method="post">
 <div class="card bg-dark"><div class="card-header">
 <center>
 <h1 class="text-white">添加或修改动态文章或页面：<a href="list.php">所有页</a></h3>
</center>
  <div class="alert alert-danger" id="login_infor" style="visibility:hidden;"></div></div>
  <div class="card-body">
<div class="text-danger"><h3>页面id：(留空就是新建，填id就是修改)</h3></div>
<input type="text" class="form-control" name="pageid" style="background-color: aquamarine;" value="<?=$pageid?>"><br />
<div class="text-white">页面标题：</div>
<input type="text" class="form-control" name="title" style="background-color: aquamarine;" value="<?=$pagetitle?>"><br />
<div class="text-white">页面样式：就是一类数据页面不一样就用不同数字区分开来（可中英文）</div>
<input type="text" class="form-control" name="style" style="background-color: aquamarine;" value="<?=$style?>"><br />
<script id="editor" type="text/plain" style="width:100%;height:500px;" name="editor"><?=$contents?></script>
	 </div>
	   <div class='progress-bar progress-bar-striped progress-bar-animated' style='width: 90%;visibility:hidden;' id="progress_1">正在提交数据中...</div>
	 <button type="submit" class="btn btn-primary" onClick="getContent();">确认提交且无法撤销</button>
	</div>
</form>
	
<?php if (!isset($_SESSION['putong'])||$_SESSION['putong']==""){?>
<script type="text/javascript">var ue = UE.getEditor('editor', {
	toolbars: [
    [
        //'anchor', //锚点
		'source', //源代码
		'preview', //预览
        'undo', //撤销
        'redo', //重做
        'bold', //加粗
        //'indent', //首行缩进
        //'snapscreen', //截图
        //'italic', //斜体
        //'underline', //下划线
        //'strikethrough', //删除线
        //'subscript', //下标
        //'fontborder', //字符边框
        //'superscript', //上标
        'formatmatch', //格式刷
        
        //'blockquote', //引用
        //'pasteplain', //纯文本粘贴模式
        //'selectall', //全选
        //'print', //打印
        
        'horizontal', //分隔线
        'removeformat', //清除格式
        //'time', //时间
        //'date', //日期
        //'unlink', //取消链接
        //'insertrow', //前插入行
        //'insertcol', //前插入列
        //'mergeright', //右合并单元格
        //'mergedown', //下合并单元格
        //'deleterow', //删除行
        //'deletecol', //删除列
        //'splittorows', //拆分成行
        //'splittocols', //拆分成列
        //'splittocells', //完全拆分单元格
        //'deletecaption', //删除表格标题
        //'inserttitle', //插入标题
        //'mergecells', //合并多个单元格
        //'deletetable', //删除表格
        //'cleardoc', //清空文档
        //'insertparagraphbeforetable', //"表格前插入行"
        'insertcode', //代码语言
        'fontfamily', //字体
        'fontsize', //字号
        //'paragraph', //段落格式
        'simpleupload', //单图上传
        'insertimage', //多图上传
        //'edittable', //表格属性
        //'edittd', //单元格属性
        'link', //超链接
        'emotion', //表情
        //'spechars', //特殊字符
        //'searchreplace', //查询替换
        'map', //Baidu地图
        //'gmap', //Google地图
        'insertvideo', //视频
        'help', //帮助
        'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
        'forecolor', //字体颜色
        'backcolor', //背景色
        //'insertorderedlist', //有序列表
        //'insertunorderedlist', //无序列表
        'fullscreen', //全屏
        //'directionalityltr', //从左向右输入
        //'directionalityrtl', //从右向左输入
        //'rowspacingtop', //段前距
        //'rowspacingbottom', //段后距
        //'pagebreak', //分页
        //'insertframe', //插入Iframe
        //'imagenone', //默认
        //'imageleft', //左浮动
        //'imageright', //右浮动
        'attachment', //附件
        'imagecenter', //居中
        //'wordimage', //图片转存
        'lineheight', //行间距
        'edittip ', //编辑提示
        //'customstyle', //自定义标题
        //'autotypeset', //自动排版
        //'webapp', //百度应用
        //'touppercase', //字母大写
        //'tolowercase', //字母小写
        'background', //背景
        'template', //模板
        'scrawl', //涂鸦
        'music', //音乐
        //'inserttable', //插入表格
        'drafts', // 从草稿箱加载
        'charts', // 图表
    ]
]});
</script>
<?php}else{?>
<script type="text/javascript">var ue = UE.getEditor('editor', {
	toolbars: [
    [
        'anchor', //锚点
		'source', //源代码
		'preview', //预览
        'undo', //撤销
        'redo', //重做
        'bold', //加粗
        'indent', //首行缩进
        'snapscreen', //截图
        'italic', //斜体
        'underline', //下划线
        'strikethrough', //删除线
        'subscript', //下标
        'fontborder', //字符边框
        'superscript', //上标
        'formatmatch', //格式刷
        
        'blockquote', //引用
        'pasteplain', //纯文本粘贴模式
        'selectall', //全选
        'print', //打印
        
        'horizontal', //分隔线
        'removeformat', //清除格式
        'time', //时间
        'date', //日期
        'unlink', //取消链接
        'insertrow', //前插入行
        'insertcol', //前插入列
        'mergeright', //右合并单元格
        'mergedown', //下合并单元格
        'deleterow', //删除行
        'deletecol', //删除列
        'splittorows', //拆分成行
        'splittocols', //拆分成列
        'splittocells', //完全拆分单元格
        'deletecaption', //删除表格标题
        'inserttitle', //插入标题
        'mergecells', //合并多个单元格
        'deletetable', //删除表格
        'cleardoc', //清空文档
        'insertparagraphbeforetable', //"表格前插入行"
        'insertcode', //代码语言
        'fontfamily', //字体
        'fontsize', //字号
        'paragraph', //段落格式
        'simpleupload', //单图上传
        'insertimage', //多图上传
        'edittable', //表格属性
        'edittd', //单元格属性
        'link', //超链接
        'emotion', //表情
        'spechars', //特殊字符
        'searchreplace', //查询替换
        'map', //Baidu地图
        //'gmap', //Google地图
        'insertvideo', //视频
        'help', //帮助
        'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
        'forecolor', //字体颜色
        'backcolor', //背景色
        'insertorderedlist', //有序列表
        'insertunorderedlist', //无序列表
        'fullscreen', //全屏
        'directionalityltr', //从左向右输入
        'directionalityrtl', //从右向左输入
        'rowspacingtop', //段前距
        'rowspacingbottom', //段后距
        'pagebreak', //分页
        'insertframe', //插入Iframe
        'imagenone', //默认
        'imageleft', //左浮动
        'imageright', //右浮动
        'attachment', //附件
        'imagecenter', //居中
        'wordimage', //图片转存
        'lineheight', //行间距
        'edittip ', //编辑提示
        'customstyle', //自定义标题
        'autotypeset', //自动排版
        //'webapp', //百度应用
        'touppercase', //字母大写
        'tolowercase', //字母小写
        'background', //背景
        'template', //模板
        'scrawl', //涂鸦
        'music', //音乐
        'inserttable', //插入表格
        'drafts', // 从草稿箱加载
        'charts', // 图表
    ]
]});
</script>
<?php }?>
<script>//必须在提交前很渲染编辑器；
function getContent() {
if(UE.getEditor("editor").queryCommandState('source')!=0)//判断编辑模式状态:0表示【源代码】HTML视图；1是【设计】视图,即可见即所得；-1表示不可用
	UE.getEditor("editor").execCommand('source'); //切换到【设计】视图
}
</script>
<div align="right">
<?php if (isset($_SESSION['putong'])&&$_SESSION['putong']=="1"){?><button type="button" class="btn btn-info" onclick="window.location.href = '?putong=1<?if (isset($_GET['page'])&&$_GET['page']!=""){print"&page=".$_GET['page'];}?>';">改为普通编辑框</button>
<?php }else{?>
<button type="button" class="btn btn-warning" onclick="window.location.href = '?putong=0<?if (isset($_GET['page'])&&$_GET['page']!=""){print"&page=".$_GET['page'];}?>';">改为高级编辑框</button>
<?php }?>
</div>
<?php
function fabiaook(){
	global $idnum;
?>
	<div class="card bg-success text-white">
  <div class="card-header">发表成功！</div>
  <div class="card-body"><br />
  <br />
  标题：<?php if(isset($_POST['title']))echo $_POST['title']?>
  <div class="alert alert-success"><?php if($idnum!=0)print('新增数据成功：id：<span style="color:red;">'.$idnum.'</span>请记录下此id号，');?>然后关闭该网页！</div>
  <button type="button" class="btn btn-default btn-lg" id="close">立即关闭</button>

  <script>
	  $("#close").click(function(){
		  CloseWebPage();
	  });
	  //setTimeout("CloseWebPage();","5000");
	  function CloseWebPage(){
 if (navigator.userAgent.indexOf("MSIE") > 0) {
  if (navigator.userAgent.indexOf("MSIE 6.0") > 0) {
   window.opener = null;
   window.close();
  } else {
   window.open('', '_top');
   window.top.close();
  }
 }
 else if (navigator.userAgent.indexOf("Firefox") > 0) {
  window.location.href = 'about:blank ';
 } else {
  window.opener = null;
  window.open('', '_self', '');
  window.close();
 }
		 
window.location.href="./";
}</script>
  </br >
  </br >
  </br >
  </br >
</div>
</div>
<?php }?>
</body>
</html>

