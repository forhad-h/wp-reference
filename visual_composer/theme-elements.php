<?php

function np_thumb_shortcode($attr) {


    
    extract(shortcode_atts(array(
        'thumb_title' => 'default title',
        'thumb_front_image' => '',
        'thumb_back_image' => '',
        'thumb_link' => 'default link',
        'thumb_big' => false,
    ), $attr));
    
    ob_start();
 ?>
    
    

	  <!-- first row -->
	  <div class="grid-item <?php echo $thumb_big ? 'grid-item-w1' : '';?>">
	    <div class="front-item">
	        <a href="<?php echo esc_url($thumb_link);?>" target="_blank" style="display: block;">
	                  <?php
			       $f_image = wp_get_attachment_image_src($thumb_front_image, 'full');
			       if($f_image) :
			  ?>
			      <img src="<?php echo esc_url($f_image[0]);?>" alt="Front image" />
			   
			  <?php endif;?>
	        </a>
		</div>
		  <div class="hover-item">
			  <a href="<?php echo esc_url($thumb_link);?>" target="_blank" style="display: block;">
		                  <?php
				       $b_image = wp_get_attachment_image_src($thumb_back_image, 'full');
				       if($b_image) :
				  ?>
				      <img src="<?php echo esc_url($b_image[0]);?>" alt="Back image" />
				   
				  <?php endif;?>
			  </a>
			  <p class="title"><?php echo esc_html($thumb_title);?></p>
		  </div>
	  </div>
    
    
<?php
    return ob_get_clean();
    
    
}
add_shortcode('home_page_thumb_base', 'np_thumb_shortcode')
?>