<?php
$catNum=$_GET['num'];
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
						'showposts' => $catNum ? $catNum : 4,
						'cat' => $cat_id
				)); ?>
<?php
		echo '<ul class="related_img" style="display:inline" >';
		while (have_posts()):
				the_post(); 
		if($tmp<$imgNum)
		{
?>
		<li class="related_box" ><a href="<?php
				the_permalink(); ?>" title="<?php
						the_title(); ?>" ><?php
						if (waitig_gopt('waitig_cdnurl_b')) {
								echo '<img src="';
								echo post_thumbnail_src();
								echo '?imageView2/1/w/185/h/140/q/75" width="185px" height="140px" alt="' . get_the_title() . '" />';
						} else {
								echo '<img src="' . get_bloginfo("template_url") . '/timthumb.php?src=';
								echo post_thumbnail_src();
								echo '&h=140&w=185&q=90&zc=1&ct=1" width="185px" height="140px" alt="' . get_the_title() . '" />';
						} ?><br><span class="r_title"><?php
								the_title(); ?></span></a></li>
<?php
		}
		else
		{
				if($tmp==$imgNum)
						echo '</ul><div class="relates"><ul>';
				echo '<li><i class="fa fa-minus"></i><a target="_blank" href="'.get_permalink().'">',get_the_title(),'</a></li>';
		}
		$tmp++;
		endwhile; ?>
		</ul></div></div>
<?php
		if($tmp>$imgNum)
				echo '</div>';
		} 
}
?>

