<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="360-site-verification" content="a4c8021896c8ab798a98295823e921ba" />
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php wp_title(waitig_gopt('waitig_delimiter'), true, 'right'); echo get_option('blogname'); if (is_home ()) echo '_' ,get_option('blogdescription'); if ($paged > 1) echo '-Page ', $paged; ?></title>
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
</script>


<?php 
wp_head(); 
if( waitig_gopt('waitig_headcode') ) echo waitig_gopt('waitig_headcode'); ?>
<script src="<?php echo get_bloginfo("template_url") ?>/js/jquery.easing.js" type="text/javascript"></script>
<script src="<?php echo get_bloginfo("template_url") ?>/js/studio.js" type="text/javascript"></script>

<!--[if lt IE 9]><script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script><![endif]-->
</head>
<body <?php body_class(); ?>>

<header id="header" class="header">
<div class="container-inner">
 <div class="yusi-logo">
                    <a href="/">
                        <h1>
                                                        <span class="yusi-mono"><?php bloginfo('name'); ?></span>
                                                        <span class="yusi-bloger"><?php bloginfo('description'); ?></span>
                                                    </h1>
                    </a>
    </div>
</div>
<?php
if (waitig_gopt('waitig_tmnav')) 
{
		$tran=waitig_gopt('waitig_nav_tran');
		$color_R=waitig_gopt('waitig_nav_color_r');
		$color_G=waitig_gopt('waitig_nav_color_g');
		$color_B=waitig_gopt('waitig_nav_color_b');		
	echo '<style type="text/css">#nav-header{background-color: rgba('.$color_R.','.$color_G.','.$color_B.', '.$tran.');background: rgba('.$color_R.','.$color_G.','.$color_B.', '.$tran.');color: rgba('.$color_R.','.$color_G.','.$color_B.', '.$tran.');}</style>';
}?>

	<div id="nav-header" class="navbar">
		
		<ul class="nav">
			<?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'nav', 'echo' => false)) )); ?>
<li style="float:right;">
                    <div class="toggle-search"><i class="fa fa-search"></i></div>
<div class="search-expand" style="display: none;"><div class="search-expand-inner"><form method="get" class="searchform themeform" onsubmit="location.href='<?php echo home_url('/search/'); ?>' + encodeURIComponent(this.s.value).replace(/%20/g, '+'); return false;" action="/"><div> <input type="ext" class="search" name="s" onblur="if(this.value=='')this.value='search...';" onfocus="if(this.value=='search...')this.value='';" value="search..."></div></form></div></div>
</li>
		</ul>
	</div>
	</div>
</header>
<section class="container"><div class="speedbar">
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
		<div class="toptip"><strong class="text-success"><i class="fa fa-volume-up"></i> </strong> <?php echo waitig_gopt('waitig_tui'); ?></div>
	</div>
	<?php if( waitig_gopt('waitig_adsite_01') ) echo '<div class="banner banner-site">'.waitig_gopt('waitig_adsite_01').'</div>'; ?>
<?php if( waitig_gopt('waitig_adsite_02') ) echo '<div class="banner banner-site">'.waitig_gopt('waitig_adsite_02').'</div>'; ?>
