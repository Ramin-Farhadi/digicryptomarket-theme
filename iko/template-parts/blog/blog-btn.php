<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iko
 */

$iko_blog_btn = get_theme_mod('iko_blog_btn', __('Read More', 'iko'));
$iko_blog_btn_switch = get_theme_mod('iko_blog_btn_switch', true);

?>

<?php if (!empty($iko_blog_btn_switch)) : ?>
    <div class="read-more-btn">
        <a href="<?php the_permalink(); ?>"><?php print esc_html($iko_blog_btn); ?><i class="fas fa-arrow-right"></i></a>
    </div>
<?php endif; ?>