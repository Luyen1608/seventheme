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
class TG_ServicesSidebar extends Widget_Base
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
        return 'tg-services-sidebar';
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
        return __('Services Sidebar', 'genixcore');
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
            'tg_layout',
            [
                'label' => esc_html__('Widget Layout', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_design_style',
            [
                'label' => esc_html__('Select Widget', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Services Search', 'genixcore'),
                    'layout-2' => esc_html__('Services List', 'genixcore'),
                    'layout-3' => esc_html__('Social List', 'genixcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Widget Group
        $this->start_controls_section(
            '__tg_widget_group',
            [
                'label' => esc_html__('Widget Group', 'genixcore'),
            ]
        );

        $this->add_control(
            'widget_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('Title', 'genixcore'),
                'default' => esc_html__('Search Here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'show_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'genixcore'),
                'description' => esc_html__('Leave blank or enter -1 for all.', 'genixcore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '5',
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]
            ]
        );

        $this->end_controls_section();

        // Social Group
        $this->start_controls_section(
            '__tg_social_group',
            [
                'label' => esc_html__('Social Widget', 'genixcore'),
                'condition' => [
                    'tg_design_style' => 'layout-3'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        if (genix_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'tg_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                ]
            );
        } else {
            $repeater->add_control(
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

        $repeater->add_control(
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
            'item_lists',
            [
                'label' => esc_html__('Item Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_url' => esc_html__('#', 'genixcore'),
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
        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <div class="sidebar__categorie">
                <?php if (!empty($settings['widget_title'])) : ?>
                    <div class="sidebar__head">
                        <h6 class="m-0"><?php echo esc_html($settings['widget_title']); ?></h6>
                    </div>
                <?php endif; ?>
                <div class="sidebar__categorie-body">
                    <div class="sidebar__social-content">
                        <ul>
                            <?php
                            $args = new \WP_Query(array(
                                'post_type' => 'services',
                                'post_status' => 'publish',
                                'orderby' => 'date',
                                'posts_per_page' => $settings['show_per_page'],
                            ));

                            /* Start the Loop */
                            while ($args->have_posts()) : $args->the_post();
                            ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </ul>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['tg_design_style']  == 'layout-3') : ?>

            <div class="sidebar__social">
                <?php if (!empty($settings['widget_title'])) : ?>
                    <div class="sidebar__head">
                        <h6 class="m-0"><?php echo esc_html($settings['widget_title']); ?></h6>
                    </div>
                <?php endif; ?>
                <div class="sidebar__social-body">
                    <div class="sidebar__social-content">
                        <ul class="social mt-25">
                            <?php foreach ($settings['item_lists'] as $item) : ?>
                                <li class="social__item">
                                    <a href="<?php echo esc_url($item['tg_url']); ?>" class="social__link social__link--style2">
                                        <?php genix_render_icon($item, 'tg_icon', 'tg_selected_icon'); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

        <?php else : ?>

            <div class="sidebar__search">
                <?php if (!empty($settings['widget_title'])) : ?>
                    <h6 class="mb-10"><?php echo esc_html($settings['widget_title']); ?></h6>
                <?php endif; ?>
                <div class="sidebar__search-body">
                    <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                        <div class="input">
                            <input type="text" name="s" class="form-control" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Search articles', 'genixcore'); ?>">
                            <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                        </div>
                    </form>

                </div>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_ServicesSidebar());
