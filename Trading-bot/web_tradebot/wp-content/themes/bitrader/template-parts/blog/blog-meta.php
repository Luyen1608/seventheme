<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bitrader
 */
$bitrader_blog_date = get_theme_mod('bitrader_blog_date', true);
$bitrader_blog_author = get_theme_mod('bitrader_blog_author', true);

?>


<?php if (!empty($bitrader_blog_author)) : ?>
    <div class="blog__writer-thumb">
        <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'), ['size' => '40'])); ?>" alt="<?php the_author(); ?>"></a>
    </div>
<?php endif; ?>
<div class="blog__writer-designation">
    <?php if (!empty($bitrader_blog_author)) : ?>
        <p class="mb-0"><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php print get_the_author(); ?></a></p>
    <?php endif; ?>
    <?php if (!empty($bitrader_blog_date)) : ?>
        <span><?php the_time(get_option('date_format')); ?></span>
    <?php endif; ?>
</div>