<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bitrader
 */


/**
 *
 * Bitrader Header
 */

function bitrader_check_header() {
    $bitrader_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $bitrader_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $bitrader_header_style == 'header-style-1' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-1' );
    }
    elseif ( $bitrader_header_style == 'header-style-2' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-2' );
    }
    elseif ( $bitrader_header_style == 'header-style-3' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-3' );
    }
    elseif ( $bitrader_header_style == 'header-style-4' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-4' );
    }
    elseif ( $bitrader_header_style == 'header-style-5' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-5' );
    }
    elseif ( $bitrader_header_style == 'header-style-6' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-6' );
    }
    else {
        /** Default Header Style **/
        if ( $bitrader_default_header_style == 'header-style-2' ) {
            get_template_part( 'template-parts/header/header-2' );
        }
        elseif ( $bitrader_default_header_style == 'header-style-3' ) {
            get_template_part( 'template-parts/header/header-3' );
        }
        elseif ( $bitrader_default_header_style == 'header-style-4' ) {
            get_template_part( 'template-parts/header/header-4' );
        }
        elseif ( $bitrader_default_header_style == 'header-style-5' ) {
            get_template_part( 'template-parts/header/header-5' );
        }
        elseif ( $bitrader_default_header_style == 'header-style-6' ) {
            get_template_part( 'template-parts/header/header-6' );
        }
        else {
            get_template_part( 'template-parts/header/header-1' );
        }
    }

}
add_action( 'bitrader_header_style', 'bitrader_check_header', 10 );


/**
 * [bitrader_header_lang description]
 * @return [type] [description]
 */
function bitrader_header_lang_default() {
    $bitrader_header_lang = get_theme_mod( 'bitrader_header_lang', false );
    if ( $bitrader_header_lang ): ?>

    <ul>
        <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__( 'English', 'bitrader' );?> <i class="fa-light fa-angle-down"></i></a>
        <?php do_action( 'bitrader_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}

/**
 * [bitrader_language_list description]
 * @return [type] [description]
 */
function _bitrader_language( $mar ) {
    return $mar;
}
function bitrader_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<a href="' . $lan['url'] . '" class="' . $active . '">' . $lan['translated_name'] . '</a>';
        }
        $mar .= '</div>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__( '🇷🇺 Russia', 'bitrader' ) . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__( '🇮🇳 India', 'bitrader' ) . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__( '🇹🇷 Turkey', 'bitrader' ) . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__( '🇫🇷 France', 'bitrader' ) . '</a>';
        $mar .= ' </div>';
    }
    print _bitrader_language( $mar );
}
add_action( 'bitrader_language', 'bitrader_language_list' );


// Header Logo
function bitrader_header_logo() { ?>
      <?php
        $bitrader_logo_on = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : NULL;
        $bitrader_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
        $bitrader_logo_black = get_template_directory_uri() . '/assets/img/logo/secondary_logo.svg';

        $bitrader_site_logo = get_theme_mod( 'logo', $bitrader_logo );
        $bitrader_secondary_logo = get_theme_mod( 'secondary_logo', $bitrader_logo_black );
      ?>

      <?php if ( !empty( $bitrader_logo_on ) ) : ?>
         <a class="secondary-logo" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $bitrader_secondary_logo );?>" style="max-height: <?php echo get_theme_mod( 'logo_size_adjust', '30px' ); ?>" alt="<?php print esc_attr__( 'Logo', 'bitrader' );?>" />
         </a>
      <?php else : ?>
         <a class="main-logo" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $bitrader_site_logo );?>" style="max-height: <?php echo get_theme_mod( 'logo_size_adjust', '30px' ); ?>" alt="<?php print esc_attr__( 'Logo', 'bitrader' );?>" />
         </a>
      <?php endif; ?>
   <?php
}

// Header Sticky Logo
function bitrader_header_sticky_logo() {?>
    <?php
        $bitrader_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
        $bitrader_site_logo = get_theme_mod( 'logo', $bitrader_logo );
    ?>
      <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $bitrader_site_logo );?>" style="max-height: <?php echo get_theme_mod( 'logo_size_adjust', '30px' ); ?>" alt="<?php print esc_attr__( 'Logo', 'bitrader' );?>" />
      </a>
    <?php
}

// Mobile Menu Logo
function bitrader_mobile_logo() {

    $mobile_menu_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
    $mobile_logo = get_theme_mod('mobile_logo', $mobile_menu_logo);

    ?>

    <a class="main-logo" href="<?php print esc_url( home_url( '/' ) ); ?>">
        <img src="<?php print esc_url( $mobile_logo ); ?>" style="max-height: <?php echo get_theme_mod( 'logo_size_adjust', '30px' ); ?>" alt="<?php print esc_attr__( 'Logo', 'bitrader' );?>" />
    </a>

<?php }


/**
 * [bitrader_header_social_profiles description]
 * @return [type] [description]
 */
function bitrader_header_social_profiles() {
    $bitrader_header_fb_url = get_theme_mod( 'bitrader_header_fb_url', __( '#', 'bitrader' ) );
    $bitrader_header_twitter_url = get_theme_mod( 'bitrader_header_twitter_url', __( '#', 'bitrader' ) );
    $bitrader_header_linkedin_url = get_theme_mod( 'bitrader_header_linkedin_url', __( '#', 'bitrader' ) );
    ?>
    <ul>
        <?php if ( !empty( $bitrader_header_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $bitrader_header_fb_url );?>"><span><i class="flaticon-facebook"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $bitrader_header_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $bitrader_header_twitter_url );?>"><span><i class="flaticon-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $bitrader_header_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $bitrader_header_linkedin_url );?>"><span><i class="flaticon-linkedin"></i></span></a></li>
        <?php endif;?>
    </ul>

<?php
}

function bitrader_footer_social_profiles() {
    $bitrader_footer_fb_url = get_theme_mod( 'bitrader_footer_fb_url', __( '#', 'bitrader' ) );
    $bitrader_footer_twitter_url = get_theme_mod( 'bitrader_footer_twitter_url', __( '#', 'bitrader' ) );
    $bitrader_footer_vimeo_url = get_theme_mod( 'bitrader_footer_vimeo_url', __( '#', 'bitrader' ) );
    $bitrader_footer_youtube_url = get_theme_mod( 'bitrader_footer_youtube_url', __( '#', 'bitrader' ) );
    ?>

        <ul>
        <?php if ( !empty( $bitrader_footer_fb_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $bitrader_footer_fb_url );?>">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $bitrader_footer_twitter_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $bitrader_footer_twitter_url );?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $bitrader_footer_vimeo_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $bitrader_footer_vimeo_url );?>">
                    <i class="fab fa-vimeo-v"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $bitrader_footer_youtube_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $bitrader_footer_youtube_url );?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif;?>
        </ul>
<?php
}

/**
 * [bitrader_mobile_social_profiles description]
 * @return [type] [description]
 */
function bitrader_mobile_social_profiles() {
    $bitrader_mobile_fb_url           = get_theme_mod('bitrader_mobile_fb_url', __('#','bitrader'));
    $bitrader_mobile_twitter_url      = get_theme_mod('bitrader_mobile_twitter_url', __('#','bitrader'));
    $bitrader_mobile_instagram_url    = get_theme_mod('bitrader_mobile_instagram_url', __('#','bitrader'));
    $bitrader_mobile_linkedin_url     = get_theme_mod('bitrader_mobile_linkedin_url', __('#','bitrader'));
    $bitrader_mobile_telegram_url      = get_theme_mod('bitrader_mobile_telegram_url', __('#','bitrader'));
    ?>

    <ul class="clearfix">
        <?php if (!empty($bitrader_mobile_fb_url)): ?>
        <li class="facebook">
            <a href="<?php print esc_url($bitrader_mobile_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($bitrader_mobile_twitter_url)): ?>
        <li class="twitter">
            <a href="<?php print esc_url($bitrader_mobile_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($bitrader_mobile_instagram_url)): ?>
        <li class="instagram">
            <a href="<?php print esc_url($bitrader_mobile_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($bitrader_mobile_linkedin_url)): ?>
        <li class="linkedin">
            <a href="<?php print esc_url($bitrader_mobile_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($bitrader_mobile_telegram_url)): ?>
        <li class="telegram">
            <a href="<?php print esc_url($bitrader_mobile_telegram_url); ?>"><i class="fab fa-telegram-plane"></i></a>
        </li>
        <?php endif; ?>
    </ul>

<?php
}


/**
 * [bitrader_header_menu description]
 * @return [type] [description]
 */
function bitrader_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'main-menu',
            'container'      => '',
            'fallback_cb'    => 'Bitrader_Navwalker_Class::fallback',
            'walker'         => new Bitrader_Navwalker_Class,
        ] );
    ?>
    <?php
}


/**
 * [bitrader_hamburger_menu description]
 * @return [type] [description]
 */
function bitrader_hamburger_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'hamburger-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => 'Bitrader_Navwalker_Class::fallback',
            'walker'         => new Bitrader_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [bitrader_header_menu description]
 * @return [type] [description]
 */
function bitrader_mobile_menu() { ?>
    <?php
        $bitrader_menu = wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $bitrader_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $bitrader_menu );
        echo wp_kses_post( $bitrader_menu );
    ?>
    <?php
}

/**
 * [bitrader_blog_mobile_menu description]
 * @return [type] [description]
 */
function bitrader_blog_mobile_menu() { ?>
    <?php
        $bitrader_menu = wp_nav_menu( [
            'theme_location' => 'blog-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $bitrader_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $bitrader_menu );
        echo wp_kses_post( $bitrader_menu );
    ?>
    <?php
}

/**
 * [bitrader_search_menu description]
 * @return [type] [description]
 */
function bitrader_header_search_menu() { ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Bitrader_Navwalker_Class::fallback',
            'walker'         => new Bitrader_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [bitrader_footer_menu description]
 * @return [type] [description]
 */
function bitrader_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'Bitrader_Navwalker_Class::fallback',
        'walker'         => new Bitrader_Navwalker_Class,
    ] );
}


/**
 * [bitrader_category_menu description]
 * @return [type] [description]
 */
function bitrader_category_menu() {
    wp_nav_menu( [
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Bitrader_Navwalker_Class::fallback',
        'walker'         => new Bitrader_Navwalker_Class,
    ] );
}

/**
 *
 * bitrader footer
 */
add_action( 'bitrader_footer_style', 'bitrader_check_footer', 10 );

function bitrader_check_footer() {

    $footer_show = 1;
    $is_footer = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_footer') : '';
    if( !empty($_GET['s']) ) {
      $is_footer = null;
    }

    if ( empty( $is_footer ) && $footer_show == 1 ) {
        $bitrader_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
        $bitrader_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

        get_template_part( 'template-parts/footer/footer-1' );

    }
}


// bitrader_copyright_text
function bitrader_copyright_text() {
   print get_theme_mod( 'bitrader_copyright', esc_html__( 'Copyright © Bitrader 2023. All Rights Reserved', 'bitrader' ) );
}


/**
 *
 * pagination
 */
if ( !function_exists( 'bitrader_pagination' ) ) {

    function _bitrader_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function bitrader_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul class="lab-ul list-wrap d-flex flex-wrap justify-content-center mb-0">';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li class="page-item">' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _bitrader_pagi_callback( $pagi );
    }
}


// theme color
function bitrader_custom_color() {

    // Primary Color
    $color_code = get_theme_mod( 'bitrader_color_option', '#00D094' );
    wp_enqueue_style( 'bitrader-custom', BITRADER_THEME_CSS_DIR . 'bitrader-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --brand-color: " . $color_code . "}";
        wp_add_inline_style( 'bitrader-custom', $custom_css );
    }

    // Secondary Color
    $color_code2 = get_theme_mod( 'bitrader_color_option2', '#0A4FD5' );
    wp_enqueue_style( 'bitrader-custom', BITRADER_THEME_CSS_DIR . 'bitrader-custom.css', [] );
    if ( $color_code2 != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --secondary-color: " . $color_code2 . "}";
        wp_add_inline_style( 'bitrader-custom', $custom_css );
    }

}
add_action( 'wp_enqueue_scripts', 'bitrader_custom_color' );



// bitrader_kses_intermediate
function bitrader_kses_intermediate( $string = '' ) {
    return wp_kses( $string, bitrader_get_allowed_html_tags( 'intermediate' ) );
}

function bitrader_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function bitrader_kses($raw){

   $allowed_tags = array(
      'a'      => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'   => array(
         'title' => array(),
      ),
      'b'    => array(),
      'blockquote'   => array(
         'cite' => array(),
      ),
      'cite'   => array(
         'title' => array(),
      ),
      'code'  => array(),
      'del'   => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'     => array(),
      'div'    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'   => array(),
      'dt'   => array(),
      'em'   => array(),
      'h1'   => array(),
      'h2'   => array(),
      'h3'   => array(),
      'h4'   => array(),
      'h5'   => array(),
      'h6'   => array(),
      'i'    => array(
        'class' => array(),
      ),
      'img'   => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'   => array(
         'class' => array(),
      ),
      'ol'   => array(
         'class' => array(),
      ),
      'p'    => array(
         'class' => array(),
      ),
      'q'    => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'  => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'   => array(
         'width'        => array(),
         'height'       => array(),
         'scrolling'    => array(),
         'frameborder'  => array(),
         'allow'        => array(),
         'src'          => array(),
      ),
      'strike'  => array(),
      'br'      => array(),
      'strong'    => array(),
      'data-wow-duration'   => array(),
      'data-wow-delay'   => array(),
      'data-wallpaper-options'  => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'   => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}