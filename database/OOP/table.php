<?php
namespace APQ\Inc\DB;
use APQ\Inc\DB\APQ_WPDB;

class Table {
  private $db;
  private $table_name;
  private $charset_collate;
  private $query;

  function __construct() {
    $this->db = APQ_WPDB::getWPDB();
    $this->table_name = $this->db->prefix . 'apq_data';
    $this->charset_collate = $this->db->get_charset_collate();
    $this->query = <<<QUERY
      CREATE TABLE {$this->table_name} (
    		id mediumint(9) NOT NULL AUTO_INCREMENT,
        year varchar(10),
        make varchar(100),
        model varchar(200),
        product_url varchar(300),
    		PRIMARY KEY  (id)
    	) {$this->charset_collate}
QUERY;
  }

  function create_table() {
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $this->query );

    // tracking version
    add_option( APQ_PLUGIN['name'].'_version', APQ_PLUGIN['version'] );
  }

}

