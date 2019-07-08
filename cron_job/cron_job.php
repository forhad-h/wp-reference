<?php

// helper functiions for debugging
var_dump(wp_next_scheduled( 'sals_check_event' ));
var_dump(wp_get_ready_cron_jobs('sals_check_event'));

// must be put into plugin main file because of __FILE__
// register_activation_hook() first argument needs plugin main file path
if(!function_exists('sals_scheduler')) {
  register_activation_hook(__FILE__, 'sals_scheduler');

  function sals_scheduler() {
    if(!wp_next_scheduled('sals_check_event')) {
      wp_schedule_event(time(), '30min', 'sals_check_event');
    }
  }
}

if(!function_exists('sals_clear_scheduler')) {
  register_deactivation_hook(__FILE__, 'sals_clear_scheduler');

  function sals_clear_scheduler() {
    wp_clear_scheduled_hook('sals_check_event');
  }
}

/*

  should be placed in seperate file

*/

// custom shcedule recurrence
if(!function_exists('sals_cron_schedule')) {

  add_filter('cron_schedules', 'sals_cron_schedule');

  function sals_cron_schedule($schedules) {
    if(!isset($schedules['30min'])) {
      $schedules['30min'] = array(
        'interval' => 30 * 60,
        'display' => 'Once every 30 minitues'
      );
    }
    return $schedules;
  }
}


if(!function_exists('sals_handle_video')) {

  add_action('sals_check_event', 'sals_handle_video');

  // execute each event. every 30 miniutes in this case

  function sals_handle_video() {
     // jobs goes here
  }

}


