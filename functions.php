<?php
    /*  Custom functions, support, custom post types and more. */
    require_once "modules/is-debug.php";
    /*------------------------------------*\
        Theme Support
    \*------------------------------------*/
    if (!isset($content_width)) {
        $content_width = 900;
    }
    if (function_exists('add_theme_support')) {
        // Add Thumbnail Theme Support
        add_theme_support('post-thumbnails');
        add_image_size('large', 700, '', true); // Large Thumbnail
        add_image_size('medium', 250, '', true); // Medium Thumbnail
        add_image_size('small', 120, '', true); // Small Thumbnail
        add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
        // Add Support for Custom Header - Uncomment below if you're going to use
        add_theme_support('custom-header', array(
            //'default-image'          => get_template_directory_uri() . '/assets/img/bg/bg.jpg',
            'header-text'            => false,
            'default-text-color'     => 'fff',
            'width'                  => 1920,
            'height'                 => 1080,
            'random-default'         => true,
            'wp-head-callback'       => $wphead_cb,
            'admin-head-callback'    => $adminhead_cb,
            'admin-preview-callback' => $adminpreview_cb
        ));
        // Enables post and comment RSS feed links to head
        add_theme_support('automatic-feed-links');
        // Enable devcouk support
        add_theme_support('devcouk', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
        // Localisation Support
        load_theme_textdomain('devcoukblank', get_template_directory() . '/languages');
    }
    /*------------------------------------*\
        Functions
    \*------------------------------------*/
    add_theme_support( 'custom-logo' );
    add_theme_support( 'custom-logo', array(
        'height'      => 70,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ));
    // devcouk Blank navigation
    function main_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
            )
        );
    }
    function sidebar_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'sidebar-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
            )
        );
    }
    function footer_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'footer-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
            )
        );
    }
    // Load devcouk Blank styles (header.php)
    function devcoukblank_styles() {
        if (devcouk_DEBUG) {
            wp_register_style('devcoukblank', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
            wp_enqueue_style('devcoukblank'); // Enqueue it!
        } else {
            // Custom CSS
            wp_register_style('devcoukblankcssmin', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
            // Register CSS
            wp_enqueue_style('devcoukblankcssmin');
        }
    }
    // Load devcouk Blank scripts (footer.php)
    function devcoukblank_footer_scripts() {
        if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            if (devcouk_DEBUG) {
                wp_register_script('gmaps','https://maps.googleapis.com/maps/api/js?key=AIzaSyAIzn4jDmtS-gvSR3TwREr6mmVAkF-NwvQ&region=GB');
                wp_enqueue_script('gmaps'); // Enqueue it!

                wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.2'); // Gulp scripts
                wp_enqueue_script('scripts'); // Enqueue it!
            }
        }
    }
    // Register devcouk Blank Navigation
    function register_devcouk_menu() {
        register_nav_menus(array( // Using array to specify more menus if needed
            'header-menu' => __('Header Menu', 'devcoukblank'), // Main Navigation
            'sidebar-menu' => __('Sidebar Menu', 'devcoukblank'), // Sidebar Navigation
            'footer-menu' => __('Footer Menu', 'devcoukblank') // Extra Navigation if needed (duplicate as many as you need!)
        ));
    }
    // Remove the <div> surrounding the dynamic navigation to cleanup markup
    function my_wp_nav_menu_args($args = '') {
        $args['container'] = false;
        return $args;
    }
    // Remove Injected classes, ID's and Page ID's from Navigation <li> items
    function my_css_attributes_filter($var) {
        return is_array($var) ? array() : '';
    }
    // Remove invalid rel attribute values in the categorylist
    function remove_category_rel_from_category_list($thelist) {
        return str_replace('rel="category tag"', 'rel="tag"', $thelist);
    }
    // Add page slug to body class, love this - Credit: Starkers Wordpress Theme
    function add_slug_to_body_class($classes) {
        global $post;
        if (is_home()) {
            $key = array_search('blog', $classes);
            if ($key > -1) {
                unset($classes[$key]);
            }
        } elseif (is_page()) {
            $classes[] = sanitize_html_class($post->post_name);
        } elseif (is_singular()) {
            $classes[] = sanitize_html_class($post->post_name);
        }
        return $classes;
    }
    // Remove the width and height attributes from inserted images
    function remove_width_attribute( $html ) {
        $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
        return $html;
    }
    // If Dynamic Sidebar Exists
    if (function_exists('register_sidebar')) {
        // Define Sidebar Widget Area 1
        register_sidebar(array(
            'name' => __('Homepage', 'devcoukblank'),
            'description' => __('Description for this widget-area...', 'devcoukblank'),
            'id' => 'widget-area-1',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
        // Define Sidebar Widget Area 2
        register_sidebar(array(
            'name' => __('Footer', 'devcoukblank'),
            'description' => __('Description for this widget-area...', 'devcoukblank'),
            'id' => 'widget-area-2',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
        // Define Sidebar Widget Area 3
        register_sidebar(array(
            'name' => __('Custom widgets', 'devcoukblank'),
            'description' => __('Widgets for single posts', 'devcoukblank'),
            'id' => 'widget-area-3',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
    }
    // Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
    function devcoukwp_pagination() {
        global $wp_query;
        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
    }
    // Custom Excerpts - create 20 Word Callback for Index page Excerpts, call using devcoukwp_excerpt('devcoukwp_index');
    function devcoukwp_index($length) { 
        return 20;
    }
    // Create 40 Word Callback for Custom Post Excerpts, call using devcoukwp_excerpt('devcoukwp_custom_post');
    function devcoukwp_custom_post($length) {
        return 40;
    }
    // Create the Custom Excerpts callback
    function devcoukwp_excerpt($length_callback = '', $more_callback = '') {
        global $post;
        if (function_exists($length_callback)) {
            add_filter('excerpt_length', $length_callback);
        }
        if (function_exists($more_callback)) {
            add_filter('excerpt_more', $more_callback);
        }
        $output = get_the_excerpt();
        $output = apply_filters('wptexturize', $output);
        $output = apply_filters('convert_chars', $output);
        $output = '<p>' . $output . '</p>';
        echo $output;
    }
    // Custom View Article link to Post
    function devcouk_blank_view_article($more) {
        global $post;
        return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'devcoukblank') . '</a>';
    }
    // Remove Admin bar
    function remove_admin_bar() {
        return false;
    }
    // Remove 'text/css' from our enqueued stylesheet
    function devcouk_style_remove($tag) {
        return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
    }
    // Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
    function remove_thumbnail_dimensions( $html ) {
        $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
        return $html;
    }
    // Custom Gravatar in Settings > Discussion
    function devcoukblankgravatar ($avatar_defaults) {
        $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
        $avatar_defaults[$myavatar] = "Custom Gravatar";
        return $avatar_defaults;
    }
    /*------------------------------------*\
        Actions + Filters + ShortCodes
    \*------------------------------------*/
    // Add Actions
    add_action('wp_footer', 'devcoukblank_footer_scripts'); // Add Custom Scripts to wp_footer
    add_action('wp_enqueue_scripts', 'devcoukblank_styles'); // Add Theme Stylesheet
    add_action('init', 'register_devcouk_menu'); // Add devcouk Blank Menu
    add_action('init', 'create_post_type_service'); // Add our finance Blank Custom Post Type
    add_action('init', 'create_post_type_clients'); // Add our clients Blank Custom Post Type
    add_action('init', 'devcoukwp_pagination'); // Add our devcouk Pagination
    // Remove Actions
    remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
    remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action('wp_head', 'rel_canonical');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    // Add Filters
    add_filter('avatar_defaults', 'devcoukblankgravatar'); // Custom Gravatar in Settings > Discussion
    add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
    add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
    add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
    add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
    add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
    add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
    add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
    add_filter('excerpt_more', 'devcouk_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
    add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
    add_filter('style_loader_tag', 'devcouk_style_remove'); // Remove 'text/css' from enqueued stylesheet
    add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
    add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
    add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
    // Remove Filters
    remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether
    // Shortcodes above would be nested like this -
    // [devcouk_shortcode_demo] [devcouk_shortcode_demo_2] Here's the page title! [/devcouk_shortcode_demo_2] [/devcouk_shortcode_demo]
    /*------------------------------------*\
        Custom Post Types
    \*------------------------------------*/
    // Create 1 Custom Post type Service
    function create_post_type_service() {
        register_taxonomy_for_object_type('category', 'service'); // Register Taxonomies for Category
        register_taxonomy_for_object_type('post_tag', 'service');
        register_post_type('service', // Register Custom Post Type
            array(
            'labels' => array(
                'name' => __('Services', 'devcoukblank'), // Rename these to suit
                'singular_name' => __('service', 'devcoukblank'),
                'add_new' => __('Add New', 'devcoukblank'),
                'add_new_item' => __('Add New service Post', 'devcoukblank'),
                'edit' => __('Edit', 'devcoukblank'),
                'edit_item' => __('Edit service Post', 'devcoukblank'),
                'new_item' => __('New service Post', 'devcoukblank'),
                'view' => __('View service Post', 'devcoukblank'),
                'view_item' => __('View service Post', 'devcoukblank'),
                'search_items' => __('Search service Post', 'devcoukblank'),
                'not_found' => __('No service Posts found', 'devcoukblank'),
                'not_found_in_trash' => __('No service Posts found in Trash', 'devcoukblank')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom devcouk Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
    }
    // Create 2 Custom Post type Clients
    function create_post_type_clients() {
        register_taxonomy_for_object_type('category', 'clients'); // Register Taxonomies for Category
        register_taxonomy_for_object_type('post_tag', 'clients');
        register_post_type('clients', // Register Custom Post Type
            array(
            'labels' => array(
                'name' => __('Clients', 'devcoukblank'), // Rename these to suit
                'singular_name' => __('Clients', 'devcoukblank'),
                'add_new' => __('Add New', 'devcoukblank'),
                'add_new_item' => __('Add New Clients Post', 'devcoukblank'),
                'edit' => __('Edit', 'devcoukblank'),
                'edit_item' => __('Edit Clients Post', 'devcoukblank'),
                'new_item' => __('New Clients Post', 'devcoukblank'),
                'view' => __('View Clients Post', 'devcoukblank'),
                'view_item' => __('View Clients Post', 'devcoukblank'),
                'search_items' => __('Search Clients Post', 'devcoukblank'),
                'not_found' => __('No Clients Posts found', 'devcoukblank'),
                'not_found_in_trash' => __('No Clients Posts found in Trash', 'devcoukblank')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom devcouk Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
    }
    // Add Photo Gallery image
    if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(array('label' => 'Image1','id' => 'image1','class' => 'image1','post_type' => 'page'));
        new MultiPostThumbnails(array('label' => 'Image2','id' => 'image2','class' => 'image2','post_type' => 'page'));
        new MultiPostThumbnails(array('label' => 'Image3','id' => 'image3','class' => 'image3','post_type' => 'page'));
        new MultiPostThumbnails(array('label' => 'Image4','id' => 'image4','class' => 'image4','post_type' => 'page'));
        new MultiPostThumbnails(array('label' => 'Image5','id' => 'image5','class' => 'image5','post_type' => 'page'));
        new MultiPostThumbnails(array('label' => 'Image6','id' => 'image6','class' => 'image6','post_type' => 'page'));
        new MultiPostThumbnails(array('label' => 'Image7','id' => 'image7','class' => 'image7','post_type' => 'page'));
    }
    // REMOVE WP EMOJI
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
?>