<?php
// AJAX handler
function my_ajax_handler() {
    // Your AJAX processing logic here
    if ( isset( $_POST['id'] ) && $_POST['action'] === 'my_ajax_action' ) {
        $args = [
            'post_type' => 'list_bot',
            'p' => $_POST['id'],
            'post_status' => 'publish'
        ];

        $query = new WP_Query($args);
        $plugin = ABSPATH."wp-content/plugins/Trading/";
        ob_start();
        if ($query->have_posts()) : while ($query -> have_posts()) : $query ->the_post();
				$id = get_the_ID();
                $basic_info = get_field('thong_tin_co_ban', $_POST['id']);
                include ($plugin . "popup-content.php");
            endwhile;
        endif;
        $popup = ob_get_contents();
        ob_end_clean();

        wp_send_json_success( $popup  );

    } else {
        // Handle the case where the AJAX request doesn't contain expected data
        wp_send_json_error( 'Invalid AJAX request' );
    }
}
add_action( 'wp_ajax_my_ajax_action', 'my_ajax_handler' ); // For logged-in users
add_action( 'wp_ajax_nopriv_my_ajax_action', 'my_ajax_handler' ); // For non-logged-in users
