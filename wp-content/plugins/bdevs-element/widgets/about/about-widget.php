<?php

namespace BdevsElement\Widget;

Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class About extends BDevs_El_Widget
{

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'about';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('About', 'bdevselement');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-single-post';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'about', 'content'];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_2' => __('Style 2', 'bdevselement'),
                    'style_3' => __('Style 3', 'bdevselement'),
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_5' => __('Style 5', 'bdevselement'),
                    'style_6' => __('Style 6', 'bdevselement'),
                    'style_7' => __('Style 7', 'bdevselement'),
                    'style_8' => __('Style 8', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title_here',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Sub Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Sub Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_10'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs Info Box Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevselement'),
                'placeholder' => __('Type info box description', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2','style_3','style_4', 'style_5','style_6', 'style_7', 'style_8'],
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Video URL', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs video url goes here', 'bdevselement' ),
                'placeholder' => __( 'Set Video URL', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_7'],
                ],
            ]
        );

        $this->add_control(
            'offer_text',
            [
                'label' => __('Offer Text', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Special offer', 'bdevselement'),
                'placeholder' => __('Type Offer Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_5'],
                ],
            ]
        );

        $this->add_control(
            'offer_mb',
            [
                'label' => __('Offer MB', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('40 MB', 'bdevselement'),
                'placeholder' => __('Type offer mb', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_5'],
                ],
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __('Price', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Price here', 'bdevselement'),
                'placeholder' => __('Type Price here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_3', 'style_5','style_6'],
                ],
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __('Currency', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('$', 'bdevselement'),
                'placeholder' => __('currency Price here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2','style_5'],
                ],
            ]
        );

        $this->add_control(
            'price_text',
            [
                'label' => __('Price Text', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Try Free For 1 Month', 'bdevselement'),
                'placeholder' => __('Type Price Text here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_3', 'style_5','style_6'],
                ],
            ]
        );

        $this->add_control(
            'only_text',
            [
                'label' => __('Only Text', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Only', 'bdevselement'),
                'placeholder' => __('Type Price only Text here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_3', 'style_6'],
                ],
            ]
        );

        $this->add_control(
            'duration',
            [
                'label' => __('Duration', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Monthly', 'bdevselement'),
                'placeholder' => __('Type Price Duration here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_3', 'style_5', 'style_6'],
                ],
            ]
        );

        $this->add_control(
            'price_url',
            [
                'label' => __( 'Price URL', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs price url goes here', 'bdevselement' ),
                'placeholder' => __( 'Set Price URL', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_5'],
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevselement'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevselement'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevselement'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevselement'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevselement'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevselement'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevselement'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        // img
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('Big Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2', 'style_3','style_4','style_5','style_6', 'style_7', 'style_8'],
                ],
            ]
        );

        $this->add_control(
            'small_image',
            [
                'label' => __('Small Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_4', 'style_8'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Features List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_4', 'style_7', 'style_8'],
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_7' => __('Style 7', 'bdevselement'),
                    'style_8' => __('Style 8', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __('Media Type', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevselement'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevselement'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ],
                    'condition' => [
                        'field_condition' => ['style_2'],
                    ],
                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ],
                    'condition' => [
                        'field_condition' => ['style_2'],
                    ],
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Number', 'bdevselement'),
                'placeholder' => __('Type number here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1','style_4'],
                ],
            ]
        );

        $repeater->add_control(
            'sign',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Sign', 'bdevselement'),
                'placeholder' => __('Type Sign here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1','style_4'],
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_5','style_6', 'style_8'],
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'bdevselement'),
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('http://elementor.bdevs.net/', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'button_icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $this->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button_icon_position',
            [
                'label' => __('Icon Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'after',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls()
    {

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Title / Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        // Subtitle    
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );


        $this->end_controls_section();


        // list style content
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __('List Item', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'item_icon_size',
            [
                'label' => __('Size', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list i' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span, {{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list i',
            ]
        );

        $this->add_control(
            'item_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker, {{WRAPPER}} .bdevs-el-list i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker, {{WRAPPER}} .bdevs-el-list i',
            ]
        );

        $this->add_control(
            'hr_2',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_lits_tabs_button');

        $this->start_controls_tab(
            '_list_tab_button_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'list_item_link_color_2',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_item_border_color_2',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_item_bg_color_2',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_icon_translate_2',
            [
                'label' => __('Icon Translate X', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_list_tab_button_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'list_link_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_border_hover_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i, {{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_hover_icon_translate',
            [
                'label' => __('Icon Translate X', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        
        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_before_bg_color',
            [
                'label' => __( 'Hover Before BG Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.s-btn.bdevs-el-btn:hover:before, {{WRAPPER}} .btn.s-btn.bdevs-el-btn:focus:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $title = bdevs_element_kses_basic($settings['title']);
        ?>
        <?php if ($settings['design_style'] === 'style_8'):
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }
        if (!empty($settings['small_image']['id'])) {
            $small_image = wp_get_attachment_image_url($settings['small_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        $this->add_render_attribute('title', 'data-wow-delay', '');

        $this->add_render_attribute('button', 'class', 'btn s-btn transparent-btn bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '');
        $this->add_link_attributes('button', $settings['button_link']);

        ?>

        <section class="about-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <?php if (!empty($bg_image)): ?>
                        <div class="about-img-wrap">
                            <img src="<?php echo esc_url($small_image); ?>" alt="img">
                            <img src="<?php echo esc_url($bg_image); ?>" class="main-img" alt="img">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title mb-30">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <div class="about-content bdevs-el-content">
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <ul class="about-list">
                                <?php foreach ($settings['slides'] as $slide): ?>
                                <li><?php echo bdevs_element_kses_basic($slide['title']); ?></li>
                                <?php endforeach; ?>
                            </ul>

                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php elseif ($settings['design_style'] === 'style_7'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

        ?>

        <section class="inner-services-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6 order-0 order-lg-2">
                        <?php if (!empty($bg_image)): ?>
                        <div class="services-inner-img wow fadeInRight" data-wow-delay=".2s">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                            <div class="video-paly">
                                <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="popup-video"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="section-title mb-30">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <div class="services-inner-content bdevs-el-content">
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <ul class="services-inner-list">
                                <?php foreach ($settings['slides'] as $slide): ?>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/check.png" alt="img"><?php echo bdevs_element_kses_basic($slide['title']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_6'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('button', 'class', 'btn s-btn bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '');
        $this->add_link_attributes('button', $settings['button_link']);


        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        $this->add_render_attribute('title', 'data-wow-delay', '');

        ?>

        <section class="subscribe-two-area subscribe-two-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6 order-0 order-lg-2">
                        <?php if (!empty($bg_image)): ?>
                        <div class="subscribe-img wow fadeInRight" data-wow-delay=".2s">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">

                            <h2 class="overlay-price"><span><?php echo bdevs_element_kses_intermediate($settings['only_text']); ?></span> <?php echo bdevs_element_kses_intermediate($settings['price']); ?><span><?php echo bdevs_element_kses_intermediate($settings['duration']); ?></span></h2>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="section-title white-title mb-30">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?> 
                        </div>
                        <div class="subscribe-content bdevs-el-content">
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <h4 class="title"><?php echo bdevs_element_kses_intermediate($settings['price_text']); ?></h4>

                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_5'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        $this->add_render_attribute('button', 'class', 'btn s-btn transparent-btn bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '');
        $this->add_link_attributes('button', $settings['button_link']);

        ?>

        <section class="special-offer-area special-offer-two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="special-offer-img wow fadeInLeft" data-wow-delay=".2s">
                            <?php if (!empty($bg_image)): ?>
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                            <?php endif; ?>

                            <?php if (!empty($settings['offer_text'])): ?>
                            <div class="special-offer-text"><?php echo bdevs_element_kses_intermediate($settings['offer_text']); ?></div>
                            <?php endif; ?>

                            <?php if (!empty($settings['offer_mb'])): ?>
                            <div class="special-offer-mbps">
                                <span><?php print esc_html__('UP TO', 'netfix'); ?></span>
                                <h3 class="title"><?php echo bdevs_element_kses_intermediate($settings['offer_mb']); ?></h3>
                                <p><?php print esc_html__('PER Second', 'netfix'); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title mb-40">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <div class="special-offer-content">
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <div class="special-price-wrap">
                                <h2 class="special-price"><sup><?php echo bdevs_element_kses_intermediate($settings['currency']); ?></sup><?php echo bdevs_element_kses_intermediate($settings['price']); ?><sub><?php echo bdevs_element_kses_intermediate($settings['duration']); ?></h2>
                                <p class="trial-link"><i class="flaticon-wifi-router"></i><a href="<?php echo esc_url( $settings['price_url'] ); ?>"><?php echo bdevs_element_kses_intermediate($settings['price_text']); ?></a></p>
                            </div>


                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_4'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        if (!empty($settings['small_image']['id'])) {
            $small_image = wp_get_attachment_image_url($settings['small_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

        $this->add_render_attribute('button', 'class', 'btn s-btn transparent-btn bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '');
        $this->add_link_attributes('button', $settings['button_link']);

        ?>

        <section class="fact-area">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-6 col-lg-7">
                        <?php if (!empty($bg_image)): ?>
                        <div class="fact-img-wrap">
                            <img src="<?php echo esc_url($bg_image); ?>" class="main-img" alt="img">
                            <img src="<?php echo esc_url($small_image); ?>" class="small-img" alt="img">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title mb-40">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>    
                        </div>
                        <div class="video-content-wrap bdevs-el-content">
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            <div class="fact-wrap">
                                <div class="row">                                    
                                    <?php foreach ($settings['slides'] as $slide): ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="fact-item">
                                            <h4 class="title"><span class="odometer" data-count="<?php echo bdevs_element_kses_intermediate($slide['number']); ?>"></span><?php echo bdevs_element_kses_basic($slide['sign']); ?></h4>

                                            <?php if (!empty($slide['title'])) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['title']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_3'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('button', 'class', 'btn s-btn btn-link bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '1.2s');
        $this->add_link_attributes('button', $settings['button_link']);


        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        $this->add_render_attribute('title', 'data-wow-delay', '.4s');
        ?>

        <section class="subscribe-area subscribe-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <?php if (!empty($bg_image)): ?>
                        <div class="subscribe-img wow fadeInLeft" data-wow-delay=".2s">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="section-title mb-30">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>                       
                        </div>
                        <div class="subscribe-content bdevs-el-content">
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <h4 class="title"><?php echo bdevs_element_kses_intermediate($settings['price_text']); ?></h4>
                            <div class="subscribe-plan">
                                <h2 class="price"><span><?php echo bdevs_element_kses_intermediate($settings['only_text']); ?></span> <?php echo bdevs_element_kses_intermediate($settings['price']); ?><sub>/<?php echo bdevs_element_kses_intermediate($settings['duration']); ?></sub></h2>

                                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                    printf('<a %1$s href="%3$s">%2$s</a>',
                                        $this->get_render_attribute_string('button'),
                                        esc_html($settings['button_text']),
                                        esc_url($settings['button_link']['url'])
                                    );
                                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                    if ($settings['button_icon_position'] === 'before'): ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                            <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                    <?php
                                    else: ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>>
                                            <span><?php echo esc_html($settings['button_text']); ?></span>
                                            <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        </a>
                                    <?php
                                    endif;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_2'):
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        $this->add_render_attribute('button', 'class', 'btn s-btn transparent-btn bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '');
        $this->add_link_attributes('button', $settings['button_link']);

        ?>

        <section class="special-offer-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-0 order-lg-2">
                        <div class="special-offer-img wow fadeInRight" data-wow-delay=".2s">
                            <?php if (!empty($bg_image)): ?>
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                            <?php endif; ?>

                            <?php if (!empty($settings['offer_text'])): ?>
                            <div class="special-offer-text"><?php echo bdevs_element_kses_intermediate($settings['offer_text']); ?></div>
                            <?php endif; ?>

                            <?php if (!empty($settings['offer_mb'])): ?>
                            <div class="special-offer-mbps">
                                <span><?php print esc_html__('UP TO', 'netfix'); ?></span>
                                <h3 class="title"><?php echo bdevs_element_kses_intermediate($settings['offer_mb']); ?></h3>
                                <p><?php print esc_html__('PER Second', 'netfix'); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title mb-40">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <div class="special-offer-content bdevs-el-content">
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <div class="special-price-wrap">
                                <h2 class="special-price"><sup><?php echo bdevs_element_kses_intermediate($settings['currency']); ?></sup><?php echo bdevs_element_kses_intermediate($settings['price']); ?><sub><?php print esc_html__('Monthly', 'netfix'); ?></sub></h2>
                                <p class="trial-link"><i class="flaticon-wifi-router"></i><a href="<?php echo esc_url( $settings['price_url'] ); ?>"><?php echo bdevs_element_kses_intermediate($settings['price_text']); ?></a></p>
                            </div>

                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php else:

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'bdevs-el-title title');

        $this->add_render_attribute('button', 'class', 'btn s-btn bdevs-el-btn');
        $this->add_render_attribute('button', 'data-wow-delay', '');
        $this->add_link_attributes('button', $settings['button_link']);
        ?>

        <section class="video-area video-bg" data-background="<?php echo esc_url($bg_image); ?>">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4">
                        <?php if (!empty($settings['video_url'])): ?>
                        <div class="video-paly">
                            <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="popup-video"><i class="fas fa-play"></i></a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="section-title mb-40">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <div class="video-content-wrap bdevs-el-content">
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            <div class="fact-wrap">
                                <div class="row">
                                    <?php foreach ($settings['slides'] as $slide): ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="fact-item">
                                            <h4 class="title"><span class="odometer" data-count="<?php echo bdevs_element_kses_intermediate($slide['number']); ?>"></span><?php echo bdevs_element_kses_basic($slide['sign']); ?></h4>

                                            <?php if (!empty($slide['title'])) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['title']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>


                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>
        <?php
    }
}
