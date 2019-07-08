<?php

function my_enqueue($hook) {
    // Only add to the edit.php admin page.
    // See WP docs.
    if ('edit.php' !== $hook) {
        return;
    }
	wp_enqueue_script('custom-script', plugin_dir_url(__FILE__).'/js/script.js', array('port-jquery'), '1.0.0', true);
}

add_action('admin_enqueue_scripts', 'my_enqueue');