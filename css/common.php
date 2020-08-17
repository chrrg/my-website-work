	body{
		background-color:#F2F2F2;
	}
	.swiper-container{
		width:100%;
	}
	.swiper-container.banner {
		<?php if ($ismobile){?>
		width: 100%;
		height:100px;
		<?php }else{?>
		width: 98%;
		height:400px;
		<?php }?>
    }
	.swiper-container_mobile {
		width: 100%;
		/*height:200px;*/
    }
	.swiper-wrapper{
		height:auto;
	}
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;

    }
	.ajaxsubstyle img{max-width:100%;height:auto !important;}
	.overflow-hidden{
		overflow: hidden;
	}
	.swiper-slide-active{
        overflow: auto !important;
    }
	.cen{
		margin:0 auto;
	}
	.rai{
		border-radius:10px;
	}
	.yy{
		box-shadow:0px 0px 10px 0px;
	}
	.bor{
		
	}
	.textcen{
		text-align:center;
	}
	.subitem{
		-webkit-transition:color 0.1s linear;-moz-transition:color 0.1s linear;-o-transition:color 0.1s linear;transition:color 0.1s linear;
	}
	.subitem:hover{
		color:rgba(253,110,0,1.00);cursor:pointer;
	}
	.itemani{
		background-color: white;
	}
	.itemani:hover{
		background-color: rgba(231,229,229,1.00);
	}
	.login_content {
	  position: absolute;
	  text-align: center;
	  min-width: 370px;
	  margin:0 auto;
	}

	.login_content div {
	  font: 400 20px Helvetica, Arial, sans-serif;
	  line-height: 20px;
	}
	.login_content div:after, .login_content div:before {
	  background: #000000;
	  content: "";
	  height: 1px;
	  position: absolute;
	  top: 50%;
	  width: 10%;
	}
	.login_content div:before {  
	  left: 0;  
	}  

	.login_content div:after {  
	  right: 0;  
	}  
	.foot{
		color: #dddddd;
	}
	.foot a{
		color: #dddddd;text-decoration: none;
	}
	.foot a:hover{
		color: #ffffff;
	}

	.playdiv{
		position:absolute;
		width:100%;
		display:flex;justify-content:center;align-items:center;
		top:48px;
		bottom:0px;
	}
	.playimage{
		background-image: url(images/png/play.png);background-size:100% 100%;width:50px;height:50px;opacity:0.5;
	}
	.playimage:hover{
		opacity:1;
	}
	.mobile_title_bar{
		font-size:18px;text-align:center;line-height:40px;z-index:1000;box-shadow: 1px 1px 2px 3px rgba(15,15,15,0.25);
	}
	.pc_title_bar{
		position:fixed;width:100%;height:50px;background-color:white;z-index:1000;box-shadow: 1px 1px 2px 3px rgba(15,15,15,0.25);
	}
	.achievesty{
		margin-bottom:30px;
		box-shadow:0px 4px 4px rgba(50,50,50,0.25);
		border-radius:5px;
	}
	.achievesty:hover{
		box-shadow:2px 6px 8px rgba(25,25,25,0.25);
		border-radius:5px;
	}
	.boxsha{
		box-shadow:0px 4px 10px 1px rgba(25,25,25,0.25);
	}
	.boxsha:hover{
		box-shadow:1px 8px 10px 2px rgba(25,25,25,0.25);
	}
	.p-3-c{
		padding-left:10px!important;padding-right:10px!important;padding-top:0!important;padding-bottom:0!important;
	}
	.title_sty{
		position:absolute;display:none;opacity: 0;width:100%;height:50px;line-height:50px;left:0px;top:50px;font-size: 14px;border-radius: 0px 0px 5px 5px;
	}
	.video_hover{
		position:absolute;background-color:rgba(50,50,50,0.7);color:white;bottom:0px;height:0px;width:100%;overflow:hidden;border-radius:5px;
	}
	.smalltitle{
		
		height:60px;
		line-height:60px;
		position:relative;
		text-align:center;
		margin-top:50px;
		margin-bottom:30px;
	}
	.smalltitle::before{
		background-color:rgb(183,19,21);
		height:2px;
		position:absolute;
		top:50%;
		width:35%;
		width:calc(50% - 157px);
		content:"";
		left:0;
		z-index:-1;
	}
	.smalltitle::after{
		background-color:rgb(183,19,21);
		height:2px;
		position:absolute;
		top:50%;
		width:35%;
		width:calc(50% - 157px);
		content:"";
		right:0;
		z-index:-1;
	}
	
	.smalltitle_text{
		width:315px;
		background-color:transparent;
		display:inline-block;
		position:relative;
		font-size:30px;
		
	}
	.smalltitle_text::before{
		background-color:red;
		height:10px;
		position:absolute;
		top:41%;
		width:30px;
		content:"";
		left:0;
		border-radius:4px;
		background: linear-gradient(transparent 0%, rgb(183,19,21) 100%);
	}
	.smalltitle_text::after{
		background-color:red;
		height:10px;
		position:absolute;
		top:41%;
		width:30px;
		content:"";
		right:0;
		border-radius:4px;
		background: linear-gradient(transparent 0%, rgb(183,19,21) 100%);
	}
	.text-gradient {  
		display: inline-block;
		font-family: '微软雅黑';
		position: relative;
		font-size:<?php print($lan==1?'16px':'30px')?>
	}
	.text-gradient[data-text]::after {  
		content: attr(data-text);  
		color: orange;  
		position: absolute;  
		left: 0;  
		z-index: 2;
		-webkit-mask-image: -webkit-gradient(linear, 0 0, 0 bottom, from(rgb(183,19,21)), to(rgba(217, 145, 60, 0)));
	}
	legend{
		width:auto;padding:0px;
	}
	.toindex{
		color:blue;
	}
	.layui-elem-quote{
		border-left:5px solid rgb(183,19,21);
	}
	.timeline .timeline-item > .timeline-point.timeline-point-success {
		color: rgb(183,19,21);
	}
	.timeline:before {
		border-right-color: rgb(183,19,21);
	}
	.timeline .timeline-item > .timeline-event {
		border: 1px solid rgb(183,19,21);
	}
	.timeline .timeline-item > .timeline-event:before {
		border-left-color: rgb(183,19,21);
		border-right-color: rgb(183,19,21);
	}
	.timeline .timeline-label .label-primary {
		background-color: rgb(183,19,21);
		border-radius:4px;
		color:white;
	}
	/*时间线样式*/
	/* CSS Document */
	@-webkit-keyframes niceIn {
		0% {
			opacity: 1;
			-webkit-transform: scale(1);
			transform: scale(1)
		}
		50% {
			opacity: 1;
			-webkit-transform: scale(1.5);
			transform: scale(1.5)
		}
		70% {
			-webkit-transform: scale(.8);
			transform: scale(.8)
		}
		100% {
			opacity: 1;
			-webkit-transform: scale(1);
			transform: scale(1)
		}
	}
	@keyframes niceIn {
		0% {
			opacity: 1;
			-webkit-transform: scale(1);
			-ms-transform: scale(1);
			transform: scale(1)
		}
		50% {
			opacity: 1;
			-webkit-transform: scale(1.5);
			-ms-transform: scale(1.5);
			transform: scale(1.5)
		}
		70% {
			-webkit-transform: scale(.8);
			-ms-transform: scale(.8);
			transform: scale(.8)
		}
		100% {
			opacity: 1;
			-webkit-transform: scale(1);
			-ms-transform: scale(1);
			transform: scale(1)
		}
	}

	@-o-keyframes niceIn{
		0% {
			opacity: 1;
			-o-transform: scale(1);
			transform: scale(1)
		}
		50% {
			opacity: 1;
			-o-transform: scale(1.5);
			transform: scale(1.5)
		}
		70% {
			-o-transform: scale(.8);
			transform: scale(.8)
		}
		100% {
			opacity: 1;
			-o-transform: scale(1);
			transform: scale(1)
		}
	} 

	@-moz-keyframes niceIn{
		0% {
			opacity: 1;
			-moz-transform: scale(1);
			transform: scale(1)
		}
		50% {
			opacity: 1;
			-moz-transform: scale(1.5);
			transform:scale(1.5)
		}
		70% {
			-o-transform: scale(.8);
			transform: scale(.8)
		}
		100% {
			opacity: 1;
			-moz-transform: scale(1);
			transform: scale(1)
		}
	}
	.niceIn {
		-webkit-animation:niceIn 0.8s .2s ease;
		-moz-animation:niceIn 0.8s .2s ease;
		-o-animation:niceIn 0.8s .2s ease;
		animation:niceIn 0.8s .2s ease;
	}