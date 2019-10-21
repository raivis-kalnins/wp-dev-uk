<?php /* Template Name: Home Page TPL - PHP */ get_header();
    $custom_logo_id = get_theme_mod('custom_logo'); 
    $logo = wp_get_attachment_image_src($custom_logo_id,'full');
    $logo_alt = get_bloginfo('name');
?>
<section class="section full" id="home-slider">
    <div class="container full" <?php if ( has_header_image() ) { ?> class="custom-background section" style="background-image: url('<?php if(is_front_page()) { echo esc_url(get_header_image()); } ?>');" <?php } ?>>
        <img src="<?php echo $logo[0]; ?>" alt="Logo - <?php echo $logo_alt; ?>" class="logo-c" />    
        <h1><?php the_title(); ?></h1>
        <div class="owl-carousel">
            <?php
                for ($i = 1; $i <= 20; $i++) {
                    if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image0$i", NULL, "full"); endif;
                }
            ?>
        </div>
    </div>
</section>
<section class="section" id="sc1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <div class="description"><?php the_content(); ?></div>
                    <div class="about-img"></div>
                    <div class="about-img"></div>
                    <div class="about-img"></div>
                <?php endwhile; ?>
                <?php else: ?><h1><?php _e( 'Sorry, nothing to display.', 'devcoukblank' ); ?></h1><?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="section" id="sc2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
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