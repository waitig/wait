<?php get_header();

/*
	template name: 分类信息
	description: template for waitig.com wait theme 
*/
?>
<div class="content-wrap">
	<div class="content">
		<header class="archive-header"><!--获取分类的名称，简介等信息-->
			<h1><i class="fa fa-folder-open"></i>  &nbsp;分类：<?php single_cat_title() ?>  <a title="订阅<?php single_cat_title() ?>" target="_blank" href="<?php echo get_category_link( get_cat_ID( single_cat_title('',false) ) ); ?>/feed"><i class="rss fa fa-rss"></i></a></h1>
			<?php if ( category_description() ) echo '<div class="archive-header-info">'.category_description().'</div>'; ?>
		</header>
<!--获取分类里文章的内容-->
		<?php include( '../modules/excerpt.php' ); ?>
	</div>
</div>
<?php get_sidebar(); get_footer(); ?>
