<?php get_header(); ?>
<?php if( waitig_gopt('waitig_adindex_01') ) echo '<div class="banner banner-navbar">'.waitig_gopt('waitig_adindex_01').'</div>'; ?>
<div class="content-wrap">
	<div class="content">
	<?php 
		if( waitig_gopt('waitig_adindex_03') ) printf('<div class="banner banner-contenttop">'.waitig_gopt('waitig_adindex_03').'</div>');

		if( $paged && $paged > 1 ){
			printf('<header class="archive-header border-box"><h1>最新发布 第'.$paged.'页</h1><div class="archive-header-info"><p>'.get_option('blogname').get_option('blogdescription').'</p></div></header>');
		}else{
				if( waitig_gopt('waitig_slide')=='waitig_sticky_en') include 'modules/sticky.php';
				if(waitig_gopt('waitig_slide')=='waitig_slick_en') include 'modules/slick.php';
		}

		if(waitig_gopt('waitig_site_type')=='waitig_site_cms')
		{
				include 'modules/cms.php';
		}
		else
		{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'caller_get_posts' => 1,
				'paged' => $paged
			);
			query_posts($args);
			include 'modules/excerpt.php'; 
		}
//}
	?>
	</div>
</div>
<?php get_sidebar();
if(waitig_gopt('waitig_big_list')&&waitig_gopt('waitig_site_type')!='waitig_site_blog')
	include 'modules/biglist.php';
get_footer(); ?>
