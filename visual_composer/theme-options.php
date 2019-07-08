<?php
function np_theme_addons() {
    if(function_exists('vc_map')) {
        vc_map(array(
            'name' => __('Home page thumbnail', TD_THEME_NAME),
            'description' => 'Add Thumbnail in home page',
            'base' => 'home_page_thumb_base',
            'category' => 'Home Page Thumbnail',
            'icon' => 'vc_general vc_element-icon vc_icon-vc-masonry-grid',
            'params' => array(
            
                array(
                    'param_name' => 'thumb_title',
                    'type' => 'textfield',
                    'heading' => 'Thumb title',
                    'value' => 'Enter your title'
                ),
                array(
                    'param_name' => 'thumb_front_image',
                    'type' => 'attach_image',
                    'heading' => 'Thumb front image',
                ),
                array(
                    'param_name' => 'thumb_back_image',
                    'type' => 'attach_image',
                    'heading' => 'Thumb back image',
                ),
                array(
                    'param_name' => 'thumb_big',
                    'type' => 'checkbox',
                    'heading' => 'Big thumbnail'
                ),
                array(
                    'param_name' => 'thumb_link',
                    'type' => 'textfield',
                    'heading' => 'Thumb link',
                    'value' => 'Enter a link for thumb'
                ),
            
            
            )
            
           
            
        ));
        
        vc_map(array(
            'name' => __('Home page thumbnail', TD_THEME_NAME),
            'description' => 'Add Thumbnail in home page',
            'base' => 'home_page_thumb_base',
            'category' => 'Home Page Thumbnail',
            'icon' => 'vc_general vc_element-icon vc_icon-vc-masonry-grid',
            'params' => array(
            
                array(
                    'param_name' => 'thumb_title',
                    'type' => 'textfield',
                    'heading' => 'Thumb title',
                    'value' => 'Enter your title'
                ),
                array(
                    'param_name' => 'thumb_front_image',
                    'type' => 'attach_image',
                    'heading' => 'Thumb front image',
                ),
                array(
                    'param_name' => 'thumb_back_image',
                    'type' => 'attach_image',
                    'heading' => 'Thumb back image',
                ),
                array(
                    'param_name' => 'thumb_big',
                    'type' => 'checkbox',
                    'heading' => 'Big thumbnail'
                ),
                array(
                    'param_name' => 'thumb_link',
                    'type' => 'textfield',
                    'heading' => 'Thumb link',
                    'value' => 'Enter a link for thumb'
                ),
            
            
            )
            
           
            
        ));
    }
}
add_action('vc_before_init', 'np_theme_addons');