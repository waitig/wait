<?php  
add_action( 'widgets_init', 'd_text' );

function d_text() {
	register_widget( 'd_text' );
}

class d_text extends WP_Widget {
	function d_text() {
		$widget_ops = array( 'classname' => 'd_textbanner', 'description' => '显示任意HTML文本' );
		$this->WP_Widget( 'd_text', 'wait-文本', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_name', $instance['title']);
		$content = $instance['content'];
		$link = $instance['link'];
		$blank = $instance['blank'];

		$lank = '';
		if( $blank ) $lank = ' target="_blank"';
		if( $more!='' && $link!='' ) $mo='<a class="btn" href="'.$link.'">'.$more.'</a>';
		echo $before_widget;
		echo '<div class="title"><h2>'.$title.'</h2></div>';
		echo '<div class="content">'.$content.'</div><div class="clear"></div>';
		echo $after_widget;
	}

	function form($instance) {
?>
		<p>
			<label>
				标题：
				<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" class="widefat" />
			</label>
		</p>
		<p>
			<label>
				内容：
				<textarea id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" class="widefat" rows="3"><?php echo $instance['content']; ?></textarea>
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
		<p>
			<label>
				<input style="vertical-align:-3px;margin-right:4px;" class="checkbox" type="checkbox" <?php checked( $instance['blank'], 'on' ); ?> id="<?php echo $this->get_field_id('blank'); ?>" name="<?php echo $this->get_field_name('blank'); ?>">新打开浏览器窗口
			</label>
		</p>
<?php
	}
}

?>
