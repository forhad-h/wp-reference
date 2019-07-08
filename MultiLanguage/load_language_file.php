<?php

add_action('after_setup_theme', 'text_domain_setup');

function text_domain_setup() {
    load_theme_textdomain('testTheme', get_template_directory().'/languages');
}