<?php
// portfolio
function portfolio_post_types()
{
    register_post_type('project', // Changed 'portfolio' to 'project'
        array(
            'supports' => array('title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail'),
            'rewrite' => array('slug' => 'projects'), // Changed 'portfolios' to 'projects'
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'projects', // Update labels as needed
                'add_new' => 'افزودن نمونه کار جدید',
                'add_new_item' => 'افزودن نمونه کار جدید',
                'edit_item' => 'ویرایش نمونه کار',
                'all_items' => 'همه ی نمونه کارها',
                'singular_name' => 'نمونه کار'),
            'menu_icon' => 'dashicons-portfolio'
        ));
    register_taxonomy(
        'portfolio_categories',
        'project', // Changed 'portfolio' to 'project'
        array(
            'hierarchical' => true,
            'label' => 'دسته بندی نمونه کار', // Update labels as needed
            'query_var' => true,
        )
    );
}

add_action('init', 'portfolio_post_types');
// solutions
function solutions_post_types()
{
    register_post_type('solution',
        array(
            'supports' => array('title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail'),
            'rewrite' => array('slug' => 'solutions'),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'solutions',
                'add_new' => 'افزودن راه‌حل جدید',
                'add_new_item' => 'افزودن راه‌حل جدید',
                'edit_item' => 'ویرایش راه‌حل',
                'all_items' => 'همه ی راه‌حل',
                'singular_name' => 'راه‌حل'
            ),
            'menu_icon' => 'dashicons-lightbulb'
        )
    );

    register_taxonomy(
        'solution_categories',
        'solution',
        array(
            'hierarchical' => true,
            'label' => 'دسته بندی راه‌حل',
            'query_var' => true,
        )
    );

}

add_action('init', 'solutions_post_types');