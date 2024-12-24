<?php
/**
 * iko customizer
 *
 * @package iko
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function iko_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'iko_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'IKO Customizer', 'iko' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'iko_default_setting', [
        'title'       => esc_html__( 'IKO Default Setting', 'iko' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'iko'),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ]);

    $wp_customize->add_section( 'header_info_setting', [
        'title'       => esc_html__( 'Header Right Setting', 'iko' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( 'offcanvas_setting', [
        'title'       => esc_html__( 'Offcanvas Setting', 'iko' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( 'mobile_menu_setting', [
        'title'       => esc_html__( 'Mobile Menu Setting', 'iko' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'iko' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'iko' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'iko' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'iko' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'iko' ),
        'description' => '',
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'iko' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );

    $wp_customize->add_section( 'woo_setting', [
        'title'       => esc_html__( 'WooCommerce Setting', 'iko' ),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'iko_customizer',
    ] );
}

add_action( 'customize_register', 'iko_customizer_panels_sections' );


/*
Theme Default Settings
*/
function _iko_default_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_preloader',
        'label'    => esc_html__( 'Preloader ON/OFF', 'iko' ),
        'section'  => 'iko_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_backtotop',
        'label'    => esc_html__( 'Back to Top ON/OFF', 'iko' ),
        'section'  => 'iko_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_iko_default_fields' );


/*
Header Settings
 */
function _header_header_fields( $fields ) {

    // Sticky Header
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_show_sticky_header',
        'label'    => esc_html__( 'Show Sticky Header', 'iko' ),
        'section'  => 'section_header_logo',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
        'active_callback' => [
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_header_elementor_switch',
        'label'       => esc_html__('Elementor Header Switch', 'iko'),
        'section'  => 'section_header_logo',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'iko'),
            'off' => esc_html__('Disable', 'iko'),
        ],
    ];

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'iko' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'iko' ),
        'description' => esc_html__('If you select a Header Style from the edit page, This option will not work. So go to edit page then change the header style.', 'iko'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1' => get_template_directory_uri() . '/inc/img/header/header-1.png',
        ],
        'default'     => 'header-style-1',
        'active_callback' => [
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $header_posttype = array(
        'post_type'      => 'iko-header',
        'posts_per_page' => -1,
    );
    $header_posttype_loop = get_posts($header_posttype);

    $header_post_obj_arr = array();
    foreach ($header_posttype_loop as $post) {
        $header_post_obj_arr[$post->ID] = $post->post_title;
    }

    wp_reset_query();

    $fields[] = [
        'type'     => 'select',
        'settings' => 'iko_header_templates',
        'label'       => esc_html__('Elementor Header Template', 'iko'),
        'section'  => 'section_header_logo',
        'description' => esc_html__('If you select a Header Style from the edit page, This option will not work. So go to edit page then change the header style.', 'iko'),
        'priority' => 10,
        'placeholder' => esc_html__('Choose an option', 'iko'),
        'choices'     => $header_post_obj_arr,
        'active_callback' => [
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => true
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'iko' ),
        'description' => esc_html__( 'Upload Your Logo', 'iko' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
        'active_callback' => [
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'dimension',
        'settings'    => 'logo_size_adjust',
		'label'       => esc_html__( 'Logo Size Height', 'iko' ),
		'description' => esc_html__( 'Adjust your logo size with px', 'iko' ),
		'section'     => 'section_header_logo',
		'default'     => '34px',
        'choices'     => [
			'accept_unitless' => true,
		],
        'active_callback' => [
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );


/*
Header Right Settings
*/
function _header_right_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_show_header_right',
        'label'    => esc_html__('Show Header Right', 'iko'),
        'section'  => 'header_info_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'iko'),
            'off' => esc_html__('Disable', 'iko'),
        ],
        'active_callback' => [
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_show_header_button',
        'label'    => esc_html__('Show Header Button', 'iko'),
        'section'  => 'header_info_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'iko'),
            'off' => esc_html__('Disable', 'iko'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'iko_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_header_btn_text',
        'label'    => esc_html__('Enter Button Text', 'iko'),
        'section'  => 'header_info_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_header_button',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'iko_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
        'default'  => esc_html__('Login', 'iko'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_header_btn_icon',
        'label'    => esc_html__('Enter Button Icon', 'iko'),
        'description' => esc_html__('Upload Icon From Font-Awesome v.5', 'iko'),
        'section'  => 'header_info_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_header_button',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'iko_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
        'default'  => wp_kses_post('<i class="fas fa-user"></i>', 'iko'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_header_btn_url',
        'label'    => esc_html__('Enter Button URL', 'iko'),
        'section'  => 'header_info_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_header_button',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'iko_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
        'default'  => esc_html__('#', 'iko'),
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_right_fields' );


/*
Offcanvas Settings
*/
function _header_offcanvas_fields($fields)
{

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_show_offcanvas',
        'label'    => esc_html__('Show Offcanvas', 'iko'),
        'section'  => 'offcanvas_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'iko'),
            'off' => esc_html__('Disable', 'iko'),
        ],
        'active_callback' => [
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_address_title',
        'label'    => esc_html__('Enter Address Title', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('Office Address', 'iko'),
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'offcanvas_address_text',
        'label'    => esc_html__('Enter Address Text', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('123/A, Miranda City Likaoli Prikano, Dope', 'iko'),
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_phone_title',
        'label'    => esc_html__('Enter Phone Title', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('Phone Number', 'iko'),
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'offcanvas_phone_text',
        'label'    => esc_html__('Enter Phone Text', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('+0989 7876 9865 9', 'iko'),
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_email_title',
        'label'    => esc_html__('Enter Email Title', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('Email Address', 'iko'),
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'offcanvas_email_text',
        'label'    => esc_html__('Enter Phone Text', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('info@example.com', 'iko'),
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_show_offcanvas_social',
        'label'    => esc_html__('Show Offcanvas Social', 'iko'),
        'section'  => 'offcanvas_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'iko'),
            'off' => esc_html__('Disable', 'iko'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_fb',
        'label'    => esc_html__('Enter Facebook url', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'iko_show_offcanvas_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
        'default'  => esc_html__('#', 'iko'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_twitter',
        'label'    => esc_html__('Enter Twitter url', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'iko_show_offcanvas_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
        'default'  => esc_html__('#', 'iko'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_instagram',
        'label'    => esc_html__('Enter Instagram url', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'iko_show_offcanvas_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
        'default'  => esc_html__('#', 'iko'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_pinterest',
        'label'    => esc_html__('Enter Pinterest url', 'iko'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'iko_show_offcanvas_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
        'default'  => esc_html__('#', 'iko'),
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_offcanvas_fields');


/*
Mobile Menu Settings
*/
function _mobile_menu_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_show_mobile_social',
        'label'    => esc_html__( 'Show Mobile Menu Social', 'iko' ),
        'section'  => 'mobile_menu_setting',
        'default'  => 0,
        'priority' => 12,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
        'active_callback'  => [
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    // Mobile section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_mobile_fb_url',
        'label'    => esc_html__( 'Facebook URL', 'iko' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'iko' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_mobile_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'iko' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'iko' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_mobile_instagram_url',
        'label'    => esc_html__( 'Instagram URL', 'iko' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'iko' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_mobile_linkedin_url',
        'label'    => esc_html__( 'Linkedin URL', 'iko' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'iko' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_mobile_telegram_url',
        'label'    => esc_html__( 'Telegram URL', 'iko' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'iko' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'iko_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'iko_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_mobile_menu_fields' );


/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_hide_default',
        'label'    => esc_html__( 'Breadcrumb Hide by Default', 'iko' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_background',
        'label'       => esc_html__('Breadcrumb Background', 'iko'),
        'description' => esc_html__('Upload Your Background', 'iko'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/bg/breadcrumb_bg.png',
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__('Breadcrumb Nav Hide', 'iko'),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'iko'),
            'off' => esc_html__('Disable', 'iko'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_shape_hide',
        'label'    => esc_html__('Breadcrumb Shape Hide', 'iko'),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'iko'),
            'off' => esc_html__('Disable', 'iko'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_shape_one',
        'label'       => esc_html__('Breadcrumb Shape One', 'iko'),
        'description' => esc_html__('Upload Your Shape', 'iko'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/images/breadcrumb_shape01.png',
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_shape_hide',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_shape_two',
        'label'       => esc_html__('Breadcrumb Shape Two', 'iko'),
        'description' => esc_html__('Upload Your Shape', 'iko'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/images/breadcrumb_shape02.png',
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_shape_hide',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_blog_btn_switch',
        'label'    => esc_html__( 'Blog Button ON/OFF', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta ON/OFF', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_blog_author',
        'label'    => esc_html__( 'Blog Author Meta ON/OFF', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_blog_date',
        'label'    => esc_html__( 'Blog Date Meta ON/OFF', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta ON/OFF', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_show_blog_share',
        'label'    => esc_html__( 'Show Blog Share', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'iko' ),
            'off' => esc_html__( 'Disable', 'iko' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'iko' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'iko' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'iko' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'iko' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {

    // Footer Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'iko_footer_elementor_switch',
        'label'       => esc_html__('Elementor Footer Switch', 'iko'),
        'section'  => 'footer_setting',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'iko'),
            'off' => esc_html__('Disable', 'iko'),
        ],
    ];

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'iko' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'iko' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
        ],
        'default'     => 'footer-style-1',
        'active_callback' => [
            [
                'setting' => 'iko_footer_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $footer_posttype = array(
            'post_type'      => 'iko-footer',
            'posts_per_page' => -1,
        );
    $footer_posttype_loop = get_posts($footer_posttype);
    $footer_post_obj_arr = array();
    foreach ($footer_posttype_loop as $post) {
        $footer_post_obj_arr[$post->ID] = $post->post_title;
    }

    wp_reset_postdata();

    $fields[] = [
        'type'     => 'select',
        'settings' => 'iko_footer_templates',
        'label'       => esc_html__('Elementor Footer Template', 'iko'),
        'section'  => 'footer_setting',
        'description' => esc_html__('If you select a Footer Style from the edit page, This option will not work. So go to edit page then change the footer style.', 'iko'),
        'priority' => 11,
        'placeholder' => esc_html__('Choose an option', 'iko'),
        'choices'     => $footer_post_obj_arr,
        'active_callback' => [
            [
                'setting' => 'iko_footer_elementor_switch',
                'operator' => '==',
                'value' => true
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'iko' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'iko' ),
        'priority'    => 11,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'iko' ),
            '3' => esc_html__( 'Widget Number 3', 'iko' ),
            '2' => esc_html__( 'Widget Number 2', 'iko' ),
        ],
        'active_callback' => [
            [
                'setting' => 'iko_footer_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'iko_copyright',
        'label'    => esc_html__( 'CopyRight', 'iko' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright © IKO 2024. All Rights Reserved', 'iko' ),
        'priority' => 15,
        'active_callback' => [
            [
                'setting' => 'iko_footer_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function iko_color_fields( $fields ) {

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'iko_color_option',
        'label'       => __( 'Primary Color', 'iko' ),
        'description' => esc_html__('This is a Primary color control.', 'iko' ),
        'section'     => 'color_setting',
        'default'     => '#E275FF',
        'priority'    => 10,
    ];

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'iko_color_option2',
        'label'       => __('Purple Color', 'iko' ),
        'description' => esc_html__('This is a Purple color control.', 'iko' ),
        'section'     => 'color_setting',
        'default'     => '#5729D6',
        'priority'    => 10,
    ];

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'iko_color_option3',
        'label'       => __('Dark Color', 'iko' ),
        'description' => esc_html__('This is a Dark color control.', 'iko' ),
        'section'     => 'color_setting',
        'default'     => '#0F101E',
        'priority'    => 10,
    ];

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'iko_color_option4',
        'label'       => __('Body Background Color', 'iko' ),
        'description' => esc_html__('This is a Background color control.', 'iko' ),
        'section'     => 'color_setting',
        'default'     => '#010314',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'iko_color_fields' );

// 404
function iko_404_fields( $fields ) {

    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_error_text',
        'label'    => esc_html__('404 Text', 'iko'),
        'section'  => '404_page',
        'default'  => esc_html__('404', 'iko'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'iko_error_title',
        'label'    => esc_html__( 'Not Found Title', 'iko' ),
        'section'  => '404_page',
        'default'  => esc_html__('Sorry, the page you are looking for could not be found', 'iko' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'iko_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'iko' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'iko' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'iko_404_fields' );


/**
 * Added Fields
 */
function iko_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'iko' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => ['body', 'p'],
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'iko' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'iko' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'iko' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'iko' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'iko' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'iko' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'iko_typo_fields' );


/**
 * Added Fields
 */
function iko_woo_fields( $fields ) {

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_shop',
        'label'    => esc_html__('Shop Title', 'iko'),
        'section'  => 'woo_setting',
        'default'  => esc_html__('Shop', 'iko'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_shop_single',
        'label'    => esc_html__('Shop Details Title', 'iko'),
        'section'  => 'woo_setting',
        'default'  => esc_html__('Product Single', 'iko'),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'iko_woo_fields' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function IKO_THEME_OPTION( $name ) {
    $value = '';
    if ( class_exists( 'iko' ) ) {
        $value = Kirki::get_option( iko_get_theme(), $name );
    }

    return apply_filters('IKO_THEME_OPTION', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function iko_get_theme() {
    return 'iko';
}