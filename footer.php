</section>
<?php if(waitig_gopt('footbar_en')){ ?>
<div class="footbar">
<ul>
<li>
<p class="footbar-title">
<?php echo waitig_gopt('footbar_title1'); ?>
</p>
<span class="footbar-span">
<?php echo waitig_gopt('footbar_span1'); ?>
</span>
</li>
<li>
<p class="footbar-title">
<?php echo waitig_gopt('footbar_title2'); ?>
</p>
<span class="footbar-span">
<?php echo waitig_gopt('footbar_span2'); ?>
</span>
</li>
<li>
<p class="footbar-title">
<?php echo waitig_gopt('footbar_title3'); ?>
</p>
<span class="footbar-span">
<?php echo waitig_gopt('footbar_span3'); ?>
</span>
</li>
<li>
<p class="footbar-title">
<?php echo waitig_gopt('footbar_title4'); ?>
</p>
<span class="footbar-span">
<?php echo waitig_gopt('footbar_span4'); ?>
</span>
</li>
</ul>
<div class="clear"></div>
</div>
<?php } ?>
<footer class="footer">
	<div class="footer-inner">
        <?php if( waitig_gopt('waitig_footercode') ) echo waitig_gopt('waitig_footercode'); ?> 
<!--</div>-->
<?php echo '<!--';
echo '</br>';
printf('This page loaded in %1$s seconds with %2$s database queries.', timer_stop(0,3), get_num_queries());
echo '-->';
?>
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
//require_once(get_stylesheet_directory()."/user/user-foot.php");
?>
<script type="text/javascript">document.body.oncopy=function(){alert("复制成功！若要转载请务必保留原文链接，申明来源，谢谢合作！");}</script>
</body>
</html>
