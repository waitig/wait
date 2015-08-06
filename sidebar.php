<aside class="sidebar">	
<div class="widget widget_text"><div class="textwidget"><div class="social">
<?php if( waitig_gopt('waitig_tqq') || waitig_gopt('waitig_weibo') || waitig_gopt('waitig_facebook') || waitig_gopt('waitig_twitter') ){ ?>

<?php if( waitig_gopt('waitig_weibo') ) echo '<a href="'.waitig_gopt('waitig_weibo').'" rel="external nofollow" title="新浪微博" target="lank"><i class="sinaweibo fa fa-weibo"></i></a>'; ?>
<?php if( waitig_gopt('waitig_tqq') ) echo '<a  href="'.waitig_gopt('waitig_tqq').'" rel="external nofollow" title="腾讯微博" target="lank"><i class="tencentweibo fa fa-tencent-weibo"></i></a>'; ?>
<?php if( waitig_gopt('waitig_twitter') ) echo '<a href="'.waitig_gopt('waitig_twitter').'" rel="external nofollow" title="Twitter" target="lank"><i class="twitter fa fa-twitter"></i></a>'; ?>
<?php if( waitig_gopt('waitig_facebook') ) echo '<a href="'.waitig_gopt('waitig_facebook').'" rel="external nofollow" title="Facebook" target="lank"><i class="facebook fa fa-facebook"></i></a>'; ?>
<?php if( waitig_gopt('waitig_weixin') ) echo '<a class="weixin"><i class="weixins fa fa-weixin"></i><div class="weixin-popover"><div class="popover bottom in"><div class="arrow"></div><div class="popover-title">订阅号“'.waitig_gopt('waitig_weixin').'”</div><div class="popover-content"><img src="'.waitig_gopt('waitig_weixin_qr').'" ></div></div></div></a>';?>
<?php if( waitig_gopt('waitig_pay') ) echo '<a class="weixin"><i class="pay fa fa-paypal"></i><div class="weixin-popover"><div class="popover bottom in"><div class="arrow"></div><div class="popover-title">支付宝“'.waitig_gopt('waitig_pay').'”</div><div class="popover-content"><img src="'.waitig_gopt('waitig_pay_qr').'" ></div></div></div></a>';?>
<?php if( waitig_gopt('waitig_emailContact') ) echo '<a href="'.waitig_gopt('waitig_emailContact').'" rel="external nofollow" title="Email" target="lank"><i class="email fa fa-envelope-o"></i></a>'; ?>
<?php if( waitig_gopt('waitig_qqContact') ) echo '<a href="'.waitig_gopt('waitig_qqContact').'" rel="external nofollow" title="联系QQ" target="lank"><i class="qq fa fa-qq"></i></a>'; ?>
<?php echo'<a href="'.waitig_gopt('waitig_rss').'" rel="external nofollow" target="lank"  title="订阅本站"><i class="rss fa fa-rss"></i></a>'; ?>

<?php } ?>
</div></div></div>

<?php 
if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_sitesidebar')) : endif; 

if (is_single()){
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_postsidebar')) : endif; 
}
else if (is_page()){
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_pagesidebar')) : endif; 
}
else if (is_home()){
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_sidebar')) : endif; 
}
else {
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_othersidebar')) : endif; 
}
?>
</aside>
