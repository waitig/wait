<?php
	if (waitig_gopt('hot_list_check')) {
	if (is_home()||is_page()) {
		if( waitig_gopt('waitig_adindex_02') ) echo '<div>'.waitig_gopt('waitig_adindex_02').'</div>';	
	 ?>
<!--热门文章开始-->
<div class="hot-posts border-box">
			<h2 class="title"><?php echo waitig_gopt('hot_list_title') ?></h2>
			<ul><?php hot_posts_list(); ?></ul>
</div>
<!--热门文章结束-->
<?php
		} 
} ?>
