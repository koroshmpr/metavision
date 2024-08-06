<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */
global $cur_lan;
if (!defined('ABSPATH')) {
    exit;
}
$related_product_container = get_field('realated_post' , 'options');
if ($related_product_container) :
    if ($related_products) : ?>

        <section class="related products">

            <?php
            $heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));

            if ($heading) :
                ?>
                <h2 class="my-5 text-dark text-opacity-75 text-center fw-bold"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <!--		--><?php //woocommerce_product_loop_start(); ?>
            <div class="pt-4 col-lg-9 row row-cols-lg-5 row-cols-2 justify-content-lg-start justify-content-center">
                <?php foreach ($related_products as $related_product) : ?>

                    <?php
                    $post_object = get_post($related_product->get_id());

                    setup_postdata($GLOBALS['post'] =& $post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

//					wc_get_template_part( 'content', 'product' );
                    ?>
                    <article class="px-2 pb-5" data-aos="zoom-in" data-aos-delay="<?= $i; ?>0">
                        <?php get_template_part('template-parts/products/product-card'); ?>
                    </article>

                <?php endforeach; ?>
            </div>
            <!--		--><?php //woocommerce_product_loop_end(); ?>

        </section>
    <?php
    endif;
endif;

wp_reset_postdata();
