<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */
global $product;
defined('ABSPATH') || exit;

if ( ! $product ) {
    $product = wc_get_product( get_the_ID() );
}

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
?>
<section class="py-lg-5 h-100 d-flex flex-wrap align-items-center justify-content-center"
     id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <div class="row px-2 py-lg-5 py-2 bg-white col-12 col-lg-11">
        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action('woocommerce_before_single_product_summary');
        ?>

        <div class="col-lg-7 col-11 mx-auto px-lg-4 px-0 d-flex flex-column justify-content-start summary entry-summary text-dark text-opacity-75">
            <?php

            /**
             * Hook: woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action('woocommerce_single_product_summary');
            ?>
        </div>

        <?php
//        echo wp_kses_post($product->get_short_description());
        /**
         * Hook: woocommerce_after_single_product_summary.
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_upsell_display - 15
         * @hooked woocommerce_output_related_products - 20
         */
        ?>
        <article class="col-lg-11 mx-auto col-12 mt-4 text-center">
            <?php   echo apply_filters('woocommerce_description', $product->get_description()); ?>
        </article>
    </div>

</section>
<?php do_action('woocommerce_after_single_product');?>

