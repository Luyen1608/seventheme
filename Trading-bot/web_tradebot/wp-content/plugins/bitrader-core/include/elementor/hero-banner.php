<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Bitrader Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Hero_Banner extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'hero-banner';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Hero Banner', 'genixcore');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'genix-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['genixcore'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['genixcore'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        // layout Panel
        $this->start_controls_section(
            'genix_layout',
            [
                'label' => esc_html__('Design Layout', 'genixcore'),
            ]
        );
        $this->add_control(
            'tg_design_style',
            [
                'label' => esc_html__('Select Layout', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'genixcore'),
                    'layout-2' => esc_html__('Layout 2', 'genixcore'),
                    'layout-3' => esc_html__('Layout 3', 'genixcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();


        // Banner
        $this->start_controls_section(
            '__tg_banner_bg',
            [
                'label' => esc_html__('Banner Background', 'genixcore'),
                'condition' => [
                    'tg_design_style!' => 'layout-3'
                ]
            ]
        );

        $this->add_control(
            'banner_bg',
            [
                'label' => esc_html__('Choose Background', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Banner Content
        $this->start_controls_section(
            '_tg_banner_content',
            [
                'label' => esc_html__('Banner Content', 'genixcore'),
            ]
        );

        $this->add_control(
            'content_img',
            [
                'label' => esc_html__('Choose Image', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tg_design_style!' => 'layout-2'
                ]
            ]
        );

        $this->add_control(
            'banner_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Invest your money with higher return', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_desc',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Anyone can invest money to different currency to increase their earnings by the help of Bitrader through online.', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Banner Button
        $this->start_controls_section(
            '_tg_banner_btn',
            [
                'label' => esc_html__('Banner Button', 'genixcore'),
            ]
        );

        $this->add_control(
            'banner_button_show',
            [
                'label' => esc_html__('Show Button', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'genixcore'),
                'label_off' => esc_html__('Hide', 'genixcore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'banner_btn_text',
            [
                'label' => esc_html__('Button Text', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'genixcore'),
                'title' => esc_html__('Enter button text', 'genixcore'),
                'label_block' => true,
                'condition' => [
                    'banner_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'banner_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link',
            [
                'label' => esc_html__('Button link', 'genixcore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'genixcore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'tg_btn_link_type' => '1',
                    'banner_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tg_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'genixcore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => genix_get_all_pages(),
                'condition' => [
                    'tg_btn_link_type' => '2',
                    'banner_button_show' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // Banner Video Button
        $this->start_controls_section(
            '_tg_banner_video_btn',
            [
                'label' => esc_html__('Banner Video Button', 'genixcore'),
            ]
        );

        $this->add_control(
            'video_btn_show',
            [
                'label' => esc_html__('Show Button', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'genixcore'),
                'label_off' => esc_html__('Hide', 'genixcore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'video_btn_text',
            [
                'label' => esc_html__('Button Text', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Watch Video', 'genixcore'),
                'title' => esc_html__('Enter button text', 'genixcore'),
                'label_block' => true,
                'condition' => [
                    'video_btn_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'video_btn_url',
            [
                'label' => esc_html__('Video URL', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('https://www.youtube.com/watch?v=6mkoGSqTqFI', 'genixcore'),
                'title' => esc_html__('Enter button url', 'genixcore'),
                'label_block' => true,
                'condition' => [
                    'video_btn_show' => 'yes'
                ],
            ]
        );

        $this->end_controls_section();

        // Banner Social
        $this->start_controls_section(
            '_tg_banner_social',
            [
                'label' => esc_html__('Banner Social', 'genixcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ]
            ]
        );

        $this->add_control(
            'banner_social_show',
            [
                'label' => esc_html__('Show Social', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'genixcore'),
                'label_off' => esc_html__('Hide', 'genixcore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'social_title',
            [
                'label' => esc_html__('Social Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Follow Us', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        if (genix_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'tg_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-facebook',
                ]
            );
        } else {
            $repeater->add_control(
                'tg_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fab fa-facebook-f',
                        'library' => 'solid',
                    ],
                ]
            );
        }

        $repeater->add_control(
            'social_url',
            [
                'label' => esc_html__('Social URL', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'item_lists',
            [
                'label' => esc_html__('Social Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_url' => esc_html__('#', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Banner Image
        $this->start_controls_section(
            '_tg_banner_image',
            [
                'label' => esc_html__('Banner Image', 'genixcore'),
            ]
        );

        $this->add_control(
            'banner_img',
            [
                'label' => esc_html__('Choose Image', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'exclude' => ['custom'],
                'default' => 'full',
            ]
        );

        $this->add_control(
            'banner_img_shape',
            [
                'label' => esc_html__('Choose Shape', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ]
            ]
        );

        $this->end_controls_section();

        // Banner Fact
        $this->start_controls_section(
            '__tg_banner_fact',
            [
                'label' => esc_html__('Banner Fun Fact', 'genixcore'),
                'condition' => [
                    'tg_design_style' => 'layout-3'
                ]
            ]
        );

        $this->add_control(
            'banner_fact_show',
            [
                'label' => esc_html__('Show Fact List', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'genixcore'),
                'label_off' => esc_html__('Hide', 'genixcore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $fact = new \Elementor\Repeater();

        $fact->add_control(
            'fact_digit',
            [
                'label' => esc_html__('Counter Digit', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('10', 'genixcore'),
                'label_block' => true,
            ]
        );

        $fact->add_control(
            'fact_caption',
            [
                'label' => esc_html__('Caption', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Years', 'genixcore'),
                'label_block' => true,
            ]
        );

        $fact->add_control(
            'fact_desc',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Trading experience', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'fact_item_lists',
            [
                'label' => esc_html__('Fact Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $fact->get_controls(),
                'default' => [
                    [
                        'fact_digit' => esc_html__('10', 'genixcore'),
                        'fact_caption' => esc_html__('Years', 'genixcore'),
                        'fact_desc' => esc_html__('Trading experience', 'genixcore'),
                    ],
                    [
                        'fact_digit' => esc_html__('24', 'genixcore'),
                        'fact_caption' => esc_html__('/7', 'genixcore'),
                        'fact_desc' => esc_html__('Online Support', 'genixcore'),
                    ],
                    [
                        'fact_digit' => esc_html__('25', 'genixcore'),
                        'fact_caption' => esc_html__('K+', 'genixcore'),
                        'fact_desc' => esc_html__('satisfied Customers', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Banner Shapes
        $this->start_controls_section(
            '__tg_banner_shapes',
            [
                'label' => esc_html__('Banner Shapes', 'genixcore'),
                'condition' => [
                    'tg_design_style' => 'layout-3'
                ]
            ]
        );

        $this->add_control(
            'banner_shape01',
            [
                'label' => esc_html__('Choose Shape', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'banner_shape02',
            [
                'label' => esc_html__('Choose Shape', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // TAB_STYLE
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => esc_html__('Content & Typography', 'genixcore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Section Padding', 'genixcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tg-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__('Title', 'genixcore'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'genixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__('Description', 'genixcore'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'genixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .tg-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Text Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tg-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .tg-content p',
            ]
        );

        $this->end_controls_section();
    }


    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Image
        if (!empty($settings['banner_img']['url'])) {
            $tg_banner_image_url = !empty($settings['banner_img']['id']) ? wp_get_attachment_image_url($settings['banner_img']['id'], $settings['thumbnail_size']) : $settings['banner_img']['url'];
            $tg_banner_image_alt = get_post_meta($settings["banner_img"]["id"], "_wp_attachment_image_alt", true);
        } ?>

        <script>
            jQuery(document).ready(function($) {

                AOS.init();

            });
        </script>


        <?php if ($settings['tg_design_style'] == 'layout-2') :

            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'trk-btn trk-btn--primary trk-btn--arrowplay');
            } else {
                if (!empty($settings['tg_btn_link']['url'])) {
                    $this->add_link_attributes('tg-button-arg', $settings['tg_btn_link']);
                    $this->add_render_attribute('tg-button-arg', 'class', 'trk-btn trk-btn--primary trk-btn--arrowplay');
                }
            }

        ?>

            <section class="banner banner--style2 bg-color-3 bg--cover tg-section" style="background-image:url(<?php echo esc_url($settings['banner_bg']['url']); ?>)">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 1920 739" class="bg-shape-svg">
                    <clipPath id="shape-clippath">
                        <path d="M0 0H1920V350.233C1920 483.334 1821.85 596.054 1690.02 614.364L303.352 806.957C143.029 829.224 0 704.687 0 542.825V0Z" />
                    </clipPath>
                </svg>

                <div class="container">
                    <div class="banner__wrapper banner__wrapper--style2">
                        <div class="row flex-md-row-reverse gx-5">
                            <div class="col-lg-6 col-md-7">
                                <div class="banner__content tg-content" data-aos="fade-<?php echo is_rtl() ? 'right' : 'left' ?>" data-aos-duration="1000">

                                    <?php if (!empty($settings['banner_title'])) : ?>
                                        <h1 class="banner__content-heading banner__content-heading--style2 title">
                                            <?php echo genix_kses($settings['banner_title']) ?>
                                        </h1>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_desc'])) : ?>
                                        <p class="banner__content-moto">
                                            <?php echo genix_kses($settings['banner_desc']) ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_button_show'] || $settings['video_btn_show'])) : ?>
                                        <div class="btn-group">
                                            <?php if (!empty($settings['banner_button_show'])) : ?>
                                                <a <?php echo $this->get_render_attribute_string('tg-button-arg'); ?>>
                                                    <?php echo $settings['banner_btn_text']; ?>
                                                    <span class="style2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M9.74165 7.59173C9.81874 7.51447 9.91032 7.45318 10.0111 7.41137C10.1119 7.36955 10.22 7.34802 10.3291 7.34802C10.4383 7.34802 10.5464 7.36955 10.6472 7.41137C10.748 7.45318 10.8396 7.51447 10.9166 7.59173L14.7416 11.4167C14.8189 11.4938 14.8802 11.5854 14.922 11.6862C14.9638 11.787 14.9854 11.8951 14.9854 12.0042C14.9854 12.1134 14.9638 12.2214 14.922 12.3222C14.8802 12.4231 14.8189 12.5146 14.7416 12.5917L10.9166 16.4167C10.8395 16.4939 10.7479 16.5551 10.6471 16.5968C10.5463 16.6386 10.4383 16.6601 10.3291 16.6601C10.22 16.6601 10.112 16.6386 10.0112 16.5968C9.91039 16.5551 9.8188 16.4939 9.74165 16.4167C9.6645 16.3396 9.6033 16.248 9.56154 16.1472C9.51979 16.0464 9.4983 15.9383 9.4983 15.8292C9.4983 15.7201 9.51979 15.6121 9.56154 15.5113C9.6033 15.4105 9.6645 15.3189 9.74165 15.2417L12.975 12.0001L9.74165 8.76673C9.41665 8.44173 9.42498 7.90839 9.74165 7.59173Z" fill="#0C263A" />
                                                            <rect x="-0.75" y="0.75" width="22.5" height="22.5" rx="11.25" transform="matrix(-1 0 0 1 22.5 0)" stroke="black" stroke-opacity="0.16" stroke-width="1.5" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (!empty($settings['video_btn_show'])) : ?>
                                                <a href="<?php echo esc_url($settings['video_btn_url']) ?>" class="trk-btn trk-btn--outline3" data-fslightbox>
                                                    <span class="style1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <g clip-path="url(#clip0_1397_814)">
                                                                <path d="M10.5547 7.03647C9.89015 6.59343 9 7.06982 9 7.86852V16.1315C9 16.9302 9.89015 17.4066 10.5547 16.9635L16.7519 12.8321C17.3457 12.4362 17.3457 11.5638 16.7519 11.1679L10.5547 7.03647Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                            <rect x="-0.75" y="0.75" width="22.5" height="22.5" rx="11.25" transform="matrix(-1 0 0 1 22.5 0)" stroke="#fff" stroke-width="1.5" />
                                                            <defs>
                                                                <clipPath id="clip0_1397_814">
                                                                    <rect width="24" height="24" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </span> <?php echo genix_kses($settings['video_btn_text']) ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <?php if (!empty($tg_banner_image_url)) : ?>
                                <div class="col-lg-6 col-md-5">
                                    <div class="banner__thumb">
                                        <img src="<?php echo esc_url($tg_banner_image_url); ?>" alt="<?php echo esc_attr($tg_banner_image_alt) ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif ($settings['tg_design_style'] == 'layout-3') :
            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'trk-btn trk-btn--primary');
            } else {
                if (!empty($settings['tg_btn_link']['url'])) {
                    $this->add_link_attributes('tg-button-arg', $settings['tg_btn_link']);
                    $this->add_render_attribute('tg-button-arg', 'class', 'trk-btn trk-btn--primary');
                }
            }

        ?>

            <section class="banner banner--style3 tg-section">
                <?php if (!empty($settings['banner_bg']['url'])) : ?>
                    <div class="banner__bg">
                        <div class="banner__bg-element">
                            <img src="<?php echo esc_url($settings['banner_bg']['url']); ?>" alt="<?php echo esc_attr__('section-bg-element', 'genixcore') ?>">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="container">
                    <div class="banner__wrapper">
                        <div class="row gy-5 gx-4 align-items-end">
                            <div class="col-lg-5 col-md-5">
                                <div class="banner__content tg-content" data-aos="fade-<?php echo is_rtl() ? 'left' : 'right' ?>" data-aos-duration="1000">

                                    <?php if (!empty($settings['content_img']['url'])) : ?>
                                        <div class="banner__content-coin banner__content-coin--style2">
                                            <img src="<?php echo esc_url($settings['content_img']['url']); ?>" alt="<?php echo esc_attr__('Coin icon', 'genixcore') ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_title'])) : ?>
                                        <h1 class="banner__content-heading title"><?php echo genix_kses($settings['banner_title']) ?></h1>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_desc'])) : ?>
                                        <p class="banner__content-moto"><?php echo genix_kses($settings['banner_desc']) ?></p>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_button_show'] || $settings['video_btn_show'])) : ?>
                                        <div class="banner__btn-group btn-group">
                                            <?php if (!empty($settings['banner_button_show'])) : ?>
                                                <a <?php echo $this->get_render_attribute_string('tg-button-arg'); ?>>
                                                    <?php echo $settings['banner_btn_text']; ?>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (!empty($settings['video_btn_show'])) : ?>
                                                <a href="<?php echo esc_url($settings['video_btn_url']) ?>" class="trk-btn trk-btn--defult" data-fslightbox>
                                                    <span class="style1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <g clip-path="url(#clip0_1397_814)">
                                                                <path d="M10.5547 7.03647C9.89015 6.59343 9 7.06982 9 7.86852V16.1315C9 16.9302 9.89015 17.4066 10.5547 16.9635L16.7519 12.8321C17.3457 12.4362 17.3457 11.5638 16.7519 11.1679L10.5547 7.03647Z" stroke="#0A4FD5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                            <rect x="-0.75" y="0.75" width="22.5" height="22.5" rx="11.25" transform="matrix(-1 0 0 1 22.5 0)" stroke="#0A4FD5" stroke-width="1.5" />
                                                            <defs>
                                                                <clipPath id="clip0_1397_814">
                                                                    <rect width="24" height="24" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </span>
                                                    <span class="d-md-none d-lg-block">
                                                        <?php echo genix_kses($settings['video_btn_text']) ?>
                                                    </span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($tg_banner_image_url)) : ?>
                                <div class="col-lg-4 col-md-4">
                                    <div class="banner__thumb">
                                        <img src="<?php echo esc_url($tg_banner_image_url); ?>" alt="<?php echo esc_attr($tg_banner_image_alt) ?>">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['banner_fact_show'])) : ?>
                                <div class="col-lg-3 col-md-3">
                                    <div class="banner__counter">
                                        <div class="banner__counter-inner">
                                            <?php foreach ($settings['fact_item_lists'] as $item) : ?>
                                                <div class="banner__counter-item">
                                                    <?php if (!empty($item['fact_digit'])) : ?>
                                                        <h4> <span class="purecounter" data-purecounter-start="0" data-purecounter-end="<?php echo esc_attr($item['fact_digit']) ?>"><?php echo esc_html($item['fact_digit']) ?></span><?php echo esc_html($item['fact_caption']) ?>
                                                        </h4>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['fact_desc'])) : ?>
                                                        <p><?php echo esc_html($item['fact_desc']) ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="banner__shape">
                    <?php if (!empty($settings['banner_shape01']['url'])) : ?>
                        <span class="banner__shape-item banner__shape-item--3"><img src="<?php echo esc_url($settings['banner_shape01']['url']); ?>" width="106" alt="<?php echo esc_attr__('shape icon', 'genixcore') ?>"></span>
                    <?php endif; ?>

                    <?php if (!empty($settings['banner_shape02']['url'])) : ?>
                        <span class="banner__shape-item banner__shape-item--4"><img src="<?php echo esc_url($settings['banner_shape02']['url']); ?>" width="48" alt="<?php echo esc_attr__('shape icon', 'genixcore') ?>"></span>
                    <?php endif; ?>
                </div>

            </section>

        <?php else :
            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'trk-btn trk-btn--primary trk-btn--arrow');
            } else {
                if (!empty($settings['tg_btn_link']['url'])) {
                    $this->add_link_attributes('tg-button-arg', $settings['tg_btn_link']);
                    $this->add_render_attribute('tg-button-arg', 'class', 'trk-btn trk-btn--primary trk-btn--arrow');
                }
            }
        ?>

            <section class="banner banner--style1 tg-section">

                <?php if (!empty($settings['banner_bg']['url'])) : ?>
                    <div class="banner__bg">
                        <div class="banner__bg-element">
                            <img src="<?php echo esc_url($settings['banner_bg']['url']); ?>" alt="<?php echo esc_attr__('section-bg-element', 'genixcore') ?>" class="dark d-none d-lg-block">
                            <span class="bg-color d-lg-none"></span>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="container">
                    <div class="banner__wrapper">
                        <div class="row gy-5 gx-4">
                            <div class="col-lg-6 col-md-7">
                                <div class="banner__content tg-content" data-aos="fade-<?php echo is_rtl() ? 'left' : 'right' ?>" data-aos-duration="1000">
                                    <?php if (!empty($settings['content_img']['url'])) : ?>
                                        <div class="banner__content-coin">
                                            <img src="<?php echo esc_url($settings['content_img']['url']); ?>" alt="<?php echo esc_attr__('Coin icon', 'genixcore') ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_title'])) : ?>
                                        <h1 class="banner__content-heading title">
                                            <?php echo genix_kses($settings['banner_title']) ?>
                                        </h1>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_desc'])) : ?>
                                        <p class="banner__content-moto">
                                            <?php echo genix_kses($settings['banner_desc']) ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_button_show'] || $settings['video_btn_show'])) : ?>
                                        <div class="banner__btn-group btn-group">

                                            <?php if (!empty($settings['banner_button_show'])) : ?>
                                                <a <?php echo $this->get_render_attribute_string('tg-button-arg'); ?>>
                                                    <?php echo $settings['banner_btn_text']; ?>
                                                    <span><i class="fas fa-arrow-right"></i></span>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (!empty($settings['video_btn_show'])) : ?>
                                                <a href="<?php echo esc_url($settings['video_btn_url']) ?>" class="trk-btn trk-btn--outline22" data-fslightbox>
                                                    <span class="style1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <g clip-path="url(#clip0_1397_814)">
                                                                <path d="M10.5547 7.03647C9.89015 6.59343 9 7.06982 9 7.86852V16.1315C9 16.9302 9.89015 17.4066 10.5547 16.9635L16.7519 12.8321C17.3457 12.4362 17.3457 11.5638 16.7519 11.1679L10.5547 7.03647Z" stroke="#0A4FD5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                            <rect x="-0.75" y="0.75" width="22.5" height="22.5" rx="11.25" transform="matrix(-1 0 0 1 22.5 0)" stroke="#0A4FD5" stroke-width="1.5" />
                                                            <defs>
                                                                <clipPath id="clip0_1397_814">
                                                                    <rect width="24" height="24" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </span> <?php echo genix_kses($settings['video_btn_text']) ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['banner_social_show'])) : ?>
                                        <div class="banner__content-social">
                                            <?php if (!empty($settings['social_title'])) : ?>
                                                <p><?php echo genix_kses($settings['social_title']) ?></p>
                                            <?php endif; ?>
                                            <ul class="social">
                                                <?php foreach ($settings['item_lists'] as $item) : ?>
                                                    <li class="social__item">
                                                        <a href="<?php echo esc_url($item['social_url']); ?>" class="social__link social__link--style1">
                                                            <?php genix_render_icon($item, 'tg_icon', 'tg_selected_icon'); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($tg_banner_image_url)) : ?>
                                <div class="col-lg-6 col-md-5">
                                    <div class="banner__thumb" data-aos="fade-<?php echo is_rtl() ? 'right' : 'left' ?>" data-aos-duration="1000">
                                        <img src="<?php echo esc_url($tg_banner_image_url); ?>" alt="<?php echo esc_attr($tg_banner_image_alt) ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if (!empty($settings['banner_img_shape']['url'])) : ?>
                    <div class="banner__shape">
                        <span class="banner__shape-item banner__shape-item--1"><img src="<?php echo esc_url($settings['banner_img_shape']['url']); ?>" width="43" alt="<?php echo esc_attr__('shape icon', 'genixcore') ?>"></span>
                    </div>
                <?php endif; ?>
            </section>
            <!-- banner-area-end -->

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_Hero_Banner());
