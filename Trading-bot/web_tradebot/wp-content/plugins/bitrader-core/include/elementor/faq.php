<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Bitrader Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Genix_FAQ extends Widget_Base
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
        return 'genix-faq';
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
        return __('FAQ', 'genixcore');
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

        // Accordion
        $this->start_controls_section(
            '_accordion',
            [
                'label' => esc_html__('Accordion', 'genixcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tg_animation_dir',
            [
                'label' => esc_html__('Animation Direction', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'right' => esc_html__('Right', 'genixcore'),
                    'left' => esc_html__('Left', 'genixcore'),
                ],
                'default' => 'right',
                'condition' => [
                    'tg_design_style!' => 'layout-3',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'accordion_title',
            [
                'label' => esc_html__('Accordion Title', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What does this tool do?', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'accordion_description',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'description' => genix_get_allowed_html_desc('intermediate'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Online trading’s primary advantages are that it allows you to manage your trades at your convenience.', 'genixcore'),
            ]
        );

        $this->add_control(
            'accordions',
            [
                'label' => esc_html__('Repeater Accordion', 'genixcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__('What does this tool do?', 'genixcore'),
                    ],
                    [
                        'accordion_title' => esc_html__('What are the disadvantages of online trading?', 'genixcore'),
                    ],
                    [
                        'accordion_title' => esc_html__('Is online trading safe?', 'genixcore'),
                    ],
                ],
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
        $randID = wp_rand();
        $settings = $this->get_settings_for_display();
?>

        <script>
            jQuery(document).ready(function($) {

                AOS.init();

            });
        </script>

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <div class="accordion accordion--style2" id="faqAccordion<?php echo $randID; ?>" data-aos="fade-<?php echo esc_attr($settings['tg_animation_dir']) ?>" data-aos-duration="1000">
                <?php foreach ($settings['accordions'] as $index => $item) :
                    $collapsed = ($index == '0') ? '' : 'collapsed';
                    $aria_expanded = ($index == '0') ? "true" : "false";
                    $show = ($index == '0') ? "show" : "";
                ?>
                    <div class="accordion__item ">
                        <div class="accordion__header" id="faq<?php echo $index . $randID ?>">
                            <button class="accordion__button <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqBody<?php echo $index . $randID ?>" aria-expanded="false" aria-controls="faqBody<?php echo $index . $randID ?>">
                                <span class="accordion__button-content">
                                    <?php echo esc_html($item['accordion_title']); ?>
                                </span>
                                <span class="accordion__button-plusicon"></span>
                            </button>
                        </div>
                        <div id="faqBody<?php echo $index . $randID ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="faq<?php echo $index . $randID ?>" data-bs-parent="#faqAccordion<?php echo $randID; ?>">
                            <div class="accordion__body">
                                <p class="mb-0"><?php echo genix_kses($item['accordion_description']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php elseif ($settings['tg_design_style']  == 'layout-3') : ?>

            <div class="service-details__faq">
                <div class="faq">
                    <div class="faq__wrapper">
                        <div class="accordion accordion--style1" id="faqAccordion<?php echo $randID; ?>">
                            <?php foreach ($settings['accordions'] as $index => $item) :
                                $collapsed = ($index == '0') ? '' : 'collapsed';
                                $aria_expanded = ($index == '0') ? "true" : "false";
                                $show = ($index == '0') ? "show" : "";
                            ?>
                                <div class="accordion__item ">
                                    <div class="accordion__header" id="faq<?php echo $index . $randID ?>">
                                        <button class="accordion__button accordion__button--style2 <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqBody<?php echo $index . $randID ?>" aria-expanded="false" aria-controls="faqBody<?php echo $index . $randID ?>">
                                            <span class="accordion__button-content">
                                                <?php echo esc_html($item['accordion_title']); ?>
                                            </span>
                                            <span class="accordion__button-plusicon"></span>
                                        </button>
                                    </div>
                                    <div id="faqBody<?php echo $index . $randID ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="faq<?php echo $index . $randID ?>" data-bs-parent="#faqAccordion<?php echo $randID; ?>">
                                        <div class="accordion__body">
                                            <p class="mb-15"><?php echo genix_kses($item['accordion_description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php else : ?>

            <div class="accordion accordion--style1" id="faqAccordion1" data-aos="fade-<?php echo esc_attr($settings['tg_animation_dir']) ?>" data-aos-duration="1000">
                <?php foreach ($settings['accordions'] as $index => $item) :
                    $collapsed = ($index == '0') ? '' : 'collapsed';
                    $aria_expanded = ($index == '0') ? "true" : "false";
                    $show = ($index == '0') ? "show" : "";
                ?>
                    <div class="accordion__item ">
                        <div class="accordion__header" id="faq<?php echo esc_attr($index); ?>">
                            <button class="accordion__button <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqBody<?php echo esc_attr($index); ?>" aria-expanded="false" aria-controls="faqBody<?php echo esc_attr($index); ?>">
                                <span class="accordion__button-content">
                                    <?php echo esc_html($item['accordion_title']); ?>
                                </span>
                                <span class="accordion__button-plusicon"></span>
                            </button>
                        </div>
                        <div id="faqBody<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="faq<?php echo esc_attr($index); ?>" data-bs-parent="#faqAccordion1">
                            <div class="accordion__body">
                                <p class="mb-15"><?php echo genix_kses($item['accordion_description']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
<?php
    }
}

$widgets_manager->register(new Genix_FAQ());
