<?php

add_action('admin_enqueue_scripts', 'sc_admin_external_files');
function sc_admin_external_files() {
    wp_enqueue_media();
	// upload 
	wp_enqueue_script('upload-script', get_template_directory_uri().'/js/upload.js', array('jquery'), '', true);
}

//html output code
?>
<div class="upload">
    <img  src="<?php echo esc_attr( get_option('header_background_image') ); ?>"/>
    <div> 
        <input type="hidden" name="header_background_image" id="header_background_image" value="<?php echo esc_attr( get_option('header_background_image') ); ?>" />
        
        <input type="button" class="upload_image_button button" value="Upload">
    </div>
</div>