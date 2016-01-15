<?php
/*$postNum=$GLOBALS['postNum'];
$imgNum=$GLOBALS['imgNum'];
$catId=$GLOBALS['catId'];


echo $postNum."-";
echo $catId."-";
echo $imgNum;
  */
?>
		<div class="cat-box border-box">
		<div class="title-h2">
<a style="left: 0px;" href="<?php echo get_category_link($catId); ?>" title="<?php echo get_cat_name($catId); ?>" target="_blank">
				<h2 class="litte-cat-title float-left over-elps" ><?php echo get_cat_name($catId); ?>>></h2></a>
<span class="litte-cat-right over-elps">
<?php
if(get_category_children($catId)!= "" )  
    {   
    echo str_replace("li","span",wp_list_categories("child_of=".$catId."&depth=0&hide_empty=0&title_li=&orderby=id&order=DESC&echo=false"));  
    }
?>
</span>
		</div>
		<div class="related_posts">
<?php
				query_posts(array(
						'showposts' => $postNum ? $postNum : 4,
						'cat' => $catId
				)); ?>
<?php
		$tmp=0;
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
								echo '&h=140&w=185&q=90&zc=0&ct=1" width="185px" height="140px" alt="' . get_the_title() . '" />';
						} ?><br><span class="r_title"><?php
								the_title(); ?></span></a></li>
<?php
		}
		else
		{
				if($tmp==$imgNum)
				{
						echo '</ul><div class="relates"><ul>';
				}
				echo '<li><i class="fa fa-minus"></i><span class="cms-title-a"><a target="_blank" href="'.get_permalink().'">'.get_the_title().'</a></span>';
?>
		<span class="cms-time-r"><?php the_time('d/m');?></span></li>
<?php
		}
		$tmp++;
		endwhile; ?>
		</ul></div></div>
<?php
		if($tmp>$imgNum)
				echo '</div>'; 
?>

