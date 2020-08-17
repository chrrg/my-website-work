	var layid = null;
		function closelaymodal(){
			layer.close(layid);
		}
		$('.backtotop').click(function(){
			$("html,body").finish().animate({"scrollTop":"0px"},500);//回顶
		})//返回顶部按钮动作
		$(document).scroll(function(){
			if($(this).scrollTop()<=300&&$('.fixeddiv').css('opacity')!='0'){$('.fixeddiv').stop(true);$('.fixeddiv').animate({opacity:'0'},200,function(){$('.fixeddiv').css('display','none');});}
			if($(this).scrollTop()>300&&$('.fixeddiv').css('opacity')!='1'){$('.fixeddiv').stop(true);$('.fixeddiv').css('display','block');$('.fixeddiv').animate({opacity:'1'},200,function(){$('.fixeddiv').css('display','block');});}
		})//返回顶部按钮动画

		function unScroll() {
			var top = $(document).scrollTop();
			$(document).on('scroll.unable',function (e) {
				$(document).scrollTop(top);
			})
		}//模态框开启时禁止滚动
		function removeUnScroll() {
			$(document).unbind("scroll.unable");
		}//模态框关闭后可以滚动

		var swiper = new Swiper('.swiper-container.achievement', {
			slidesPerView: <?php if($ismobile)print(1);else print(3);?>,
			spaceBetween: 30,
			loop: true,
			pagination: {
			el: '.swiper-pagination.achievement',
			clickable: true,
			},
			autoplay: {
			delay: 3000,
			disableOnInteraction: false,
			},
			navigation: {
			nextEl: '.swiper-button-next.achievement',
			prevEl: '.swiper-button-prev.achievement',
			},
		});//swiper1初始化
		$('#imgshow').children('div').children('div').each(function(){
			$(this).mouseover(function(){
				var diob = $(this).children('div');
				diob.stop(true);
				diob.animate({'height':'100%',opacity:"0.8"},200,function(){

				});
			});
		});//视频框动画显示
		$('#imgshow').children('div').children('div').each(function(){
			$(this).mouseleave(function(){
				var diob = $(this).children('div');
				diob.stop(true);
				diob.animate({'height':'0px',opacity:"1"},200,function(){
				});
			});
		});//视频框动画隐藏
		$("#sub1").mouseover(function(){
			$("#sub1_").css('display','block');
			$("#sub1_").stop(true);
			$("#sub1_").animate({opacity:'0.9'},200,function(){})
		});
		$("#sub1").mouseleave(function(){
			$("#sub1_").stop(true);
			$("#sub1_").animate({opacity:'0'},200,function(){$("#sub1_").css('display','none');})
		});
		$("#sub2").mouseover(function(){
			$("#sub2_").css('display','block');
			$("#sub2_").stop(true);
			$("#sub2_").animate({opacity:'0.9'},200,function(){})
		});
		$("#sub2").mouseleave(function(){
			$("#sub2_").stop(true);
			$("#sub2_").animate({opacity:'0'},200,function(){$("#sub2_").css('display','none');})
		});
		//顶部按钮动画
		function laymsg(text){
			layui.use(['layer', 'form'], function(){
			  var layer = layui.layer;
			  layer.msg(text,{time:1000});
			});
		}
		function AjaxGotoPage(pageobj,geturl){
			$.ajax({
				type: 'get',
				url: geturl,
				data: 'ajax',//obj.serizlize(),
				success: function (data) {pageobj.html(data);},
				//timeout: 15000,
				error: function ( data ) {}
			});
		}//ajax
		var localpage = 1;///////////////////////////////////////////////////***************
		var loaded=Array(true,false,false,false);

		var entersubpage=0;
		var animatelock = false;
		function topage(page,url){//切换页面动画效果
			

			if (localpage===page)return '';
			$("html,body").finish().animate({"scrollTop":"0px"},100);//回顶
			if (animatelock)return '';
			animatelock=true;//上锁
			var tempvar=localpage;
			var topposition="0px";///////////////导航栏占位120px
			
			if (entersubpage!=0){
				//从分页进主页动画
				$('#ajax'+page).css('display','block');$('#ajax'+backpage).css('opacity','1');$('#ajaxsub').css('display','none');
				//var fadeobj = '#ajaxsub';
				entersubpage=0;
			}else{
				var fadeobj = '#ajax'+localpage;
			}
			
			
			with($(fadeobj)){//消失动画
				css("position","absolute");
				css("width","100%");
				css("top",topposition);
				css("opacity","1");
				animate({opacity:"0",top:"-500px"},function(){
					css("display","none");
				});
			}
			with($('#ajax'+page)){//出现动画
				css("position","absolute");
				css("width","100%");
				css("top","300px;");
				css("opacity","0");
				css("display","block");
				animate({opacity:"1",top:topposition},function(){css("opacity","1");animatelock=false;});
			}
			localpage=page;
			if (!loaded[page-1]){
				laymsg('<?php print($body_loading_tip[$lan]);?>');
				AjaxGotoPage($('#ajax'+page),url);
				//console.log(page);
				loaded[page-1]=true;
			}//如果没加载就加载
			
		}
		$("#baritem1").click(function(){//首页
			topage(1,"index.php");
		});
		$("#baritem2,.totimeline").click(function(){//时间线
			topage(2,'page/timeline.php');
		});
		$("#sub1:not(#sub1_)").click(function(){//不忘初心
			topage(3,'page/pagesub1.php');
		});
		$("#sub2:not(#sub2_)").click(function(){//继续前行
			topage(4,'page/pagesub2.php');
		});
		
		$("#baritem3_1").click(function(){//不忘初心_1
			if(localpage!=3)topage(3,'page/pagesub1.php');
			else $("html,body").finish().animate({ scrollTop:  $('#position不忘初心0').offset().top -140}, 500);
		});
		$("#baritem3_2").click(function(){//不忘初心_2
			if(localpage!=3)topage(3,'page/pagesub1.php');
			else $("html,body").finish().animate({ scrollTop:  $('#position不忘初心3').offset().top -140}, 500);
		});
		$("#baritem4_1").click(function(){//继续前行_1
			if(localpage!=4)topage(4,'page/pagesub2.php');
			else $("html,body").finish().animate({ scrollTop:  $('#position继续前行0').offset().top -140}, 500);
		});
		$("#baritem4_2").click(function(){//继续前行_2
			if(localpage!=4)topage(4,'page/pagesub2.php');
			else $("html,body").finish().animate({ scrollTop:  $('#position继续前行1').offset().top -140}, 500);
		});
		$("#baritem4_3").click(function(){//继续前行_3
			if(localpage!=4)topage(4,'page/pagesub2.php');
			else $("html,body").finish().animate({ scrollTop:  $('#position继续前行5').offset().top -140}, 500);
		});
		var dianzan1s=0,dianzan2s=0;
		function dianzan1(obj){
			$(obj).removeClass('niceIn');
			setTimeout(function(){$(obj).addClass('niceIn');},1);
			if (dianzan1s==0){
				dianzan1s=1;
				$.ajax('page/dianzan.php?pageid=328');
				$('#dianzan1').html(parseInt($('#dianzan1').html())+1);
			}
		}
		function dianzan2(obj){
			$(obj).removeClass('niceIn');
			setTimeout(function(){$(obj).addClass('niceIn');},1);
			if (dianzan2s==0){
				dianzan2s=1;
				$.ajax('page/dianzan.php?pageid=329');
				$('#dianzan2').html(parseInt($('#dianzan2').html())+1);
			}
		}
		$('.playimage').click(function(){
			
			var datae,content,gotourl,datat;
			datae=$(this).attr('datae');
			datat=$(this).attr('datat');
			switch(datae){
				case '1':
					gotourl='http://tv.cctv.com/2017/11/17/VIDEnIlNggFaUVPRi6i9dQxs171117.shtml';
					content = "<embed id='v_player_cctv' width='1000' height='500' flashvars='videoId=IlNggFaUVPRi6i9dQxs171117&filePath=/flvxml/2009/10/14/&isAutoPlay=true&url=http://tv.cctv.com/2017/11/17/VIDEnIlNggFaUVPRi6i9dQxs171117.shtml&tai=news&configPath=http://js.player.cntv.cn/xml/config/outside.xml&widgetsConfig=http://js.player.cntv.cn/xml/widgetsConfig/common.xml&languageConfig=&hour24DataURL=VodCycleData.xml&outsideChannelId=channelBugu&videoCenterId=943ab79faa2a4249b480ec0d9dddd1e4' allowscriptaccess='always' allowfullscreen='true' menu='false' quality='best' bgcolor='#000000' name='v_player_cctv' src='http://player.cntv.cn/standard/cntvOutSidePlayer.swf' type='application/x-shockwave-flash' lk_mediaid='lk_juiceapp_mediaPopup_1257416656250' lk_media='yes'/>";
					break;
				case '2':
					gotourl='http://tv.cctv.com/2017/11/17/VIDE8dONBMqzwCuJXam3iGL8171117.shtml';
					content = "<embed id='v_player_cctv' width='1000' height='500' flashvars='videoId=dONBMqzwCuJXam3iGL8171117&filePath=/flvxml/2009/10/14/&isAutoPlay=true&url=http://tv.cctv.com/2017/11/17/VIDE8dONBMqzwCuJXam3iGL8171117.shtml&tai=news&configPath=http://js.player.cntv.cn/xml/config/outside.xml&widgetsConfig=http://js.player.cntv.cn/xml/widgetsConfig/common.xml&languageConfig=&hour24DataURL=VodCycleData.xml&outsideChannelId=channelBugu&videoCenterId=8c386553a49d46d7948dc9a09d50c133' allowscriptaccess='always' allowfullscreen='true' menu='false' quality='best' bgcolor='#000000' name='v_player_cctv' src='http://player.cntv.cn/standard/cntvOutSidePlayer.swf' type='application/x-shockwave-flash' lk_mediaid='lk_juiceapp_mediaPopup_1257416656250' lk_media='yes'/>";
					break;
				case '3':
					gotourl='http://tv.cctv.com/2017/11/18/VIDE0bP8brwz2KAeLyjzMmGb171118.shtml';
					content = "<embed id='v_player_cctv' width='1000' height='500' flashvars='videoId=bP8brwz2KAeLyjzMmGb171118&filePath=/flvxml/2009/10/14/&isAutoPlay=true&url=http://tv.cctv.com/2017/11/18/VIDE0bP8brwz2KAeLyjzMmGb171118.shtml&tai=news&configPath=http://js.player.cntv.cn/xml/config/outside.xml&widgetsConfig=http://js.player.cntv.cn/xml/widgetsConfig/common.xml&languageConfig=&hour24DataURL=VodCycleData.xml&outsideChannelId=channelBugu&videoCenterId=5ba88c07d33944d9ab57d0c9d77c7aee' allowscriptaccess='always' allowfullscreen='true' menu='false' quality='best' bgcolor='#000000' name='v_player_cctv' src='http://player.cntv.cn/standard/cntvOutSidePlayer.swf' type='application/x-shockwave-flash' lk_mediaid='lk_juiceapp_mediaPopup_1257416656250' lk_media='yes'/>";
					break;
				case '4':
					gotourl='http://tv.cctv.com/2017/11/18/VIDEx74zK0YsYxYpUIxmvlFz171118.shtml';
					content = "<embed id='v_player_cctv' width='1000' height='500' flashvars='videoId=74zK0YsYxYpUIxmvlFz171118&filePath=/flvxml/2009/10/14/&isAutoPlay=true&url=http://tv.cctv.com/2017/11/18/VIDEx74zK0YsYxYpUIxmvlFz171118.shtml&tai=news&configPath=http://js.player.cntv.cn/xml/config/outside.xml&widgetsConfig=http://js.player.cntv.cn/xml/widgetsConfig/common.xml&languageConfig=&hour24DataURL=VodCycleData.xml&outsideChannelId=channelBugu&videoCenterId=113726b0874b4a3bac8b3bf1516d7312' allowscriptaccess='always' allowfullscreen='true' menu='false' quality='best' bgcolor='#000000' name='v_player_cctv' src='http://player.cntv.cn/standard/cntvOutSidePlayer.swf' type='application/x-shockwave-flash' lk_mediaid='lk_juiceapp_mediaPopup_1257416656250' lk_media='yes'/>";
					break;
				case '5':
					gotourl='http://tv.cctv.com/2017/11/18/VIDENCISxK07JDjzprqMrNcm171118.shtml';
					content = "<embed id='v_player_cctv' width='1000' height='500' flashvars='videoId=CISxK07JDjzprqMrNcm171118&filePath=/flvxml/2009/10/14/&isAutoPlay=true&url=http://tv.cctv.com/2017/11/18/VIDENCISxK07JDjzprqMrNcm171118.shtml&tai=news&configPath=http://js.player.cntv.cn/xml/config/outside.xml&widgetsConfig=http://js.player.cntv.cn/xml/widgetsConfig/common.xml&languageConfig=&hour24DataURL=VodCycleData.xml&outsideChannelId=channelBugu&videoCenterId=3bfdb23a54c74ffba1b58c55fec7ebfa' allowscriptaccess='always' allowfullscreen='true' menu='false' quality='best' bgcolor='#000000' name='v_player_cctv' src='http://player.cntv.cn/standard/cntvOutSidePlayer.swf' type='application/x-shockwave-flash' lk_mediaid='lk_juiceapp_mediaPopup_1257416656250' lk_media='yes'/>";
					break;
				case '6':
					gotourl='http://tv.cctv.com/2017/11/18/VIDEXnQdC8D7Sc8Y15N29Dzj171118.shtml';
					content = "<embed id='v_player_cctv' width='1000' height='500' flashvars='videoId=nQdC8D7Sc8Y15N29Dzj171118&filePath=/flvxml/2009/10/14/&isAutoPlay=true&url=http://tv.cctv.com/2017/11/18/VIDEXnQdC8D7Sc8Y15N29Dzj171118.shtml&tai=news&configPath=http://js.player.cntv.cn/xml/config/outside.xml&widgetsConfig=http://js.player.cntv.cn/xml/widgetsConfig/common.xml&languageConfig=&hour24DataURL=VodCycleData.xml&outsideChannelId=channelBugu&videoCenterId=d20820f7f87a45f9bb6b618a0a38cc20' allowscriptaccess='always' allowfullscreen='true' menu='false' quality='best' bgcolor='#000000' name='v_player_cctv' src='http://player.cntv.cn/standard/cntvOutSidePlayer.swf' type='application/x-shockwave-flash' lk_mediaid='lk_juiceapp_mediaPopup_1257416656250' lk_media='yes'/>";
					break;
			}
			<?php if($ismobile){?>
			layer.open({
				id:1
				,type: 1
				,area: ['300px', '150px']
				,title: datat
				,offset: 'auto' //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
				,id: 'videoframe'+datae //防止重复弹出
				,content: '<?php print($video_mobile_string1[$lan]);?>'
				,btn: ['<?php print($video_mobile_string2[$lan]);?>','<?php print($video_mobile_string3[$lan]);?>']
				,btnAlign: 'c' //按钮居中
				,shade: 0 //不显示遮罩
				,yes: function(){
					window.open(gotourl);
					layer.closeAll();
				}
				,btn2: function(){
					layer.closeAll();
				}
			});
			<?php }else{?>
			layer.open({
				id:1
				,type: 1
				,area: ['1000px', '600px']
				,title: datat
				,offset: 'auto' //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
				,id: 'videoframe'+datae //防止重复弹出
				,content: content
				,btn: ['<?php print($video_mobile_string4[$lan]);?>','<?php print($video_mobile_string3[$lan]);?>']
				,btnAlign: 'c' //按钮居中
				,shade: 0 //不显示遮罩
				,yes: function(){
					window.open(gotourl);
					layer.closeAll();
				}
				,btn2: function(){
					layer.closeAll();
				}
			});
			<?php }?>
			
		});
		//ajax!end
		var dianzanarray = new Array();
		var dianzancommentarray = new Array();
		function isInArray(arr,value){
			for(var i = 0; i < arr.length; i++){
				if(value === arr[i]){
					return true;
				}
			}
			return false;
		}
		function dianzan(pageid){
			if (!isInArray(dianzanarray,pageid)){
				dianzanarray.push(pageid);
				$.ajax({url:'page/dianzan.php?pageid='+pageid});
				$('#dianzannum').html(parseInt($('#dianzannum').html())+1);
				laymsg('<?php echo $dianzan_string_1[$lan];?>');
			}else{
				laymsg('<?php echo $dianzan_string_2[$lan];?>');
			}
		}
		function dianzancomment(pageid,obj){
			if (!isInArray(dianzancommentarray,pageid)){
				dianzancommentarray.push(pageid);
				$.ajax({url:'page/dianzancomment.php?pageid='+pageid});
				var is=0;
				is=parseInt($(obj).find('span').html())+1;
				$(obj).html('<?php echo $dianzan_string[$lan];?>:<span>'+is+'</span>人');
				laymsg('<?php echo $dianzan_string_3[$lan];?>');
			}else{
				laymsg('<?php echo $dianzan_string_2[$lan];?>');
			}
		}
		(function() {
			var coreSocialistValues = ["富强", "民主", "文明", "和谐", "自由", "平等", "公正", "法治", "爱国", "敬业", "诚信", "友善"],
			index = Math.floor(Math.random() * coreSocialistValues.length);
			document.body.addEventListener('click', function(e) {
				if (e.target.tagName == 'A') {return;}
				var x = e.pageX, y = e.pageY, span = document.createElement('span');
				span.textContent = coreSocialistValues[index];index = (index + 1) % coreSocialistValues.length;
				span.style.cssText = ['z-index: 9999999; position: absolute; font-weight: bold; color: #ff6651; top: ', y - 20, 'px; left: ', x, 'px;'].join('');
				document.body.appendChild(span);
				animate(span);});function animate(el) {
					var i = 0, top = parseInt(el.style.top), id = setInterval(frame, 16.7);function frame() {if (i > 180) {clearInterval(id);el.parentNode.removeChild(el);} else {i+=2;el.style.top = top - i + 'px';el.style.opacity = (180 - i) / 180;}}}}());
