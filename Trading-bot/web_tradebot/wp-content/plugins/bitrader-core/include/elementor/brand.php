<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Bitrader Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Genix_Brand extends Widget_Base
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
        return 'brand';
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
        return __('Brand', 'genixcore');
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

        $this->start_controls_section(
            'tg_brand_section',
            [
                'label' => esc_html__('Brand Item', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tg_brand_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Image', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tg_brand_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('URL', 'genixcore'),
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Type url here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'tg_brand_slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Brand Item', 'genixcore'),
                'default' => [
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'tg_brand_image' => [
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
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();


        // STYLE TAB
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'genixcore'),
                'tab' => Controls_Manager::TAB_STYLE,
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
        $settings = $this->get_settings_for_display(); ?>


        <script>
            jQuery(document).ready(function($) {

                // component slider here
                const Partner = new Swiper('.partner__slider', {
                    spaceBetween: 24,
                    grabCursor: true,
                    loop: true,
                    slidesPerView: 2,
                    breakpoints: {
                        576: {
                            slidesPerView: 3,
                        },
                        768: {
                            slidesPerView: 4,
                        },
                        992: {
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 6,
                            spaceBetween: 25,
                        },
                    },
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true,
                    },
                    speed: 2000,
                });

            });
        </script>

        <div class="partner partner--gradient tg-section">
            <div class="container">
                <div class="partner__wrapper">
                    <div class="partner__slider swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['tg_brand_slides'] as $item) :
                                if (!empty($item['tg_brand_image']['url'])) {
                                    $tg_brand_image_url = !empty($item['tg_brand_image']['id']) ? wp_get_attachment_image_url($item['tg_brand_image']['id'], $settings['thumbnail_size']) : $item['tg_brand_image']['url'];
                                    $tg_brand_image_alt = get_post_meta($item["tg_brand_image"]["id"], "_wp_attachment_image_alt", true);
                                }
                            ?>
                                <div class="swiper-slide">
                                    <div class="partner__item">
                                        <div class="partner__item-inner">
                                            <?php if (!empty($item['tg_brand_url'])) : ?>
                                                <a href="<?php echo esc_url($item['tg_brand_url']); ?>"><img src="<?php echo esc_url($tg_brand_image_url); ?>" alt="<?php echo esc_attr($tg_brand_image_alt); ?>"></a>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url($tg_brand_image_url); ?>" alt="<?php echo esc_attr($tg_brand_image_alt); ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}

$widgets_manager->register(new Genix_Brand());
