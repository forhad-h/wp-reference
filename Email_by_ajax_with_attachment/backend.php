<?php
// Frontend implementation


// Backend implementation
$from_email = !empty($_POST['from_email']) ? $_POST['from_email'] : '';
$to_email = !empty($_POST['to_email']) ? $_POST['to_email'] : '';
$subject = sprintf(esc_html__('%s - CV From Candidate', 'careerfy-frame'), get_bloginfo('name'));
$message = !empty($_POST['message']) ? $_POST['message'] : '';
$attachment = !empty($_FILES['attachment']) ? $_FILES['attachment'] : '';

/*
$headers[] = "From: " . strip_tags($from_email);
$headers[] = "Reply-To: " . strip_tags($from_email);
$headers[] = "CC: " . get_bloginfo('admin_email');
$headers[] = "MIME-Version: 1.0";
*/

$headers  = "From: <". strip_tags($from_email) ."> \n";
$headers .= "Reply-To: <". strip_tags($from_email) ."> \n";
$headers .= "MIME-Version: 1.0 \n";
$headers .= "Content-type: text/html; charset=utf8 \n";
$headers .= "Return-Path:". strip_tags($to_email) ." \n";
$headers .= "To:". strip_tags($to_email) ." \n";


if(!empty($attachment)) {

	$allowed =  array( 'doc', 'docx', 'pdf' );
	
	$ext = pathinfo($attachment['name'], PATHINFO_EXTENSION);
	
	if( in_array($ext, $allowed) ) {
	
	    move_uploaded_file( $attachment['tmp_name'], WP_CONTENT_DIR.'/uploads/'.basename( $attachment['name'] ) );
	  
	    $attachment_url = WP_CONTENT_DIR.'/uploads/'.basename( $attachment['name'] );
	
	    if (wp_mail($to_email, '=?utf-8?B?' . base64_encode($subject) . '?=', $message, $headers, $attachment_url)) {
                $msg = "Email sent successfully!";
            }else {
                $msg = "Something is wrong! Try again.";
            }
	
	    unlink($attachment_url);
	    
	    echo $msg;
	
	}
}
