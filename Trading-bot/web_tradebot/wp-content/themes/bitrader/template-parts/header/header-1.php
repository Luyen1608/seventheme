<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitrader
 */

// Header Settings
$bitrader_show_sticky_header = get_theme_mod('bitrader_show_sticky_header', false);
$sticky_header = $bitrader_show_sticky_header ? 'sticky-header' : 'sticky-default';


// Header Button
$bitrader_show_header_button = get_theme_mod('bitrader_show_header_button', false);
$bitrader_header_btn_text = get_theme_mod('bitrader_header_btn_text', __('Join Now', 'bitrader'));
$bitrader_header_btn_url = get_theme_mod('bitrader_header_btn_url', __('#', 'bitrader'));

?>

<header id="<?php echo esc_attr($sticky_header); ?>" class="header-section header-section--style1 bg-color-3">
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <?php bitrader_header_logo(); ?>
                </div>
                <div class="menu-area menu--style1">
                    <?php bitrader_header_menu(); ?>
                </div>
                <div class="header-action">
                    <div class="menu-area">

                        <?php if (!empty($bitrader_show_header_button)) : ?>
                            <div class="header-btn">
                                <a href="<?php echo esc_url($bitrader_header_btn_url) ?>" class="trk-btn trk-btn--border trk-btn--primary">
                                    <span><?php echo esc_html($bitrader_header_btn_text); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if (has_nav_menu('main-menu')) { ?>
                            <!-- toggle icons -->
                            <div class="header-bar d-lg-none home1">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>