<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Group_Control_Text_Shadow;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;



defined( 'ABSPATH' ) || die();

class Video_Slider extends BDevs_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'video_slider';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Video Slider', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/icon-box/';
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-preview-medium';
    }

    public function get_keywords() {
        return [ 'Slider', 'Video', 'icon' ];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'shape_image_show',
                [
                'label' => esc_html__( 'Shape Switcher', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'bdevselement' ),
                'label_off' => esc_html__( 'No', 'bdevselement' ),
                //'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'design_style!' => ['style_1'],
                ]
                ]
            );

        $this->end_controls_section();


         $this->start_controls_section(
            '_section_title_here',
            [
                'label' => __('Title & Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2'],
                ]
            ]
        );

        $this->add_control(
            'section_sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Now Streaming', 'bdevselement'),
                'placeholder' => __('Type Sub Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Popular TV Shows', 'bdevselement'),
                'placeholder' => __('Type Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_control(
            'section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Go Premium', 'bdevselement' ),
                'placeholder' => __( 'Button Text', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'section_button_url',
            [
                'label' => __( 'Button URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Button Link', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            '_section_slider',
            [
                'label' => __( 'Slider List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __( 'Field condition', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'field_condition_1' => __( 'Default Slider', 'bdevselement' ),
                    'field_condition_2' => __( 'Slider 2', 'bdevselement' ),
                ],
                'default' => 'field_condition_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );


        $repeater->add_control(
            'bg_image',
            [
                'label' => __( 'BG Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'slide_tag_flash',
            [
                'label' => __( 'Tag Flash', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Slide Tag', 'bdevselement' ),
                'placeholder' => __( 'Type Slide Tag', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'video_url',
            [
                'label' => __( 'Video URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
                'placeholder' => __( 'Type Video URL', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'slide_sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Slide Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'slide_title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Slide Title', 'bdevselement' ),
                'placeholder' => __( 'Type Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'slide_url',
            [
                'label' => __( 'URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Url here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'slide_week',
            [
                'label' => __( 'Days in Week', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Fri - Mon', 'bdevselement' ),
                'placeholder' => __( 'Week duration here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['field_condition_1']
                ]
            ]
        );

        $repeater->add_control(
            'slide_time',
            [
                'label' => __( 'Watch Time', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '9:30', 'bdevselement' ),
                'placeholder' => __( 'Place Time', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['field_condition_1']
                ]
            ]
        );
        
        $repeater->add_control(
            'slide_meridium',
            [
                'label' => __( 'AM or PM', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => __( 'PM', 'bdevselement' ),
                'placeholder' => __( 'Place AM or PM', 'bdevselement' ),
                'options' => [
                    'AM' => __('AM', 'bdevselement'),
                    'PM' => __('PM', 'bdevselement'),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['field_condition_1']
                ]
            ]
        );

        $repeater->add_control(
            'slide_review_count',
            [
                'label' => __( 'Review Count', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '(80 Reviews)', 'bdevselement' ),
                'placeholder' => __( 'Review Count', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['field_condition_1']
                ]
            ]
        );
        $repeater->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'bdevselement' ),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevselement' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
                'condition' => [
                    'field_condition' => ['field_condition_1']
                ]
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image',
                    'field_condition' => ['field_condition_1']
                ],
                'dynamic' => [
                    'active' => true,
                ]
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
                    'type' => 'image',
                    'field_condition' => ['field_condition_1']
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon',
                        'field_condition' => ['field_condition_1']
                    ]
                ]
            );
        } 
        else {
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
                        'type' => 'icon',
                        'field_condition' => ['field_condition_1']
                    ]
                ]
            );
        }

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(slide_title || "Carousel Item"); #>',
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
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->add_group_control(
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
                ]
            ]
        );

        $this->add_responsive_control(
            'align_slide',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
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

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'description', 'none' );
        $this->add_render_attribute( 'description', 'class', 'content-desc' );

        ?>

        <?php if ( $settings['design_style'] === 'style_2' ): ?>
            <section class="services__area-2 p-relative d-none">
                <div class="container">
                    <div class="row no-gutters">
                        <?php foreach ( $settings['slides'] as $slide ):
                            if ( !empty($slide['image']['id']) ) {
                                $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                if ( ! $image ) {
                                    $image = $slide['image']['url'];
                                }
                            }
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="services__item services__item-2 mb-30 transition-3 white-bg wow fadeInUp2 bdevs-el-content" data-wow-delay=".2s">
                                <div class="services__icon mb-35">
                                    <?php if( !empty($slide['selected_icon']) ): ?>
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                    <?php endif; ?>
                                </div>
                                <div class="services__content services__content-2">
                                    <?php if( $slide['title'] ) : ?>
                                    <h3 class="bdevs-el-title"><a href="<?php echo esc_url( $slide['f_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h3>
                                    <?php endif; ?>

                                    <?php if( $slide['description'] ) : ?>
                                    <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="streaming-two-area streaming-two-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <div class="streaming-two-title">
                                <?php if( !empty($settings['section_sub_title']) ) : ?>
                                <span class="sub-title"><?php echo bdevs_element_kses_basic($settings['section_sub_title']); ?></span>
                                <?php endif; ?>
                                <?php if( !empty($settings['section_title']) ) : ?>
                                <h2 class="title"><?php echo bdevs_element_kses_basic($settings['section_title']); ?></h2>
                                <?php endif; ?>
                                <?php if( !empty($settings['section_button']) ) : ?>
                                <a href="<?php echo esc_url($settings['section_button_url']); ?>" class="btn s-btn transparent-btn bdevs-el-btn"><?php echo bdevs_element_kses_basic($settings['section_button']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="streaming-two-active owl-carousel">
                                <?php foreach ( $settings['slides'] as $slide ):
                                    if ( !empty($slide['bg_image']['id']) ) {
                                        $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], $settings['thumbnail_size'] );
                                    }

                                    if ( !empty($slide['image']['id']) ) {
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                    }
                                ?>
                                <div class="streaming-two-item">
                                    <div class="streaming-two-thumb">
                                        <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                                        <?php if( !empty($slide['slide_tag_flash']) ) : ?>
                                        <span class="tag"><?php echo esc_html($slide['slide_tag_flash']); ?></span>
                                        <?php endif; ?>
                                        <?php if( !empty($slide['video_url']) ) : ?>
                                        <a href="<?php echo esc_url($slide['video_url']); ?>" class="popup-video"><i class="fas fa-play"></i></a>
                                        <?php endif; ?>

                                    </div>

                                    <div class="streaming-two-content">
                                    <?php if( !empty($slide['slide_sub_title']) ) : ?>
                                    <span><?php echo bdevs_element_kses_basic($slide['slide_sub_title']); ?></span>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['slide_title']) ) : ?>
                                    <h4 class="title"><a href="<?php echo esc_url($slide['slide_url']); ?>"><?php echo bdevs_element_kses_basic($slide['slide_title']); ?></a></h4>
                                    <?php endif; ?>
                                    </div>

                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php if( !empty($settings['shape_image_show']) ) : ?>                        
                <div class="streaming-shape one"><img src="https://bdevs.net/wp/netfix/wp-content/uploads/2022/01/streaming_shape01.png" alt="<?php echo esc_html__('shape-img', 'bdevselement'); ?>"></div>
                <?php endif; ?>
                <?php if( !empty($settings['shape_image_show']) ) : ?> 
                <div class="streaming-shape two"><img src="https://bdevs.net/wp/netfix/wp-content/uploads/2022/01/streaming_shape02.png" alt="<?php echo esc_html__('shape-img', 'bdevselement'); ?>"></div>
                <?php endif; ?>
                <?php if( !empty($settings['shape_image_show']) ) : ?> 
                <div class="streaming-shape three"><img src="https://bdevs.net/wp/netfix/wp-content/uploads/2022/01/streaming_shape03.png" alt="<?php echo esc_html__('shape-img', 'bdevselement'); ?>"></div>
                <?php endif; ?>
            </section>




        <?php else: 

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'big_title mb-0' );

        $this->add_render_attribute( 'button', 'class', 'text_btn' );

        if ( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }
        ?>

        <div class="row">
            <div class="col-12">
                <div id="streaming-active">
                    <ul>
                        <?php foreach ( $settings['slides'] as $slide ):
                            if ( !empty($slide['bg_image']['id']) ) {
                                $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], $settings['thumbnail_size'] );
                            }

                            if ( !empty($slide['image']['id']) ) {
                                $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            }
                        ?>
                        <li>
                            <div class="streaming-item">
                                <div class="streaming-thumb">
                                    <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                                    <?php if( !empty($slide['slide_tag_flash']) ) : ?>
                                    <span class="tag"><?php echo esc_html($slide['slide_tag_flash']); ?></span>
                                    <?php endif; ?>
                                    <?php if( !empty($slide['video_url']) ) : ?>
                                    <a href="<?php echo esc_url($slide['video_url']); ?>" class="popup-video"><i class="fas fa-play"></i></a>
                                    <?php endif; ?>
                                </div>
                                <div class="streaming-content">
                                    <?php if( !empty($slide['slide_sub_title']) ) : ?>
                                    <span class="category"><?php echo bdevs_element_kses_basic($slide['slide_sub_title']); ?></span>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['slide_title']) ) : ?>
                                    <h5 class="title"><a href="<?php echo esc_url($slide['slide_url']); ?>"><?php echo bdevs_element_kses_basic($slide['slide_title']); ?></a></h5>
                                    <?php endif; ?>
                                    <div class="stream-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>

                                        <?php if( !empty($slide['slide_review_count']) ) : ?>
                                        <span><?php echo bdevs_element_kses_basic($slide['slide_review_count']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="streaming-time">
                                        <p><?php echo bdevs_element_kses_basic($slide['slide_week']); ?> <span><?php echo bdevs_element_kses_basic($slide['slide_time']); ?></span> <?php echo bdevs_element_kses_basic($slide['slide_meridium']); ?></p>
                                        <div class="stream-logo">
                                        <?php if( !empty($slide['selected_icon']) ): ?>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                            <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>




        <?php endif; ?>
        
        <?php
    }

}
