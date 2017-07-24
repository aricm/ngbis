<?php

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
        'icon'          => '',
        'icon_position' => 'right'
    ), $atts ) );


    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = noParagraphs($content);

    $return = '';

    if(!empty($icon)) {
        $icon_html = '<i class="fa fa-'.$icon.'"></i>';
        if($icon_position == 'right') {
            $content = $content . ' ' . $icon_html;
        } else {
            $content = $icon_html . ' ' . $content;
        }
    }

    $return .= '<'.$selector.' '.(($link != '')?"href='".$link."'" : "").' '.(($selector == 'button')?"type=\"button\"":"").' class="btn btn-'.$style.' '.$class.'" role="button"'.(($target != '')?"data-target='".$target."'" : "").'>' . $content .'</'.$selector.'>';

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
        'selector' => 'div',
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
        'selector' => 'div',
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

// Element3
function nga_element3($atts,$content){
    extract( shortcode_atts( array(
        'selector' => 'div',
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
add_shortcode('element3','nga_element');
