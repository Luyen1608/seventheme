<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitrader
 */

$bitrader_show_blog_share = get_theme_mod('bitrader_show_blog_share', false);
$bitrader_post_tags_width = $bitrader_show_blog_share ? 'col-md-7' : 'col-12';

?>
<?php if (is_single()) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('blog__item blog-details-wrap format-image'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-details-thumb">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
            </div>
        <?php endif; ?>

        <div class="blog-details-content">

            <!-- blog meta -->
            <div class="blog-details__meta">
                <ul class="list-wrap d-flex flex-wrap p-0 m-0">
                    <li><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="far fa-user-circle"></i> <?php print get_the_author(); ?></a></li>
                    <li><i class="far fa-calendar-alt"></i> <?php the_time(get_option('date_format')); ?></li>
                    <li><a href="<?php comments_link(); ?>"><i class="far fa-comment-dots"></i> <?php comments_number(); ?></a></li>
                </ul>
            </div>

            <div class="post-text">
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before'      => '<div class="page-links">' . esc_html__('Pages:', 'bitrader'),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ]);
                ?>
            </div>

            <?php if (!empty(get_the_tags())) : ?>
                <div class="blog-details-bottom">

                    <div class="row">
                        <div class="<?php echo esc_attr($bitrader_post_tags_width); ?>">
                            <?php print bitrader_get_tag(); ?>
                        </div>
                        <?php if (!empty($bitrader_show_blog_share)) : ?>
                            <div class="col-md-5">
                                <div class="blog-details-social text-md-end">
                                    <h5 class="social-title"><?php echo esc_html__('Social Share :', 'bitrader') ?></h5>
                                    <?php bitrader_social_share(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endif; ?>

        </div>
    </article>

<?php else : ?>

    <div class="col-md-6 grid-item">
        <article id="post-<?php the_ID(); ?>" <?php post_class('blog__item format-image'); ?>>
            <div class="blog__item-inner blog__item-inner--style2">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="blog__thumb">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="blog__content">
                    <?php $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<div class="blog__meta"><span class="blog__meta-tag--style2"><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="tag">' . esc_html($categories[0]->name) . '</a></span></div>';
                    }
                    ?>
                    <h5 class="10 style2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                    <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), 16, ''); ?></p>

                    <!-- blog meta -->
                    <div class="blog__writer">
                        <?php get_template_part('template-parts/blog/blog-meta'); ?>
                    </div>

                </div>
            </div>
        </article>
    </div>

<?php endif; ?>