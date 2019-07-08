<?php
    language_attributes() //lang="en-US"
    bloginfo('charset') //UTF-8
    body_class() //class="home blog logged-in admin-bar  customize-support"
    
    bloginfo('name') // site title
    bloginfo('description') // site description
    
    
    
    
    // for logo
    if(function_exists('the_custom_logo')) {
        the_custom_logo();
    }

    
    
    // navigation menu
    
    // display menu in front end
    if(has_nav_menu('main-menu')) {
        wp_nav_menu(array(
            'theme_location'  => 'main-menu',
            'menu_class' => 'main_menu_classes',
            'menu_id'  => 'mainMenu',
            'container' => 'nav',
            'container_id' => 'nav_id',
            'container_class' => 'nav_classes',
            'before' => 'Text before the link markup',
            'after' => 'Text after the link markup',
            'link_before' => 'Text before the link text',
            'link_after' => 'Text after the link text',
            'walker' => new WP_Bootstrap_Navwalker(),
        ));
    }
    
?>