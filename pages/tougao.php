<?php 
/*
	template name: 投稿
	description: template for waitig.com waitig theme 
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
		<?php endwhile;  ?>
		<ul class="submit-form">
			<li> <strong>标题(必填)</strong>
				<input id="tougao-title" class="input-block-level" type="text" size="40" placeholder="在此输入标题...">	
				<p class="text-error hide"></p>
			</li>
			<li> <strong>分类目录</strong><br/>
				<?php wp_dropdown_categories('hide_empty=0&id=tougao_categorg&show_count=0&hierarchical=1'); ?>
				<p class="text-error hide"></p>
			</li>
			<li>
				<strong>内容(20-5000字)</strong>
				<?php wp_editor( '', 'tougao-content', $settings = array(
		//'teeny'=>1,
        'quicktags'=> 1,
        //WP默认按钮有strong,em,link,block,del,ins,img,ul,ol,li,code,more,spell,close 请自行选择
        'quicktags'=> array('buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,more,spell,close',),
        'tinymce'=>0,
        'media_buttons'=>waitig_gopt('waitig_tougao_media'),
        'textarea_rows'=>12,
        'editor_class'=>"input-block-level",
        'placeholder'=>"在此输入内容..."
) ); ?>
				<!--<textarea id="tougao-content" rows="12" class="input-block-level" placeholder="写点什么..."></textarea>-->
				<p id="tougao-content-error" class="text-error hide"></p>
			</li>
			<li> <strong>来源网址</strong>
				<input id="tougao-url" class="input-block-level" type="text" placeholder="http://" size="100">	
				<p class="text-error hide"></p>
			</li>
		</ul>
		<div class="text-error"></div>
		<button id="tougao_submit" class="btn btn-primary border-box"><i class="fa fa-check-square-o"></i> 立即提交</button>
	</div>
</div>

<?php wp_enqueue_script( '', get_template_directory_uri() . '/js/tougao.js', array(), '3.0', true ); ?>
<?php get_footer(); ?>
