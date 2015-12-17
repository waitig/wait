<?php
if (is_home()||is_page()) {
		if( waitig_gopt('waitig_adindex_02') ) echo '<div>'.waitig_gopt('waitig_adindex_02').'</div>';	
		if (waitig_gopt('hot_list_check') || waitig_gopt('waitig_slide')=='waitig_sticky_en') { ?>
		<div><div class="left-ad" style="clear: both;background-color: #fff; width: 30%;float: left;margin-right:2%;"></div><div class="hot-posts">
			<h2 class="title"><?php echo waitig_gopt('hot_list_title') ?></h2>
			<ul><?php hot_posts_list(); ?></ul>
		</div></div>
<?php
		} 
} ?>
