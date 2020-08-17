<?php
include_once "config.php";
include_once "main.php";
utf8();
$con=connect($databaseconfig);
$ismobile=isMobile();
if(isset($_GET['pageid']))$id=$_GET['pageid'];else die;
if (!is_numeric($id))die;
?>


<script>
function backajax(){
	closelaymodal();
}
</script>

<?php
	$arr = [];
	$sql="update page set visit=visit+1 where id='$id'";
	$con->query($sql);
	$sql = "select * from page where id = '$id'";
	$rs = $con->query($sql);
	$row = mysqli_fetch_assoc($rs);
	if(mysqli_num_rows($rs)==0){die("no data!");}

?>

<div style="width:80%;margin:0 auto;max-height:<?php echo $ismobile?'300':'500';?>px;">
<div style="text-align:center;"><?php echo $comment_string_1[$lan];?><?php echo $row['visit']?><?php echo $comment_string_2[$lan];?></div>
	<div style="padding:25px;"><?php if($lan==0)echo $row['pagecode'];else echo $row['pagecode_en'];?></div>

	<span style="color:blue;cursor:pointer;" onclick="dianzan(<?php print($id);?>)"><?php echo $dianzan_string[$lan];?></span>：<span id="dianzannum"><?php print($row['zan']);?></span><?php echo $ren_string[$lan];?>&nbsp;&nbsp;
	<span style="color:blue;cursor:pointer;" onclick="laymsg('<?php print($comment_string_6[$lan]);?>');"><?php print($comment_string_7[$lan]);?></span>
	<br /><br />
	<?php print($comment_string_3[$lan]);?><br />


	<div style="padding: 20px; background-color: #F2F2F2;">
	  <div class="layui-row layui-col-space15">
		<div class="layui-col-md12">
	<?php
		$sql = "select * from speak where targetid='$id'";
		$rs = $con->query($sql);
		$row2 = mysqli_fetch_assoc($rs);
		if(mysqli_num_rows($rs)==0){print($comment_string_4[$lan]);}else{
			do{?>
				<div class="layui-card">
					<div class="layui-card-header"><?php print($comment_string_5[$lan]);?><?php print($row2['nickname']);?></div>
					<div class="layui-card-body">
						<div style="padding-left:25px;"><?php print($row2['text']);?></div>
						<span style="color:blue;cursor:pointer;" onclick="dianzancomment(<?php print($row2['id']);?>,this)"><?php echo $dianzan_string[$lan];?>：<span><?php print($row2['zan']);?></span><?php echo $ren_string[$lan];?></span>
						&nbsp;&nbsp;<span style="color:blue;cursor:pointer;" onclick="laymsg('<?php print($comment_string_8[$lan]);?>');"><?php print($comment_string_9[$lan]);?></span>
					</div>
				</div>
			<?php }while($row2 = mysqli_fetch_array($rs));
		}
	?>
		</div>
	  </div>
	</div>
	<br />
	<?php print($comment_string_10[$lan]);?><br />
	<form id="comment" name="" action="" method="post">
		<div class="layui-form-item">
			<label class="layui-form-label"><?php print($comment_string_5[$lan]);?></label>
			<div class="layui-input-block">
				<input type="text" minlength="2" maxlength="255" class="layui-input"
					required
					placeholder="<?php print($comment_string_11[$lan]);?>"
					name="chuxin_nickname"
					value=""
					autocomplete="off"/>
			</div>
		</div>
	
		<?php include 'simple.php';//加载简单编辑框?>
		<button type="button" class="btn btn-primary" id="comments"><?php print($comment_string_12[$lan]);?></button>
	</form>
<script>
$("#comments").click(function(){
	if ($("#editor2").html().trim()==''){laymsg('<?php print($comment_string_13[$lan]);?>');return;}
	$("#commenttext").val($("#editor2").html());
	$.ajax({
		url:"page/comment.php",type: "POST",data: "pageid=<?php echo $id;?>&"+$("#comment").serialize(),cache:false,
        error: function (){laymsg('<?php print($comment_string_14[$lan]);?>');},  
        success: function (data){laymsg('<?php print($comment_string_15[$lan]);?>',3000);$("#editor2").html('');}
	});
});

</script>
	<!--button class="layui-btn layui-btn-lg layui-btn-normal" onclick="backajax();">返回</button-->
</div>