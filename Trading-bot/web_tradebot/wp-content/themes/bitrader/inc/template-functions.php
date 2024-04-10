<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bitrader
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bitrader_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if ( !is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    if ( !empty($get_user) ) {
        $classes[] = 'profile-breadcrumb';
    }

    return $classes;
}
add_filter( 'body_class', 'bitrader_body_classes' );

/**
 * Get tags.
 */
function bitrader_get_tag() {
    $html = '';
    if ( has_tag() ) {
        $html .= '<div class="tg-post-tag"><h5 class="tag-title">' . esc_html__( 'Post Tags :', 'bitrader' ) . '</h5>';
        $html .= get_the_tag_list( '<ul class="list-wrap p-0 mb-0"><li>', '</li><li>', '</li></ul>' );
        $html .= '</div>';
    }
    return $html;
}

/**
 * Get Social.
 */
function bitrader_social_share() {?>
    <ul class="list-wrap p-0 mb-0">
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://twitter.com/home?status=<?php the_permalink() ?>"><i class="fab fa-twitter"></i></a></li>
        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><i class="fab fa-linkedin-in"></i></a></li>
        <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>"><i class="fab fa-pinterest-p"></i></a></li>
    </ul>
<?php
}

/**
 * Get categories.
 */
function bitrader_get_category() {

    $categories = get_the_category( get_the_ID() );
    $x = 0;
    foreach ( $categories as $category ) {

        if ( $x == 2 ) {
            break;
        }
        $x++;
        print '<a class="news-tag" href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>';

    }
}

/** img alt-text **/
function bitrader_img_alt_text( $img_er_id = null ) {
    $image_id = $img_er_id;
    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', false );
    $image_title = get_the_title( $image_id );

    if ( !empty( $image_id ) ) {
        if ( $image_alt ) {
            $alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', false );
        } else {
            $alt_text = get_the_title( $image_id );
        }
    } else {
        $alt_text = esc_html__( 'Image Alt Text', 'bitrader' );
    }

    return $alt_text;
}

// bitrader_offer_sidebar_func
function bitrader_offer_sidebar_func() {
    if ( is_active_sidebar( 'offer-sidebar' ) ) {

        dynamic_sidebar( 'offer-sidebar' );
    }
}
add_action( 'bitrader_offer_sidebar', 'bitrader_offer_sidebar_func', 20 );

// bitrader_service_sidebar
function bitrader_service_sidebar_func() {
    if ( is_active_sidebar( 'services-sidebar' ) ) {

        dynamic_sidebar( 'services-sidebar' );
    }
}
add_action( 'bitrader_service_sidebar', 'bitrader_service_sidebar_func', 20 );

// bitrader_portfolio_sidebar
function bitrader_portfolio_sidebar_func() {
    if ( is_active_sidebar( 'portfolio-sidebar' ) ) {

        dynamic_sidebar( 'portfolio-sidebar' );
    }
}
add_action( 'bitrader_portfolio_sidebar', 'bitrader_portfolio_sidebar_func', 20 );

// bitrader_faq_sidebar
function bitrader_faq_sidebar_func() {
    if ( is_active_sidebar( 'faq-sidebar' ) ) {

        dynamic_sidebar( 'faq-sidebar' );
    }
}
add_action( 'bitrader_faq_sidebar', 'bitrader_faq_sidebar_func', 20 );