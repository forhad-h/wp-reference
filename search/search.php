<?php
// output in front page
get_search_form();
 
 
//search form
function html5_search_form( $form ) { 
     $form  = '<section class="search">';
     $form .= '<form role="search" method="get" id="search-form" action="' . home_url( '/' ) . '" >';
     $form .= '<label class="screen-reader-text" for="s">' . __('',  'domain') . '</label>';
     $form .= '<input type="search" class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="Search..." />';
     $form .= '<input type="submit" id="searchsubmit" value="'. esc_attr__('Go', 'domain') .'" />';
     $form .= '</form>';
     $form .= '</section>';
     return $form;
}

 add_filter( 'get_search_form', 'html5_search_form' );