<?php
// add to main plugin php file

require_once ("add_table.php");
register_activation_hook( __FILE__, 'plugin_name_db_install' );


// add_table.php

global $plugin_name_version;
$plugin_name_version = '1.0';

function plugin_name_db_install() {
	global $wpdb;
	global $plugin_name_version;

	$table_name = $wpdb->prefix . 'table_name';
	
	$charset_collate = $wpdb->get_charset_collate();

	$query = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		cookie_name varchar(50) NOT NULL,
		cookie_value varchar(80) NOT NULL,
		country_name varchar(50),
		ip_address varchar(100),
		cookie_time varchar(150),
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $query ); // string[]|string

	add_option( 'plugin_name_version', $plugin_name_version );
}
