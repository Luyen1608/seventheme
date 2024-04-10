<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Dexai Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Advanced_Tab extends Widget_Base
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
        return 'offer-tab';
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
        return __('Offer Tab', 'genixcore');
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

        // TITLE AND CONTENT
        $this->start_controls_section(
            '_section_title_tabs',
            [
                'label' => esc_html__('Title & Content', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'genixcore'),
                'default' => esc_html__('Benefits We Offer', 'genixcore'),
                'label_block' => true,
                'placeholder' => esc_html__('Type Title Here', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_desc',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Description', 'genixcore'),
                'default' => esc_html__('Unlock the full potential of our product with our amazing features and top-notch.', 'genixcore'),
                'label_block' => true,
                'placeholder' => esc_html__('Type Title Here', 'genixcore'),
            ]
        );

        $this->end_controls_section();


        // ADVANCE TAB
        $this->start_controls_section(
            '_section_offer_tabs',
            [
                'label' => esc_html__('Offer Tabs', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_item'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => esc_html__('Tab Title', 'genixcore'),
            ]
        );

        $repeater->add_control(
            'tab_title',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Title', 'genixcore'),
                'default' => esc_html__('Lending money for investment of your new projects', 'genixcore'),
                'label_block' => true,
                'placeholder' => esc_html__('Type Tab Title', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => esc_html__('Images', 'genixcore'),
            ]
        );

        $repeater->add_control(
            'tg_img',
            [
                'label' => esc_html__('Upload Image', 'genixcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'show_box01',
            [
                'label' => esc_html__('Show top box?', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'genixcore'),
                'label_off' => esc_html__('No', 'genixcore'),
                'return_value' => 'yes',
                'style_transfer' => true,
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'chart_img',
            [
                'label' => esc_html__('Upload Chart Image', 'genixcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'show_box01' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'chart_title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Chart Title', 'genixcore'),
                'default' => esc_html__('Interest Rate For Loan', 'genixcore'),
                'label_block' => true,
                'placeholder' => esc_html__('Type Tab Title', 'genixcore'),
                'condition' => [
                    'show_box01' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'show_box02',
            [
                'label' => esc_html__('Show bottom box?', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'genixcore'),
                'label_off' => esc_html__('No', 'genixcore'),
                'return_value' => 'yes',
                'style_transfer' => true,
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'count_number',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Counter Number', 'genixcore'),
                'default' => esc_html__('10M', 'genixcore'),
                'label_block' => true,
                'condition' => [
                    'show_box02' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'count_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Counter Text', 'genixcore'),
                'default' => esc_html__('Available for loan', 'genixcore'),
                'label_block' => true,
                'condition' => [
                    'show_box02' => 'yes'
                ]
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'tabs',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Lending money for investment of your new projects',
                    ],
                    [
                        'title' => 'more Security and control over money from the rest',
                    ],
                    [
                        'title' => 'Mobile payment is more flexible and easy for all investors',
                    ]
                ],
                'title_field' => '{{title}}',
            ]
        );

        $this->end_controls_section();

        // Shape
        $this->start_controls_section(
            '_section_shape_tabs',
            [
                'label' => esc_html__('Shape', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shape_img',
            [
                'label' => esc_html__('Upload Shape', 'genixcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        // Style Tab
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'genixcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => esc_html__('Text Transform', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('None', 'genixcore'),
                    'uppercase' => esc_html__('UPPERCASE', 'genixcore'),
                    'lowercase' => esc_html__('lowercase', 'genixcore'),
                    'capitalize' => esc_html__('Capitalize', 'genixcore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'text-transform: {{VALUE}};',
                ],
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
?>

        <script>
            jQuery(document).ready(function($) {

                AOS.init();

            });
        </script>

        <section class="feature feature--style1 padding-bottom padding-top bg-color">
            <div class="container">
                <div class="feature__wrapper">
                    <div class="row g-5 align-items-center justify-content-between">
                        <div class="col-md-6 col-lg-5">
                            <div class="feature__content" data-aos="fade-<?php echo is_rtl() ? 'left' : 'right' ?>" data-aos-duration="800">
                                <div class="feature__content-inner">

                                    <div class="section-header">
                                        <?php if (!empty($settings['tg_title'])) : ?>
                                            <h2 class="mb-15 mt-minus-5"><?php echo genix_kses($settings['tg_title']); ?></h2>
                                        <?php endif; ?>

                                        <?php if (!empty($settings['tg_desc'])) : ?>
                                            <p class="mb-0"><?php echo genix_kses($settings['tg_desc']); ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="feature__nav">
                                        <div class="nav nav--feature flex-column nav-pills" id="feat-pills-tab" role="tablist" aria-orientation="vertical">
                                            <?php $flag = true;
                                            foreach ($settings['tabs'] as $key => $tab) :
                                                $active = ($key == 0) ? 'active' : '';
                                            ?>
                                                <div class="nav-link <?php echo esc_attr($active); ?>" id="tg-tab-<?php echo esc_attr($key); ?>" data-bs-toggle="pill" data-bs-target="#tg-id-<?php echo esc_attr($key); ?>" role="tab" aria-controls="tg-id-<?php echo esc_attr($key); ?>" aria-selected="true">
                                                    <div class="feature__item">
                                                        <div class="feature__item-inner">
                                                            <div class="feature__item-content">
                                                                <h6><?php echo genix_kses($tab['tab_title']); ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $flag = false;
                                            endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="feature__thumb pt-5 pt-md-0" data-aos="fade-<?php echo is_rtl() ? 'right' : 'left' ?>" data-aos-duration="800">
                                <div class="feature__thumb-inner">
                                    <div class="tab-content" id="feat-pills-tabContent">
                                        <?php foreach ($settings['tabs'] as $key => $tab) :
                                            $active = ($key == 0) ? 'show active' : '';
                                        ?>
                                            <div class="tab-pane fade <?php echo esc_attr($active); ?>" id="tg-id-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="tg-tab-<?php echo esc_attr($key); ?>" tabindex="0">
                                                <div class="feature__image floating-content">

                                                    <?php if (!empty($tab['tg_img']['url'])) : ?>
                                                        <img src="<?php echo esc_url($tab['tg_img']['url']) ?>" alt="<?php echo esc_attr__('Feature image', 'genixcore') ?>">
                                                    <?php endif; ?>

                                                    <?php if (!empty($tab['show_box01'])) : ?>
                                                        <div class="floating-content__top-right floating-content__top-right--style2" data-aos="fade-<?php echo is_rtl() ? 'right' : 'left' ?>" data-aos-duration="1000">
                                                            <div class="floating-content__item floating-content__item--style2 text-center">
                                                                <?php if (!empty($tab['chart_img']['url'])) : ?>
                                                                    <img src="<?php echo esc_url($tab['chart_img']['url']) ?>" width="80" alt="<?php echo esc_attr__('Feature image', 'genixcore') ?>">
                                                                <?php endif; ?>
                                                                <?php if (!empty($tab['chart_title'])) : ?>
                                                                    <p class="style2"><?php echo genix_kses($tab['chart_title']); ?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (!empty($tab['show_box02'])) : ?>
                                                        <div class="floating-content__bottom-left floating-content__bottom-left--style2" data-aos="fade-<?php echo is_rtl() ? 'right' : 'left' ?>" data-aos-duration="1000">
                                                            <div class="floating-content__item floating-content__item--style3  d-flex align-items-center">
                                                                <?php if (!empty($tab['count_number'])) : ?>
                                                                    <h3 class="style2"><?php echo genix_kses($tab['count_number']); ?></h3>
                                                                <?php endif; ?>
                                                                <?php if (!empty($tab['count_text'])) : ?>
                                                                    <p class="ms-3 style2"><?php echo genix_kses($tab['count_text']); ?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature__shape">

                <?php if (!empty($settings['shape_img']['url'])) : ?>
                    <span class="feature__shape-item feature__shape-item--1">
                        <img src="<?php echo esc_url($settings['shape_img']['url']) ?>" width="70" alt="shape-icon">
                    </span>
                <?php endif; ?>
                <span class="feature__shape-item feature__shape-item--2"> <span></span> </span>
            </div>
        </section>

<?php
    }
}
$widgets_manager->register(new TG_Advanced_Tab());
