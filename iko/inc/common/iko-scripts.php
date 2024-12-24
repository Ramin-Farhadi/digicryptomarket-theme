<?php

/**
 * iko_scripts description
 * @return [type] [description]
 */
function iko_scripts() {

    /**
     * ALL CSS FILES
    */
    wp_enqueue_style('xotric-fonts', IKO_THEME_CSS_DIR . 'iko-fonts.css', []);
    wp_enqueue_style('bootstrap', IKO_THEME_CSS_DIR . 'bootstrap.min.css', array());
    wp_enqueue_style( 'iko-animate', IKO_THEME_CSS_DIR . 'animate.min.css', [] );
    wp_enqueue_style( 'font-awesome-free', IKO_THEME_CSS_DIR . 'fontawesome-all.min.css', [] );
    wp_enqueue_style( 'magnific-popup', IKO_THEME_CSS_DIR . 'magnific-popup.min.css', [] );
    wp_enqueue_style( 'slick', IKO_THEME_CSS_DIR . 'slick.css', [] );
    wp_enqueue_style( 'iko-default', IKO_THEME_CSS_DIR . 'default.css', [] );
    wp_enqueue_style( 'iko-core', IKO_THEME_CSS_DIR . 'iko-core.css', [] );
    wp_enqueue_style( 'iko-unit', IKO_THEME_CSS_DIR . 'iko-unit.css', [] );
    wp_enqueue_style( 'iko-woo', IKO_THEME_CSS_DIR . 'iko-woo.css', [] );
    wp_enqueue_style( 'iko-style', get_stylesheet_uri() );
    wp_enqueue_style( 'iko-responsive', IKO_THEME_CSS_DIR . 'responsive.css', [] );


    // ALL JS FILES
    wp_enqueue_script( 'bootstrap-bundle', IKO_THEME_JS_DIR . 'bootstrap.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'countdown', IKO_THEME_JS_DIR . 'jquery.countdown.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'slick', IKO_THEME_JS_DIR . 'slick.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'easing', IKO_THEME_JS_DIR . 'jquery.easing.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'magnific-popup', IKO_THEME_JS_DIR . 'jquery.magnific-popup.min', [ 'jquery' ], '', true );
    wp_enqueue_script( 'iko-main', IKO_THEME_JS_DIR . 'main.js', [ 'jquery' ], false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'iko_scripts' );