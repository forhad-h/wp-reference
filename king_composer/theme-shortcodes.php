<?php


add_shortcode( 'otv_category', 'otv_category_posts_markup' );

function otv_category_posts_markup( $atts ){
	extract(
	
	shortcode_atts(array(
	
	    "cat_title" => "Default title",
		"posts_number" => 3,
		"posts_category" => 'uncategorised',
		'cat_layout' => 'layout_1'
	
	), $atts)
	
	);
	
	ob_start();
	
	switch($cat_layout) :
	
	    case 'layout_1' :
	        require get_template_directory() . '/inc/cat_layouts/cat_layout_1.php';
        break;
	
	    case 'layout_2' :
	        require get_template_directory() . '/inc/cat_layouts/cat_layout_2.php';
        break;
	
	    case 'layout_3' :
	        require get_template_directory() . '/inc/cat_layouts/cat_layout_3.php';
        break;
	
	    case 'layout_4' :
	        require get_template_directory() . '/inc/cat_layouts/cat_layout_4.php';
        break;
	
	    case 'layout_5' :
	        require get_template_directory() . '/inc/cat_layouts/cat_layout_5.php';
        break;
		
	endswitch;
	
	
	return ob_get_clean();
	
}
?>