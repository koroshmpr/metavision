<?php
global $cur_lan;
get_header(); ?>
    <div class="py-5 px-lg-5 bg-secondary h-100">
        <h1 data-aos="fade-right" class="border-bottom p-3 border-dark"><?php single_cat_title(); ?></h1>

        <?php
        $categories = get_terms(array(
            'taxonomy' => 'solution_categories',
            'orderby' => 'name',
            'parent' => 0, // Get only parent categories
            'hide_empty' => true,
        ));

        $current_category_id = get_queried_object_id(); // Get the current category ID
        $args = array(
            'post_type' => 'solution',
            'post_status' => 'publish',
            'orderby' => 'rand',
            'posts_per_page' => -1,  // Use -1 to get all posts
            'ignore_sticky_posts' => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'solution_categories',
                    'field' => 'term_id',
                    'terms' => $current_category_id,
                ),
            ),
        );

        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
        /* Start the Loop */
        ?>

        <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-1 gy-3 py-5 px-2 px-lg-0 overflow-hidden">
            <?php while ($loop->have_posts()) :
                $loop->the_post();
                get_template_part('template-parts/project/project-card');
            endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
<?php get_footer(); ?>