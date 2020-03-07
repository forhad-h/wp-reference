<?php
namespace APQ\Inc\DB;

/**
 * class APQ_WPDB
 * connect with database in singleton pattern
 * @since 1.0.0
*/

class APQ_WPDB {
  private static $wpdb;

  private final function __construct() {
    global $wpdb;
    self::$wpdb = $wpdb;
  }

  public static function getWPDB() {
    if(!isset(self::$wpdb)) new APQ_WPDB();
    return self::$wpdb;
  }
}

