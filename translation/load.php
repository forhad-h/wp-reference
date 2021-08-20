<?php

// Load Textdomain
if( !function_exists( 'prefix_load_textdomain' ) ) {

  function prefix_load_textdomain() {
    load_plugin_textdomain( 'text-domain', false, PREFIX_BASE_DIR_NAME . '/languages' );
  }

  add_action( 'plugins_loaded', 'prefix_load_textdomain' );

}


// Set Javascript Translation
if( !function_exists( 'prefix_set_script_translations' ) ) {

  function prefix_set_script_translations() {
    wp_set_script_translations(
      'script-handler',
      'text-domain',
      plugin_dir_path( __FILE__ ) . 'languages'
    );
  }
  add_action( 'wp_enqueue_scripts', 'prefix_set_script_translations', 101 );

}
