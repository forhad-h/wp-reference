<?php
// excerpt control
add_filter( 'excerpt_length', function($length) {
	return 40;
} );
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read more </a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

