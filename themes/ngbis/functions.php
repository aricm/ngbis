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



/**
 * SHORTCODES
 *
 */

//Remove empty paragraphs
function noParagraphs($content){
    if ( '</p>' == substr( $content, 0, 4 ) && '<p>' == substr( $content, strlen( $content ) - 3 ) ){
        $content = substr( $content, 4, strlen( $content ) - 7 );
    }
    return $content;
}

// Container
function nga_container($atts,$content){
    extract( shortcode_atts( array(
        'class'      => '',
        'innerclass' => ''
    ), $atts ) );

    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = noParagraphs($content);

    $return = '';
    $return .= '<div class="' .  $class . '">';
    $return .= '<div class="' .  $innerclass . '">';
    $return .= force_balance_tags($content);
    $return .= '</div></div>';
    return $return;
}
add_shortcode('container','nga_container');


function nga_button($atts,$content){
    extract( shortcode_atts( array(
        'class'         => '',
        'style'         => 'primary',
        'link'          => '',
        'target'        => '',
        'selector'      => 'a',
        'icon'          => ''
    ), $atts ) );


    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = noParagraphs($content);

    $return = '';

    $return .= '<'.$selector.' '.(($link != '')?"href='".$link."'" : "").' '.(($selector == 'button')?"type=\"button\"":"").' class="btn btn-'.$style.' '.$class.'" role="button"'.(($target != '')?"data-target='".$target."'" : "").'>'.$content.(!empty($icon) ? ' <i class="fa fa-'.$icon.'"></i>' : '').'</'.$selector.'>';

    return $return;
}
add_shortcode('button','nga_button');

function nga_blockquote($atts, $content) {
    extract( shortcode_atts( array(
    ), $atts ) );

    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = noParagraphs($content);

    $return  = '';

    $return .= '<blockquote class="blockquote">'.$content.'</blockquote>';

    return $return;
}
add_shortcode('blockquote','nga_blockquote');


// Bootstrap's responsive video
function nga_responsive_video_shortcode($atts){
    extract( shortcode_atts( array(
        'ratio'   => '16by9',
        'url'   => '',
        'class' => ''
    ), $atts ) );

    $url = str_ireplace(array('http://','https://'), '', $url);

    $return = '';
    $return .= '<div class="embed-responsive embed-responsive-' . $ratio . ' ' . $class .'">';
    $return .= '<iframe class="embed-responsive-item" src="//' . $url . '" allowfullscreen="allowfullscreen"></iframe>';
    $return .= '</div>';
    return $return;
}
add_shortcode('responsive_video','nga_responsive_video_shortcode');


// Card item/links on the front page
function nga_home_card( $atts, $content ) {
    extract( shortcode_atts( array(
        'text' => 'na',
        'link' => '#',
        'image' => '',
        'label' => ''
    ), $atts ) );

    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = noParagraphs($content);

    $r  = '';

    $r  .= '<a href="' . $link . '" class="home-card-item">';
        $r .= '<span class="home-card-img">';
            $r .= '<img src="' . get_bloginfo('template_url') . '/img/home-card-' . $image . '.jpg">';
        $r .= '</span>';
        $r .= '<span class="home-card-label">' . $label . '</span>';
        $r .= '<span class="home-card-text">' . $content . '</span>';
    $r .= '</a>';

    return $r;
}
add_shortcode('carditem','nga_home_card');


// Needed for use in text widget
function ngbis_template_directory_uri() {
    return get_template_directory_uri();
}
add_shortcode( 'template_directory', 'ngbis_template_directory_uri' );

function ngbis_blog_url() {
    return get_bloginfo('url');
}
add_shortcode( 'site_url', 'ngbis_blog_url' );

// Elements
function nga_element($atts,$content){
    extract( shortcode_atts( array(
        'selector' => '',
        'class'    => '',
        'id'       => '',
        'style'    => ''
    ), $atts ) );

    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = noParagraphs($content);

    $return = '';
    $return .= '<'. $selector .' id="' . $id . '" class="' .  $class . '" style="'. $style .'">';
        $return .= force_balance_tags($content);
    $return .= '</'. $selector .'>';
    return $return;
}
add_shortcode('element','nga_element');

// Element2
function nga_element2($atts,$content){
    extract( shortcode_atts( array(
        'selector' => '',
        'class'    => '',
        'id'       => '',
        'style'    => ''
    ), $atts ) );

    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = noParagraphs($content);

    $return = '';
    $return .= '<'. $selector .' id="' . $id . '" class="' .  $class . '" style="'. $style .'">';
        $return .= force_balance_tags($content);
    $return .= '</'. $selector .'>';
    return $return;
}
add_shortcode('element2','nga_element');

