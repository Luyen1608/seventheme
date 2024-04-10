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
class TG_Testimonial extends Widget_Base
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
        return 'testimonial';
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
        return __('Testimonial', 'genixcore');
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Review group
        $this->start_controls_section(
            'review_list',
            [
                'label' => esc_html__('Testimonial List', 'genixcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'review_content',
            [
                'label' => esc_html__('Review Content', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('The above testimonial is about Martha Chumo, who taught herself to code in one summer. This testimonial example works because it allows prospective customers to see themselves in Codeacademy’s current customer base.', 'genixcore'),
                'placeholder' => esc_html__('Type your review content here', 'genixcore'),
            ]
        );

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__('Reviewer Image', 'genixcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'reviewer_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $repeater->add_control(
            'reviewer_name',
            [
                'label' => esc_html__('Reviewer Name', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mobarok Hossain', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'reviewer_designation',
            [
                'label' => esc_html__('Reviewer Designation', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trade Master', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'reviews_list',
            [
                'label' => esc_html__('Review List', 'genixcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'reviewer_name' => esc_html__('Mobarok Hossain', 'genixcore'),
                    ],
                    [
                        'reviewer_name' => esc_html__('Guy Hawkins', 'genixcore'),
                    ],
                    [
                        'reviewer_name' => esc_html__('Belal Hossain', 'genixcore'),
                    ],

                ],
                'title_field' => '{{{ reviewer_name }}}',
            ]
        );

        $this->end_controls_section();


        // TAB_STYLE
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
        $settings = $this->get_settings_for_display(); ?>


        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <script>
                jQuery(document).ready(function($) {

                    // testimonial slider 2
                    const testimonial2 = new Swiper('.testimonial__slider2', {
                        spaceBetween: 24,
                        grabCursor: true,
                        loop: true,
                        slidesPerView: 1,
                        breakpoints: {
                            576: {
                                slidesPerView: 1,
                            },
                            768: {
                                slidesPerView: 2,
                            },
                            992: {
                                slidesPerView: 3,
                            },
                            1200: {
                                slidesPerView: 3,
                                spaceBetween: 25,
                            },
                        },

                        autoplay: true,
                        speed: 500,

                        navigation: {
                            nextEl: ".testimonial__slider-next",
                            prevEl: ".testimonial__slider-prev",
                        },
                    });

                });
            </script>

            <div class="testimonial__wrapper">
                <div class="testimonial__slider2 swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['reviews_list'] as $item) :
                            if (!empty($item['reviewer_image']['url'])) {
                                $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url($item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                                $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                            }
                        ?>
                            <div class="swiper-slide">
                                <div class="testimonial__item testimonial__item--style2">
                                    <div class="testimonial__item-inner">
                                        <div class="testimonial__item-content">
                                            <?php if (!empty($item['review_content'])) : ?>
                                                <p class="mb-0"><?php echo esc_html($item['review_content']); ?></p>
                                            <?php endif; ?>
                                            <div class="testimonial__footer">
                                                <div class="testimonial__author">

                                                    <?php if (!empty($item['reviewer_image'])) : ?>
                                                        <div class="testimonial__author-thumb">
                                                            <img src="<?php echo esc_url($tg_reviewer_image); ?>" width="56" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="testimonial__author-designation">
                                                        <?php if (!empty($item['reviewer_name'])) : ?>
                                                            <h6><?php echo genix_kses($item['reviewer_name']); ?></h6>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['reviewer_designation'])) : ?>
                                                            <span>
                                                                <?php echo genix_kses($item['reviewer_designation']); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="testimonial__quote testimonial__quote--style2">
                                                    <span><i class="fas fa-quote-right"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-nav swiper-nav--style2">
                    <button class="swiper-nav__btn active  swiper-nav__btn-prev testimonial__slider-prev"><i class="fas fa-angle-left"></i></button>
                    <button class="swiper-nav__btn swiper-nav__btn-next testimonial__slider-next"><i class="fas fa-angle-right"></i></button>
                </div>
            </div>

        <?php else : ?>

            <script>
                jQuery(document).ready(function($) {

                    AOS.init();

                    // testimonial slider
                    const testimonial = new Swiper('.testimonial__slider', {
                        spaceBetween: 24,
                        grabCursor: true,
                        loop: true,
                        slidesPerView: 1,
                        breakpoints: {
                            576: {
                                slidesPerView: 1,
                            },
                            768: {
                                slidesPerView: 2,
                            },
                            992: {
                                slidesPerView: 2,
                            },
                            1200: {
                                slidesPerView: 2,
                                spaceBetween: 25,
                            },
                        },

                        autoplay: true,
                        speed: 500,

                        navigation: {
                            nextEl: ".testimonial__slider-next",
                            prevEl: ".testimonial__slider-prev",
                        },
                    });

                });
            </script>

            <div class="testimonial__wrapper" data-aos="fade-up" data-aos-duration="1000">
                <div class="testimonial__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['reviews_list'] as $item) :
                            if (!empty($item['reviewer_image']['url'])) {
                                $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url($item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                                $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                            }
                        ?>
                            <div class="swiper-slide">
                                <div class="testimonial__item testimonial__item--style1">
                                    <div class="testimonial__item-inner">
                                        <div class="testimonial__item-content">
                                            <?php if (!empty($item['review_content'])) : ?>
                                                <p class="mb-0"><?php echo esc_html($item['review_content']); ?></p>
                                            <?php endif; ?>
                                            <div class="testimonial__footer">
                                                <div class="testimonial__author">
                                                    <?php if (!empty($item['reviewer_image'])) : ?>
                                                        <div class="testimonial__author-thumb">
                                                            <img src="<?php echo esc_url($tg_reviewer_image); ?>" width="48" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="testimonial__author-designation">
                                                        <?php if (!empty($item['reviewer_name'])) : ?>
                                                            <h6><?php echo genix_kses($item['reviewer_name']); ?></h6>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['reviewer_designation'])) : ?>
                                                            <span>
                                                                <?php echo genix_kses($item['reviewer_designation']); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="testimonial__quote">
                                                    <span><i class="fas fa-quote-right"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_Testimonial());
