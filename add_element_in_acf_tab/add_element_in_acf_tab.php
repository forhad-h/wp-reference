<?php

add_filter('acf/prepare_field/key=field_TdnmTTvZu9d7IfcO', 'my_acf_prepare_field');

function my_acf_prepare_field( $field ) {
    if ( is_admin() ) :
?>
    <h2>Element for show</h2>
<?php
    endif;
    return $field;
}
?>
