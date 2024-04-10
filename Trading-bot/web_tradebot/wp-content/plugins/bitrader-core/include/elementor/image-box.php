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
 * Bitrader Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_ImageBox extends Widget_Base
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
        return 'genix-image';
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
        return __('Image Box', 'genixcore');
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
                    'layout-4' => esc_html__('Layout 4', 'genixcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section',
            [
                'label' => esc_html__('Image', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_image',
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
                'name' => 'tg_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        // _tg_author
        $this->start_controls_section(
            '_tg_author_info',
            [
                'label' => esc_html__('Author Info', 'genixcore'),
                'condition' => [
                    'tg_design_style' => ['layout-3']
                ]
            ]
        );

        $this->add_control(
            'tg_author_image',
            [
                'label' => esc_html__('Choose Image', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'author_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses_post('Mobarok Hossain', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'author_desc',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses_post('Founder & MD', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // _tg_info_box
        $this->start_controls_section(
            '_tg_info_box01',
            [
                'label' => esc_html__('Info Box', 'genixcore'),
                'condition' => [
                    'tg_design_style' => ['layout-1', 'layout-4']
                ]
            ]
        );

        $this->add_control(
            'info_title',
            [
                'label' => esc_html__('Info Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses_post('10 Years', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'info_desc',
            [
                'label' => esc_html__('Info Description', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => wp_kses_post('Consulting Experience', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'progress_percentage',
            [
                'label' => esc_html__('Progress Bar', 'genixcore'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .progress-bar' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'tg_design_style' => ['layout-4']
                ]
            ]
        );

        $this->end_controls_section();

        // _tg_info_box
        $this->start_controls_section(
            '_tg_info_box02',
            [
                'label' => esc_html__('Info Box 02', 'genixcore'),
                'condition' => [
                    'tg_design_style' => ['layout-1']
                ]
            ]
        );

        $this->add_control(
            'info_title2',
            [
                'label' => esc_html__('Info Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses_post('25K+', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'info_desc2',
            [
                'label' => esc_html__('Info Description', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => wp_kses_post('Satisfied Customers', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Style
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
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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

        if (!empty($settings['tg_image']['url'])) {
            $tg_image_url = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url($settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
            $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
        }
?>

        <script>
            jQuery(document).ready(function($) {

                AOS.init();

            });
        </script>

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <?php if (!empty($tg_image_url)) : ?>
                <div class="about__thumb about__thumb--style2" data-aos="fade-<?php echo is_rtl() ? 'right' : 'left' ?>" data-aos-duration="800">
                    <div class="about__thumb-inner mt-30 mt-lg-0">
                        <div class="about__thumb-image  text-center">
                            <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php elseif ($settings['tg_design_style']  == 'layout-3') : ?>

            <?php if (!empty($tg_image_url)) : ?>
                <div class="about__thumb" data-aos="fade-<?php echo is_rtl() ? 'left' : 'right' ?>" data-aos-duration="800">
                    <div class="about__thumb-inner">
                        <div class="about__thumb-image text-center floating-content">
                            <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                            <?php if (!empty($settings['tg_author_image']['url'] || $settings['author_title'] || $settings['author_desc'])) : ?>
                                <div class="floating-content__bottom-left floating-content__bottom-left--style3">
                                    <div class="floating-content__item floating-content__item--style4">
                                        <?php if (!empty($settings['tg_author_image']['url'])) : ?>
                                            <div class="floating-content__item-thum">
                                                <img src="<?php echo esc_url($settings['tg_author_image']['url']); ?>" width="65" alt="<?php echo esc_attr__('Author', 'genixcore') ?>">
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($settings['author_title'] || $settings['author_desc'])) : ?>
                                            <div class="floating-content__item-content">
                                                <p><?php echo wp_kses_post($settings['author_title']) ?></p>
                                                <span><?php echo wp_kses_post($settings['author_desc']) ?></span>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php elseif ($settings['tg_design_style']  == 'layout-4') : ?>

            <?php if (!empty($tg_image_url)) : ?>
                <div class="about__thumb" data-aos="fade-<?php echo is_rtl() ? 'right' : 'left' ?>" data-aos-duration="800">
                    <div class="about__thumb-inner">
                        <div class="about__thumb-image text-center floating-content">

                            <?php if (!empty($tg_image_url)) : ?>
                                <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                            <?php endif; ?>

                            <?php if (!empty($settings['info_title'] || $settings['info_desc'])) : ?>
                                <div class="floating-content__top-left floating-content__top-left--style2">
                                    <div class="floating-content__item floating-content__item--style5">
                                        <h3><?php echo wp_kses_post($settings['info_title']) ?></h3>
                                        <p><?php echo wp_kses_post($settings['info_desc']) ?></p>

                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php else : ?>

            <?php if (!empty($tg_image_url)) : ?>
                <div class="about__thumb pe-lg-5" data-aos="fade-<?php echo is_rtl() ? 'left' : 'right' ?>" data-aos-duration="800">
                    <div class="about__thumb-inner">
                        <div class="about__thumb-image floating-content">
                            <?php if (!empty($tg_image_url)) : ?>
                                <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                            <?php endif; ?>

                            <?php if (!empty($settings['info_title'] || $settings['info_desc'])) : ?>
                                <div class="floating-content__top-left">
                                    <div class="floating-content__item">
                                        <h3><?php echo wp_kses_post($settings['info_title']) ?></h3>
                                        <p><?php echo wp_kses_post($settings['info_desc']) ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['info_title2'] || $settings['info_desc2'])) : ?>
                                <div class="floating-content__bottom-right">
                                    <div class="floating-content__item">
                                        <h3><?php echo wp_kses_post($settings['info_title2']) ?></h3>
                                        <p><?php echo wp_kses_post($settings['info_desc2']) ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_ImageBox());
