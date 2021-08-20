<?php

// Set email content type
function set_email_content_type() {
  return 'text/html';
}
add_action( 'wp_mail_content_type', 'set_email_content_type' );


// Set sender email address
function email_sender_email() {
  return AUBU_SENDER_EMAIL;
}
add_filter( 'wp_mail_from', 'email_sender_email' );

// Set sender name
function email_sender_name() {
  return AUBU_SENDER_NAME;
}
add_filter( 'wp_mail_from_name', 'email_sender_name' );
