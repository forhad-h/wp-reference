<?php
/*order by popular post*/
$popular_post = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => 12,
  'meta_key' => 'post_views_count',
  'orderby' => 'meta_value_num'
  
));
/*Just put this in the file where count will be show*/
setPostViews(get_the_ID());

/*Output the view number*/
getPostViews(get_the_ID())