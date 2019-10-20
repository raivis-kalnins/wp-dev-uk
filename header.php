<?php  	
	ini_set('display_errors', 1); // Insert this debug code before require statement. require_once 'assets/detectdevice/detect.php'; 
	$custom_logo_id = get_theme_mod('custom_logo'); 
	$logo = wp_get_attachment_image_src($custom_logo_id,'full');
	$logo_alt = get_bloginfo('name');
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/i/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/i/touch.png" rel="apple-touch-icon-precomposed">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> id="root">
		<header>
			<div class="logo"><img src="<?php echo $logo[0]; ?>" alt="Logo - <?php echo $logo_alt; ?>" /></div>
			<div class="menu-main-menu-container"></div>
			<div class="soc fb"><a href="#"><i class="fa fa-facebook fa-2x"></i></a></div>
		</header>
		<div id="fullpage"><?php //Full page Begin ?>