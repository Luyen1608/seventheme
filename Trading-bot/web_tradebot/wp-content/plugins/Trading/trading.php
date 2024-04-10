<?php
/**
* Plugin Name: Trade 
* Plugin URI: https://www.yourwebsiteurl.com/
* Description: This is the Tra I ever created.
* Version: 1.0
* Author: Harry Moon
* Author URI: http://yourwebsiteurl.com/
**/

$plugin = ABSPATH."wp-content/plugins/Trading/";
require ($plugin . "popup-handler.php");
require ($plugin . "search-handler.php");

add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts');
function callback_for_setting_up_scripts() {
    $body_classes = get_body_class();
    if (in_array('page-id-1401', $body_classes)) {
		wp_register_style( 'namespace1', plugin_dir_url( __FILE__ ).'assest/css/index.css' );
		wp_register_style( 'namespace2', plugin_dir_url( __FILE__ ). 'assest/css/index2.css' );
		wp_register_style( 'namespace3', plugin_dir_url( __FILE__ ).'assest/css/styles.css' );
		wp_register_style( 'namespace4', plugin_dir_url( __FILE__ ). 'assest/css/styleCustome.css', array(), null );
		wp_register_style( 'namespace5', plugin_dir_url( __FILE__ ). 'assest/css/orderDialog.css' );
		wp_register_style( 'style-buck', plugin_dir_url( __FILE__ ). 'assest/css/style-buck.css' );
		wp_enqueue_style('namespace1');
		wp_enqueue_style('namespace2');
		wp_enqueue_style('namespace3');
		wp_enqueue_style('namespace4');
		wp_enqueue_style('namespace5');
		wp_enqueue_style('style-buck');
		wp_enqueue_script( 'namespacescript', 'https://code.jquery.com/jquery-3.7.1.js', array( 'jquery' ) );
		wp_enqueue_script( 'namespaceformyscript', plugin_dir_url( __FILE__ ). 'assest/js/custom.js', array( 'jquery' ), 1.7, true );
		wp_enqueue_script( 'script-buck', plugin_dir_url( __FILE__ ). 'assest/js/script-buck.js', array( 'jquery' ), 1.0, true );

		// Localize
		wp_enqueue_script( 'popup', plugin_dir_url( __FILE__ ). 'assest/js/popup.js', array( 'jquery' ), null, true );
		wp_localize_script( 'popup', 'popup_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

		// Localize
		wp_enqueue_script( 'search-ajax', plugin_dir_url( __FILE__ ) . 'assest/js/search.js', array('jquery'), null, true);
		wp_localize_script( 'search-ajax', 'search_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
}

// Register the shortcode
add_shortcode('custom_shortcode_list_bot', 'custom_shortcode_bot');
// Shortcode callback function
function custom_shortcode_bot($atts) {
    $plugin = ABSPATH."wp-content/plugins/Trading/";
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $query = new WP_Query([
        'post_type' => 'list_bot',
        'posts_per_page' => 6,
        'paged' => $paged,
        'post_status' => 'publish'
    ]);

    $custom_html = '
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>';

    $custom_html .= '<div  class="theme-dark" >';
    $custom_html .= '<div class="home-container">';
    $custom_html .= '<div class="index_mp-main-box__7AOAv">';
    $custom_html .= '<div class="index_main-card-container__yCoRT index_minHeight__+s2x6">';
    ob_start();
    include ($plugin . "filter.php");
    $custom_html .= ob_get_contents();
    ob_end_clean();
    $custom_html .= '<div class="index_botsBox__PzjnC" id="list_cards">';
    ob_start();
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
            $id = get_the_ID();
            include ($plugin . "loop-card.php");
        endwhile;
        $custom_html .= ob_get_contents();
        ob_end_clean();
        $custom_html .= '<div class="pagination">';
        $custom_html .= paginate_links(array(
            'total' => $query->max_num_pages,
            'current' => max(1, $paged),
            'prev_text' => __('« Previous'),
            'next_text' => __('Next »'),
        ));
        $custom_html .= '</div>';

    endif;
    wp_reset_postdata();
    $custom_html .= '<div id="popup1" class="okui-transition-fade okui-dialog okui-dialog-float okui-transition-fade-entered"
    style="transition-duration: 100ms; z-index: 10006; width: 100%;">';
    $custom_html .= '</div>';
    ob_start();
    include ($plugin . "foot-card.php");
    $custom_html .= ob_get_contents();
    ob_end_clean();
    ob_start();
    $custom_html .= '</div>';
    $custom_html .= '</div>';
    $custom_html .= '</div>';
    $custom_html .= '</div>';
    $custom_html .= '</div>';
   
    // Return the HTML code
    return $custom_html;
}