<?php
/**
 * The template for displaying product category archives.
 *
 * @link https://woocommerce.com/
 *
 * @package WooCommerce
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 * @version 1.0.0
 */

get_header(); ?>
<?php
$bgPattern = get_field('background', 'option');
$categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'parent' => 0, // Get only parent categories
    'hide_empty' => true,
));

$current_category_id = get_queried_object_id(); // Get the current category ID
global $cur_lan;
?>
<?php
//get_template_part('template-parts/products/archive-hero');
?>

    <section class="bg-cover h-100" style="background: url('<?= $bgPattern['url'] ?? '' ?>');">
        <div class="bg-secondary bg-opacity-75 h-100 row col-12 mx-auto py-lg-5 align-content-start justify-content-center justify-content-lg-start">
            <?php get_template_part('template-parts/products/archive-title'); ?>
            <div class="row row-cols-lg-2 justify-content-lg-start justify-content-center">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                // Custom query to retrieve products associated with the current category with pagination
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1, // Get posts per page from WordPress settings
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $current_category_id,
                        ),
                    ),
                );

                $products_query = new WP_Query($args);

                if ($products_query->have_posts()) :
                    $i = 0;
                    while ($products_query->have_posts()) :
                        $products_query->the_post();
                        ?>
                        <article class="px-lg-3 px-0 pb-4" data-aos="zoom-in">
                            <?php get_template_part('template-parts/products/archive-card'); ?>
                        </article>
                        <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <h2 class="fs-4 text-center w-100 border border-info p-4 my-0 bg-white text-white bg-opacity-10"><?= esc_html__('No Products Found', 'rokarno'); ?></h2>
                <?php endif; ?>
                <?php
                // Pass the custom query object to the pagination template part
                global $wp_query;
                $temp_query = $wp_query;
                $wp_query = $products_query;
                get_template_part('template-parts/pagination');
                $wp_query = $temp_query;
                ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>