<!--底部大分类-->
<div class="clear"></div>
<div class="big-line">
<?php
$cat_array=get_biglist_array();
foreach($cat_array as $cat_id)
{
		if ($cat_id) { 
?>
		<div class="big-box ">
		<div class="big-cat border-box">
		<div class="title-h2">
<a style="left: 0px;" href="<?php echo get_category_link($cat_id); ?>" title="<?php echo get_cat_name($cat_id); ?>" target="_blank">
				<h2 class="float-left wid-50" ><?php echo get_cat_name($cat_id); ?>>></h2></a>
<span class="litte-cat-right">
<?php
if(get_category_children($cat_id)!= "" )  
    {   
    echo str_replace("li","span",wp_list_categories("child_of=".$cat_id."&depth=0&hide_empty=0&title_li=&orderby=id&order=DESC&echo=false"));  
    }
?>
</span>
</div>
		<div class = "big-posts">
<?php
				query_posts(array(
						'showposts' => waitig_gopt('waitig_big_list_num')?waitig_gopt('waitig_big_list_num'):6,
						'cat' => $cat_id
				)); 
?>
<?php
				$tmp=0;
				while (have_posts()):
						the_post(); 
				if($tmp==0)
				{
						/*带图片模式*/
?>			
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<a target="_blank" href="<?php the_permalink(); ?>">
<figure class="thumbnail-img">
	<img class="thumb" src="<?php echo get_bloginfo("template_url") ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=130&w=200&q=90&zc=0&ct=1" alt="<?php the_title(); ?>" />
</figure>
<div class="cat-main">
	<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"..."); ?>
</div>
</a>
<div class="clear"></div>
<ul class="cat-list">
<?php ++$tmp;
				}
				else
				{
?>
	<li><i class="fa fa-minus"></i><span class = "cms-title-a">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
		
	<span class="cms-time-r">
	<?php the_time('m/d') ?>
	</span></li>
<?php 
				}
				endwhile;wp_reset_query();
?>
<div class="clear"></div>	
</ul>
</div>
</div>
</div>
<?php
		}
}
?>

</div>
<!--底部大分类结束-->
