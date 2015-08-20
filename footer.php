</section>
<footer class="footer">
	<div class="footer-inner">
        <!--<div class="copyright pull-left">-->
		<a href="<?php echo home_url('/'); ?>" title="<?php echo get_option('blogname');?>"><?php echo get_option('blogname');?></a>
 版权所有，保留一切权利  ·  
<a href="<?php echo home_url('/'); ?>sitemap.xml" title="站点地图">站点地图</a>
   ·   基于WordPress构建  ·   Theme by <a href='http://www.waitig.com'>wait主题</a>  © 2011-2015  ·  <?php if( waitig_gopt('waitig_footercode') ) echo waitig_gopt('waitig_footercode'); ?> 
<!--</div>-->
        <div class="trackcode pull-right">
            <?php if( waitig_gopt('waitig_track') ) echo waitig_gopt('waitig_track'); ?>
        </div>
    </div>
</footer>
<?php 
wp_footer(); 
global $dHasShare; 
if($dHasShare == true){ 
	echo'<script>with(document)0[(getElementsByTagName("head")[0]||body).appendChild(createElement("script")).src="http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion="+~(-new Date()/36e5)];</script>';
}  
if( waitig_gopt('waitig_footcode') ) echo waitig_gopt('waitig_footcode'); 
?>
</body>
</html>
