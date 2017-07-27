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


function get_the_post_id() {
  if (in_the_loop()) {
       $post_id = get_the_ID();
  } else {
       global $wp_query;
       $post_id = $wp_query->get_queried_object_id();
         }
  return $post_id;
}


/**
 * Meta Box
 *
 */

function add_video_meta_box($post) {
    add_meta_box('video_meta_box', 'Youtube Video', 'video_metabox_html_function', 'page', 'normal', 'default');
}
add_action('admin_init','add_video_meta_box');

function video_metabox_html_function($post){
    $field1 = get_post_meta($post->ID, 'video_link', true);
?>
    <table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tr>
            <td width="16%">
                <strong>Video Link</strong>
            </td>
            <td width="84%">
                <input type="text" name="video_link" id="video_link" size="72%" value="<?php echo $field1; ?>" />
            </td>
        </tr>
    </table>
    <input type="hidden" name="video_meta_flag" value="true" />
<?php
}

add_action('save_post','save_video_meta', 10, 2);

function save_video_meta($post_id, $post){
    if ( $post->post_type == 'page' ) {
        if (isset($_POST['video_meta_flag'])) {
            updateifstatement('video_link', $post_id);
        }
    }
}

function updateifstatement($fieldname, $postid) {
    if ( isset( $_POST[$fieldname] ) && $_POST[$fieldname] != '' ) {
        update_post_meta( $postid, $fieldname, $_POST[$fieldname] );
    }else{
        update_post_meta( $postid, $fieldname, '');
    }
}

/** Shortcodes */
include(STYLESHEETPATH.'/admin/custom_shortcodes.php');
