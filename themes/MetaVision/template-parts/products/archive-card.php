<?php
global $product;
// Ensure $product is valid
if (!$product || !is_a($product, 'WC_Product')) {
    return;
}
$image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'single-post-thumbnail');
?>
<div class="bg-secondary">
    <div class="bg-primary bg-opacity-25 border border-white border-opacity-10 product_card pb-3 pb-lg-0 d-flex flex-wrap justify-content-center h-auto overflow-hidden">
        <div class="col-lg-6 col-12 product_image_container order-first order-lg-last d-flex justify-content-center">
            <img src="<?= $image ? esc_url($image[0]) : ''; ?>" alt="<?= esc_attr($product->get_title()); ?>"
                 class="object-fit-cover w-100 h-auto">
        </div>
        <div class="d-flex flex-column col-lg-6 justify-content-center my-lg-4 align-items-start px-3">
            <p class="card-title text-white w-100 fs-3 text-center fw-bold mt-3">
                <?= esc_html($product->get_title()); ?>
            </p>
            <a href="<?= esc_url($product->get_permalink()); ?>"
               class="stretched-link mt-3 mx-auto btn btn-white px-5 py-2 fs-6 rounded fw-bold"><?= esc_html__('بیشتر', 'macan'); ?></a>
        </div>
    </div>
</div>
