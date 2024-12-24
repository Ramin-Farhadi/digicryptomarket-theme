<?php

/**
 * Template part for displaying offcanvas menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iko
 */

$offcanvas_address_title = get_theme_mod('offcanvas_address_title', __('Office Address', 'iko'));
$offcanvas_address_text = get_theme_mod('offcanvas_address_text', __('123/A, Miranda City Likaoli
Prikano, Dope', 'iko'));
$offcanvas_phone_title = get_theme_mod('offcanvas_phone_title', __('Phone Number', 'iko'));
$offcanvas_phone_text = get_theme_mod('offcanvas_phone_text', __('+0989 7876 9865 9', 'iko'));
$offcanvas_email_title = get_theme_mod('offcanvas_email_title', __('Email Address', 'iko'));
$offcanvas_email_text = get_theme_mod('offcanvas_email_text', __('info@example.com', 'iko'));

$iko_show_offcanvas_social = get_theme_mod('iko_show_offcanvas_social', false);
$offcanvas_fb = get_theme_mod('offcanvas_fb', __('#', 'iko'));
$offcanvas_twitter = get_theme_mod('offcanvas_twitter', __('#', 'iko'));
$offcanvas_instagram = get_theme_mod('offcanvas_instagram', __('#', 'iko'));
$offcanvas_pinterest = get_theme_mod('offcanvas_pinterest', __('#', 'iko'));

?>


<div class="extra-info">
    <div class="close-icon menu-close">
        <button><i class="far fa-window-close"></i></button>
    </div>
    <div class="logo-side mb-30">
        <?php iko_header_logo(); ?>
    </div>
    <div class="side-info mb-30">
        <?php if (!empty($offcanvas_address_text)) : ?>
            <div class="contact-list mb-30">
                <h4><?php echo esc_html($offcanvas_address_title) ?></h4>
                <p><?php echo wp_kses_post($offcanvas_address_text); ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($offcanvas_phone_text)) : ?>
            <div class="contact-list mb-30">
                <h4><?php echo esc_html($offcanvas_phone_title) ?></h4>
                <p><?php echo wp_kses_post($offcanvas_phone_text); ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($offcanvas_email_text)) : ?>
            <div class="contact-list mb-30">
                <h4><?php echo esc_html($offcanvas_email_title) ?></h4>
                <p><?php echo wp_kses_post($offcanvas_email_text); ?></p>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($iko_show_offcanvas_social)) : ?>
        <div class="social-icon-right mt-30">

            <?php if (!empty($offcanvas_fb)) : ?>
                <a href="<?php echo esc_url($offcanvas_fb); ?>"><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>

            <?php if (!empty($offcanvas_twitter)) : ?>
                <a href="<?php echo esc_url($offcanvas_twitter); ?>">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33192 5.92804L13.5438 0H12.3087L7.78328 5.14724L4.16883 0H0L5.46575 7.78353L0 14H1.2351L6.01407 8.56431L9.83119 14H14L8.33192 5.92804ZM6.64027 7.85211L6.08648 7.07704L1.68013 0.909771H3.57718L7.13316 5.88696L7.68694 6.66202L12.3093 13.1316H10.4123L6.64027 7.85211Z" fill="currentColor" />
                    </svg>
                </a>
            <?php endif; ?>

            <?php if (!empty($offcanvas_instagram)) : ?>
                <a href="<?php echo esc_url($offcanvas_instagram); ?>"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>

            <?php if (!empty($offcanvas_pinterest)) : ?>
                <a href="<?php echo esc_url($offcanvas_pinterest); ?>"><i class="fab fa-pinterest-p"></i></a>
            <?php endif; ?>

        </div>
    <?php endif; ?>

</div>
<div class="offcanvas-overly"></div>