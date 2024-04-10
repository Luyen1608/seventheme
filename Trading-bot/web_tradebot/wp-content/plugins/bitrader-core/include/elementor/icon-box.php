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
class TG_IconBox extends Widget_Base
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
        return 'tg-iconbox';
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
        return __('Icon Box', 'genixcore');
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

        // Style_group
        $this->start_controls_section(
            'tg_iconbox_group',
            [
                'label' => esc_html__('IconBox Group', 'genixcore'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Icon Image', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Real-time data', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_description',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'description' => genix_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Real-time data is like having a magic crystal ball that tells you what\'s happening now.', 'genixcore'),
            ]
        );

        $this->add_control(
            'item_lists',
            [
                'label' => esc_html__('Item Box Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_title' => esc_html__('Real-time data', 'genixcore'),
                    ],
                    [
                        'tg_title' => esc_html__('Customer support', 'genixcore'),
                    ],
                    [
                        'tg_title' => esc_html__('Higher security', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        // Style TAB
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

        <script>
            jQuery(document).ready(function($) {

                AOS.init();

            });
        </script>
        <div class="feature--style2">
            <div class="feature__wrapper">
                <div class="row g-4 align-items-center">
                    <?php foreach ($settings['item_lists'] as $item) : ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="feature__item" data-aos="fade-up" data-aos-duration="800">
                                <div class="feature__item-inner text-center">
                                    <?php if (!empty($item['tg_image']['url'])) : ?>
                                        <div class="feature__item-thumb">
                                            <img src="<?php echo esc_url($item['tg_image']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="feature__item-content">
                                        <h5><?php echo genix_kses($item['tg_title']); ?></h5>
                                        <?php if (!empty($item['tg_description'])) : ?>
                                            <p><?php echo genix_kses($item['tg_description']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
<?php
    }
}

$widgets_manager->register(new TG_IconBox());
