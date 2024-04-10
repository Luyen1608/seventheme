<?php
function search_handler() {
    if (isset($_POST['paged']) && $_POST['action'] == 'search_action') {
        $args = [
            'post_type' => 'list_bot',
            'meta_query' => array(
                'relation' => 'AND', // Relation between multiple meta queries, change to 'OR' if needed
            ),
            'paged' => $_POST['paged'],
            'posts_per_page' => 6,
            'post_status' => 'publish'
        ];

        if (isset($_POST['trading_type']) && $_POST['trading_type'] !== '') {
            $args['meta_query'][] = array(
                'key' => 'phan_loai',
                'value' => $_POST['trading_type'],
                'compare' => '=' // Change the comparison operator as needed
            );
        }

        if (isset($_POST['trading_pair']) && $_POST['trading_pair'] !== '') {
            $args['meta_query'][] = array(
                'key' => 'cap_giao_dich',
                'value' => $_POST['trading_pair'],
                'compare' => '=' // Change the comparison operator as needed
            );
        }

        if (isset($_POST['trading_range']) && $_POST['trading_range'] !== '') {
            $args['meta_query'][] = array(
                'key' => 'khung_giao_dich',
                'value' => $_POST['trading_range'],
                'compare' => '=', // Change the comparison operator as needed
            );
        }
		
		 if (isset($_POST['keyword']) && $_POST['keyword'] !== '') {
            $args['meta_query'][] = array(
                'key' => 'list_san_pham_bot',
                'value' => $_POST['keyword'],
                'compare' => 'LIKE', // Change the comparison operator as needed
            );
        }

        $query = new WP_Query($args);

        $data = '';
        ob_start();
        if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();
                $id = get_the_ID();
                include (ABSPATH . "wp-content/plugins/Trading/" . "loop-card.php");
            endwhile;
            $data .= ob_get_contents();
            ob_get_clean();
            $data .= '<div class="pagination">';
            $data .= paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $_POST['paged'],
                'prev_text' => __('« Previous'),
                'next_text' => __('Next »'),
            ));
            $data .= '</div>';
        endif;
        wp_reset_postdata();
        $data .= '<div id="popup1" class="okui-transition-fade okui-dialog okui-dialog-float okui-transition-fade-entered"
        style="transition-duration: 100ms; z-index: 10006; width: 100%;">';
        $data .= '<div id="loading-button"></div>';
        $data .= '</div>';
        wp_send_json_success($data);

    } else {
        // Handle the case where the AJAX request doesn't contain expected data
        wp_send_json_error( 'Invalid AJAX request' );
    }
    die;
}
add_action('wp_ajax_search_action', 'search_handler');
add_action('wp_ajax_nopriv_search_action', 'search_handler');