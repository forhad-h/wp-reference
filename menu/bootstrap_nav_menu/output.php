<?php
/*
    output
*/
wp_nav_menu(array(
    'theme_location' => 'main-menu',
    'menu_class' => 'navbar-nav',
    'walker'     => new WP_Bootstrap_Navwalker()
));
