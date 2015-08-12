<?php get_header(); 
/*
		template name: cms模式演示
	description: template for waitig.com waitig theme 
*/
?>
<?php if( waitig_gopt('waitig_adindex_01') ) echo '<div class="banner banner-navbar">'.waitig_gopt('waitig_adindex_01').'</div>'; ?>
<div class="content-wrap">

	<div class="content">
	<?php 
if( waitig_gopt('waitig_adindex_03') ) printf('<div class="banner banner-contenttop">'.waitig_gopt('waitig_adindex_03').'</div>');
				if( waitig_gopt('waitig_slide')=='waitig_sticky_en') include ABSPATH.'wp-content/themes/wait/modules/sticky.php';		if(waitig_gopt('waitig_slide')=='waitig_slick_en') include ABSPATH.'wp-content/themes/wait/modules/slick.php';
				include(ABSPATH.'wp-content/themes/wait/modules/cms.php');
	?>
	</div>
</div>
<?php get_sidebar(); get_footer(); ?>