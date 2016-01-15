<?php if( waitig_gopt('waitig_adindex_02') ) echo '<div>'.waitig_gopt('waitig_adindex_02').'</div>'; ?>	
<?php include 'hotlist.php'; ?>
<?php if (wp_is_mobile() ): ?><?php if( waitig_gopt('Mobiled_adindex_02') ) printf('<div class="banner-sticky">'.waitig_gopt('Mobiled_adindex_02').'</div>'); ?><?php endif ;?>
<?php  
$_author = waitig_gopt('waitig_post_author_un');
$_time = waitig_gopt('waitig_post_time_un');
$_views = waitig_gopt('waitig_post_views_un');
$_comment = waitig_gopt('waitig_post_comment_un');
$_like = waitig_gopt('waitig_post_like_un');
?>
<!--博客文章列表开始-->
<div class="excerpt-box border-box">
<?php while ( have_posts() ) : the_post(); ?>
<?php  
$_thumbnail = false;
if( has_post_thumbnail() || !waitig_gopt('waitig_thumbnail_un') ){
	$_thumbnail = true;
}
?>
<article class="excerpt<?php echo !$_thumbnail ? ' excerpt-nothumbnail' : '' ?>">

<?php if( $_thumbnail ){ ?>
	<div class="focus"><a target="_blank" href="<?php the_permalink(); ?>"><img class="thumb" src="<?php echo get_bloginfo("template_url") ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=123&w=200&q=90&zc=0&ct=1" alt="<?php the_title(); ?>" />
<span class="f_title"><?php the_title(); ?></span></a>
</div>
	<header><?php  if( !is_category() ) {$category = get_the_category();
		        if($category[0]){echo '<a class="label label-important" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'<i class="label-arrow"></i></a>';}
	        };?><h2><a target="_blank" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?>
 <?php $t1=$post->post_date;
$t2=date("Y-m-d H:i:s");
$diff=(strtotime($t2)-strtotime($t1))/3600;
if($diff<12){echo '<img src="'.get_bloginfo("template_url").'/img/new.gif" alt="24小时内最新">';}?> </a></h2>
	</header>
	<?php } ?>
		<span class="note"> <?php echo deel_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 140, '...'); ?></span>
<p class="auth-span">
<?php if( !is_author() && !$_author ){ ?>
		<span class="muted"><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php echo get_the_author() ?></a></span>
	<?php } ?>
	<?php if( !$_time ){ ?><span class="muted"><i class="fa fa-clock-o"></i> <?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ) ?></span><?php } ?>
	<?php if( !$_views ){ ?><span class="muted"><i class="fa fa-eye"></i> <?php deel_views('℃'); ?></span><?php } ?>
	<?php if( !$_comment ){ ?><span class="muted"><i class="fa fa-comments-o"></i> <?php 
			if ( comments_open() ) echo '<a target="_blank" href="'.get_comments_link().'">'.get_comments_number('0', '1', '%').'评论</a>'
		?></span><?php } ?>
<?php if( !$_like ){ ?><span class="muted">
<a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" id="Addlike" class="action<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' actived';?>"><i class="fa fa-heart-o"></i><span class="count"><?php if( get_post_meta($post->ID,'bigfa_ding',true) ){ echo get_post_meta($post->ID,'bigfa_ding',true); } else {echo '0';}?></span>喜欢</a></span><?php } ?></p>
</article>
<?php endwhile; wp_reset_query(); ?>
<?php deel_paging(); ?>
</div>
<!--博客文章列表结束-->
