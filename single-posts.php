<?php
/*
 * Template Name: Custom single post
 * Template Post Type: post, page, product
 */
?>

<?php get_header(); ?>
	<main role="main" aria-label="Content">
	<section>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
				<? /*
				<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_title(); ?> </a></h1>
				<ul class="post-attr">
					<li class="date"><?php the_date('d/m/Y'); ?></li>
					<li class="category"><?php the_category(', '); ?></li>
					<li class="category"><?php echo get_the_author(); ?></li>
				</ul>
				<?php the_post_thumbnail('large'); */ ?>
				
				<?php the_content(); ?>
				<?php get_sidebar(); ?>
				
				<div id="posts-pagination">
					<div class="prev"><?php previous_post_link( '%link', __( '&larr; %title', '' ) ); ?></div>
					<div class="next"><?php next_post_link( '%link', __( '%title &rarr;', '' ) ); ?></div>
				</div>
		
				<?php edit_post_link(); ?>
			</article>
		<?php endwhile; ?>
		<?php else: ?><h1><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h1><?php endif; ?>
	</section>
	</main>
<?php get_footer(); ?>