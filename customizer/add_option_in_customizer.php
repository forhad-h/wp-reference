<?php


/*logo option in customizer*/

/**
* Create Logo and footer copyright text Setting and Upload Control
*/
function custom_new_customizer_settings($wp_customize) {
// add a setting for the site logo
$wp_customize->add_setting('custom_theme_logo');
$wp_customize->add_setting('custom_footer_copyright_field');
$wp_customize->add_section('custom_footer_section_id', array(
    'title' => __('Footer', 'nucleare'),
    'priority' => 150,
));

// Add a control to upload the logo
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_theme_logo_id',
array(
'label' => __("or Upload Logo", 'nucleare'),
'section' => 'title_tagline',
'settings' => 'custom_theme_logo',
) ) );

$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'custom_footer_copyright_control_id', array(
    'label' => __('Footer Copyright text', 'nucleare'),
    'section' => 'custom_footer_section_id',
    'settings' => 'custom_footer_copyright_field',
    'type' => 'textarea'
)));

}
add_action('customize_register', 'custom_new_customizer_settings');