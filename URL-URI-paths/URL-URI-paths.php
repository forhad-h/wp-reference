<?php
// template/theme url
echo get_template(); //theme_name
echo get_template_directory(); // F:\xampp\htdocs\project_name/wp-content/themes/theme_name
echo get_template_directory_uri(); // http://localhost/project_name/wp-content/themes/theme_name
echo get_theme_roots(); // /themes
echo get_theme_root(); // F:\xampp\htdocs\project_name/wp-content/themes
echo get_theme_root_uri(); // http://localhost/project_name/wp-content/themes
echo get_stylesheet(); // theme_name
echo get_stylesheet_uri(); // http://localhost/project_name/wp-content/themes/theme_name/style.css
echo get_stylesheet_directory(); // F:\xampp\htdocs\project_name/wp-content/themes/theme_name
echo get_stylesheet_directory_uri(); // http://localhost/project_name/wp-content/themes/theme_name
echo get_theme_file_uri(); // http://localhost/project_name/wp-content/themes/theme_name
echo get_theme_file_path(); // F:\xampp\htdocs\project_name/wp-content/themes/theme_name

// page url
echo get_page_link(); // http://localhost/project_name/page_name/
echo site_url(); // http://localhost/project_name/
echo home_url(); // http://localhost/project_name/
echo get_home_url(); // http://localhost/project_name/
echo get_permalink(); // http://localhost/project_name/page_name/

echo admin_url(); // http://localhost/project_name/wp-admin/
echo includes_url(); // http://localhost/project_name/wp-includes/
echo content_url(); // http://localhost/project_name/wp-content

// plugin url
echo plugins_url(); // http://localhost/project_name/wp-content/plugins
echo plugin_dir_url(__FILE__) // http://localhost/project_name/wp-content/plugins/plugin_name/
echo plugin_dir_path( __FILE__ ) // F:\xampp\htdocs\project_name\wp-content\plugins\plugin_name/
echo plugin_basename( __FILE__ ) // plugin_name/plugin_name.php