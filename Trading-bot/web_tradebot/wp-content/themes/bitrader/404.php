<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bitrader
 */

get_header();
?>


<?php
$error_image = get_template_directory_uri() . '/assets/img/images/error_img.png';
$bitrader_error_img = get_theme_mod('bitrader_error_img', $error_image);
$bitrader_error_title = get_theme_mod('bitrader_error_title', __('<span>ooops!</span> page not found', 'bitrader'));
$bitrader_error_desc = get_theme_mod('bitrader_error_desc', __('Oops! It looks like you\'re lost. The page you were looking for couldn\'t be found. Don\'t worry, it happens to the best of us.', 'bitrader'));
$bitrader_error_link_text = get_theme_mod('bitrader_error_link_text', __('Back to home', 'bitrader'));
?>

<!-- error-area -->
<section class="error-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 col-md-10">
                <div class="error-content text-center">
                    <?php if (!empty($bitrader_error_img)) : ?>
                        <div class="error-image">
                            <img src="<?php echo esc_url($bitrader_error_img); ?>" alt="<?php echo esc_attr__('Image', 'bitrader') ?>">
                        </div>
                    <?php endif; ?>
                    <h2 class="title"><?php print wp_kses_post($bitrader_error_title); ?></h2>
                    <p class="desc"><?php print wp_kses_post($bitrader_error_desc); ?></p>
                    <a href="<?php print esc_url(home_url('/')); ?>" class="trk-btn trk-btn--border trk-btn--primary">
                        <?php print esc_html($bitrader_error_link_text); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- error-area-end -->

<?php
get_footer();
