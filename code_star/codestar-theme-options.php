<?php
// framework options filter example
add_filter( 'cs_framework_options', 'extra_cs_framework_options' );

function extra_cs_framework_options( $options ) {

  $options      = array(); // remove old options


// ------------------------------
// a option section with tabs   -
// ------------------------------
$options[] = array(
  'name'     => 'Header',
  'title'    => 'Header',
  'icon'     => 'fa fa-plus-circle',
  'sections' => array(

    // -----------------------------
    // Logo menu
    // -----------------------------
    array(
      'name'      => 'logo',
      'title'     => 'Logo',
      'icon'      => 'fa fa-check',

      // begin: fields
      'fields'    => array(

        // logo fields
        array(
          'id'    => 'otv_logo',
          'type'  => 'upload',
          'title' => 'Upload your logo',
        )
      ), // end: fields

    ),
	
	//header background
	array(
      'name'      => 'header_background',
      'title'     => 'Background',
      'icon'      => 'fa fa-check',
      'fields'    => array(
        array(
          'id'    => 'header_background',
          'type'  => 'text',
          'title' => 'Use youtube ID',
        )
      ),

    ),
	
	//header notice
	array(
      'name'      => 'header_notice',
      'title'     => 'Notice',
      'icon'      => 'fa fa-check',
      'fields'    => array(
        array(
          'id'    => 'header_notice',
          'type'  => 'textarea',
          'title' => 'Write Notice',
        )
      ),

    ),
  )
);
///ghg
$options[] = array(
  'name'     => 'Ads',
  'title'    => 'Ads',
  'icon'     => 'fa fa-plus-circle',
  'sections' => array(

    // -----------------------------
    // adds 
    // -----------------------------
    array(
      'name'      => 'A',
      'title'     => 'Page Ads',
      'icon'      => 'fa fa-check',

      // begin: fields
      'fields'    => array(

	  
        // adds fields
        array(
          'id'    => 'add0',
          'type'  => 'switcher',
          'title' => 'Enable header ads',
        ),
        array(
          'id'    => 'addb0',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'add0', '==', 'true' )
        ),
        array(
          'id'    => 'add1',
          'type'  => 'switcher',
          'title' => 'Enable ads 1',
        ),
        array(
          'id'    => 'addb1',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'add1', '==', 'true' )
        ),	  
        // adds fields
        array(
          'id'    => 'add2',
          'type'  => 'switcher',
          'title' => 'Enable ads 2',
        ),
        array(
          'id'    => 'addb2',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'add2', '==', 'true' )
        ),	  
        // adds fields
        array(
          'id'    => 'add3',
          'type'  => 'switcher',
          'title' => 'Enable ads 3',
        ),
        array(
          'id'    => 'addb3',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'add3', '==', 'true' )
        ),	  
        // adds fields
        array(
          'id'    => 'add4',
          'type'  => 'switcher',
          'title' => 'Enable ads 4',
        ),
        array(
          'id'    => 'addb4',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'add4', '==', 'true' )
        ),	  
        // adds fields
        array(
          'id'    => 'add5',
          'type'  => 'switcher',
          'title' => 'Enable ads 5',
        ),
        array(
          'id'    => 'addb5',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'add5', '==', 'true' )
        ),	  
        // adds fields
        array(
          'id'    => 'add6',
          'type'  => 'switcher',
          'title' => 'Enable ads 6',
        ),
        array(
          'id'    => 'addb6',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'add6', '==', 'true' )
        ),	  
        // adds fields
        array(
          'id'    => 'add7',
          'type'  => 'switcher',
          'title' => 'Enable ads 7',
        ),
        array(
          'id'    => 'addb7',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'add7', '==', 'true' )
        ),
		
		
      ), // end: fields

    ),
	
    // -----------------------------
    // adds 
    // -----------------------------
    array(
      'name'      => 'B',
      'title'     => 'Sidbar Ads',
      'icon'      => 'fa fa-check',

      // begin: fields
      'fields'    => array(

	  
        // adds fields
        array(
          'id'    => 'sadd1',
          'type'  => 'switcher',
          'title' => 'Enable ads 1',
        ),
        array(
          'id'    => 'saddb1',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'sadd1', '==', 'true' )
        ),
        // adds fields
        array(
          'id'    => 'sadd2',
          'type'  => 'switcher',
          'title' => 'Enable ads 1',
        ),
        array(
          'id'    => 'saddb2',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'sadd2', '==', 'true' )
        ),
        // adds fields
        array(
          'id'    => 'sadd3',
          'type'  => 'switcher',
          'title' => 'Enable ads 1',
        ),
        array(
          'id'    => 'saddb3',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'sadd3', '==', 'true' )
        ),
        // adds fields
        array(
          'id'    => 'sadd4',
          'type'  => 'switcher',
          'title' => 'Enable ads 1',
        ),
        array(
          'id'    => 'saddb4',
          'type'  => 'image',
          'title' => 'Upload ads image',
		  'dependency'   => array( 'sadd4', '==', 'true' )
        ),	  

      ), // end: fields

    ),
  )
);

//ses
$options[] = array(
  'name'     => 'Footer',
  'title'    => 'Footer',
  'icon'     => 'fa fa-plus-circle',
  'sections' => array(

    // -----------------------------
    // copyright text
    // -----------------------------
    array(
      'name'      => 'copyright_text',
      'title'     => 'Copyright text',
      'icon'      => 'fa fa-check',

      // begin: fields
      'fields'    => array(

        // copyright text fields
        array(
          'id'    => 'copyright_text',
          'type'  => 'text',
          'title' => 'Add copyright text',
        )
      ), // end: fields

    ),
  )
);


  return $options;

}
