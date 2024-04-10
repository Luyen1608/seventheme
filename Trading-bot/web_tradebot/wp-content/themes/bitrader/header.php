<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bitrader
 */
$bitrader_darkmode = get_theme_mod('bitrader_darkmode', false);
$bitrader_mode = $bitrader_darkmode ? 'dark' : 'light';
?>

<!doctype html>
<html <?php language_attributes(); ?> data-bs-theme="<?php echo esc_attr($bitrader_mode); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>


    <?php
        $bitrader_preloader = get_theme_mod('bitrader_preloader', false);
        $bitrader_preloader_logo = get_template_directory_uri() . '/assets/img/logo/preloader.png';

        $preloader_logo = get_theme_mod('preloader_logo', $bitrader_preloader_logo);

        $bitrader_backtotop = get_theme_mod('bitrader_backtotop', false);
    ?>


    <?php if (!empty($bitrader_preloader)) : ?>
        <!-- preloader -->
        <div class="preloader">
            <img src="<?php echo esc_url( $preloader_logo ) ?>" alt="<?php echo esc_html__('Preloader', 'bitrader' ) ?>">
        </div>
        <!-- preloader-end -->
    <?php endif; ?>


    <?php if (!empty($bitrader_backtotop)) : ?>
        <a href="javascript:void(0)" class="scrollToTop scroll__top scroll-to-target scrollToTop--home1" data-target="html">
            <i class="fas fa-angle-up"></i>
        </a>
    <?php endif; ?>


    <?php do_action('bitrader_header_style'); ?>

    <!-- main-area -->
    <main class="main-area fix">

        <?php do_action('bitrader_before_main_content'); ?>