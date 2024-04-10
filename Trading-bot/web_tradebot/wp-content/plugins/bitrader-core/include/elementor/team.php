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
class TG_Team extends Widget_Base
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
        return 'tg-team';
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
        return __('Team', 'genixcore');
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
            'genix_design_style',
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


        // member list
        $this->start_controls_section(
            '_section_teams',
            [
                'label' => esc_html__('Members', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'team_col_style',
            [
                'label' => esc_html__('Select Column', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'col-sm-6' => esc_html__('2 Column', 'genixcore'),
                    'col-sm-6 col-lg-4' => esc_html__('3 Column', 'genixcore'),
                    'col-sm-6 col-lg-3' => esc_html__('4 Column', 'genixcore'),
                ],
                'default' => 'col-sm-6 col-lg-3',
                'condition' => [
                    'genix_design_style' => 'layout-1',
                ]
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_item'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => esc_html__('Information', 'genixcore'),
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Team Image', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('Team Name', 'genixcore'),
                'default' => esc_html__('Brooklyn Simmons', 'genixcore'),
                'placeholder' => esc_html__('Type name here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('Team URL', 'genixcore'),
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Type url here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => esc_html__('Designation', 'genixcore'),
                'default' => esc_html__('Finance Advisor', 'genixcore'),
                'placeholder' => esc_html__('Type designation here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => esc_html__('Links', 'genixcore'),
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => esc_html__('Show Options?', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'genixcore'),
                'label_off' => esc_html__('No', 'genixcore'),
                'return_value' => 'yes',
                'style_transfer' => true,
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'web_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Website Address', 'genixcore'),
                'placeholder' => esc_html__('Add your profile link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'email_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Email', 'genixcore'),
                'placeholder' => esc_html__('Add your email link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'phone_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Phone', 'genixcore'),
                'placeholder' => esc_html__('Add your phone link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Facebook', 'genixcore'),
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Add your facebook link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Twitter', 'genixcore'),
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Add your twitter link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Instagram', 'genixcore'),
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Add your instagram link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('LinkedIn', 'genixcore'),
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Add your linkedin link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Youtube', 'genixcore'),
                'placeholder' => esc_html__('Add your youtube link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'googleplus_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Google Plus', 'genixcore'),
                'placeholder' => esc_html__('Add your Google Plus link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Flickr', 'genixcore'),
                'placeholder' => esc_html__('Add your flickr link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Vimeo', 'genixcore'),
                'placeholder' => esc_html__('Add your vimeo link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Behance', 'genixcore'),
                'placeholder' => esc_html__('Add your hehance link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Dribbble', 'genixcore'),
                'placeholder' => esc_html__('Add your dribbble link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Pinterest', 'genixcore'),
                'placeholder' => esc_html__('Add your pinterest link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'gitub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => esc_html__('Github', 'genixcore'),
                'placeholder' => esc_html__('Add your github link', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // REPEATER
        $this->add_control(
            'teams',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Brooklyn Simmons', 'genixcore'),
                        'designation' => esc_html__('Finance Advisor', 'genixcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Jenny Wilson', 'genixcore'),
                        'designation' => esc_html__('Business Eng.', 'genixcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Ronald Richards', 'genixcore'),
                        'designation' => esc_html__('Marketing', 'genixcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Marvin McKinney', 'genixcore'),
                        'designation' => esc_html__('Developer', 'genixcore'),
                    ],
                ],
                'title_field' => '{{{ team_name }}}',
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


        <!-- style 2 -->
        <?php if ($settings['genix_design_style'] === 'layout-2') : ?>

            <div class="team__wrapper">
                <div class="row g-4 align-items-center">
                    <?php $i = 8;
                    foreach ($settings['teams'] as $item) :

                        if (!empty($item['image']['url'])) {
                            $genix_team_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url($item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                            $genix_team_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
                        }
                    ?>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="team__item team__item--shape" data-aos="fade-up" data-aos-duration="<?php echo $i++; ?>00">
                                <div class="team__item-inner team__item-inner--shape">
                                    <?php if (!empty($genix_team_image_url)) : ?>
                                        <div class="team__item-thumb team__item-thumb--style2">
                                            <img src="<?php echo esc_url($genix_team_image_url); ?>" alt="<?php echo esc_attr($genix_team_image_alt); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="team__item-content ">
                                        <div class="team__item-author team__item-author--style2">

                                            <div class="team__item-authorinfo">
                                                <h6 class="mb-0">
                                                    <a href="<?php echo esc_url($item['team_url']); ?>" class="stretched-link"><?php echo genix_kses($item['team_name']); ?></a>
                                                </h6>
                                                <?php if (!empty($item['designation'])) : ?>
                                                    <p class="mb-0"><?php echo genix_kses($item['designation']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($item['show_social'])) : ?>
                                                <div class="team__item-authorsocial">
                                                    <ul class="social justify-content-center">
                                                        <?php if (!empty($item['web_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['web_title']); ?>" class="social__link social__link--style3"><i class="fas fa-globe"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['email_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="mailto:<?php echo esc_html($item['email_title']); ?>" class="social__link social__link--style3"><i class="far fa-envelope"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['phone_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="tel:<?php echo esc_html($item['phone_title']); ?>" class="social__link social__link--style3"><i class="fas fa-phone"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['facebook_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['facebook_title']); ?>" class="social__link social__link--style3"><i class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['twitter_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['twitter_title']); ?>" class="social__link social__link--style3"><i class="fab fa-twitter"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['instagram_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['instagram_title']); ?>" class="social__link social__link--style3"><i class="fab fa-instagram"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['linkedin_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['linkedin_title']); ?>" class="social__link social__link--style3"><i class="fab fa-linkedin-in"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['youtube_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['youtube_title']); ?>" class="social__link social__link--style3"><i class="fab fa-youtube"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['googleplus_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['googleplus_title']); ?>" class="social__link social__link--style3"><i class="fab fa-google-plus-g"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['flickr_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['flickr_title']); ?>" class="social__link social__link--style3"><i class="fab fa-flickr"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['vimeo_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['vimeo_title']); ?>" class="social__link social__link--style3"><i class="fab fa-vimeo-v"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['behance_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['behance_title']); ?>" class="social__link social__link--style3"><i class="fab fa-behance"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['dribble_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['dribble_title']); ?>" class="social__link social__link--style3"><i class="fab fa-dribbble"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['pinterest_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['pinterest_title']); ?>" class="social__link social__link--style3"><i class="fab fa-pinterest-p"></i></a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['gitub_title'])) : ?>
                                                            <li class="social__item">
                                                                <a href="<?php echo esc_url($item['gitub_title']); ?>" class="social__link social__link--style3"><i class="fab fa-github"></i></a>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <!-- style default -->
        <?php else : ?>

            <div class="team__wrapper">
                <div class="row g-4 align-items-center">
                    <?php $i = 8;
                    foreach ($settings['teams'] as $item) :

                        if (!empty($item['image']['url'])) {
                            $genix_team_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url($item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                            $genix_team_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
                        }
                    ?>
                        <div class="<?php echo esc_attr( $settings['team_col_style'] ); ?>">
                            <div class="team__item team__item--shape" data-aos="fade-up" data-aos-duration="<?php echo $i++; ?>00">
                                <div class="team__item-inner team__item-inner--shape">
                                    <?php if (!empty($genix_team_image_url)) : ?>
                                        <div class="team__item-thumb team__item-thumb--style1">
                                            <img src="<?php echo esc_url($genix_team_image_url); ?>" alt="<?php echo esc_attr($genix_team_image_alt); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="team__item-content team__item-content--style1">
                                        <div class="team__item-author team__item-author--style1">
                                            <div class="team__item-authorinfo">
                                                <h6 class="mb-1"><a href="<?php echo esc_url($item['team_url']); ?>" class="stretched-link"><?php echo genix_kses($item['team_name']); ?></a> </h6>
                                                <?php if (!empty($item['designation'])) : ?>
                                                    <p class="mb-0"><?php echo genix_kses($item['designation']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_Team());
