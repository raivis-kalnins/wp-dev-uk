<?php get_header(); ?>
<main role="main">
	<!-- section -->
	<section>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- post category -->
		<div class="single-testimonials-category"><?php echo get_the_category()[0]->name; ?></div>
	<!-- /post title -->	
		<!-- post thumbnail -->
		<div id="single-testimonials-img"><?php if (has_post_thumbnail()) : the_post_thumbnail($post_id, "full"); endif; ?>
			<!-- post title -->
	<h1><?php the_title(); ?></h1>
		</div>
		<!-- /post thumbnail -->
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<section class='post-content'>	
				<!-- post content -->	
				<div id="testimonials-post-content" class="brands-area">
					<?php the_content(); // Dynamic Content ?>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<!-- /post content --> 
			</section>
		</article>
		<!-- /article -->
	<?php endwhile; ?>
	<?php else: ?>
		<!-- article -->
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h1>
		</article>
		<!-- /article -->
	<?php endif; ?>
	</section>
	<!-- /section -->
</main>
<?php get_footer(); ?>