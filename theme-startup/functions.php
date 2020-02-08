<?php
/*
    basic settingg
*/
add_action('after_setup_theme', 'theme_name_theme_setup');

function theme_name_theme_setup() {
	
	// support dynamic title
    add_theme_support('title-tag');
	
	//image support
	add_theme_support('post-thumbnails');
	
	// support custom logo
	add_theme_support( 'custom-logo' );
	
	/*register navigation menu*/
	register_nav_menu('main-menu', 'Main menu');
    
    // for register multiple menus
	/*register_nav_menus(array(
        'main-menu' => 'Main menu',
        'footer-menu' => 'Footer menu',
    ));*/
	
}

/*
    custom posts register
*/

add_action('init', 'theme_name_custom_posts');

function theme_name_custom_posts() {
    
    $book_labels = array(
        'name'               => _x( 'Books', 'post type general name', 'textdomain' ),
        'singular_name'      => _x( 'Book', 'post type singular name', 'textdomain' ),
        'menu_name'          => _x( 'Books', 'admin menu', 'textdomain' ),
        'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'textdomain' ),
        'add_new'            => _x( 'Add New', 'book', 'textdomain' ),
        'add_new_item'       => __( 'Add New Book', 'textdomain' ),
        'new_item'           => __( 'New Book', 'textdomain' ),
        'edit_item'          => __( 'Edit Book', 'textdomain' ),
        'view_item'          => __( 'View Book', 'textdomain' ),
        'all_items'          => __( 'All Books', 'textdomain' ),
        'search_items'       => __( 'Search Books', 'textdomain' ),
        'not_found'          => __( 'No books found.', 'textdomain' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'textdomain' )
    );
    
    $book_args = array(
        'labels'             => $book_labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-menu',
        'taxonomies'         => array( 'category' ),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
    
    register_post_type('book', $book_args);
    
}

/*
    register widgets
*/

add_action( 'widgets_init', 'theme_name_widgets' );

function theme_name_widgets() {
    register_sidebar(array(
        'name' => __( 'Main Sidebar', 'textdomain' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}


//add scripts and css files in front end
add_action('wp_enqueue_scripts', 'theme_name_external_files');

function theme_name_external_files() {
	// all css file
    
	// google fonts
	wp_enqueue_style('font-sintony', 'https://fonts.googleapis.com/css?family=Sintony:400,700', false, '');
    
	//bootstrap
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css', false, '4.0.0');
	//fontawesome
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/fontawesome-all.min.css', false, '5.0.4');
	//animate
	wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.min.css', false, '3.5.2');
    
    //owl carousel
	wp_enqueue_style('owl-carousel', get_template_directory_uri().'/css/owl.carousel.min.css', false, '2.2.1');
	wp_enqueue_style('owl-carousel-theme', get_template_directory_uri().'/css/owl.theme.default.min.css', false, '2.2.1');
    
	// main stylesheet
	wp_enqueue_style('main-stylesheet', get_stylesheet_uri());
	
	// all js file
	// jquery (wordpress default jQuery name 'jquery')
	wp_enqueue_script('latest-jquery', get_template_directory_uri().'/js/jquery-3.2.1.min.js', false, '3.2.1', true);
	// popper js CDN
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', false, '3.2.1', true);
	// bootstrap 4.0.0 script
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('latest-jquery'), '4.0.0', true);
	// jquery easing
	wp_enqueue_script('easing', get_template_directory_uri().'/js/jquery.easing.min.js', array('latest-jquery'), '', true);
	
	// scroll reveal
	wp_enqueue_script('scroll-reveal', get_template_directory_uri().'/js/scrollreveal.min.js', false, '', true);
	// smooth scroll
	wp_enqueue_script('smooth-scroll', get_template_directory_uri().'/js/jquery.smooth-scroll.js', array('latest-jquery'), '2.2.0', true);
	// owl carousel
	wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array('latest-jquery'), '2.2.1', true);


	// custom scripts file
	wp_enqueue_script('custom-script', get_template_directory_uri().'/js/script.js', array('latest-jquery'), '', true);
}