<?php

// custom field

add_action('wp_insert_post', 'theme_name_custom_fields');

function theme_name_custom_fields($post_id)
{
    if ( $_POST['post_type'] == 'my_post_type' ) {
        add_post_meta($post_id, 'my_meta_key_name', 'my meta value', true);
    }
    return true;
}