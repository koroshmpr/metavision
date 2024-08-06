<?php
global $product;
// Ensure $product is valid
if (!$product || !is_a($product, 'WC_Product')) {
    return;
}
$image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'single-post-thumbnail');
?>
<div class="bg-white product_card pb-3 pb-lg-0 d-grid d-lg-flex justify-content-center h-auto  overflow-hidden">
    <div class="col-lg-6 product_image_container bg-white d-flex justify-content-center">
        <img src="<?= $image ? esc_url($image[0]) : ''; ?>" alt="<?= esc_attr($product->get_title()); ?>"
             class="object-fit-contain p-3 h-100 ratio-1x1">
    </div>
    <div class="d-flex flex-column col-lg-6 justify-content-center border-end my-lg-4 broder-dark border-opacity-25 align-items-start px-3">
        <p class="card-title text-secondary w-100 fs-3 text-center fw-bold mt-3">
            <?= esc_html($product->get_title()); ?>
        </p>
<!--        <div class="card-description text-secondary text-opacity-75 small mt-2">-->
<!--            --><?php //= $product->post->post_excerpt; ?>
<!--        </div>-->
        <a href="<?= esc_url($product->get_permalink()); ?>"
           class="stretched-link mt-3 mx-auto btn btn-primary px-5 py-2 fs-6 rounded fw-bold"><?= esc_html__('MORE', 'macan'); ?></a>
    </div>
</div>
