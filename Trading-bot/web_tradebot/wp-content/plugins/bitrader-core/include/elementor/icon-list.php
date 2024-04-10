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
class TG_IconList extends Widget_Base
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
        return 'iconlist';
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
        return __('Icon List', 'genixcore');
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

        // _tg_list
        $this->start_controls_section(
            '_tg_icon_list',
            [
                'label' => esc_html__('Icon List', 'genixcore'),
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
            'repeater_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Easy to lend', 'genixcore'),
                'placeholder' => esc_html__('Type list text', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'repeater_desc',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('It\'s easy to lend a helping hand to those in need, especially when we all stick together.', 'genixcore'),
                'placeholder' => esc_html__('Type list desc', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'item_lists',
            [
                'label' => esc_html__('Item Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'repeater_title' => esc_html__('Easy to lend', 'genixcore'),
                    ],
                    [
                        'repeater_title' => esc_html__('Exchange money', 'genixcore'),
                    ],
                    [
                        'repeater_title' => esc_html__('Online wallet', 'genixcore'),
                    ],
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

        <?php $i = 8;
        foreach ($settings['item_lists'] as $item) : ?>
            <div class="about__content about__content--style2" data-aos="fade-<?php echo is_rtl() ? 'left' : 'right' ?>" data-aos-duration="<?php echo $i++; ?>00">
                <div class="about__content-inner">
                    <?php if (!empty($item['tg_image']['url'])) : ?>
                        <div class="about__icon">
                            <div class="about__icon-inner">
                                <img src="<?php echo esc_url($item['tg_image']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="about__content-details">
                        <h5><?php echo genix_kses($item['repeater_title']); ?></h5>
                        <?php if (!empty($item['repeater_desc'])) : ?>
                            <p class="mb-0"><?php echo genix_kses($item['repeater_desc']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

<?php
    }
}

$widgets_manager->register(new TG_IconList());
