<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bitrader
 */

get_header();

$blog_column_lg = is_active_sidebar('blog-sidebar') ? 'col-lg-8' : 'col-12';

?>

<div class="blog-area padding-top padding-bottom section-bg-color">
    <div class="container">
        <div class="blog__wrapper">
            <div class="row g-5 justify-content-center">
                <div class="<?php print esc_attr($blog_column_lg); ?>">
                    <div class="blog-item-wrap">
                        <?php
                        if (have_posts()) :
                        ?>
                            <div class="result-bar page-header d-none">
                                <h1 class="page-title"><?php esc_html_e('Search Results For:', 'bitrader'); ?> <?php print get_search_query(); ?></h1>
                            </div>
                            <div class="row g-4 blog-masonry-active">
                                <?php
                                while (have_posts()) : the_post();
                                    get_template_part('template-parts/content', 'search');
                                endwhile;
                                ?>
                            </div>
                            <nav class="paginations">
                                <?php bitrader_pagination('<i class="fas fa-angle-double-left"></i>', '<i class="fas fa-angle-double-right"></i>', '', ['class' => 'page-link next']); ?>
                            </nav>
                        <?php
                        else :
                            get_template_part('template-parts/content', 'none');
                        endif;
                        ?>
                    </div>
                </div>
                <?php if (is_active_sidebar('blog-sidebar')) : ?>
                    <div class="col-lg-4 col-md-8 col-12">
                        <aside class="blog-sidebar">
                            <?php get_sidebar(); ?>
                        </aside>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
