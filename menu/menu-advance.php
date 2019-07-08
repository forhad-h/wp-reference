<?php
//add class in main menu link
add_filter('nav_menu_link_attributes', function($atts) {
	$atts['class'] = "nav-link";
	return $atts;
}, 100, 1);
