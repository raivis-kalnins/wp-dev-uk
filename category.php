<?php get_header(); ?>
	<main role="main" aria-label="Content">
		<section>
			<h1><?php _e( 'Category: ', 'devcoukblank' ); single_cat_title(); ?></h1>
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>
<?php get_footer(); ?>