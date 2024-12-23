<?php
/** Template Name: solution archive */
global $cur_lan;
$bgPattern = get_field('background', 'option');
get_header(); ?>
    <section class="bg-cover h-100" style="background: url('<?= $bgPattern['url'] ?? '' ?>');">
        <div class="bg-secondary py-5 px-lg-5  h-100 bg-opacity-75">
            <h1 class="fw-bold text-white mt-lg-5 mb-lg-2 text-lg-start text-center border-start border-3 border-white ps-3"><?php the_title(); ?></h1>
            <?php
            $args = array(
                'post_type' => 'solution',
                'post_status' => 'publish',
                'orderby' => 'rand',
                'posts_per_page' => -1,  // Use -1 to get all posts
                'ignore_sticky_posts' => true
            );

            $loop = new WP_Query($args);
            if ($loop->have_posts()) :
            /* Start the Loop */
            ?>
            <div class="row row-cols-md-2 row-cols-xxl-3 gy-3 py-5 px-2 px-lg-0 overflow-hidden">
                <?php while ($loop->have_posts()) :
                    $loop->the_post();
                    get_template_part('template-parts/project/project-card');
                endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>

<?php