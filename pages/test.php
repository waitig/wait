<?php get_header();

/*
		template name: 测试页面
	description: template for waitig.com waitig theme 
*/
?>
<div class="content-wrap">
	<div class="content">
		<header class="archive-header"><!--获取分类的名称，简介等信息-->
			<h1><i class="fa fa-folder-open"></i>  &nbsp;分类：<?php single_cat_title() ?>  </h1>
			<?php if ( category_description() ) echo '<div class="archive-header-info">'.category_description().'</div>'; ?>
		</header>
<div class="pagewrapper clearfix">
	<aside class="pagesidebar">
		<ul class="pagesider-menu">
			<?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'pagemenu', 'echo' => false)) )); ?>
		</ul>
	</aside>
	<div class="pagecontent">
		<header class="pageheader clearfix">
			<h1 class="pull-left">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h1>
			<div class="pull-right">
				<?php deel_share() ?>
			</div>
		</header>
		<?php while (have_posts()) : the_post(); ?>
		<article class="article-content">
			<?php the_content(); ?>
		</article>
		<?php endwhile;  ?>

<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
				'cat' => '2',   // 分类ID,单引号中填写具体ID，在你后台的分类目录中鼠标查找
				'posts_per_page' => 5,  // 显示篇数
				'paged'=>$paged,
				);
		query_posts($args);
			if  (have_posts()) : while  (have_posts()) : the_post(); 
?>							
	<div class="poss" id="post-<?php the_ID(); ?>" >
		<h2><a href="<?php the_permalink() ?>"><?php the_title_attribute(); ?></a></h2>
								
	</div>			
		<?php endwhile; endif; wp_reset_query();?>



	<?php
$category = get_the_category();
echo $category[0]->cat_name;
?>
	</div>
</div>
<?php get_footer(); ?>
