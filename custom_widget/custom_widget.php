<?php
// Register and load the widget
function otv_cat_post_widget() {
    register_widget( 'otv_widget' );
}
add_action( 'widgets_init', 'otv_cat_post_widget' );


// Creating the widget
class otv_widget extends WP_Widget {

  function __construct() {
      parent::__construct(

      // Base ID
      'otv_widget',

      // Widget name will appear in UI
      __('Category wise posts', 'wpb_widget_domain'),

      // Widget description
      array( 'description' => __( 'Show category base posts in sidebar', 'wpb_widget_domain' ), )
      );
  }

  // Creating widget front-end

  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );

    $otv_category = $instance['otv_category'];

    // before and after widget arguments are defined by themes
    echo $args['before_widget'];

    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    require get_template_directory() . '/inc/cat_layouts/cat_sidebar_layout_1.php';

    echo $args['after_widget'];
  }

  // Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'Category name', 'wpb_widget_domain' );
    }

    if ( isset( $instance[ 'otv_category' ] ) ) {
        $otv_category = $instance[ 'otv_category' ];
    }
    else {
        $otv_category = __( 'Undefined', 'wpb_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p>

    <label for="<?php echo $this->get_field_id( 'otv_category' ); ?>">Select category</label>

    <?php
        wp_dropdown_categories( array(
            'hide_empty'       => 0,
            'name'             => $this->get_field_name( 'otv_category' ),
            'orderby'          => 'name',
            'selected'         => $category->parent,
            'hierarchical'     => true,
            'show_option_none' => __('None')
        ) );
    ?>
    <p>curently selected: <strong><?php _e(get_cat_name($otv_category));?></strong></p>
    </p>

    <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['otv_category'] = ( ! empty( $new_instance['otv_category'] ) ) ? strip_tags( $new_instance['otv_category'] ) : '';
    return $instance;
  }
} // Class otv_widget ends here
