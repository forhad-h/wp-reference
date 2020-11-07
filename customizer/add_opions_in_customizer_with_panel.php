<?php
/*Footer options*/
function theme_footer_settings($wp_customize) {
    // add main panel
    $wp_customize->add_panel( 'footer_options', array(
      'priority'       => 133,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Footer', 'twentyseventeen'),
      'description'    => '',
    ) );
    /*
	It is possible to add section only
    */
     // add sections under main panel
    $wp_customize->add_section('footer_left_options', array(
        'title' => __('Footer bottom left', 'twentyseventeen'),
        'priority' => 1,
        'panel' => 'footer_options',
    ));

    // add a setting footer
    $wp_customize->add_setting('footer_left_logo_one_image');
    $wp_customize->add_setting('footer_left_logo_one_url');
    
    
    // Add a control to upload the logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_left_logo_one_image',
    array(
    'label' => __("Upload footer left brand logo one", 'twentyseventeen'),
    'section' => 'footer_left_options',
    'settings' => 'footer_left_logo_one_image',
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'footer_left_logo_one_url_control', array(
        'label' => __('Upload footer left brand logo one url', 'twentyseventeen'),
        'section' => 'footer_left_options',
        'settings' => 'footer_left_logo_one_url',
        'type' => 'text'
    )));

}
add_action('customize_register', 'theme_footer_settings');
