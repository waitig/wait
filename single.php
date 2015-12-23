<?php get_header(); ?>
<div class="content-wrap">
	<div class="content">
	<div class='article border-box'>
<?php if( waitig_gopt('waitig_singleMenu_en') ) echo '<div class="breadcrumbs">'.deel_breadcrumbs().'</div>'; ?>

		<?php while (have_posts()) : the_post(); ?>
		<header class="article-header">
			<h1 class="article-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<?php  
					$category = get_the_category();
			        if($category[0]){
			            echo '<span id="mute-category" class="muted"><i class="fa fa-list-alt"></i><a href="'.get_category_link($category[0]->term_id ).'"> '.$category[0]->cat_name.'</a></span>';
			        }
				?>
				<span class="muted"><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php echo get_the_author() ?></a></span>
				<time class="muted"><i class="fa fa-clock-o"></i> <?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) )?></time>
				<span class="muted"><i class="fa fa-eye"></i> <?php deel_views('℃'); ?></span>
				<?php //baidu_record
				if(waitig_gopt('waitig_baidurecord_en'))
				echo '<span class="muted">'.baidu_record().'</span>';
				?>
				<?php if ( comments_open() ) echo '<span class="muted"><i class="fa fa-comments-o"></i> <a href="'.get_comments_link().'">'.get_comments_number('去', '1', '%').'评论</a></span>'; ?>

				<?php
    if (waitig_gopt('waitig_qr_en') && !wp_is_mobile()) { ?><span class="muted"><i class="fa fa-qrcode"></i> <a style="cursor : pointer;" onMouseOver="document.all.qr.style.visibility=''" onMouseOut="document.all.qr.style.visibility='hidden'">扫描二维码</a>
			<span id="qr" style="visibility: hidden;"><img style="position:absolute;z-index:99999;" src="<?php echo get_bloginfo("template_url")?>/phpqrcode.php?url=<?php
        the_permalink(); ?>"/></span></span><?php
	} ?>

				<?php edit_post_link('[编辑]'); ?>
			</div>
		</header>
<?php if( waitig_gopt('waitig_adpost_01') ) echo '<div class="banner banner-post">'.waitig_gopt('waitig_adpost_01').'</div>'; ?>
<?php if (wp_is_mobile() ): ?><?php if( waitig_gopt('Mobiled_adpost_01') ) echo '<div class="banner-post">'.waitig_gopt('Mobiled_adpost_01').'</div>'; ?><?php endif ;?>
		<article class="article-content">
			<?php the_content(); ?>



<?php wp_link_pages(array('before' => '<div class="fenye">', 'after' => '', 'next_or_number' => 'next', 'previouspagelink' => '<span>上一页</span>', 'nextpagelink' => "")); ?>   <?php wp_link_pages(array('before' => '', 'after' => '', 'next_or_number' => 'number', 'link_before' =>'<span>', 'link_after'=>'</span>')); ?>   <?php wp_link_pages(array('before' => '', 'after' => '</div>', 'next_or_number' => 'next', 'previouspagelink' => '', 'nextpagelink' => "<span>下一页</span>")); ?>

<div class="article-social">
		<form action="https://shenghuo.alipay.com/send/payment/fill.htm" method="POST" target="_Blank" name="rewardForm" accept-charset="GBK" rel="nofollow" ><input name="optEmail" type="hidden" value="<?php echo waitig_gopt('waitig_pay');?>"><input name="payAmount" type="hidden" value="10"><input name="memo" type="hidden" value="感谢您对小站的捐赠，请留下您的联系方式！">
			<a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" id="Addlike" class="action<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' actived';?>"><i class="fa fa-heart-o"></i>喜欢 (<span class="count"><?php if( get_post_meta($post->ID,'bigfa_ding',true) ){ echo get_post_meta($post->ID,'bigfa_ding',true); } else {echo '0';}?></span>)</a><?php if( waitig_gopt('waitig_payme_en') ) echo'<span class="or"><button class="subsub" type=submit">赏</button></span>'; if( waitig_gopt('waitig_bdshare_en') )  deel_share(); ?>	
</form>
</div>
	</article>	
		<?php endwhile;  ?>
		<footer class="article-footer">
			<?php the_tags('<div class="article-tags"><i class="fa fa-tags"></i>','','</div>'); ?>
</footer>
	<nav class="article-nav">
			<span class="article-nav-prev"><?php previous_post_link('<i class="fa fa-angle-double-left"></i> %link'); ?></span>
			<span class="article-nav-next"><?php next_post_link('%link  <i class="fa fa-angle-double-right"></i>'); ?></span>
		</nav>
</div>	
			<?php include( 'modules/related.php' ); ?>
		<?php if (wp_is_mobile() ): ?><?php if( waitig_gopt('Mobiled_adindex_02') )echo '<div id="comment-ad" class="banner-related">'.waitig_gopt('Mobiled_adindex_02').'</div>'; ?><?php endif ;?>
		<?php if( waitig_gopt('waitig_adpost_02') ) echo '<div id="comment-ad" class="banner banner-related">'.waitig_gopt('waitig_adpost_02').'</div>'; ?>
		<?php comments_template('', true); ?>
		<?php if( waitig_gopt('waitig_adpost_03') ) echo '<div class="banner banner-comment">'.waitig_gopt('waitig_adpost_03').'</div>'; ?>
	</div>
</div>
<?php get_sidebar(); get_footer(); ?>
