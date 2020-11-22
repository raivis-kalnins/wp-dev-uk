<?php /* Template Name:Services Template */ 
	get_header();
	$paged = get_query_var('page') ? get_query_var('page') : 1;
	query_posts(array( 'post_type' => 'post', 'paged' => $paged));
	query_posts(array( 
		'post_type' => 'services', // only blog services pages
		'showposts' => 16,
		'paged' => $paged
	));
?>

<div class="title-area">
	<h2>services</h2>
</div>
<?php 
function wpdocs_custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 64 );
?>
<div id="blog-services-list" class="animatedParent animateOnce"  data-sequence="250" data-appear-top-offset="-50">
	<div class="bg-gray light area-page-g">
		<section class="area-list loop animated fadeInUpShort go" data-id="2">
			<?php $i = 0; if (have_posts()): while (have_posts()) : the_post(); $nr = $i++; ?>
					<article id="list-item-<?php echo $nr; ?> wow slideInUp" data-wow-duration="1s" data-wow-offset="200">
						<div class="article-bl-content">
							<a class="view-article" href="<?php the_permalink(); ?>">
								<div class="services-item"><?php the_post_thumbnail(array(380,254)); ?></div>
							</a>
							<h2><?php the_title(); ?></h2>
							<p class="s-desc"><?php echo wp_trim_words(strip_shortcodes(get_the_content(),140,'...')); ?><a class="view-article" href="<?php the_permalink(); ?>">Read more</a></p>
						</div>
<!-- 						<span class="blog-brands-date"><?php// echo get_the_date('d.m.Y');?></span> -->
					</article>
			<?php endwhile; ?>
			<div class="nav-pag"><?php get_template_part('pagination'); ?></div>
			<?php else: ?>	
		<h2><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h2>
		<?php endif; ?>
			
	</section>	
	</div>
</div>
<div style="clear:both"></div>
<?php get_footer(); ?>