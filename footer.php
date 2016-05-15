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
<!--.浮动小人-->
<?php if( waitig_gopt('waitig_spig_en'))
{
?>
    <script type="text/javascript">
        <?php if(is_home()) echo 'var isindex=true;var title="";';else echo 'var isindex=false;var title="',  get_the_title(),'";'; ?>
        <?php if((($display_name = wp_get_current_user()->display_name) != null)) echo 'var visitor="',$display_name,'";'; else if(isset($_COOKIE['comment_author_'.COOKIEHASH])) echo 'var visitor="',$_COOKIE['comment_author_'.COOKIEHASH],'";';else echo 'var visitor="游客";';echo "\n"; ?>
    </script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/spig.js"></script>
    <style>
        .spig {display:block;width:130px;height:170px;position:absolute;bottom: 300px;left:160px;z-index:9999;}
        #message{color :#191919;border: 1px solid #c4c4c4;background:#ddd;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;min-height:1em;padding:5px;top:-45px;position:absolute;text-align:center;width:auto !important;z-index:10000;-moz-box-shadow:0 0 15px #eeeeee;-webkit-box-shadow:0 0 15px #eeeeee;border-color:#eeeeee;box-shadow:0 0 15px #eeeeee;outline:none;}
        .mumu{width:130px;height:170px;cursor: move;background:url("<?php echo get_bloginfo('template_url') ?>/img/spig.png") no-repeat;}
    </style>
    <div id="spig" class="spig">
        <div id="message">加载中……</div>
        <div id="mumu" class="mumu"></div>
	</div>
<?php } ?>
    <!--.end浮动小人-->
</body>
</html>
