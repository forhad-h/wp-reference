<?php

add_filter('display_post_states', 'apq_display_page_states', 10, 2);

function apq_display_page_states( $post_states, $post ) {

    if($post->post_name === 'query-results-page') {
      $post_states['apq_page_for_result'] = __('Query Result Page', 'auto-parts-query');
    }

    return $post_states;
}
