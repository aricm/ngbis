<?php

if ( ! function_exists( 'ngbis_setup' ) ) :

    function ngbis_setup() {
        /**
         * Enable theme support features
         *
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/
         */
        add_theme_support( 'title-tag' );

        // add_theme_support( 'custom-header' );

        add_theme_support( 'post-thumbnails' );

        // add_theme_support( 'custom-background' );

        // add_theme_support( 'post-formats', array(
        //  'aside', 'image', 'video', 'quote', 'link', 'gallery',
        // ) );

        /**
         * Register navigation menus
         *
         * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
         */
        register_nav_menus( array( 'primary' => 'primary menu' ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

    } // end setup function
endif;
add_action( 'after_setup_theme', 'ngbis_setup' );

/**
 * Enqueue scripts and styles.
 */
function ngbis_scripts() {
    wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i"' );
    wp_enqueue_style( 'bootstrap', get_bloginfo('template_url') . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'fontawsome', get_bloginfo('template_url') . '/css/font-awesome.min.css' );
    wp_enqueue_style( 'ngstack-style', get_stylesheet_uri() );

    wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.min.js', array(), false, true );
    wp_enqueue_script( 'boostrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true );

}
add_action( 'wp_enqueue_scripts', 'ngbis_scripts' );


/********/

// remove <br> tags from text widget content, from 4.8 version WP adds these tags
remove_filter('widget_text_content', 'wpautop');

// Enable the use of shortcodes within widgets.
add_filter( 'widget_text', 'do_shortcode' );



/**
 * Register widgetized areas.
 *
 */
function ngbis_widget_init() {

    register_sidebar( array(
        'name'          => 'Page Sidebar',
        'id'            => 'page_sidebar_1',
        'before_widget' => '<div class="sb-widget-area">',
        'after_widget'  => '</div>'
    ) );

}
add_action( 'widgets_init', 'ngbis_widget_init' );

include(STYLESHEETPATH.'/admin/custom_shortcodes.php');
