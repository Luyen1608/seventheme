<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Bitrader Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_ROADMAP extends Widget_Base
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
        return 'genix-roadmap';
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
        return __('Roadmap', 'genixcore');
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

        // Roadmap group
        $this->start_controls_section(
            'tg_roadmap',
            [
                'label' => esc_html__('Roadmap List', 'genixcore'),
                'description' => esc_html__('Control all the style settings from Style tab', 'genixcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_roadmap_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Project Research', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_roadmap_count',
            [
                'label' => esc_html__('Count', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('P1', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_roadmap_desc',
            [
                'label' => esc_html__('Roadmap Description', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Project research is the backbone of any successful project. It involves gathering information, setting objectives, and analyzing data to ensure the project is achievable. Without proper research, projects can fail due to lack of knowledge.', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_roadmap_list',
            [
                'label' => esc_html__('Roadmap Lists', 'genixcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_roadmap_title' => esc_html__('Project Research', 'genixcore'),
                        'tg_roadmap_count' => esc_html__('P1', 'genixcore'),
                    ],
                    [
                        'tg_roadmap_title' => esc_html__('Framing Idea', 'genixcore'),
                        'tg_roadmap_count' => esc_html__('P2', 'genixcore'),
                    ],
                    [
                        'tg_roadmap_title' => esc_html__('Design First Draft', 'genixcore'),
                        'tg_roadmap_count' => esc_html__('P3', 'genixcore'),
                    ],
                ],
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
        $settings = $this->get_settings_for_display();
?>

        <script>
            jQuery(document).ready(function($) {

                AOS.init();

            });
        </script>

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <script>
                jQuery(document).ready(function($) {

                    // roadmap slider
                    const roadmapSlider = new Swiper('.roadmap__slider', {

                        grabCursor: true,
                        // loop: true,
                        slidesPerView: 1,
                        breakpoints: {
                            576: {
                                slidesPerView: 1,
                                spaceBetween: 15,
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 15,
                            },
                            992: {
                                slidesPerView: 3,
                                spaceBetween: 10,
                            },
                            1200: {
                                slidesPerView: 4,
                                spaceBetween: 10,
                            },
                            1400: {
                                slidesPerView: 4,
                                spaceBetween: 10,
                            }

                        },

                        autoplay: true,
                        speed: 500,

                    });

                });
            </script>

            <div class="roadmap--style2">
                <div class="roadmap__wrapper">
                    <div class="roadmap__upper">
                        <div class="roadmap__upper-inner">
                            <div class="swiper">
                                <div class="roadmap__slider">
                                    <div class="swiper-wrapper">
                                        <?php $i = 0;
                                        foreach ($settings['tg_roadmap_list'] as $item) : $i++; ?>
                                            <div class="swiper-slide">
                                                <div class="roadmap__item <?php echo $i % 2 ? '' : 'roadmap__item--reverse' ?>">
                                                    <div class="roadmap__item-inner <?php echo $i % 2 ? 'roadmap__item-inner--vertical-line-bottom' : 'roadmap__item-inner--vertical-line-top' ?>">
                                                        <div class="roadmap__item-content">
                                                            <?php if (!empty($item['tg_roadmap_title'])) : ?>
                                                                <h5><?php echo genix_kses($item['tg_roadmap_title']); ?></h5>
                                                            <?php endif; ?>
                                                            <?php if (!empty($item['tg_roadmap_desc'])) : ?>
                                                                <p><?php echo genix_kses($item['tg_roadmap_desc']); ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="roadmap__item-date">
                                                            <?php if (!empty($item['tg_roadmap_count'])) : ?>
                                                                <span><?php echo genix_kses($item['tg_roadmap_count']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
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

        <?php else : ?>

            <div class="roadmap--style1">
                <div class="roadmap__wrapper">
                    <div class="row gy-4 gy-md-0 gx-5">
                        <?php $i = 0;
                        foreach ($settings['tg_roadmap_list'] as $item) : $i++; ?>
                            <div class="col-md-6 <?php echo $i % 2 ? 'offset-md-6' : '' ?>">
                                <div class="roadmap__item <?php echo $i % 2 ? 'ms-md-4' : 'roadmap__item--style2 ms-auto me-md-4' ?> aos-init aos-animate" data-aos="fade-<?php echo $i % 2 ? 'left' : 'right' ?>" data-aos-duration="800">
                                    <div class="roadmap__item-inner">
                                        <div class="roadmap__item-content">
                                            <div class="roadmap__item-header">
                                                <?php if (!empty($item['tg_roadmap_title'])) : ?>
                                                    <h3><?php echo genix_kses($item['tg_roadmap_title']); ?></h3>
                                                <?php endif; ?>
                                                <?php if (!empty($item['tg_roadmap_count'])) : ?>
                                                    <span><?php echo genix_kses($item['tg_roadmap_count']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($item['tg_roadmap_desc'])) : ?>
                                                <p><?php echo genix_kses($item['tg_roadmap_desc']); ?></p>
                                            <?php endif; ?>
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

$widgets_manager->register(new TG_ROADMAP());
