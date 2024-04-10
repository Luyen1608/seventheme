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
class TG_CONTACT extends Widget_Base
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
        return 'tg-contact';
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
        return __('Contact', 'genixcore');
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

        // _tg_title
        $this->start_controls_section(
            '_tg_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
            ]
        );

        $this->add_control(
            'contact_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Let’s Get In Touch With Us', 'genixcore'),
                'placeholder' => esc_html__('Type list text', 'genixcore'),
                'label_block' => true,
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

        $this->end_controls_section();

        // _tg_list
        $this->start_controls_section(
            '_tg_social_list',
            [
                'label' => esc_html__('Social List', 'genixcore'),
            ]
        );

        $social = new \Elementor\Repeater();

        if (genix_is_elementor_version('<', '2.6.0')) {
            $social->add_control(
                'tg_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                ]
            );
        } else {
            $social->add_control(
                'tg_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                ]
            );
        }

        $social->add_control(
            'tg_url',
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
            'social_lists',
            [
                'label' => esc_html__('Item Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $social->get_controls(),
                'default' => [
                    [
                        'tg_url' => esc_html__('#', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // _tg_info_list
        $this->start_controls_section(
            '_tg_info_list',
            [
                'label' => esc_html__('Info List', 'genixcore'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_icon_image',
            [
                'label' => esc_html__('Upload Icon', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'repeater_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => wp_kses_post('<p>0917749254</p>', 'genixcore'),
                'placeholder' => esc_html__('Type list text', 'genixcore'),
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
                        'repeater_title' => wp_kses_post('<p>0917749254</p>', 'genixcore'),
                    ],
                    [
                        'repeater_title' => wp_kses_post('<p>Bitrader@gmail.com</p>', 'genixcore'),
                    ],
                    [
                        'repeater_title' => wp_kses_post('<p>88 Sheridan Street</p>', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // _tg_shortcode
        $this->start_controls_section(
            '__tg_shortcode',
            [
                'label' => esc_html__('Contact Shortcode', 'genixcore'),
            ]
        );

        $this->add_control(
            'contact_shortcode',
            [
                'label' => esc_html__('Contact ShortCode', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('[Enter ShortCode Here]', 'genixcore'),
                'label_block' => true,
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
        $settings = $this->get_settings_for_display();

        $full_width = $settings['contact_shortcode'] ? 'col-md-5' : 'col-12';

?>

        <script>
            jQuery(document).ready(function($) {

                AOS.init();

            });
        </script>

        <div class="contact padding-top padding-bottom tg-section">
            <div class="container">
                <div class="contact__wrapper">
                    <div class="row g-5">
                        <div class="<?php echo esc_attr($full_width); ?>">
                            <div class="contact__info" data-aos="fade-right" data-aos-duration="1000">
                                <div class="contact__social">
                                    <?php if (!empty($settings['contact_title'])) : ?>
                                        <h3 class="title"><?php echo genix_kses($settings['contact_title']); ?></h3>
                                    <?php endif; ?>

                                    <ul class="social">
                                        <?php foreach ($settings['social_lists'] as $item) : ?>
                                            <li class="social__item">
                                                <a href="<?php echo esc_url($item['tg_url']); ?>" class="social__link social__link--style4"><?php genix_render_icon($item, 'tg_icon', 'tg_selected_icon'); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="contact__details">
                                    <?php foreach ($settings['item_lists'] as $item) : ?>
                                        <div class="contact__item" data-aos="fade-right" data-aos-duration="1000">
                                            <div class="contact__item-inner">
                                                <?php if (!empty($item['tg_icon_image']['url'])) : ?>
                                                    <div class="contact__item-thumb">
                                                        <span>
                                                            <img src="<?php echo esc_url($item['tg_icon_image']['url']); ?>" width="24" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="contact__item-content">
                                                    <?php echo genix_kses($item['repeater_title']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($settings['contact_shortcode'])) : ?>
                            <div class="col-md-7">
                                <?php echo do_shortcode($settings['contact_shortcode']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="contact__shape">
                <?php if (!empty($settings['tg_image']['url'])) : ?>
                    <span class="contact__shape-item contact__shape-item--1">
                        <img src="<?php echo esc_url($settings['tg_image']['url']); ?>" width="70" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                    </span>
                <?php endif; ?>
                <span class="contact__shape-item contact__shape-item--2"> <span></span> </span>
            </div>
        </div>

<?php
    }
}

$widgets_manager->register(new TG_CONTACT());
