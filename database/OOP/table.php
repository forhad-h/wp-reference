<?php
namespace APQ\Inc\DB;
use APQ\Inc\DB\APQ_WPDB;

class Table {
  private $db;
  private $table_name;
  private $charset_collate;

  public function __construct() {
    $this->db = APQ_WPDB::getWPDB();
    $this->table_name = $this->db->prefix . 'apq_data';
    $this->charset_collate = $this->db->get_charset_collate();
  }

  public function create_table() {

    $query = <<<QUERY
          CREATE TABLE IF NOT EXISTS {$this->table_name} (
        		id mediumint(9) NOT NULL AUTO_INCREMENT,
            year varchar(10),
            make varchar(100),
            model varchar(200),
            product_image_url varchar(300),
            product_url varchar(300),
        		PRIMARY KEY  (id)
        	) {$this->charset_collate}
QUERY;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $query );

    // tracking version
    add_option( APQ_PLUGIN['name'].'_version', APQ_PLUGIN['version'] );

  }

  public function insert_query_data($year, $make, $model, $product_image_url, $product_url) {

    $this->db->insert($this->table_name, [
      'year' => $year,
      'make' => $make,
      'model' => $model,
      'product_image_url' => $product_image_url,
      'product_url' => $product_url,
    ]);

    $query = "SELECT * FROM {$this->table_name} WHERE id={$this->db->insert_id}";

    return json_encode( $this->db->get_results($query) );

  }

  public function update_query_data($id, $year, $make, $model, $product_image_url, $product_url) {

    $this->db->update(
        $this->table_name,
        [
          'year' => $year,
          'make' => $make,
          'model' => $model,
          'product_image_url' => $product_image_url,
          'product_url' => $product_url
        ],
        [
          'id' => $id
        ]
    );

    $query = "SELECT * FROM {$this->table_name} WHERE id='{$id}'";

    return json_encode( $this->db->get_results($query) );

  }

  public function delete_query_data($id) {
    if(
      $this->db->delete($this->table_name, [ 'id' => $id])
    ) return 'Deleted!';
  }

  public function get_all_query_data() {
    $query = "SELECT * FROM {$this->table_name}";
    return json_encode($this->db->get_results($query));
  }

  public function get_query_result($year, $make, $model) {
    $query = "SELECT * FROM {$this->table_name} WHERE year='{$year}' AND make='{$make}' AND model='{$model}'";

    return json_encode($this->db->get_results($query));
  }

}

