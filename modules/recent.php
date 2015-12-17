<!-- 最新文章开始 -->
<div class="relates"><h2 class="title"><small>最新文章</small></h2>
<ul style="padding: 5px 0px 15px 20px;">
<?php

		$args = array(
		'order'            => DESC,
		'cat'              => '',
		'orderby'          => '',
		'showposts'        => 10,
		'caller_get_posts' => 1
	);
	query_posts($args);
	while (have_posts()) : the_post(); 



	/*	$result = $wpdb->get_results("SELECT ID,post_title FROM $wpdb->posts where post_status='publish' and post_type='post' ORDER BY ID DESC LIMIT 0 , 10");
foreach ($result as $post) {
		setup_postdata($post);
		$postid = $post->ID;
		$title = $post->post_title;*/
?>
		<li><i class="fa fa-minus"></i>
		<span class="cms-title-a">
		<a class="lastitle" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
<span class="cms-time-r"><?php the_time('d/m');?></span>
</li>
<?php
	//}
	endwhile; wp_reset_query(); ?>
</ul>
</div>
<!-- 最新文章结束 -->
