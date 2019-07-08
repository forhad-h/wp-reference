<?php
// ***************
       // advance custom field
//***************

function hike_add_meta_box() {
	//this will add the metabox for the member post type
	$screens = array( 'event' );
	
	foreach ( $screens as $screen ) {
	
		add_meta_box(
			'hike_sectionid',
			__( 'Event Info', 'textdomain' ),
			'hike_meta_box_callback',
			$screen, 'side', 'high'
		);
	 }
	}
	add_action( 'add_meta_boxes', 'hike_add_meta_box' );
	
	/**
	 * Prints the box content.
	 *
	 * @param WP_Post $post The object for the current post/page.
	 */
	function hike_meta_box_callback( $post ) {
	
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'hike_save_meta_box_data', 'hike_meta_box_nonce' );
	
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$e_day_value = get_post_meta( $post->ID, 'e_day_key', true );
	$e_month_value = get_post_meta( $post->ID, 'e_month_key', true );
	$e_year_value = get_post_meta( $post->ID, 'e_year_key', true );
	$e_name_value = get_post_meta( $post->ID, 'e_name_key', true );
	$e_designation_value = get_post_meta( $post->ID, 'e_designation_key', true );
	
    $fields  = '<label for="e_day_field" style="margin-right: 5px;">'.__( 'Day', 'textdomain' ).'</label> ';
    $fields .= '<input type="text" id="e_day_field" name="e_day_field" value="' . esc_attr( $e_day_value ) . '" size="20" style="margin-bottom:10px;" />'.'<br>';
    
    $fields .= '<label for="e_month_field" style="margin-right: 5px;">'.__( 'Month', 'textdomain' ).'</label> ';
    $fields .= '<input type="text" id="e_month_field" name="e_month_field" value="' . esc_attr( $e_month_value ) . '" size="20" style="margin-bottom:10px;" />'.'<br>';
    
    $fields .= '<label for="e_year_field" style="margin-right: 5px;">'.__( 'Year', 'textdomain' ).'</label> ';
    $fields .= '<input type="text" id="e_year_field" name="e_year_field" value="' . esc_attr( $e_year_value ) . '" size="20" style="margin-bottom:10px;" />'.'<br>';
    
    $fields .= '<label for="e_name_field" style="margin-right: 5px;">'.__( 'Name', 'textdomain' ).'</label> ';
    $fields .= '<input type="text" id="e_name_field" name="e_name_field" value="' . esc_attr( $e_name_value ) . '" size="20" style="margin-bottom:10px;" />'.'<br>';
    
    $fields .= '<label for="e_designation_field" style="margin-right: 5px;">'.__( 'Designation', 'textdomain' ).'</label> ';
    $fields .= '<input type="text" id="e_designation_field" name="e_designation_field" value="' . esc_attr( $e_designation_value ) . '" size="20" style="margin-bottom:10px;" />'.'<br>';
   
	echo $fields;
    
	}
	
	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	 add_action( 'save_post', 'hike_save_meta_box_data' );
    
	 function hike_save_meta_box_data( $post_id ) {
	
	 if ( ! isset( $_POST['hike_meta_box_nonce'] ) ) {
		return;
	 }
	
	 if ( ! wp_verify_nonce( $_POST['hike_meta_box_nonce'], 'hike_save_meta_box_data' ) ) {
		return;
	 }
	
	 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	 }
	
	 // Check the user's permissions.
	 if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
	
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	
	 } else {
	
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	 }
	
	 if (
         ! isset( $_POST['e_day_field'] ) ||
         ! isset( $_POST['e_month_field'] ) ||
         ! isset( $_POST['e_year_field'] ) ||
         ! isset( $_POST['e_name_field'] ) ||
         ! isset( $_POST['e_designation_field'] )
     ) {
		return;
	 }
	
	 $e_day = sanitize_text_field( $_POST['e_day_field'] );
	 $e_month = sanitize_text_field( $_POST['e_month_field'] );
	 $e_year = sanitize_text_field( $_POST['e_year_field'] );
	 $e_name = sanitize_text_field( $_POST['e_name_field'] );
	 $e_designation = sanitize_text_field( $_POST['e_designation_field'] );
	
	 update_post_meta( $post_id, 'e_day_key', $e_day );
	 update_post_meta( $post_id, 'e_month_key', $e_month );
	 update_post_meta( $post_id, 'e_year_key', $e_year );
	 update_post_meta( $post_id, 'e_name_key', $e_name );
	 update_post_meta( $post_id, 'e_designation_key', $e_designation );
	}
    
    
    
    
    
    
    
    
    
    