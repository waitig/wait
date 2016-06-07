<?php  
add_action( 'widgets_init', 'd_authors' );

function d_authors() {
	register_widget( 'd_author' );
}

class d_author extends WP_Widget {
	function d_author() {
		$widget_ops = array( 'classname' => 'd_author', 'description' => '显示发表文章数量最多的前几位用户' );
		$this->WP_Widget( 'd_author', 'wait-作者排行', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_name', $instance['title']);
		$limit = $instance['limit'];
		$addlink = $instance['addlink'];
		$more = $instance['more'];
		$link = $instance['link'];

		$mo='';
		if( $more!='' && $link!='' ) $mo='<a class="btn" href="'.$link.'">'.$more.'</a>';
		$args = array(
			'orderby' => 'post_count',
			'order' => 'DESC',
			'number' => $limit,
			'optioncount' => 1,
			'exclude_admin' => 1,
			'show_fullname' => 1,
			'hide_empty' => 1,
			'echo' => 0,
			'style' => '',
			'html' => 1
			);

		echo $before_widget;
		echo $before_title.$mo.$title.$after_title; 
		echo '<ul>';
		echo wait_list_authors( $args);
		echo '</ul>';
		echo $after_widget;
	}
	function form($instance) {

?>
		<p>
			<label>
				标题：
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</label>
		</p>
		<p>
			<label>
				显示数目：
				<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo $instance['limit']; ?>" />
			</label>
		</p>
		<p>
			<label>
				<input style="vertical-align:-3px;margin-right:4px;" class="checkbox" type="checkbox" <?php checked( $instance['addlink'], 'on' ); ?> id="<?php echo $this->get_field_id('addlink'); ?>" name="<?php echo $this->get_field_name('addlink'); ?>">加链接
			</label>
		</p>
		<p>
			<label>
				More 显示文字：
				<input style="width:100%;" id="<?php echo $this->get_field_id('more'); ?>" name="<?php echo $this->get_field_name('more'); ?>" type="text" value="<?php echo $instance['more']; ?>" size="24" />
			</label>
		</p>
		<p>
			<label>
				More 链接：
				<input style="width:100%;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="url" value="<?php echo $instance['link']; ?>" size="24" />
			</label>
		</p>

<?php
	}
}

function wait_list_authors( $args = '' ) {
	global $wpdb;

	$defaults = array(
		'orderby' => 'name', 'order' => 'DESC', 'number' => '',
		'optioncount' => false, 'exclude_admin' => true,
		'show_fullname' => false, 'hide_empty' => true,
		'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
		'style' => 'list', 'html' => true, 'exclude' => '', 'include' => ''
	);

	$args = wp_parse_args( $args, $defaults );

	$output = '';

	$query_args = wp_array_slice_assoc( $args, array( 'orderby', 'order', 'number', 'exclude', 'include' ) );
	$query_args['fields'] = 'ids';
	$authors = get_users( $query_args );

	$author_count = array();
	foreach ( (array) $wpdb->get_results( "SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author" ) as $row ) {
		$author_count[$row->post_author] = $row->count;
	}
	$i=1;
	foreach ( $authors as $author_id ) {
		$user_right='';
		$author = get_userdata( $author_id );
		$user_email=$author->user_email;
		$user_link=get_author_posts_url( $author->ID, $author->user_nicename );
		$user_title=esc_attr( sprintf(__("Posts by %s"), $author->display_name) );
		$user_avatar='<div class="top_author_avatar">'.get_avatar( $user_email, $size = '56' , deel_avatar_default()).'</div>';
		$user_desc=get_the_author_meta('description',$author->ID);
		$user_label='<span class="label label-'.$i.'">'.$i.'</span>';
		$posts = isset( $author_count[$author->ID] ) ? $author_count[$author->ID] : 0;
		if($posts==0)
			continue;
		//$user_right='<div class="muted">第'.$i.'名：【'.$author->display_name.'】共发文：'.$posts.'篇<br/>';
		$user_right='<div class="top_author_span">'.$user_label.'【<a href="'.$user_link.'" title="'.$user_title.'">'.$author->display_name.'</a>】共发文：'.$posts.'篇<br/>';
		$user_right=$user_right.'个人说明：'.$user_desc.'</div>';

		$output = $output.'<li>'.'<div class="top_author_right"> '.$user_avatar/*.$user_label*/.$user_right.'<div class="clear"></div></div>';

		$i+=1;
	}
	return $output;

};
?>
