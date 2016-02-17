<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php wp_title(waitig_gopt('waitig_delimiter'), true, 'right'); echo get_option('blogname'); if (is_home ()) echo waitig_gopt('waitig_delimiter') ,get_option('blogdescription'); if ($paged > 1) echo '-Page ', $paged; ?></title>
<?php
$sr_1 = 0; $sr_2 = 0; $commenton = 0; 
if( waitig_gopt('waitig_sideroll_en') ){ 
		$sr_1 = waitig_gopt('waitig_sideroll_1');
		$sr_2 = waitig_gopt('waitig_sideroll_2');
}
if( is_singular() ){ 
		if( comments_open() ) $commenton = 1;
}
?>
<script>
window._deel = {name: '<?php bloginfo('name') ?>',url: '<?php echo get_bloginfo("template_url") ?>', ajaxpager: '<?php echo waitig_gopt('waitig_ajaxpager_en') ?>', commenton: <?php echo $commenton ?>, roll: [<?php echo $sr_1 ?>,<?php echo $sr_2 ?>]}
<?php 
if(waitig_gopt("waitig_cdnurl")) 
{?>
	_deel.url = _deel.url.replace('<?php echo waitig_gopt("waitig_cdnurl"); ?>','<?php echo get_bloginfo("url"); ?>');
<?php }?>
</script>


<?php 
wp_head(); 
if( waitig_gopt('waitig_headcode') ) echo waitig_gopt('waitig_headcode'); ?>
<script src="<?php echo get_bloginfo("template_url") ?>/js/jquery.easing.js" type="text/javascript"></script>
<script src="<?php echo get_bloginfo("template_url") ?>/js/studio.js?ver=1.0.5" type="text/javascript"></script>
<script src="<?php echo get_bloginfo("template_url") ?>/js/wait.js?ver=1.0.4" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url');?>/css/csshake.min.css"></link>
<link rel="shortcut icon" href="<?php echo get_bloginfo("template_url") ?>/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url'); if(waitig_gopt('waitig_colorful_en')){ echo '/css/colorful.css?ver=1.0.1';} else{ echo '/css/simple.css?ver=1.1.4';} ?>">
<!--[if IE 9]><script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script><![endif]-->
<?php //require_once(get_stylesheet_directory()."/user/user-head.php"); ?>
</head>
<body <?php body_class(); ?>>

<header id="header" class="header">
<style type="text/css">
<?php
get_styles();
?>
</style>
	<div id="nav-header" class="navbar border-box">

		<ul class="nav">
		<?php if(waitig_gopt('waitig_nav_img')){?><div class="nav-img"><a href="<?php echo home_url('/'); ?>"><img src="<?php echo waitig_gopt('waitig_nav_img'); ?>" alt="<?php bloginfo('name'); ?>"/> </div></a> <?php }?>
			<?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'nav', 'echo' => false)) )); ?>
<div class="nav-right">
<?php if(waitig_gopt('waitig_nav_link')){?><div class="nav-right-link"><?php echo waitig_gopt('waitig_nav_link'); ?></div><?php }?>
					<div class="toggle-search"><i class="fa fa-search"></i></div>
<div class="search-expand" style="display: none;"><div class="search-expand-inner"><form method="get" class="searchform themeform" onsubmit="location.href='<?php echo home_url('/search/'); ?>' + encodeURIComponent(this.s.value).replace(/%20/g, '+'); return false;" action="/"><div> <input type="ext" class="search" name="s" onblur="if(this.value=='')this.value='search...';" onfocus="if(this.value=='search...')this.value='';" value="search..."></div></form></div></div>
</div>
		</ul>
	</div>
<div class="container-inner border-box">
 <div class="wait-logo">
	<a href="<?php echo home_url('/'); ?>">
	<span class="wait-mono">
<?php if(waitig_gopt('waitig_logo_type')=='waitig_logo_pic'){ ?>
<img src="<?php echo waitig_gopt('waitig_logo_url'); ?>" alt="<?php bloginfo('name'); ?>">
<?php }else{ 
bloginfo('name');} 
?></span><span class="wait-bloger"><?php bloginfo('description'); ?></span>
	</a>
 </div>
 <div class="nav-ad">
	<?php if(!wp_is_mobile()) echo waitig_gopt('waitig_nav_ad'); ?>
 </div>
<div class="clear"></div>
</div>
</header>
<section class="container"><div class="speedbar border-box">
<?php 
		if( waitig_gopt('waitig_sign_en') ){ 
				global $current_user; 
				get_currentuserinfo();
				$uid = $current_user->ID;
				$u_name = get_user_meta($uid,'nickname',true);
?>
			<div class="pull-right">
				<?php if(is_user_logged_in()){echo '<i class="fa fa-user"></i> '.$u_name.' &nbsp; '; echo ' &nbsp; &nbsp; <i class="fa fa-power-off"></i> ';}else{echo '<i class="fa fa-user"></i> ';}; wp_loginout(); ?>
			</div>
		<?php } ?>
		<div class="toptip"><strong class="text-success" style="float:left"><i class="fa fa-volume-up"></i> </strong><div id="news" style="float:left">
		 <ul id="topNotice" onmouseout="gstart()" onmouseover="gstop()" style="margin-left:15px"><?php echo waitig_gopt('waitig_tui'); ?></ul></div></div>
	</div>
	<?php if( waitig_gopt('waitig_adsite_01') ) echo '<div class="banner banner-site">'.waitig_gopt('waitig_adsite_01').'</div>'; ?>
<?php if( waitig_gopt('waitig_adsite_02') ) echo '<div class="banner banner-site"`>'.waitig_gopt('waitig_adsite_02').'</div>'; ?>
