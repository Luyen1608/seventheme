<?php
/**
 * bitrader customizer
 *
 * @package bitrader
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function bitrader_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'bitrader_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Bitrader Customizer', 'bitrader' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'bitrader_default_setting', [
        'title'       => esc_html__( 'Bitrader Default Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'bitrader'),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ]);

    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'Header Top Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'header_info_setting', [
        'title'       => esc_html__( 'Header Info Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'offcanvas_setting', [
        'title'       => esc_html__( 'Offcanvas Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'mobile_menu_setting', [
        'title'       => esc_html__( 'Mobile Menu Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'bitrader' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'bitrader' ),
        'description' => '',
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'bitrader' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'bitrader' ),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bitrader_customizer',
    ] );
}

add_action( 'customize_register', 'bitrader_customizer_panels_sections' );


/*
Theme Default Settings
*/
function _bitrader_default_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bitrader_preloader',
        'label'    => esc_html__( 'Preloader Switcher', 'bitrader' ),
        'section'  => 'bitrader_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_logo',
        'label'       => esc_html__('Preloader Logo', 'bitrader'),
        'description' => esc_html__('Upload Preloader Logo.', 'bitrader'),
        'section'     => 'bitrader_default_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/preloader.png',
        'active_callback'  => [
            [
                'setting'  => 'bitrader_preloader',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bitrader_backtotop',
        'label'    => esc_html__( 'Back to Top Switcher', 'bitrader' ),
        'section'  => 'bitrader_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bitrader_darkmode',
        'label'    => esc_html__( 'Dark mode Switcher', 'bitrader' ),
        'section'  => 'bitrader_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_bitrader_default_fields' );


/*
Header Settings
 */
function _header_header_fields( $fields ) {

    // Sticky Header
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bitrader_show_sticky_header',
        'label'    => esc_html__( 'Show Sticky Header', 'bitrader' ),
        'section'  => 'section_header_logo',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
        ],
    ];

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'bitrader' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'bitrader' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1' => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3' => get_template_directory_uri() . '/inc/img/header/header-3.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'bitrader' ),
        'description' => esc_html__( 'Upload Your Logo', 'bitrader' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'secondary_logo',
        'label'       => esc_html__( 'Header Secondary Logo', 'bitrader' ),
        'description' => esc_html__( 'Upload Your Logo', 'bitrader' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/secondary_logo.svg',
    ];

    $fields[] = [
        'type'        => 'dimension',
        'settings'    => 'logo_size_adjust',
		'label'       => esc_html__( 'Logo Size Height', 'bitrader' ),
		'description' => esc_html__( 'Adjust your logo size with px', 'bitrader' ),
		'section'     => 'section_header_logo',
		'default'     => '30px',
        'choices'     => [
			'accept_unitless' => true,
		],
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
        'settings' => 'bitrader_show_header_button',
        'label'    => esc_html__('Show Header Button', 'bitrader'),
        'section'  => 'header_info_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'bitrader'),
            'off' => esc_html__('Disable', 'bitrader'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bitrader_header_btn_text',
        'label'    => esc_html__('Enter Button Text', 'bitrader'),
        'section'  => 'header_info_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'bitrader_show_header_button',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__('Join Now', 'bitrader'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bitrader_header_btn_url',
        'label'    => esc_html__('Enter Button URL', 'bitrader'),
        'section'  => 'header_info_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'bitrader_show_header_button',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__('#', 'bitrader'),
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_right_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__('Breadcrumb Background Image', 'bitrader'),
        'description' => esc_html__('Upload Image', 'bitrader'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/bg/breadcrumb_bg.png',
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_hide_default',
        'label'    => esc_html__( 'Breadcrumb Hide by Default', 'bitrader' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__( 'Breadcrumb Nav Hide', 'bitrader' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
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
        'settings' => 'bitrader_blog_author',
        'label'    => esc_html__( 'Blog Author Meta Switcher', 'bitrader' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bitrader_blog_date',
        'label'    => esc_html__( 'Blog Date Meta Switcher', 'bitrader' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bitrader_show_blog_share',
        'label'    => esc_html__( 'Show Blog Share', 'bitrader' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bitrader' ),
            'off' => esc_html__( 'Disable', 'bitrader' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'bitrader' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'bitrader' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'bitrader' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'bitrader' ),
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
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'bitrader' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'bitrader' ),
        'description' => esc_html__('Footer settings will not work if you are using Elementor Footer', 'bitrader'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'bitrader' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'bitrader' ),
        'priority'    => 11,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'bitrader' ),
            '3' => esc_html__( 'Widget Number 3', 'bitrader' ),
            '2' => esc_html__( 'Widget Number 2', 'bitrader' ),
        ],
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bitrader_footer_bg_color',
        'label'       => __( 'Footer BG Color', 'bitrader' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'bitrader' ),
        'section'     => 'footer_setting',
        'default'     => '#00150F',
        'priority'    => 12,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bitrader_copyright',
        'label'    => esc_html__( 'CopyRight', 'bitrader' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright © Bitrader 2023. All Rights Reserved', 'bitrader' ),
        'priority' => 15,
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function bitrader_color_fields( $fields ) {

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bitrader_color_option',
        'label'       => __( 'Primary Color', 'bitrader' ),
        'description' => esc_html__('This is a Primary color control.', 'bitrader' ),
        'section'     => 'color_setting',
        'default'     => '#00D094',
        'priority'    => 10,
    ];

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bitrader_color_option2',
        'label'       => __('Secondary Color', 'bitrader' ),
        'description' => esc_html__('This is a Secondary color control.', 'bitrader' ),
        'section'     => 'color_setting',
        'default'     => '#0A4FD5',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'bitrader_color_fields' );

// 404
function bitrader_404_fields( $fields ) {

    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'bitrader_error_img',
        'label'       => esc_html__('404 Page Image', 'bitrader'),
        'description' => esc_html__('Upload Image', 'bitrader'),
        'section'     => '404_page',
        'default'     => get_template_directory_uri() . '/assets/img/images/error_img.png',
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'bitrader_error_title',
        'label'    => esc_html__( 'Not Found Title', 'bitrader' ),
        'section'  => '404_page',
        'default'  => wp_kses_post('<span>oops!</span> page not found', 'bitrader' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'bitrader_error_desc',
        'label'    => esc_html__( 'Not Found Description', 'bitrader' ),
        'section'  => '404_page',
        'default'  => wp_kses_post('Oops! It looks like you\'re lost. The page you were looking for couldn\'t be found. Don\'t worry, it happens to the best of us.', 'bitrader' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bitrader_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'bitrader' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'bitrader' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'bitrader_404_fields' );


/**
 * Added Fields
 */
function bitrader_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'bitrader' ),
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
        'label'       => esc_html__( 'Heading Fonts', 'bitrader' ),
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
                'element' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            ],
        ],
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'bitrader_typo_fields' );


/**
 * Added Fields
 */
function bitrader_slug_setting( $fields ) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bitrader_ev_slug',
        'label'    => esc_html__( 'Event Slug', 'bitrader' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourevent', 'bitrader' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bitrader_port_slug',
        'label'    => esc_html__( 'Portfolio Slug', 'bitrader' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourportfolio', 'bitrader' ),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'bitrader_slug_setting' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function BITRADER_THEME_OPTION( $name ) {
    $value = '';
    if ( class_exists( 'bitrader' ) ) {
        $value = Kirki::get_option( bitrader_get_theme(), $name );
    }

    return apply_filters('BITRADER_THEME_OPTION', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function bitrader_get_theme() {
    return 'bitrader';
}