<?php

if(isset($_POST['submit'])) {
    $csv_file = $_FILES['csv_file'];

    if($csv_file['error'] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        return;
    }

    $file = fopen($csv_file['tmp_name'], 'r');

    while( $row = fgetcsv($file)) {
        // here $row will represent each row data
    }
}
