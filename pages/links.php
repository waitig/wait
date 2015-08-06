<?php 
/*
	template name: 友情链接
	description: template for yusi123.com Yusi theme 
*/
get_header();
?>
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
<?php
$bookmarks = get_bookmarks(array('category' => waitig_gopt('d_linkpage_cat')?waitig_gopt('d_linkpage_cat'):''));

if ( !empty($bookmarks) ){
    echo '<ul class="link-content clearfix">';
    foreach ($bookmarks as $bookmark) {
        echo '<li><a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '" target="_blank" >'. get_avatar($bookmark->link_notes,64) . '<span class="sitename">'. $bookmark->link_name .'</span></a></li>';
    }
    echo '</ul>';
}

?>

			<?php comments_template('', true); ?>

		<?php endwhile;  ?>
	</div>
</div>
<?php get_footer(); ?>
