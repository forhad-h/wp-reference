<?php
add_action('init', 'otv_kc_options');
function otv_kc_options() {
    if(function_exists('kc_add_map')):
        kc_add_map(
            array(
                'otv_category' => array(
                    'name'        => 'Category base posts',
                    'description' => __('Add category wise blog posts to your page', 'kingcomposer'),
                    'icon'        => 'fa-table',
                    'category'    => 'Blog Posts',
                    'params'      => array(
                        array(
                            'name'  => 'cat_title',
                            'label' => 'Add title',
                            'type'  => 'text',
                            'description' => 'Add the section title',
	                        'admin_label' => true,
                        ),
                        array(
                            'name'  => 'cat_layout',
                            'label' => 'Choose layout',
                            'type'  => 'radio',
                            'options' => array(
                                 'layout_1' => 'layout 1',
                                 'layout_2' => 'layout 2',
                                 'layout_3' => 'layout 3',
                                 'layout_4' => 'layout 4',
                                 'layout_5' => 'layout 5',
                            ),
                            'value' => 'layout_1',
	                        'admin_label' => true,
                        ),
                        array(
                            'name'  => 'posts_number',
                            'label' => 'Number of posts',
                            'type'  => 'text',
	                        'admin_label' => true,
                        ),
                        array(
                            'name'  => 'posts_category',
                            'label' => 'Select category',
                            'type'  => 'post_taxonomy',
	                        'admin_label' => true,
                        ),
                    )
                )
            )
        );
    endif;
}