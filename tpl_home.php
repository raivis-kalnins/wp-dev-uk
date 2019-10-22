<?php /* Template Name: Home Page TPL - PHP */ get_header();
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
        <a class="btn button--orange btn-more" href="#services" title="Services">Read more</a>
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
        <a class="btn button--white btn-more" href="#clients" title="Clients">Read more</a>
    </div>
</section>
<section class="section white" id="sc3">
    <div class="container">
        <h2><?php the_field('clients_title'); ?></h2>
        <div class="row">
            <div class="col">
                
            </div>
        </div>
        <a class="btn button--orange btn-more" href="#news" title="News">Read more</a>
    </div>
</section>
<section class="section grey" id="sc4">
    <div class="container">
        <h2><?php the_field('news_title'); ?></h2>
        <div class="row">
            <div class="col">
                
            </div>
        </div>
        <a class="btn button--white btn-more" href="#location" title="Location">Read more</a>
    </div>
</section>
<section class="section white" id="sc5">
    <div class="container">
        <h2><?php the_field('location_title'); ?></h2>
        <div class="row">
            <div class="col">
                
            </div>
        </div>
        <a class="btn button--orange btn-more" href="#contact" title="Contact">Read more</a>
    </div>
</section>
<?php get_footer(); ?>