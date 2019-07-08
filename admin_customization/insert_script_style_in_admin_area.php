<?php

add_action('admin_head', 'otv_cat_layout_icon');
function otv_cat_layout_icon() {
	$li_url_1 = get_template_directory_uri() . '/img/layout/layout1.jpg';
	$li_url_2 = get_template_directory_uri() . '/img/layout/layout2.jpg';
	$li_url_3 = get_template_directory_uri() . '/img/layout/layout3.jpg';
	$li_url_4 = get_template_directory_uri() . '/img/layout/layout4.jpg';
	$li_url_5 = get_template_directory_uri() . '/img/layout/layout5.jpg';
	echo <<<CSS
	<style>
	    .field-base-cat_layout .kc-radio-field-wrp .rbtn {
			padding: 10px!important;
			margin-bottom: 15px!important;
			color: transparent!important;
		}
	    .field-base-cat_layout .kc-radio-field-wrp .rbtn:nth-child(2) {
		    background: #fff url({$li_url_1}) no-repeat scroll 25px 0;
		}
	    .field-base-cat_layout .kc-radio-field-wrp .rbtn:nth-child(4) {
		    background: #fff url({$li_url_2}) no-repeat scroll 25px 0;
		}
	    .field-base-cat_layout .kc-radio-field-wrp .rbtn:nth-child(6) {
		    background: #fff url({$li_url_3}) no-repeat scroll 25px 0;
		}
	    .field-base-cat_layout .kc-radio-field-wrp .rbtn:nth-child(8) {
		    background: #fff url({$li_url_4}) no-repeat scroll 25px 0;
		}
	    .field-base-cat_layout .kc-radio-field-wrp .rbtn:nth-child(10) {
		    background: #fff url({$li_url_5}) no-repeat scroll 25px 0;
		}
	</style>
CSS;
}
