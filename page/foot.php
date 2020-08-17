<?php include_once "main.php";
if(isMobile()){?>
<div style="width:100%;background-color:#eee;">
	<div style="padding-top:50px;padding-bottom:50px;">
		<div class="text-center">
			<?php print($index_bottom2_1[$lan]);?>
		</div>
		<div class="text-center">
			<?php print($index_bottom2_2[$lan]);?>
		</div>
	</div>
</div>
<?php }else{?>
<div style="padding:0px;width:100%;background-color:#333;" class="foot">
	<div class="text-center">
		<div style="width:80%;margin:0 auto;padding: 20px;border-bottom: 1px solid #989899;">
			<div class="row">
				<div class="col col-2"><?php print($index_bottom_1[$lan]);?></div>
				<div class="col col-10 text-left"><a href="http://www.baidu.com/"><?php print($index_bottom_2[$lan]);?></a></div>
			</div>
		</div>
		<div style="width:80%;margin:0 auto;padding: 20px;">
			<div class="row">
				<div class="col col-2"><?php print($index_bottom_3[$lan]);?></div>
				<div class="col col-10 text-left"><?php print($index_bottom_4[$lan]);?></div>
			</div>
		</div>
	</div>
</div>
<?php }?>