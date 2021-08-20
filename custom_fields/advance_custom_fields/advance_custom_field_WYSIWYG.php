<?php

/*
  INFO: Here is the custom post type is 'portfolio'
*/

/*
  Custom fields in portfolio
*/

/* Portfolio details */

// Meta box ID
define( 'MBID_DETAILS', 'mb_portfolio_details' );
// WYSIWYG Editor ID
define( 'WEID_DETAILS', 'we_portfolio_details' );
// Meta Key
define( 'MK_DETAILS', 'mk_portfolio_details' );


if( !function_exists( 'fhp_portfolio_add_meta_box' ) ) {

  function fhp_portfolio_add_meta_box() {

    $screens = array( 'portfolio' );

    foreach ( $screens as $screen ) {

      add_meta_box(
        MBID_DETAILS,
        __( 'Details', 'fhp' ),
        'fhp_portfolio_meta_box_callback',
        $screen,
        'normal',
        'high'
      );

    }

  }

  add_action( 'add_meta_boxes', 'fhp_portfolio_add_meta_box' );

}

if( !function_exists( 'fhp_portfolio_meta_box_callback' ) ) {

  function fhp_portfolio_meta_box_callback(){

          global $post;

          $mbid_details = MBID_DETAILS;
          $weid_details = WEID_DETAILS;

          // Add a nonce field so we can check for it later.
          wp_nonce_field( 'fhp_portfolio_save_meta_box_data', 'fhp_portfolio_meta_box_nonce' );


          //Create The Editor
          $content = get_post_meta($post->ID, MK_DETAILS, true);
          wp_editor( $content, $weid_details );

          //Clear The Room!
          echo "<div style='clear:both; display:block;'></div>";
  }

}


// Save meta box data
if( !function_exists( 'fhp_portfolio_save_meta_box_data' ) ) {

  function fhp_portfolio_save_meta_box_data( $post_id ) {

    if( !isset( $_POST['fhp_portfolio_meta_box_nonce'] ) ) return;


    if( !wp_verify_nonce( $_POST['fhp_portfolio_meta_box_nonce'], 'fhp_portfolio_save_meta_box_data' ) ) return;

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }

    if( !current_user_can( 'edit_post', $post_id ) ) return;

    if( !isset( $_POST[ WEID_DETAILS ] ) ) return;

    $details_data = wp_kses_post( $_POST[ WEID_DETAILS ] );

    update_post_meta( $post_id, MK_DETAILS, $details_data );

  }

  add_action( 'save_post', 'fhp_portfolio_save_meta_box_data');

}

