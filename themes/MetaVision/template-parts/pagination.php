<?php
/**
 * Custom Pagination Template
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $wp_query;

$total_pages = $wp_query->max_num_pages;
if ($total_pages > 1) {
    $current_page = max(1, get_query_var('paged'));

    $pagination_args = array(
        'base'      => str_replace(PHP_INT_MAX, '%#%', esc_url(get_pagenum_link(PHP_INT_MAX))),
        'format'    => '?paged=%#%',
        'current'   => $current_page,
        'total'     => $total_pages,
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
        'mid_size'  => 1,
        'end_size'  => 2,
        'type'      => 'list',
        'before_page_number' => '<span class="page-num">',
        'after_page_number' => '</span>',
    );

    $paginate_links = paginate_links($pagination_args);

    // Adding custom classes to <ul>, <li>, and <a> elements
    $paginate_links = str_replace("<ul class='page-numbers'>", "<ul class='page-numbers align-items-center'>", $paginate_links);

    echo '<nav class="pagination col-12">';
    echo $paginate_links;
    echo '</nav>';
}
?>
