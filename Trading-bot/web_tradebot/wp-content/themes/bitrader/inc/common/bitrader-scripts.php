<?php

/**
 * bitrader_scripts description
 * @return [type] [description]
 */
function bitrader_scripts() {

    /**
     * ALL CSS FILES
    */
    wp_enqueue_style( 'bitrader-fonts', BITRADER_THEME_CSS_DIR . 'bitrader-fonts.css', [] );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', BITRADER_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', BITRADER_THEME_CSS_DIR. 'bootstrap.min.css', array() );
    }
    wp_enqueue_style( 'font-awesome-free', BITRADER_THEME_CSS_DIR . 'fontawesome-all.min.css', [] );
    wp_enqueue_style( 'swiper', BITRADER_THEME_CSS_DIR . 'swiper-bundle.min.css', [] );
    wp_enqueue_style( 'aos', BITRADER_THEME_CSS_DIR . 'aos.css', [] );
    wp_enqueue_style( 'bitrader-core', BITRADER_THEME_CSS_DIR . 'bitrader-core.css', [] );
    wp_enqueue_style( 'bitrader-style', get_stylesheet_uri() );


    // ALL JS FILES
    wp_enqueue_script( 'bootstrap-bundle', BITRADER_THEME_JS_DIR . 'bootstrap.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'swiper', BITRADER_THEME_JS_DIR . 'swiper-bundle.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'aos', BITRADER_THEME_JS_DIR . 'aos.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'fslightbox', BITRADER_THEME_JS_DIR . 'fslightbox.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'purecounter', BITRADER_THEME_JS_DIR . 'purecounter_vanilla.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'isotope', BITRADER_THEME_JS_DIR . 'isotope.pkgd.min.js', ['imagesloaded'], '', true);
    wp_enqueue_script( 'bitrader-custom', BITRADER_THEME_JS_DIR . 'custom.js', [ 'jquery' ], false, true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bitrader_scripts' );