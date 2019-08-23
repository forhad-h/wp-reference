<?php

function {theme_or_plugin_name}_change_title( $title ) {
  global $wp;
  $title['title'] = 'New title for '.$wp->request;
  $title['site'] = 'overrite site title';
  return $title;
}

add_filter('document_title_parts', '{theme_or_plugin_name}_change_title');

