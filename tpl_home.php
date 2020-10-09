<?php /* Template Name: Home Page TPL - PHP */ 
	get_header();
	$custom_logo_id = get_theme_mod('custom_logo'); 
	$logo = wp_get_attachment_image_src($custom_logo_id,'full');
	$logo_alt = get_bloginfo('name');
	$img = file_get_contents($logo[0]);
	$data = base64_encode($img);
?>
<section class="section full" id="home-slider">
	<div class="container full" <?php if ( has_header_image() ) { ?> class="custom-background section" style="background-image: url('<?php if(is_front_page()) { echo esc_url(get_header_image()); } ?>');" <?php } ?>>
		<img data-src="data:image/png+xml;base64,<?php echo $data; ?>" alt="Logo - <?php echo $logo_alt; ?>" class="logo-c lazyload fadeIn delay-025" />
		<h1><?php the_title(); ?></h1>
		<div class="owl-carousel owl-intro">
			<?php
				for ($i = 1; $i <= 7; $i++) {
					if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image0$i", NULL, "full"); endif;
				}
			?>
		</div>
		<a class="btn button--white btn-more btn-sl fadeIn delay-025" href="#about" title="About">Read more</a>
	</div>
</section>
<section class="section white" id="sc1">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<div class="description"><?php the_content(); ?></div>
				<?php endwhile; ?>
				<?php else: ?><h1><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h1><?php endif; ?>
			</div>
			<div class="col-12 col-sm-12 col-md-6">
				<div class="about-img animated fadeIn" style=""><img data-src="<?php if ( wp_is_mobile() ) { echo the_post_thumbnail_url(null, "small"); } else { echo the_post_thumbnail_url(null, "full"); } ?>" alt=""  class="lazyload" /></div>
			</div>
		</div>
		<a class="btn button--orange btn-more btn-about" href="#services" title="Services">Services</a>
	</div>
</section>
<section class="section grey" id="sc2">
	<div class="container">
		<h2><?php the_field('about_title'); ?></h2>
		<?php if( have_rows('services') ): ?>
			<div class="row d-flex justify-content-center">
				<?php while( have_rows('services') ): the_row(); 
					// vars
					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$link = get_sub_field('link');
					?>
					<div class="col-12 col-sm-12 col-md-4 col-lg-2">
						<?php if( $link ): ?>
							<a href="<?php echo $link; ?>">
						<?php endif; ?>
						<?php 
							$img_i = file_get_contents($image['url']);
							$data_i = base64_encode($img_i);
						?>
							<div style="background: url('data:image/svg+xml;base64,<?php echo $data_i; ?>') center / cover no-repeat"></div>
							<h3><?php echo $title; ?></h3>
						<?php if( $link ): ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<a class="btn button--white btn-more" href="#shop" title="Shop">Store</a>
	</div>
</section>
<section class="section white" id="sc3">
	<div class="container">
		<h2><?php the_field('shop_title'); ?></h2>
		<div class="row">
			<div class="col">
				
			</div>
		</div>
		<a class="btn button--orange btn-more" href="#clients" title="Clients">Clients</a>
	</div>
</section>
<section class="section grey" id="sc4">
	<div class="container">
		<h2><?php the_field('clients_title'); ?></h2>
		<div class="btn-center">
			<a href="https://search.google.com/local/writereview?placeid=ChIJSxhKTWFLd0gR-uE29aMpzGU" target="_blank" class="btn button--white">write review</a>
			<a href="https://search.google.com/local/reviews?placeid=ChIJSxhKTWFLd0gR-uE29aMpzGU" target="_blank" class="btn button--white">more reviews</a>
		</div>
		<div class="row owl-carousel owl-clients">
			<?php
				$args_clients = array( 'post_type' => 'clients', 'posts_per_page' => 3 );
				$loop_clients = new WP_Query( $args_clients );
				if ( have_posts() ) :
					while ( $loop_clients->have_posts() ) : $loop_clients->the_post();
			?>
			<div class="post-item col-12">
				<div class="quote">
					<i class="fa fa-quote-right" aria-hidden="true"></i>
					<?php the_content(); ?>
					<p class="cust">&nbsp;<?php esc_html_e( get_the_title(), 55 ); ?></p>
				</div>
			</div>
			<?php 
				endwhile;
				wp_reset_query();
				endif;
			?>
		</div>
		<a class="btn button--white btn-more" href="#news" title="News">News</a>
	</div>
</section>
<section class="section grey-light" id="sc5">
	<div class="container">
		<h2><?php the_field('news_title'); ?></h2>
		<div class="row owl-carousel owl-carousel-posts">
			<?php
			function wpdocs_custom_excerpt_length( $length ) { return 10; }
			add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 32 );
			$args = array( 'post_type' => 'post' );
			$loop = new WP_Query($args); 
			while ($loop->have_posts()): $loop->the_post(); ?>
				<div class="post-item col">
					<a href="<?php the_permalink(); ?>" class="item--img"><?php the_post_thumbnail(); ?></a>
					<a href="<?php the_permalink(); ?>" class="item--title"><h3><?php the_title();?></h3></a>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
		<a class="btn button--orange btn-more" href="#image-gallery" title="Gallery">Gallery</a>
	</div>
</section>
<section class="section grey" id="sc6">
	<div class="container">
		<h2><?php the_field('gallery_title'); ?></h2>
		<div id="photo-gallery" class="row owl-carousel owl-carousel-gallery">
			<?php 
				$images = get_field('gallery');
				if( $images ): ?>
					<?php foreach( $images as $image ): ?>
						<div class="col item">
							<a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery">
								<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							</a>
							<p><?php echo esc_html($image['caption']); ?></p>
					</div>
						<?php endforeach; ?>
				<?php endif; ?>
		</div>
		<a class="btn button--white btn-more" href="#location" title="Location">Find Us</a>
	</div>
</section>
<section class="section white" id="sc7">
	<div class="container">
		<h2><?php the_field('location_title'); ?></h2>
		<div class="row">
			<div class="col">
			<div id="gmap_ojcars"></div>
			<div id="address_ojcars"><?php the_field('address'); ?></div>
			</div>
		</div>
		<a class="btn button--orange btn-more" href="#contact" title="Contact">Contact Us</a>
	</div>
</section>
<?php get_footer(); ?>