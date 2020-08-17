<?php
if (!isset($_GET['ajax'])){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php print($index_title[$lan]);?></title>
	<link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/Swiper/4.3.0/css/swiper.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/timeline.css">
	<link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdn.bootcss.com/Swiper/4.3.0/js/swiper.min.js"></script>
	<!--script src="https://cdn.bootcss.com/velocity/2.0.4/velocity.min.js"></script>
	<script src="https://cdn.bootcss.com/velocity/2.0.4/velocity.ui.min.js"></script-->
	<script src="https://cdn.bootcss.com/wow/1.1.2/wow.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<link rel="stylesheet" href="./layui/css/layui.css">
<script src="./layui/layui.all.js"></script>
<style>
<?php include "css/common.php"?>
</style>
</head>
<body>
	<?php if ($ismobile){?>
	
	<?php }?>
	<?php if ($ismobile){?>
		<div class="mobile_title_bar">
			<div style="position:relative;background-color:rgb(183,19,21);width:100%;height:80px;">
			<span style="position:absolute;top:0%;left:0px;right:0px;color:white;font-size:16px;">
				<?php print($index_mobile_bar_1[$lan]);?>
			</span>
			<span style="position:absolute;top:30%;left:0px;right:0px;color:white;font-size:20px;">
				<?php print($index_mobile_bar_2[$lan]);?>
			</span>
			<span style="position:absolute;right:12px;color:white;font-size:16px;top:50%;"><?php print($index_mobile_bar_3[$lan]);?></span>
			</div>
			<!--img src="images/banner.png" style="width:100%;"/-->
			
			<div style="float:left;width:16%;">
				<span class="subitem" id="baritem1"><?php print($index_bar_1[$lan]);?></span>
			</div>
			<div style="float:left;width:21%;">
				<span class="subitem" id="baritem2"><?php print($index_bar_2[$lan]);?></span>
			</div>
			<div style="float:left;width:21%;">
				<span class="subitem" id="baritem3_1"><?php print($index_bar_3[$lan]);?></span>
			</div>
			<div style="float:left;width:21%;">
				<span class="subitem" id="baritem4_1"><?php print($index_bar_4[$lan]);?></span>
			</div>
			<div style="float:left;width:21%;">
				<span class="subitem" onclick="laymsg('<?php print($index_mobile_bar_4[$lan]);?>');$.get('page/changelanguage.php?language='+<?php print(intval(!$_SESSION['language']));?>,function(data,status){window.location.reload();});"><?php print($language[!$_SESSION['language']]);?></span>
			</div>
		</div>
	<?php }else{?>
	<div class="pc_title_bar">
		<div class="d-flex justify-content-between mb-3" style="height:50px;background-color:rgb(183,19,21);">
			<img src="images/title.png" class="d-lg-block d-xm-block d-md-block" style="height:100%;display:none;" />
			<div class="itemani p-3-c" id="baritem1" style="border-top-left-radius:20px;max-width:80px;"><span style="line-height:50px;" class="subitem"><?php print($index_bar_1[$lan]);?></span></div>
			<div class="itemani p-3-c" id="baritem2" style="max-width:100px;"><span style="line-height:50px;" class="subitem"><?php print($index_bar_2[$lan]);?></span></div>
			<div class="itemani p-3-c" id="sub1" style="position:relative;max-width:100px;"><span style="line-height:50px;" class="subitem" id="baritem3"><?php print($index_bar_3[$lan]);?></span>
				<div id="sub1_" class="title_sty">
					<div class="textcen subitem itemani" style="width:100%;" id="baritem3_1">
						<?php print($index_bar_3_1[$lan]);?>
					</div>
					<div class="textcen subitem itemani" style="width:100%;" id="baritem3_2">
						<?php print($index_bar_3_2[$lan]);?>
					</div>
				</div>
			</div>
			<div class="itemani p-3-c" id="sub2" style="position:relative;border-top-right-radius:20px;max-width:100px;"><span style="line-height:50px;" class="subitem" id="baritem4"><?php print($index_bar_4[$lan]);?></span>
				<div id="sub2_" class="title_sty">
					<div class="textcen subitem itemani" style="width:100%;" id="baritem4_1">
						<?php print($index_bar_4_1[$lan]);?>
					</div>
					<div class="textcen subitem itemani" style="width:100%;" id="baritem4_2">
						<?php print($index_bar_4_2[$lan]);?>
					</div>
					<div class="textcen subitem itemani" style="width:100%;" id="baritem4_3">
						<?php print($index_bar_4_3[$lan]);?>
					</div>
				</div>
			</div>
			<div class="flex-fill"></div>
			<div class="text-white order-12 p-3-c" style="padding:0px!important;"><span style="line-height:50px;"><?php print($index_language[$lan]);?></span></div>
			<div class="order-12" style="padding-top:6px;padding-bottom:6px;">
				<select class="form-control" style="width: auto;" id="sel1" onchange="$.get('page/changelanguage.php?language='+this.options.selectedIndex,function(data,status){window.location.reload();});">
					<?php 
					$i=0;
					foreach($language as $lanitem){
						if ($lan==$i){
							print("<option selected>$lanitem</option>");
						}else{
							print("<option>$lanitem</option>");
						}
						$i++;
					}
					?>
				</select>
			</div>
		</div>
	</div>
	<?php }?>
	<?php if($ismobile){?>
	<div style="height:40px;"></div><!--导航栏占位-->
	<?php }else{?>
	<div style="height:80px;"></div><!--导航栏占位-->
	<?php }?>
	<div class="col-sm-12 col-md-11 col-lg-10 col-xl-9" style="margin:0 auto;padding:0px;<?php if($ismobile)print('max-width:100%;');?>">
	<div id="ajax1" style="display:block;">
<?php }//这里是ajax首页?>
		<?php if($ismobile){?>
			<div class="swiper-container banner">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="images/kt2.jpg" style="width:100%;"/></div>
					<div class="swiper-slide"><img src="images/kt1.jpg" style="width:100%;"/></div>
					<div class="swiper-slide"><img src="images/kt3.jpg" style="width:100%;"/></div>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination banner"></div>
				<!-- Add Arrows -->

			</div>
			<script>
				window.onload=function(){
					var swiper = new Swiper('.swiper-container.banner', {
					  slidesPerView: 1,
					  spaceBetween: 30,
					  loop: true,
					  pagination: {
						el: '.swiper-pagination.banner',
						clickable: true,
					  },
					  autoplay: {
						delay: 5000,
						disableOnInteraction: false,
					  }
					});
				}
			</script>
		<?php }else{?>
		<div style="width:100%;padding-top:15px;padding-bottom:15px;margin:0 auto;border-radius: 4px;box-shadow: 1px 3px 6px 3px rgba(100,50,50,0.25);" class="yy"><!--大图-->
			<div class="swiper-container banner">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="images/kt2.jpg" style="height:100%;"/></div>
					<div class="swiper-slide"><img src="images/kt1.jpg" style="height:100%;"/></div>
					<div class="swiper-slide"><img src="images/kt3.jpg" style="height:100%;"/></div>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination banner"></div>
				<!-- Add Arrows -->
				<div class="swiper-button-next banner"></div>
				<div class="swiper-button-prev banner"></div>
			</div>
			<script>
				var swiper = new Swiper('.swiper-container.banner', {
				  slidesPerView: 1,
				  spaceBetween: 0,
				  loop: true,
				  pagination: {
					el: '.swiper-pagination.banner',
					clickable: true,
				  },
				  autoplay: {
					delay: 5000,
					disableOnInteraction: false,
				  },
				  navigation: {
					nextEl: '.swiper-button-next.banner',
					prevEl: '.swiper-button-prev.banner',
				  },
				});
				

			</script>
		</div>
		<?php }?>

		<div class="smalltitle">
			<div class="smalltitle_text">
				<span class="text-gradient" data-text="<?php print($index_body_title_1[$lan]);?>"><?php print($index_body_title_1[$lan]);?></span>
			</div>
		</div>
		
		<div><?php print($body_title_1[$lan]);?></div>
		<div class="swiper-container achievement">
			<div class="swiper-wrapper">
				<div class="swiper-slide overflow-hidden achievesty">
					<div style="padding:0;">
						<img src="images/achievement/b1.jpg" style="width:100%;">
						<div style="text-align:center;"><?php print($body_title_1_1[$lan]);?></div>
					</div>
				</div>
				<div class="swiper-slide overflow-hidden achievesty">
					<div style="padding:0;">
						<img src="images/achievement/b2.jpg" style="width:100%;">
						<div style="text-align:center;"><?php print($body_title_1_2[$lan]);?></div>
					</div>
				</div>
				<div class="swiper-slide overflow-hidden achievesty">
					<div style="padding:0;">
						<img src="images/achievement/w2.jpg" style="width:100%;">
						<div style="text-align:center;"><?php print($body_title_1_3[$lan]);?></div>
					</div>
				</div>
				<div class="swiper-slide overflow-hidden achievesty">
					<div style="padding:0;">
						<img src="images/achievement/g1.jpg" style="width:100%;">
						<div style="text-align:center;"><?php print($body_title_1_4[$lan]);?></div>
					</div>
				</div>
				<div class="swiper-slide overflow-hidden achievesty">
					<div style="padding:0;">
						<img src="images/achievement/g2.jpg" style="width:100%;">
						<div style="text-align:center;"><?php print($body_title_1_5[$lan]);?></div>
					</div>
				</div>
				<div class="swiper-slide overflow-hidden achievesty">
					<div style="padding:0;">
						<img src="images/achievement/s1.jpg" style="width:100%;">
						<div style="text-align:center;"><?php print($body_title_1_6[$lan]);?></div>
					</div>
				</div>
				<div class="swiper-slide overflow-hidden achievesty">
					<div style="padding:0;">
						<img src="images/achievement/hangmu.jpg" style="width:100%;">
						<div style="text-align:center;"><?php print($body_title_1_7[$lan]);?></div>
					</div>
				</div>
				<div class="swiper-slide overflow-hidden achievesty">
					<div style="padding:0;">
						<img src="images/achievement/huojian1.jpg" style="width:100%;">
						<div style="text-align:center;"><?php print($body_title_1_8[$lan]);?></div>
					</div>
				</div>
			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination achievement"></div>
			<div class="swiper-button-next achievement"></div>
			<div class="swiper-button-prev achievement"></div>
		</div>
		<br />
		<button class="layui-btn layui-btn-fluid totimeline"><?php print($body_goto_timeline[$lan])?></button>
		<br />

		<fieldset class="layui-elem-field layui-field-title">
			<legend><?php print($body_xjp_text1[$lan]);?></legend>
		</fieldset>
		<div style="overflow:hidden;">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="padding:0;">
				<img src="images/xjp/xjp1.jpg" style="width:100%;">
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="">
					<div class="layui-card">
						<div class="layui-card-header"><?php print($body_xjp_text2[$lan]);?></div>
						<div class="layui-card-body">
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text_1[$lan]);?></blockquote>
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text_2[$lan]);?></blockquote>
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text_3[$lan]);?></blockquote>
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text_4[$lan]);?></blockquote>
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text_5[$lan]);?></blockquote>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br />
		<div style="height:100px;text-align: center;">
			<div style="line-height:100px;display:inline-block;height:50px;vertical-align: top;">
				<?php print($body_dianzan_1[$lan]);?>
			</div>
			<div style="height:100px;line-height:100px;display:inline-block;">
				<div onclick="dianzan1(this)" style="cursor:pointer;background-image: url(images/png/zan.png);background-size:100% 100%;width:50px;height:50px;margin:0px;display:inline-block;line-height:100px;vertical-align: middle;"></div>
			</div>
			<div style="line-height:100px;display:inline-block;height:50px;vertical-align: top;">
				<?php print($body_dianzan_2[$lan]);?><span id="dianzan1"><?php $zan1=mysqli_fetch_array($con->query('select zan from page where id=328'));print($zan1[0]);?></span><?php print($body_dianzan_3[$lan]);?>
			</div>
		</div>
		<div class="smalltitle">
			<div class="smalltitle_text">
				<span class="text-gradient" data-text="<?php print($index_body_title_2[$lan]);?>"><?php print($index_body_title_2[$lan]);?></span>
			</div>
		</div>
		
		<fieldset class="layui-elem-field layui-field-title">
			<legend><?php print($body_xjp_text1[$lan]);?></legend>
		</fieldset>
		<div style="overflow:hidden;">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="padding:0;">
					<img src="images/xjp/xjp4.jpg" style="width:100%;">
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="">
					<div class="layui-card">
						<div class="layui-card-header"><?php print($body_xjp_text2[$lan]);?></div>
						<div class="layui-card-body">
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text2_1[$lan]);?></blockquote>
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text2_2[$lan]);?></blockquote>
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text2_3[$lan]);?></blockquote>
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text2_4[$lan]);?></blockquote>
							<blockquote class="layui-elem-quote"><?php print($body_xjp_text2_5[$lan]);?></blockquote>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br />
		<fieldset class="layui-elem-field">
			<legend><?php print($body_five_1_1[$lan]);?></legend>
			<div class="container-fluid">
				<div class="layui-field-box row">
					<fieldset class="layui-elem-field col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<legend><?php print($body_five_1_2[$lan]);?></legend>
						<div class="layui-field-box">
							<?php print($body_five_1_3[$lan]);?>
						</div>
					</fieldset>
					<fieldset class="layui-elem-field col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<legend><?php print($body_five_1_4[$lan]);?></legend>
						<div class="layui-field-box">
							<?php print($body_five_1_5[$lan]);?>
						</div>
					</fieldset>

				</div>
			</div>
		</fieldset>
		<fieldset class="layui-elem-field">
			<legend><?php print($body_five_2_1[$lan]);?></legend>
			<div class="container-fluid">
				<div class="layui-field-box row">
					<fieldset class="layui-elem-field col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<legend><?php print($body_five_2_2[$lan]);?></legend>
						<div class="layui-field-box">
							<?php print($body_five_2_3[$lan]);?>
						</div>
					</fieldset>
					<fieldset class="layui-elem-field col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<legend><?php print($body_five_2_4[$lan]);?></legend>
						<div class="layui-field-box">
						<?php print($body_five_2_5[$lan]);?>
						</div>
					</fieldset>
				</div>
			</div>
		</fieldset>
		<br />
		<div><?php print($body_video_title[$lan]);?></div>
		<div style="overflow:hidden;">
			<div class="row" id="imgshow" style="margin:0 auto;">
				<div style="padding:1%;max-width:50%;text-align:center;" class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
					<div style="position:relative;cursor:pointer;" class="boxsha">
						<img src="images/video/huihuangzhongguo1.jpg" style="width:100%;border-radius:5px;" />
						<div class="video_hover"><div style="text-align:center;"><?php print($body_video_1_1[$lan]);?></div><div style="text-align:center;"><?php print($body_video_1_2[$lan]);?></div><div class="playdiv"><div class="playimage" datat="<?php print($body_video_1_1[$lan]);?>" datae="1"></div></div></div>
					</div>
				</div>
				<div style="padding:1%;max-width:50%;text-align:center;" class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
					<div style="position:relative;cursor:pointer;" class="boxsha">
						<img src="images/video/huihuangzhongguo2.jpg" style="width:100%;border-radius:5px;" />
						<div class="video_hover"><div style="text-align:center;"><?php print($body_video_2_1[$lan]);?></div><div style="text-align:center;"><?php print($body_video_2_2[$lan]);?></div><div class="playdiv"><div class="playimage" datat="<?php print($body_video_2_1[$lan]);?>" datae="2"></div></div></div>
					</div>
				</div>
				<div style="padding:1%;max-width:50%;text-align:center;" class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
					<div style="position:relative;cursor:pointer;" class="boxsha">
						<img src="images/video/huihuangzhongguo3.jpg" style="width:100%;border-radius:5px;" />
						<div class="video_hover"><div style="text-align:center;"><?php print($body_video_3_1[$lan]);?></div><div style="text-align:center;"><?php print($body_video_3_2[$lan]);?></div><div class="playdiv"><div class="playimage" datat="<?php print($body_video_3_1[$lan]);?>" datae="3"></div></div></div>
					</div>
				</div>
				<div style="padding:1%;max-width:50%;text-align:center;" class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
					<div style="position:relative;cursor:pointer;" class="boxsha">
						<img src="images/video/huihuangzhongguo4.jpg" style="width:100%;border-radius:5px;" />
						<div class="video_hover"><div style="text-align:center;"><?php print($body_video_4_1[$lan]);?></div><div style="text-align:center;"><?php print($body_video_4_2[$lan]);?></div><div class="playdiv"><div class="playimage" datat="<?php print($body_video_4_1[$lan]);?>" datae="4"></div></div></div>
					</div>
				</div>
				<div style="padding:1%;max-width:50%;text-align:center;" class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
					<div style="position:relative;cursor:pointer;" class="boxsha">
						<img src="images/video/huihuangzhongguo5.jpg" style="width:100%;border-radius:5px;" />
						<div class="video_hover"><div style="text-align:center;"><?php print($body_video_5_1[$lan]);?></div><div style="text-align:center;"><?php print($body_video_5_2[$lan]);?></div><div class="playdiv"><div class="playimage" datat="<?php print($body_video_5_1[$lan]);?>" datae="5"></div></div></div>
					</div>
				</div>
				<div style="padding:1%;max-width:50%;text-align:center;" class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
					<div style="position:relative;cursor:pointer;" class="boxsha">
						<img src="images/video/huihuangzhongguo6.jpg" style="width:100%;border-radius:5px;" />
						<div class="video_hover"><div style="text-align:center;"><?php print($body_video_6_1[$lan]);?></div><div style="text-align:center;"><?php print($body_video_6_2[$lan]);?></div><div class="playdiv"><div class="playimage" datat="<?php print($body_video_6_1[$lan]);?>" datae="6"></div></div></div>
					</div>
				</div>
			</div>
		</div>
		<!--embed id='v_player_cctv' width='1000' height='500' flashvars='videoId=IlNggFaUVPRi6i9dQxs171117&filePath=/flvxml/2009/10/14/&isAutoPlay=true&url=http://tv.cctv.com/2017/11/17/VIDEnIlNggFaUVPRi6i9dQxs171117.shtml&tai=news&configPath=http://js.player.cntv.cn/xml/config/outside.xml&widgetsConfig=http://js.player.cntv.cn/xml/widgetsConfig/common.xml&languageConfig=&hour24DataURL=VodCycleData.xml&outsideChannelId=channelBugu&videoCenterId=943ab79faa2a4249b480ec0d9dddd1e4' allowscriptaccess='always' allowfullscreen='true' menu='false' quality='best' bgcolor='#000000' name='v_player_cctv' src='http://player.cntv.cn/standard/cntvOutSidePlayer.swf' type='application/x-shockwave-flash' lk_mediaid='lk_juiceapp_mediaPopup_1257416656250' lk_media='yes'/-->
		<div style="height:100px;text-align: center;">
			<div style="line-height:100px;display:inline-block;height:50px;vertical-align: top;">
				<?php print($body_dianzan2_1[$lan]);?>
			</div>
			<div style="height:100px;line-height:100px;display:inline-block;">
				<div onclick="dianzan2(this)" style="cursor:pointer;background-image: url(images/png/zan.png);background-size:100% 100%;width:50px;height:50px;margin:0px;display:inline-block;line-height:100px;vertical-align: middle;"></div>
			</div>
			<div style="line-height:100px;display:inline-block;height:50px;vertical-align: top;">
				<?php print($body_dianzan2_2[$lan]);?><span id="dianzan2"><?php $zan2=mysqli_fetch_array($con->query('select zan from page where id=329'));print($zan2[0]);?></span><?php print($body_dianzan2_3[$lan]);?>
			</div>
		</div>
		
		<?php include "foot.php"?>
		<?php if (!isset($_GET['ajax'])){?>
	</div><!--ajax结束-->
	<div id="ajax2" style="display:none;"></div>
	<div id="ajax3" style="display:none;"></div>
	<div id="ajax4" style="display:none;"></div>
	<div id="ajaxsub" class="ajaxsubstyle" style="display:none;"></div>
	
	</div>
	<?php if(!$ismobile){?><div class="fixeddiv" style="position:fixed;right:0px;top:70%;z-index:2018;opacity:0;"><div class="backtotop" style="width:80px;height:90px;background-image:url(images/png/top.png);cursor:pointer;"></div></div><?php }?>
	<script>
	<?php include "js/common.php"?>
	</script>
</body>
</html>
<?php }//ajax php结束?