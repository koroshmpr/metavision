<?php
/** Template Name: project archive */
global $cur_lan;
get_header(); ?>
    <section class="bg-secondary d-flex flex-wrap align-items-start justify-content-center justify-content-lg-between">
        <div class="col-11 mb-3 d-lg-none d-flex justify-content-center align-items-start">
            <h1 class="text-white display-lg text-uppercase"><?= get_the_title(); ?></h1>

        </div>
        <?php
        $args = array(
            'post_type' => 'project',
            'post_status' => 'publish',
            'orderby' => 'rand',
            'posts_per_page' => -1,  // Use -1 to get all posts
            'ignore_sticky_posts' => true
        );

        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
        $i = 0;
        /* Start the Loop */
        ?>
        <div class="row col-lg-10 row-cols-1 gy-3 overflow-hidden">
            <?php while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <div class="overflow-hidden" style="height: 400px;"
                     data-aos="fade-<?= $cur_lan == 'en' ? ($i % 2 == 0 ? 'right' : 'left') : ($i % 2 == 0 ? 'left' : 'right'); ?>">
                    <img class="object-fit-cover w-100" height="400"
                         src="<?php echo esc_url(the_post_thumbnail_url()); ?>"
                         alt="<?php echo get_the_title(); ?>">
                </div>
                <?php
                $i++;
            endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
        <div class="col-2 d-lg-flex d-none justify-content-center align-items-start vh-100">
            <h1 style="transform: rotate(-90deg) translateX(25%);" class="text-white display-lg position-fixed text-uppercase top-50"><?= get_the_title(); ?></h1>
        </div>
    </section>
<?php get_footer(); ?>