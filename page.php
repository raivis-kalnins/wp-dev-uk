<?php get_header(); ?>
	<main role="main" aria-label="Content">
		<!-- section -->
		<section>
			<div class="h1-wrap"><h1><?php the_title(); ?></h1></div>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div><?php the_content(); ?></div>
				<br class="clear">
				<?php edit_post_link(); ?>
			</article>
			<!-- /article -->
		<?php endwhile; ?>

		<?php else: ?>
			<!-- article -->
			<article>
				<h2><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h2>
			</article>
			<!-- /article -->
		<?php endif; ?>
		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>