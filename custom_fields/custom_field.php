<?php

// add custom field when insert post
add_action('wp_insert_post', 'theme_name_custom_fields');

function theme_name_custom_fields($post_id)
{
    if ( $_POST['post_type'] == 'my_post_type' ) {
        add_post_meta($post_id, 'my_meta_key_name', 'my meta value', true);
    }
    return true;
}


// add custom field "edit page" page loads
if(is_admin()) {
	function adding_custom_meta_boxes( $page ) {
	    $has_post_meta = count(get_post_meta($page->ID, 'my_meta_key_name')) > 0;
	    if(!$has_post_meta) {
            add_post_meta($page->ID, 'my_meta_key_name', '', true);
	    }
	}
	add_action( 'add_meta_boxes_page', 'adding_custom_meta_boxes');
}
