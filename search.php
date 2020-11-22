<?php get_header(); ?>
	<main role="main" aria-label="Content">
		<section>
			<h1><?php echo sprintf( __( '%s Search Results for ', 'devcoukblank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
			<hr />
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>
<?php get_footer(); ?>