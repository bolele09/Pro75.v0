<?php
/**
 * netfix customizer
 *
 * @package netfix
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function netfix_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'netfix_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Netfix Customizer', 'netfix' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'Header Topbar Setting', 'netfix' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'header_social', [
        'title'       => esc_html__( 'Header Social', 'netfix' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'netfix' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'netfix' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'header_side_setting', [
        'title'       => esc_html__( 'Side Info', 'netfix' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'netfix' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'netfix' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'netfix' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'netfix' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'netfix' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'netfix' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'netfix' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'netfix_customizer',
    ] );

}

add_action( 'customize_register', 'netfix_customizer_panels_sections' );

function _header_top_fields( $fields ) {
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_topbar_switch',
        'label'    => esc_html__( 'Topbar Swicher', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_header_lang',
        'label'    => esc_html__( 'Show Language', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_preloader',
        'label'    => esc_html__( 'Preloader On/Off', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_backtotop',
        'label'    => esc_html__( 'Back To Top On/Off', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_header_right',
        'label'    => esc_html__( 'Header Right On/Off', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_side_hide',
        'label'    => esc_html__( 'Side Info On/Off', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'            => 'text',
        'settings'        => 'netfix_address',
        'label'           => esc_html__( 'Netfix Adress', 'netfix' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( '14/A, Queen Street City, New York, US', 'netfix' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'netfix_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'            => 'text',
        'settings'        => 'netfix_email',
        'label'           => esc_html__( 'Mail ID', 'netfix' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( ' info@example.com', 'netfix' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'netfix_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'            => 'text',
        'settings'        => 'netfix_open_hour',
        'label'           => esc_html__( 'Open Hour', 'netfix' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( 'Opening Time : 10: AM - 10 PM', 'netfix' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'netfix_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'            => 'text',
        'settings'        => 'netfix_phone_label',
        'label'           => esc_html__( 'Phone Label', 'netfix' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( 'Customer Service:', 'netfix' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'netfix_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'            => 'text',
        'settings'        => 'netfix_phone',
        'label'           => esc_html__( 'Phone Number', 'netfix' ),
        'section'         => 'header_top_setting',
        'default'         => esc_html__( '+1 872 923 025', 'netfix' ),
        'priority'        => 10,
        'active_callback' => [
            [
                'setting'  => 'netfix_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    // login
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_login_text',
        'label'    => esc_html__( 'Login Button Text', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Login / Register', 'netfix' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'netfix_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'netfix_login_link',
        'label'    => esc_html__( 'Login URL', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '#', 'netfix' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'header_top_setting',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_button_text',
        'label'    => esc_html__( 'Button Text', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Get A Quote', 'netfix' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'netfix_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'netfix_button_link',
        'label'    => esc_html__( 'Button URL', 'netfix' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '#', 'netfix' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'netfix_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    return $fields;

}
add_filter( 'kirki/fields', '_header_top_fields' );

/*
Header Social
 */
function _header_social_fields( $fields ) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_topbar_fb_url',
        'label'    => esc_html__( 'Facebook Url', 'netfix' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_topbar_twitter_url',
        'label'    => esc_html__( 'Twitter Url', 'netfix' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_topbar_linkedin_url',
        'label'    => esc_html__( 'Linkedin Url', 'netfix' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_topbar_instagram_url',
        'label'    => esc_html__( 'Instagram Url', 'netfix' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_topbar_youtube_url',
        'label'    => esc_html__( 'Youtube Url', 'netfix' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'netfix' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_header_social_fields' );

/*
Header Settings
 */
function _header_header_fields( $fields ) {

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Choose Header Style', 'netfix' ),
        'section'     => 'section_header_logo',
        'default'     => 'header-style-1',
        'placeholder' => esc_html__( 'Select an option...', 'netfix' ),
        'priority'    => 10,
        'choices'     => [
            'header-style-1' => esc_html__( 'Header Style 1', 'netfix' ),
            'header-style-2' => esc_html__( 'Header Style 2', 'netfix' ),
        ],
    ];


    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'netfix' ),
        'description' => esc_html__( 'Upload Your Logo.', 'netfix' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'seconday_logo',
        'label'       => esc_html__( 'Header Secondary Logo', 'netfix' ),
        'description' => esc_html__( 'Header White Logo', 'netfix' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo_sticky',
        'label'       => esc_html__( 'Header Sticky Logo', 'netfix' ),
        'description' => esc_html__( 'Header Sticky Logo', 'netfix' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'        => 'slider',
        'settings'    => 'netfix_logo_size',
        'label'       => esc_html__( 'Header Logo Size', 'netfix' ),
        'description' => esc_html__( 'Header Logo Size', 'netfix' ),
        'section'     => 'section_header_logo',
        'default' => '191px',
        'choices'     => [
            'min'  => 100,
            'max'  => 400,
            'step' => 4,
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'favicon_url',
        'label'       => esc_html__( 'Favicon', 'netfix' ),
        'description' => esc_html__( 'Favicon Icon', 'netfix' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/favicon.png',
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {
    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_hamburger_hide',
        'label'    => esc_html__( 'Show Hamburger On/Off', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_side_logo_hide',
        'label'    => esc_html__( 'Side Logo On/Off', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'netfix_side_logo',
        'label'       => esc_html__( 'Logo Side', 'netfix' ),
        'description' => esc_html__( 'Logo Side', 'netfix' ),
        'section'     => 'header_side_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_extra_about_title',
        'label'    => esc_html__( 'About Us Title', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'About Us Title', 'netfix' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'netfix_extra_about_text',
        'label'    => esc_html__( 'About Us Desc..', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'About Us Desc...', 'netfix' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_extra_button',
        'label'    => esc_html__( 'Button Text', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'Contact Us', 'netfix' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_extra_button_url',
        'label'    => esc_html__( 'Button URL', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'netfix' ),
        'priority' => 10,
    ];
    // contact
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_contact_title',
        'label'    => esc_html__( 'Contact Title', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'Contact Title', 'netfix' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_extra_address',
        'label'    => esc_html__( 'Office Address', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '123/A, Miranda City Likaoli Prikano, Dope United States', 'netfix' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_extra_phone',
        'label'    => esc_html__( 'Phone Number', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '+0989 7876 9865 9', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_extra_email',
        'label'    => esc_html__( 'Email ID', 'netfix' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'info@basictheme.net', 'netfix' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_side_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {
    // Breadcrumb Setting

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'netfix_breadcrumb_shape_switch',
        'label'    => esc_html__( 'Shape Show/Hide', 'netfix' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'netfix' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'netfix' ),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/bg/breadcrumb_bg.jpg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'netfix_breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'netfix' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'netfix' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
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
        'settings' => 'netfix_blog_btn_switch',
        'label'    => esc_html__( 'Blog BTN On/Off', 'netfix' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'netfix' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'netfix' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'netfix' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'netfix' ),
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
        'type'        => 'select',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'netfix' ),
        'section'     => 'footer_setting',
        'default'     => 'footer-style-1',
        'placeholder' => esc_html__( 'Select an option...', 'netfix' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1' => esc_html__( 'Footer Style 1', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'netfix' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'netfix' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '5' => esc_html__( 'Widget Number 5', 'netfix' ),
            '4' => esc_html__( 'Widget Number 4', 'netfix' ),
            '3' => esc_html__( 'Widget Number 3', 'netfix' ),
            '2' => esc_html__( 'Widget Number 2', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'netfix_footer_bg',
        'label'       => esc_html__( 'Footer Background Image.', 'netfix' ),
        'description' => esc_html__( 'Footer Background Image.', 'netfix' ),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'footer_logo',
        'label'       => esc_html__( 'Footer Logo', 'netfix' ),
        'description' => esc_html__( 'Footer Logo', 'netfix' ),
        'section'     => 'footer_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/w_logo.png',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'netfix_footer_bg_color',
        'label'       => __( 'Footer BG Color', 'netfix' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'netfix' ),
        'section'     => 'footer_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__( 'Footer Style 2 On/Off', 'netfix' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_copyright_switch',
        'label'    => esc_html__( 'Footer Copyright On/Off', 'netfix' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'netfix' ),
            'off' => esc_html__( 'Disable', 'netfix' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_copyright',
        'label'    => esc_html__( 'Copy Right', 'netfix' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright &copy; 2021 Theme_Pure. All Rights Reserved', 'netfix' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'footer_copyright_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function netfix_color_fields( $fields ) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'netfix_color_option',
        'label'       => __( 'Theme Color', 'netfix' ),
        'description' => esc_html__( 'This is a Theme color control.', 'netfix' ),
        'section'     => 'color_setting',
        'default'     => '#df0e0e',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'netfix_secondary_color',
        'label'       => __( 'Netfix Secondary Color', 'netfix' ),
        'description' => esc_html__( 'This is netfix secondary color control.', 'netfix' ),
        'section'     => 'color_setting',
        'default'     => '#0c31ac',
        'priority'    => 10,
    ];         
    return $fields;
}
add_filter( 'kirki/fields', 'netfix_color_fields' );

// 404
function netfix_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_error_404_text',
        'label'    => esc_html__( '400 Text', 'netfix' ),
        'section'  => '404_page',
        'default'  => esc_html__( '404', 'netfix' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_error_title',
        'label'    => esc_html__( 'Not Found Title', 'netfix' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Page not found', 'netfix' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'netfix_error_desc',
        'label'    => esc_html__( '404 Description Text', 'netfix' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'netfix' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'netfix' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'netfix' ),
        'priority' => 10,
    ];
    return $fields;

}
add_filter( 'kirki/fields', 'netfix_404_fields' );


/**
 * Added Fields
 */
function netfix_slug_setting( $fields ) {
    // slug settings

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_sv_name',
        'label'    => esc_html__( 'Service Name', 'netfix' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'Services', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_sv_slug',
        'label'    => esc_html__( 'Service Slug', 'netfix' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourservices', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_shop_name',
        'label'    => esc_html__( 'Shop Name', 'netfix' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'Shop', 'netfix' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'netfix_shop_slug',
        'label'    => esc_html__( 'Shop Slug', 'netfix' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'producs', 'netfix' ),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'netfix_slug_setting' );


/**
 * Added Fields
 */
function netfix_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'netfix' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => 'Rubik',
            'variant'        => 'regular',
            'line-height'    => '1.75',
            'font-size'      => '16px',
            'text-transform' => 'none',
        ],
        'priority'    => 18,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h1_setting',
        'label'       => esc_html__( 'Heading Fonts H1', 'netfix' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => 'Rubik',
            'variant'        => '',
            'line-height'    => '',
            'font-size'      => '',
            'text-transform' => 'none',
        ],
        'priority'    => 18,
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
        'label'       => esc_html__( 'Heading Fonts H2', 'netfix' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => 'Rubik',
            'variant'        => '',
            'line-height'    => '',
            'font-size'      => '',
            'text-transform' => 'none',
        ],
        'priority'    => 18,
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
        'label'       => esc_html__( 'Heading Fonts H3', 'netfix' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => 'Rubik',
            'variant'        => '',
            'line-height'    => '',
            'font-size'      => '',
            'text-transform' => 'none',
        ],
        'priority'    => 18,
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
        'label'       => esc_html__( 'Heading Fonts H4', 'netfix' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => 'Rubik',
            'variant'        => '',
            'line-height'    => '',
            'font-size'      => '',
            'text-transform' => 'none',
        ],
        'priority'    => 18,
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
        'label'       => esc_html__( 'Heading Fonts H5', 'netfix' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => 'Rubik',
            'variant'        => '',
            'line-height'    => '',
            'font-size'      => '',
            'text-transform' => 'none',
        ],
        'priority'    => 18,
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
        'label'       => esc_html__( 'Heading Fonts H6', 'netfix' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => 'Rubik',
            'variant'        => '',
            'line-height'    => '',
            'font-size'      => '',
            'text-transform' => 'none',
        ],
        'priority'    => 18,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'netfix_typo_fields' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function netfix_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'netfix' ) ) {
        $value = Kirki::get_option( netfix_get_theme(), $name );
    }

    return apply_filters( 'netfix_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function netfix_get_theme() {
    return 'netfix';
}