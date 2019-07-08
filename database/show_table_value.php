<?php

global $wpdb;

$table_name = $wpdb->prefix . "table_name";

$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY id DESC" );
?>


<table id="cookie-info-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Country</th>
        <th>IP</th>
        <th>Time</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>Country</th>
        <th>IP address</th>
        <th>Time</th>
    </tr>
</tfoot>
<tbody>
<?php foreach ($retrieve_data as $retrieved_data){ ?>
    <tr>
        <td><?= $retrieved_data->id;?></td>
        <td><?= $retrieved_data->cookie_name;?></td>
        <td><?= $retrieved_data->cookie_value;?></td>
        <td><?= $retrieved_data->country_name;?></td>
        <td><?= $retrieved_data->ip_address;?></td>
        <td><?= $retrieved_data->cookie_time;?></td>
    </tr>
<?php 
}
?>
</tbody>
</table>