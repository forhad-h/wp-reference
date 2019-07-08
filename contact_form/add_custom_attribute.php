<?php

//add custom attribute in contact form 7
function add_custom_attr_wpcf7( $content ) {
    $str_pos = strpos( $content, 'name="email_address"' );
    $content = substr_replace( $content, ' aria-describedby="emailHelp"', $str_pos, 0 );
    return $content;
}

add_filter( 'wpcf7_form_elements', 'add_custom_attr_wpcf7' );
