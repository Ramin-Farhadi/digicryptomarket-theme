<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iko
 */

$iko_show_blog_share = get_theme_mod('iko_show_blog_share', false);
$iko_post_tags_width = $iko_show_blog_share ? 'col-md-7' : 'col-12';

?>
<?php if (is_single()) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-standard-post blog-details-wrap format-image'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-standard-thumb">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
            </div>
        <?php endif; ?>

        <div class="blog-details-content">

            <!-- blog meta -->
            <div class="blog-meta">
                <?php get_template_part('template-parts/blog/blog-meta'); ?>
            </div>

            <div class="post-text">
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before'      => '<div class="page-links">' . esc_html__('Pages:', 'iko'),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ]);
                ?>
            </div>

            <?php if (!empty(get_the_tags())) : ?>
                <div class="blog-details-bottom">

                    <div class="row">
                        <div class="<?php echo esc_attr($iko_post_tags_width); ?>">
                            <?php print iko_get_tag(); ?>
                        </div>
                        <?php if (!empty($iko_show_blog_share)) : ?>
                            <div class="col-md-5">
                                <div class="blog-details-social text-md-end">
                                    <h5 class="social-title"><?php echo esc_html__('Social Share :', 'iko') ?></h5>
                                    <?php iko_social_share(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endif; ?>

        </div>
    </article>

<?php else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-standard-post format-image'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-standard-thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="blog-standard-content">

            <!-- blog meta -->
            <div class="blog-meta">
                <?php get_template_part('template-parts/blog/blog-meta'); ?>
            </div>
            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-text">
                <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), 60, ''); ?></p>
            </div>
            <!-- blog btn -->
            <?php get_template_part('template-parts/blog/blog-btn'); ?>

        </div>
    </article>

<?php endif; ?>