<?php  	
	ini_set('display_errors', 1); // debug PHP
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
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151333821-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-151333821-1');
		</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> id="root">
		<div class="scroller_header"><div id="scroll-line"></div></div>
		<header>
			<button id="m-nav"></button>
			<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo $logo[0]; ?>" alt="Logo - <?php echo $logo_alt; ?>" /></a>
			<?php if(is_front_page()) : ?>
				<nav class="main-menu-container"><?php main_nav(); // .mob-menu class respons ?></nav>
			<?php endif; ?>
			<a href="https://www.facebook.com/pg/OJ-Cars-1844906585770684/about/?ref=page_internal" class="soc fb" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
		</header>
		<div style="display:none" class="fancybox-hidden">
			<div id="enquiry-form">
				<span id="close-form"></span>
				<i>Your enquiry</i>
				<?php echo do_shortcode('[contact-form-7 id="254" title="Contact form EN"]');?>
			</div>
		</div>
		<div style="display:none" class="fancybox-hidden">
			<div id="callback-form">
				<span id="close-form"></span>
				<i>Callback</i>
				<?php echo do_shortcode('[contact-form-7 id="253" title="Callback EN"]');?>
				<input type="time" name="time" value="" id="callbacktime" class="form-control" placeholder="--:--" maxlength="5" onKeyPress="formatTime(this)" />
			</div>
		</div>
		<div id="l-btn">
			<ul>
				<li><a data-fancybox data-src="#enquiry-form" href="javascript:;" class="fancybox-inline btn"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
				<li><a data-fancybox data-src="#callback-form" href="javascript:;" class="fancybox-inline btn"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
				<li>
					<div class="btn-cart button cart-top">
						<i class="fa fa-shopping-cart modal-button" aria-hidden="true"></i>
						<button type="button" class="btn-cart button modal-button" data-toggle="modal" data-target="modal"><span class="total-count"></span></button>
						<button type="button"  class="clear-cart"></button>
					</div>
				</li>
			</ul>
		</div>
		<?php if(is_front_page()) : ?>
			<div id="fullpage"><?php //Start - Full page ?>
		<?php endif; ?>