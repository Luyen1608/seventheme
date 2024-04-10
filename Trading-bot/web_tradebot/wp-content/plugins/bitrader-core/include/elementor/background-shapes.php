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
class Genix_Background_Shape extends Widget_Base
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
        return 'bg-shapes';
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
        return __('Background Shapes', 'genixcore');
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
                'label_block' => 'true',
                'options' => [
                    'layout-1' => esc_html__('Roadmap Shapes', 'genixcore'),
                    'layout-2' => esc_html__('Pricing Shapes 01', 'genixcore'),
                    'layout-3' => esc_html__('Blog Post Shape', 'genixcore'),
                    'layout-4' => esc_html__('Pricing Shapes 02', 'genixcore'),
                    'layout-5' => esc_html__('Footer Shape', 'genixcore'),
                ],
                'default' => 'layout-1',
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

        <?php if ($settings['tg_design_style'] == 'layout-2') : ?>

            <div class="pricing__shape">
                <span class="pricing__shape-item pricing__shape-item--1">
                    <span></span>
                </span>
            </div>

        <?php elseif ($settings['tg_design_style'] == 'layout-3') : ?>

            <div class="blog__shape">
                <span class="blog__shape-item blog__shape-item--1">
                    <span></span>
                </span>
            </div>

        <?php elseif ($settings['tg_design_style'] == 'layout-4') : ?>

            <div class="pricing__shape">
                <span class="pricing__shape-item pricing__shape-item--3">
                    <span></span>
                </span>
            </div>

        <?php elseif ($settings['tg_design_style'] == 'layout-5') : ?>

            <div class="footer__shape">
                <span class="footer__shape-item footer__shape-item--2">
                    <span></span>
                </span>
            </div>

        <?php else : ?>

            <div class="roadmap--style1">
                <span class="roadmap__shape-item roadmap__shape-item--1">
                    <span></span>
                </span>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new Genix_Background_Shape());
