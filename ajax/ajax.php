<?php

// register ajax action 
// here 'sals_play_time' is action name

// for admin
add_action('wp_ajax_sals_Action_Name', 'Action_Function_Name');

// for guest
add_action('wp_ajax_nopriv_Action_Name', 'Action_Function_Name');


if(!function_exists('Action_Function_Name')) {

	function Action_Function_Name() {

		/*
 		 * include.php contains php code with 'echo'
		 * or run any php code with 'echo'
		 */
		include 'include.php';

		wp_die();
	}
}


/* 
 * if ajax will be used in front-end
 * then 'ajaxurl' variable need to initialized and send to frontend
 * with wp_localize_script
 */

wp_localize_script($handle, $object_name, array(
'ajaxurl' => admin_url('admin-ajax.php'),
));


/*
 * In javascript
 */

xmlhttp.open("GET", $object_name.ajaxurl + "?action=Action_Name&key=value", true);





