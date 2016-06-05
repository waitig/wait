<?php
require( dirname(__FILE__).'/../../../../wp-load.php' );

if( !waitig_gopt('waitig_tougao_en') ) die('off');

global $wpdb;
$last_post = $wpdb->get_var("SELECT post_date FROM $wpdb->posts WHERE post_type = 'post' ORDER BY post_date DESC LIMIT 1");

if ( current_time('timestamp') - strtotime($last_post) < (waitig_gopt('waitig_tougao_time')?waitig_gopt('waitig_tougao_time'):240) ){
    die('sofast');
}

$title =  check_chart( $_POST['title'] );
$url =  check_chart( $_POST['url'] );
//$content =  check_chart( $_POST['content'] );
$content = isset( $_POST['content'] ) ? trim($_POST['content']):'';
$category =  isset( $_POST['category'] ) ? (int)$_POST['category'] : 0;

if ( empty($title) || mb_strlen($title) > 100 ) {
    die('title');
}

if ( mb_strlen($url) > 100 ) {
    die('url');
}

if ( empty($content) || mb_strlen($content) > 5000 || mb_strlen($content) < 20) {
    die('content');
}


if( $url ) $url = '<p>来源：<a href="'.$url.'" target="_blank">'.$url.'</a></p>';

$post_content = $content.$url;

$submit = array(
    'post_title' => $title,
    'post_author' => 1,
    'post_content' => $post_content,
    'post_category' => array($category)
);

$status = wp_insert_post( $submit );
if ($status != 0) { 
    if( waitig_gopt('waitig_tougao_mailto') ) wp_mail(waitig_gopt('waitig_tougao_mailto'), "站长，有新投稿啦！ ".$title, $post_content);
    die('success');
}else{
    die('fail');
}

function check_chart($t){
    return isset( $t ) ? trim(htmlspecialchars($t, ENT_QUOTES)) : '';
}

?>
