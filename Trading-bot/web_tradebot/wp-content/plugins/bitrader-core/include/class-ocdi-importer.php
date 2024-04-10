<?php

if (!defined('ABSPATH')) {
    exit;
}

class GENIX_OCDI_Demo_Importer
{

    //Magic Mathod
    public function __construct()
    {
        // Action Hook
        add_action('pt-ocdi/after_import', array($this, 'genixcore_import_menu_setup'));
        add_action('pt-ocdi/after_import', array($this, 'genixcore_import_page_setup'));

        // Filter Hook
        add_filter('pt-ocdi/import_files', array($this, 'genixcore_import_files'));
        add_filter('pt-ocdi/plugin_page_setup', array($this, 'genixcore_oneclick_admin_page'));
        add_filter('pt-ocdi/disable_pt_branding', '__return_true');
        add_filter('pt-ocdi/confirmation_dialog_options', array($this, 'genixcore_ocdi_confirmation_dialog_options'), 10, 1);
    }

    /**
     * Demo containes file loading methos
     */
    public function genixcore_import_files()
    {
        return array(
            //Home White Setup
            array(
                'import_file_name'  => 'Home Light',
                'local_import_file' => trailingslashit(get_template_directory()) . 'sample-data/contents-demo.xml',
                'local_import_widget_file' => trailingslashit(get_template_directory()) . 'sample-data/widget-settings.json',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'sample-data/customizer-data.dat',
                'import_preview_image_url'  => plugins_url('assets/img/demo/home1.png', dirname(__FILE__)),
                'preview_url'               => 'https://bitrader.thetork.com',
                'import_notice'   => __('After you import this demo, you will get a demo like Our Live Website', 'genixcore'),
            ),

            //Home Dark Setup
            array(
                'import_file_name'  => 'Home Dark',
                'local_import_file' => trailingslashit(get_template_directory()) . 'sample-data/dark/contents-demo.xml',
                'local_import_widget_file' => trailingslashit(get_template_directory()) . 'sample-data/dark/widget-settings.json',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'sample-data/dark/customizer-data.dat',
                'import_preview_image_url'  => plugins_url('assets/img/demo/home2.png', dirname(__FILE__)),
                'preview_url'               => 'https://bitrader.thetork.com/dark/',
                'import_notice'  => __('After you import this demo, you will get a demo like Our Live Website', 'genixcore'),
            ),

            //Home RTL Setup
            array(
                'import_file_name'  => 'RTL Demo',
                'local_import_file' => trailingslashit(get_template_directory()) . 'sample-data/rtl/contents-demo.xml',
                'local_import_widget_file' => trailingslashit(get_template_directory()) . 'sample-data/rtl/widget-settings.json',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'sample-data/rtl/customizer-data.dat',
                'import_preview_image_url'  => plugins_url('assets/img/demo/home-rtl.png', dirname(__FILE__)),
                'preview_url'    => 'https://bitrader.thetork.com/rtl/',
            ),
        );
    }

    /**
     * Assign menus to their locations.
     */
    public function genixcore_import_menu_setup($selected_import)
    {
        $this->assign_menu_to_location();
        $this->update_permalinks();
    }

    // Menu Location
    private function assign_menu_to_location()
    {

        $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

        set_theme_mod('nav_menu_locations', [
            'main-menu' => $main_menu->term_id,
        ]);
    }

    // Permalink
    private function update_permalinks()
    {
        update_option('permalink_structure', '/%postname%/');
    }

    /**
     * Assign front page and posts page (blog page).
     */
    public function genixcore_import_page_setup($selected_import)
    {

        // Assign front page and posts page (blog page).
        if ('Home' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_path("home", OBJECT, array('page'));
        }
        elseif ('Home Two' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_path("home-two", OBJECT, array('page'));
        }
        elseif ('Home Three' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_path("home-three", OBJECT, array('page'));
        }
        else {
            $front_page_id = get_page_by_path("home", OBJECT, array('page'));
        }
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id->ID);

        $blog_page_id  = get_page_by_path("blog", OBJECT, array('page'));
        update_option('page_for_posts', $blog_page_id->ID);
    }

    /**
     * Install Demos Menu - Menu Edited
     */
    public function genixcore_oneclick_admin_page($default_settings)
    {
        $default_settings['parent_slug'] = 'themes.php';
        $default_settings['page_title']  = esc_html__('One Click Demo Import', 'genixcore');
        $default_settings['menu_title']  = esc_html__('Import Demo Data', 'genixcore');
        $default_settings['capability']  = 'import';
        $default_settings['menu_slug']   = 'one-click-demo-import';
        return $default_settings;
    }


    // Model Popup - Width Increased
    public function genixcore_ocdi_confirmation_dialog_options($options)
    {
        return array_merge($options, array(
            'width'       => 600,
            'dialogClass' => 'wp-dialog',
            'resizable'   => false,
            'height'      => 'auto',
            'modal'       => true,
        ));
    }
} //End Of Class

$genixcore_init = new GENIX_OCDI_Demo_Importer(); //Initialization of class