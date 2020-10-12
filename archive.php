<?php get_header(); ?>
<?php 
function wpdocs_custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 64 );
?>
<main role="main" aria-label="Content" class="container row">
	<div class="col-12">
	<?php $i = 0; if (have_posts()): while (have_posts()) : the_post(); $nr = $i++; ?>
			<hr />
			<article id="list-item-<?php echo $nr; ?> wow slideInUp" data-wow-duration="1s" data-wow-offset="200">
				<div class="article-bl-content">
					<a class="view-article" href="<?php the_permalink(); ?>">
						<div class="services-item"><?php the_post_thumbnail(array(380,254)); ?></div>
					</a>
					<h2><?php the_title(); ?></h2>
					<p class="s-desc"><?php echo wp_trim_words(strip_shortcodes(get_the_content(),140,'...')); ?><a class="view-article" href="<?php the_permalink(); ?>">Read more</a></p>
				</div>
			</article>
	<?php endwhile; ?>
	<div class="nav-pag"><?php get_template_part('pagination'); ?></div>
	<?php else: ?>	
		<h2><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h2>
	<?php endif; ?>
	</div>
</main>
<div style="clear:both"></div>
<?php get_footer(); ?>