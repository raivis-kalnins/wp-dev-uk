<?php /* Template Name: Home Page TPL - PHP */ get_header(); ?>
<section class="section" id="sc1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
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