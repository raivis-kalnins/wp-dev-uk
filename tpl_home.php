<?php /* Template Name: Home Page TPL - PHP */ get_header();
    $custom_logo_id = get_theme_mod('custom_logo'); 
    $logo = wp_get_attachment_image_src($custom_logo_id,'full');
    $logo_alt = get_bloginfo('name');
    $img = file_get_contents($logo[0]);
    $data = base64_encode($img);
?>
<section class="section full" id="home-slider">
    <div class="container full" <?php if ( has_header_image() ) { ?> class="custom-background section" style="background-image: url('<?php if(is_front_page()) { echo esc_url(get_header_image()); } ?>');" <?php } ?>>
        <img data-src="data:image/png+xml;base64,<?php echo $data; ?>" alt="Logo - <?php echo $logo_alt; ?>" class="logo-c lazyload" />
        <h1><?php the_title(); ?></h1>
        <div class="owl-carousel">
            <?php
                for ($i = 1; $i <= 7; $i++) {
                    if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image0$i", NULL, "full"); endif;
                }
            ?>
        </div>
        <a class="btn button--white btn-more btn-sl" href="#about" title="About">Read more</a>
    </div>
</section>
<section class="section" id="sc1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <div class="description"><?php the_content(); ?></div>
                <?php endwhile; ?>
                <?php else: ?><h1><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h1><?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="about-img animated fadeIn"><img data-src="<?php if ( wp_is_mobile() ) { echo the_post_thumbnail_url(null, "small"); } else { echo the_post_thumbnail_url(null, "full"); } ?>" alt=""  class="lazyload" /></div>
            </div>
        </div>
    </div>
</section>
<section class="section" id="sc2">
    <div class="container">
        <?php if( have_rows('services') ): ?>
            <div class="row">
                <h2><?php the_field('about_title'); ?></h2>
                <?php while( have_rows('services') ): the_row(); 
                    // vars
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
                    ?>
                    <div class="col-md-4">
                        <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>">
                        <?php endif; ?>
                            <img data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="lazyload" />
                        <?php if( $link ): ?>
                            </a>
                        <?php endif; ?>
                        <?php echo $title; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="section" id="sc3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</section>
<section class="section" id="sc4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</section>
<section class="section" id="sc5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>