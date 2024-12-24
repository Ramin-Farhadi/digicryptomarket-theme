<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package iko
 */


/**
 *
 * IKO Header
 */

function iko_check_header()
{

    $iko_header_tabs = function_exists('get_field') ? get_field('genix_header') : false;
    $elementor_header_template_meta = function_exists('get_field') ? get_field('elementor_header_style') : false;

    $iko_header_option_switch = get_theme_mod('iko_header_elementor_switch', false);
    $elementor_header_templates_kirki = get_theme_mod('iko_header_templates');

    if ($iko_header_tabs == 'default') {
        if ($iko_header_option_switch) {
            if ($elementor_header_templates_kirki) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            }
        } else {
            get_template_part('template-parts/header/header-1');
        }
    } elseif ($iko_header_tabs == 'elementor') {
        if ($elementor_header_template_meta) {
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_template_meta);
        } else {
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
        }
    } else {
        if ($iko_header_option_switch) {

            if ($elementor_header_templates_kirki) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            } else {
                get_template_part('template-parts/header/header-1');
            }
        } else {
            get_template_part('template-parts/header/header-1');
        }
    }
}
add_action('iko_header_style', 'iko_check_header', 10);


/**
 * [iko_header_lang description]
 * @return [type] [description]
 */
function iko_header_lang_default()
{
    $iko_header_lang = get_theme_mod('iko_header_lang', false);
    if ($iko_header_lang) : ?>

        <ul>
            <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__('English', 'iko'); ?> <i class="fa-light fa-angle-down"></i></a>
                <?php do_action('iko_language'); ?>
            </li>
        </ul>

    <?php endif; ?>
<?php
}


/**
 * [iko_language_list description]
 * @return [type] [description]
 */
function _iko_language($mar)
{
    return $mar;
}
function iko_language_list()
{

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
    if (!empty($languages)) {
        $mar = '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<a href="' . $lan['url'] . '" class="' . $active . '">' . $lan['translated_name'] . '</a>';
        }
        $mar .= '</div>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__('🇷🇺 RU', 'iko') . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__('🇮🇳 IN', 'iko') . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__('🇹🇷 TR', 'iko') . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__('🇫🇷 FR', 'iko') . '</a>';
        $mar .= ' </div>';
    }
    print _iko_language($mar);
}
add_action('iko_language', 'iko_language_list');


// Header 01 Logo
function iko_header_logo()
{ ?>
    <?php
    $iko_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
    $iko_site_logo = get_theme_mod('logo', $iko_logo);
    ?>
    <a class="main-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($iko_site_logo); ?>" style="max-height: <?php echo get_theme_mod('logo_size_adjust', '34px'); ?>" alt="<?php echo bloginfo('name'); ?>" />
    </a>
<?php
}

// Header 02 Logo
function iko_header_two_logo()
{ ?>
    <?php
    $iko_logo_black = get_template_directory_uri() . '/assets/img/logo/second_logo.png';
    $iko_second_logo = get_theme_mod('logo_two', $iko_logo_black);
    ?>
    <a class="main-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($iko_second_logo); ?>" style="max-height: <?php echo get_theme_mod('logo_size_adjust', '34px'); ?>" alt="<?php echo bloginfo('name'); ?>" />
    </a>
<?php
}


// Mobile Menu Logo
function iko_mobile_logo()
{

    $mobile_menu_logo = get_template_directory_uri() . '/assets/img/logo/logo.pmg';
    $mobile_logo = get_theme_mod('mobile_logo', $mobile_menu_logo);

?>

    <a class="main-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($mobile_logo); ?>" style="max-height: <?php echo get_theme_mod('logo_size_adjust', '34px'); ?>" alt="<?php echo bloginfo('name'); ?>" />
    </a>

<?php }


/**
 * [iko_header_social_profiles description]
 * @return [type] [description]
 */
function iko_header_social_profiles()
{
    $iko_header_fb_url = get_theme_mod('iko_header_fb_url', __('#', 'iko'));
    $iko_header_twitter_url = get_theme_mod('iko_header_twitter_url', __('#', 'iko'));
    $iko_header_linkedin_url = get_theme_mod('iko_header_linkedin_url', __('#', 'iko'));
?>
    <ul>
        <?php if (!empty($iko_header_fb_url)) : ?>
            <li><a href="<?php print esc_url($iko_header_fb_url); ?>"><span><i class="flaticon-facebook"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($iko_header_twitter_url)) : ?>
            <li><a href="<?php print esc_url($iko_header_twitter_url); ?>"><span><i class="flaticon-twitter"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($iko_header_linkedin_url)) : ?>
            <li><a href="<?php print esc_url($iko_header_linkedin_url); ?>"><span><i class="flaticon-linkedin"></i></span></a></li>
        <?php endif; ?>
    </ul>

<?php
}

function iko_footer_social_profiles()
{
    $iko_footer_fb_url = get_theme_mod('iko_footer_fb_url', __('#', 'iko'));
    $iko_footer_twitter_url = get_theme_mod('iko_footer_twitter_url', __('#', 'iko'));
    $iko_footer_vimeo_url = get_theme_mod('iko_footer_vimeo_url', __('#', 'iko'));
    $iko_footer_youtube_url = get_theme_mod('iko_footer_youtube_url', __('#', 'iko'));
?>

    <ul>
        <?php if (!empty($iko_footer_fb_url)) : ?>
            <li>
                <a href="<?php print esc_url($iko_footer_fb_url); ?>">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($iko_footer_twitter_url)) : ?>
            <li>
                <a href="<?php print esc_url($iko_footer_twitter_url); ?>">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33192 5.92804L13.5438 0H12.3087L7.78328 5.14724L4.16883 0H0L5.46575 7.78353L0 14H1.2351L6.01407 8.56431L9.83119 14H14L8.33192 5.92804ZM6.64027 7.85211L6.08648 7.07704L1.68013 0.909771H3.57718L7.13316 5.88696L7.68694 6.66202L12.3093 13.1316H10.4123L6.64027 7.85211Z" fill="currentColor" />
                    </svg>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($iko_footer_vimeo_url)) : ?>
            <li>
                <a href="<?php print esc_url($iko_footer_vimeo_url); ?>">
                    <i class="fab fa-vimeo-v"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($iko_footer_youtube_url)) : ?>
            <li>
                <a href="<?php print esc_url($iko_footer_youtube_url); ?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

/**
 * [iko_mobile_social_profiles description]
 * @return [type] [description]
 */
function iko_mobile_social_profiles()
{
    $iko_mobile_fb_url           = get_theme_mod('iko_mobile_fb_url', __('#', 'iko'));
    $iko_mobile_twitter_url      = get_theme_mod('iko_mobile_twitter_url', __('#', 'iko'));
    $iko_mobile_instagram_url    = get_theme_mod('iko_mobile_instagram_url', __('#', 'iko'));
    $iko_mobile_linkedin_url     = get_theme_mod('iko_mobile_linkedin_url', __('#', 'iko'));
    $iko_mobile_telegram_url      = get_theme_mod('iko_mobile_telegram_url', __('#', 'iko'));
?>

    <ul class="clearfix list-wrap">
        <?php if (!empty($iko_mobile_fb_url)) : ?>
            <li class="facebook">
                <a href="<?php print esc_url($iko_mobile_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
            </li>
        <?php endif; ?>

        <?php if (!empty($iko_mobile_twitter_url)) : ?>
            <li class="twitter">
                <a href="<?php print esc_url($iko_mobile_twitter_url); ?>">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33192 5.92804L13.5438 0H12.3087L7.78328 5.14724L4.16883 0H0L5.46575 7.78353L0 14H1.2351L6.01407 8.56431L9.83119 14H14L8.33192 5.92804ZM6.64027 7.85211L6.08648 7.07704L1.68013 0.909771H3.57718L7.13316 5.88696L7.68694 6.66202L12.3093 13.1316H10.4123L6.64027 7.85211Z" fill="currentColor" />
                    </svg>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($iko_mobile_instagram_url)) : ?>
            <li class="instagram">
                <a href="<?php print esc_url($iko_mobile_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
            </li>
        <?php endif; ?>

        <?php if (!empty($iko_mobile_linkedin_url)) : ?>
            <li class="linkedin">
                <a href="<?php print esc_url($iko_mobile_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a>
            </li>
        <?php endif; ?>

        <?php if (!empty($iko_mobile_telegram_url)) : ?>
            <li class="telegram">
                <a href="<?php print esc_url($iko_mobile_telegram_url); ?>"><i class="fab fa-telegram-plane"></i></a>
            </li>
        <?php endif; ?>
    </ul>

<?php
}


/**
 * [iko_header_menu description]
 * @return [type] [description]
 */
function iko_header_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'IKO_Navwalker_Class::fallback',
    ]);
    ?>
<?php
}


/**
 * [iko_hamburger_menu description]
 * @return [type] [description]
 */
function iko_hamburger_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'hamburger-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'IKO_Navwalker_Class::fallback',
        'walker'         => new IKO_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [iko_header_menu description]
 * @return [type] [description]
 */
function iko_mobile_menu()
{ ?>
    <?php
    $iko_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => false,
        'echo'           => false,
    ]);

    $iko_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $iko_menu);
    echo wp_kses_post($iko_menu);
    ?>
<?php
}

/**
 * [iko_blog_mobile_menu description]
 * @return [type] [description]
 */
function iko_blog_mobile_menu()
{ ?>
    <?php
    $iko_menu = wp_nav_menu([
        'theme_location' => 'blog-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => false,
        'echo'           => false,
    ]);

    $iko_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $iko_menu);
    echo wp_kses_post($iko_menu);
    ?>
<?php
}

/**
 * [iko_search_menu description]
 * @return [type] [description]
 */
function iko_header_search_menu()
{ ?>
    <?php
    wp_nav_menu([
        'theme_location' => 'header-search-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'IKO_Navwalker_Class::fallback',
        'walker'         => new IKO_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [iko_footer_menu description]
 * @return [type] [description]
 */
function iko_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'IKO_Navwalker_Class::fallback',
        'walker'         => new IKO_Navwalker_Class,
    ]);
}


/**
 * [iko_category_menu description]
 * @return [type] [description]
 */
function iko_category_menu()
{
    wp_nav_menu([
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'IKO_Navwalker_Class::fallback',
        'walker'         => new IKO_Navwalker_Class,
    ]);
}

/**
 *
 * IKO Footer
 */
function iko_check_footer()
{

    $iko_footer_tabs = function_exists('get_field') ? get_field('genix_footer') : false;
    $elementor_footer_template_meta = function_exists('get_field') ? get_field('elementor_footer_style') : false;

    $iko_footer_option_switch = get_theme_mod('iko_footer_elementor_switch', false);
    $elementor_footer_templates_kirki = get_theme_mod('iko_footer_templates');

    if ($iko_footer_tabs == 'default') {
        if ($iko_footer_option_switch) {
            if ($elementor_footer_templates_kirki) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
            }
        } else {
            get_template_part('template-parts/footer/footer-1');
        }
    } elseif ($iko_footer_tabs == 'elementor') {
        if ($elementor_footer_template_meta) {
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_template_meta);
        } else {
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
        }
    } else {
        if ($iko_footer_option_switch) {

            if ($elementor_footer_templates_kirki) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
            } else {
                get_template_part('template-parts/footer/footer-1');
            }
        } else {
            get_template_part('template-parts/footer/footer-1');
        }
    }
}
add_action('iko_footer_style', 'iko_check_footer', 10);

// iko_copyright_text
function iko_copyright_text()
{
    print get_theme_mod('iko_copyright', esc_html__('Copyright © IKO 2024. All Rights Reserved', 'iko'));
}


/**
 *
 * pagination
 */
if (!function_exists('iko_pagination')) {

    function _iko_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function iko_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul class="pagination">';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li class="page-item">' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _iko_pagi_callback($pagi);
    }
}


// theme color
function iko_custom_color()
{

    // Primary Color
    $color_code = get_theme_mod('iko_color_option', '#E275FF');
    wp_enqueue_style('iko-custom', IKO_THEME_CSS_DIR . 'iko-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= "html:root { --tg-primary-color: " . $color_code . "}";
        $custom_css .= "html:root { --unit-primary-color: " . $color_code . "}";
        wp_add_inline_style('iko-custom', $custom_css);
    }

    // Purple Color
    $color_code2 = get_theme_mod('iko_color_option2', '#5729D6');
    wp_enqueue_style('iko-custom', IKO_THEME_CSS_DIR . 'iko-custom.css', []);
    if ($color_code2 != '') {
        $custom_css = '';
        $custom_css .= "html:root { --tg-theme-color2: " . $color_code2 . "}";
        wp_add_inline_style('iko-custom', $custom_css);
    }

    // Secondary Color
    $color_code3 = get_theme_mod('iko_color_option3', '#0F101E');
    wp_enqueue_style('iko-custom', IKO_THEME_CSS_DIR . 'iko-custom.css', []);
    if ($color_code3 != '') {
        $custom_css = '';
        $custom_css .= "html:root { --tg-secondary-color: " . $color_code3 . "}";
        $custom_css .= "html:root { --unit-secondary-color: " . $color_code3 . "}";
        wp_add_inline_style('iko-custom', $custom_css);
    }

    // Background Color
    $color_code4 = get_theme_mod('iko_color_option4', '#010314');
    wp_enqueue_style('iko-custom', IKO_THEME_CSS_DIR . 'iko-custom.css', []);
    if ($color_code4 != '') {
        $custom_css = '';
        $custom_css .= "html:root { --tg-green: " . $color_code4 . "}";
        $custom_css .= "html:root { --tg-black: " . $color_code4 . "}";
        wp_add_inline_style('iko-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'iko_custom_color');



// iko_kses_intermediate
function iko_kses_intermediate($string = '')
{
    return wp_kses($string, iko_get_allowed_html_tags('intermediate'));
}

function iko_get_allowed_html_tags($level = 'basic')
{
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
function iko_kses($raw)
{

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
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}
