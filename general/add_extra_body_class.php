<?php
   // in functions.php for
   //add body class
    function plugin_name_body_class($classes) {
        $classes[] = 'class-name';
        return $classes;
    }

    add_filter('body_class', 'plugin_name_body_class');
?>