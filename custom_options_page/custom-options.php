<?php

if ( is_admin() ){
  add_action( 'admin_menu', 'my_plugin_menu' );
  add_action( 'admin_init', 'register_mysettings' );
} else {
  // non-admin enqueues, actions, and filters
}

function my_plugin_menu() {
	add_menu_page( 'Options page title', 'Theme options', 'manage_options', 'custom-theme-options', 'display_elements', 'dashicons-admin-site', 2);
}

/*display options field*/
function display_elements() {
?>


<div class="wrap">
    <h1>Custom theme options</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'myoption-group' ); ?>
        <?php do_settings_sections( 'myoption-group' ); ?>
        
        <div class="fields_wrapper">
            <h3>Header part</h3>
            
            <div class="single_option">
                <h4>Header CTA button text</h4>
                <input type="text" name="new_option_name" value="<?php echo esc_attr( co_get_option('new_option_name') ); ?>" />
            </div>
        </div>
        
        <?php submit_button(); ?>

    </form>
</div>


<?php
}

function register_mysettings() {
    
  $args1 = array( // available other option also
       'sanitize_callback' => 'sanitize_callback_function1'
  );
  
  register_setting( 'myoption-group', 'new_option_name', $args1);
}

// sanitize the input value
function sanitize_callback_function1($input_value) {
    return sanitize_text_field($input_value);
}

if(!function_exists('co_get_option')) {
    
   function co_get_option($option_name) {
       return get_option($option_name);
   }
   
}

?>