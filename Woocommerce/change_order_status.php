<?php
 // Make Order Status completed after successfull payment
 // By Forhad Hosain
 // Reference https://pistol.org.au/
 
 function pistol_auto_complete_order($orderID) {
     
    if(!$orderID) return;
    
    // Get order
    $order = wc_get_order($orderID);
    
    // Update order to completed status
    if($order) {
        $order->update_status('completed');
    }
    
 }
 
 add_filter('woocommerce_thankyou', 'pistol_auto_complete_order');
 

?>
