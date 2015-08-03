</section>
<footer class="footer">
	<div class="footer-inner">
        <!--<div class="copyright pull-left">-->
		<a href="<?php echo home_url('/'); ?>" title="<?php echo get_option('blogname');?>"><?php echo get_option('blogname');?></a>
 版权所有，保留一切权利  ·  
<a href="<?php echo home_url('/'); ?>sitemap.xml" title="站点地图">站点地图</a>
   ·   基于WordPress构建   © 2011-2014  ·  
<a href="http://wpa.qq.com/msgrd?v=3&uin=912774420&site=qq&menu=yes" title="联系作者">联系作者</a>
  ·  <a href="mailto:waitig@gmail.com">Contact us!</a>
<!--360网站验证-->
<a href="http://webscan.360.cn/index/checkwebsite/url/<?php echo home_url('/');?>">360网站安全</a>
<p><a href="http://www.miitbeian.gov.cn">鲁ICP备15025367号-2</a></p>
<!--</div>-->
        <div class="trackcode pull-right">
            <?php if( waitig_gopt('d_track_b') ) echo waitig_gopt('d_track'); ?>
        </div>
    </div>
</footer>

<?php 
wp_footer(); 
global $dHasShare; 
if($dHasShare == true){ 
	echo'<script>with(document)0[(getElementsByTagName("head")[0]||body).appendChild(createElement("script")).src="http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion="+~(-new Date()/36e5)];</script>';
}  
if( waitig_gopt('d_footcode_b') ) echo waitig_gopt('d_footcode'); 
?>


</body>
</html>
