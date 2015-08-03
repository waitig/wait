$(function() {
	$('a').focus(function() {
		$(this).blur();
	});
});

<!-- 首页超大banner切换效果 -->
$(function(){
	var index = 0;
	var imgWidth = $('.pics_switch .pic_box').width();//单张图片宽度
	//alert(imgWidth);
	var len = $('.pics_switch .pic_box').length;//图片数
	//alert(len)
	var totalImgWidth = imgWidth*len;//图片序列宽度
	
	//默认banne宽度是1600，低于1600的分辨率会出现位置偏差，需要调整，故在低于1600下设置banner宽度为100%；
	if($(window).width()<imgWidth) {
			//去掉.ps_box 下3行
		$('.pics_switch').css({'width':$(window).width()});
		$('.pics_switch .pic_box').css({'width':$(window).width()});
		$('.pics_switch .pic_box a').css({'width':$(window).width()});
		imgWidth = $(window).width();
	}
	
	//小按钮鼠标滑过透明度
	//该ps_box-.pics_switch 下两行
	$('.pics_switch .pics_switch_clients ul li').css({'opacity':0.9});
	$('.pics_switch .pics_switch_clients ul li span.current').css({'opacity':0.9});
	$('.pics_switch_clients li').hover(function() {
			$(this).addClass('hover');

		},function() {
			$(this).removeClass('hover');
		}
	);
	
	//左右翻页按钮滑过透明度
	$('.pics_switch .viewArrows').css({'opacity':0.4});
	$('.pics_switch .viewArrows').hover(function() {
			$(this).fadeTo(200, 1);
		},function() {
			$(this).fadeTo(200, 0.4);
		}
	);
	
	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$('.pics_switch .pics_switch_clients ul li').css("opacity",0.4).mouseover(function() {
		index = $('.pics_switch .pics_switch_clients ul li').index(this);
		showPics(index);
	}).eq(0).trigger("mouseover");
	
	//上一页按钮
	$(".pics_switch .prev").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});
	
	//下一页按钮
	$(".pics_switch .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});
	
$('.pics_switch .pb').css({'width':totalImgWidth});
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$('.pics_switch .pb').hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) {
		var nowLeft = -index*imgWidth; //根据index值计算ul元素的left值
		$('.pics_switch .pb').stop(true,false).animate({"marginLeft":nowLeft},1000,'easeInOutExpo'); //通过animate()调整ul元素滚动到计算出的position
		$('.pics_switch .pics_switch_clients ul li').stop(true,false).animate({"opacity":"0.4"},600).eq(index).stop(true,false).animate({"opacity":"0.9"},600); //为当前的按钮切换到选中的效果
	}
	
});

