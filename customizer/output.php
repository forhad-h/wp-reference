<?php


    // use get_theme_mod() function for get saved value

    if(get_theme_mod('custom_theme_logo')) {
?>

    // example with html
    <img src="<?php echo get_theme_mod('custom_theme_logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'nucleare' ) );?>">
    
<?php
}else {
?>

<?php
}
?>