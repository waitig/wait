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
<style type="text/css">
.widget-title{background:#FFFFFF;} 
.title-h2
{ 
height: 45px;
 border-bottom: 1px solid #90BBA8; 
margin: 5px 20px;
}
</style>
<!-- 最新文章开始 -->
<div class="relates"><h2 class="title"><small>最新文章</small></h2>
<ul style="padding: 5px 0px 15px 20px;">
<?php
		$result = $wpdb->get_results("SELECT ID,post_title FROM $wpdb->posts where post_status='publish' and post_type='post' ORDER BY ID DESC LIMIT 0 , 10");
foreach ($result as $post) {
		setup_postdata($post);
		$postid = $post->ID;
		$title = $post->post_title;
?>
		<li><i class="fa fa-minus"></i><a class="lastitle" href="<?php
		echo get_permalink($postid); ?>" title="<?php
				echo $title ?>"><?php
				echo $title ?></a></li>
<?php
} ?>
</ul>
</div>
<!-- 最新文章结束 -->
<?php
$cat_array=get_cat_array();
foreach($cat_array as $cat_id)
{
		if ($cat_id) { ?>
		<div class="widget-title">
		<h2 class="title-h2"><small><?php
				echo get_cat_name($cat_id); ?></small><span class="more" style="float:right;"><a style="left: 0px;" href="<?php
				echo get_category_link($cat_id); ?>" title="阅读更多" target="_blank"><small>阅读更多</small></a></span></h2>
		<div class="related_posts">
<?php
				query_posts(array(
						'showposts' => waitig_gopt('waitig_cat_num') ? waitig_gopt('waitig_cat_num') : 4,
						'cat' => $cat_id
				)); ?>
<?php
		$tmp=0;
		echo '<ul class="related_img" style="display:inline" >';
		while (have_posts()):
				the_post(); 
		if($tmp<waitig_gopt('waitig_cms_img_num'))
		{
?>
		<li class="related_box" ><a href="<?php
				the_permalink(); ?>" title="<?php
						the_title(); ?>" ><?php
						if (waitig_gopt('waitig_cdnurl_b')) {
								echo '<img src="';
								echo post_thumbnail_src();
								echo '?imageView2/1/w/185/h/110/q/75" width="185px" height="110px" alt="' . get_the_title() . '" />';
						} else {
								echo '<img src="' . get_bloginfo("template_url") . '/timthumb.php?src=';
								echo post_thumbnail_src();
								echo '&h=110&w=185&q=90&zc=1&ct=1" width="185px" height="110px" alt="' . get_the_title() . '" />';
						} ?><br><span class="r_title"><?php
								the_title(); ?></span></a></li>
<?php
		}
		else
		{
				if($tmp==waitig_gopt('waitig_cms_img_num'))
						echo '</ul><div class="relates"><ul>';
				echo '<li><i class="fa fa-minus"></i><a target="_blank" href="'.get_permalink().'">',get_the_title(),'</a></li>';
		}
		$tmp++;
		endwhile; ?>
		</ul></div></div>
<?php
		if($tmp>waitig_gopt('waitig_cms_img_num'))
				echo '</div>';
		} 
}
?>
