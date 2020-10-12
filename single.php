<?php
/*
 * Template Name: Default single post
 * Template Post Type: post, page, product
 */
?>

<?php get_header(); ?>
	<main role="main" aria-label="Content" class="container row">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" class="col-12">
				<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php the_post_thumbnail('large'); ?>
				<?php the_content(); ?>
				<div id="posts-pagination">
					<div class="prev"><?php previous_post_link( '%link', __( '&larr; %title', '' ) ); ?></div>
					<div class="next"><?php next_post_link( '%link', __( '%title &rarr;', '' ) ); ?></div>
				</div>
				<?php edit_post_link(); ?>
			</article>
		<?php endwhile; ?>
		<?php else: ?><h1><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h1><?php endif; ?>
	</main>
<?php get_footer(); ?>