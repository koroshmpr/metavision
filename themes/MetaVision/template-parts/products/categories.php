<?php
$categories = get_field('product_cats', 'option');
$bgPattern = get_field('background', 'option');
// Add this above the product loop if you want to display categories first.
$product_categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => false, // Hide categories without products
));

if ($categories) {
    ?>
    <section class="bg-cover h-100" style="background: url('<?= $bgPattern['url'] ?? '' ?>');">
        <div class="bg-secondary h-100 bg-opacity-75 p-lg-5 p-2 row row-cols-lg-2 justify-content-lg-start justify-content-center">
            <?php get_template_part('template-parts/products/archive-title'); ?>
            <?php foreach ($categories as $category) {
                $categoryID = get_term_by('id', $category, 'product_cat');
                $thumbnail_id = get_term_meta($categoryID->term_id, 'thumbnail_id', true);
                $category_image = wp_get_attachment_url($thumbnail_id); ?>
                <article class="px-3 pb-4" data-aos="zoom-in">
                    <div class="bg-secondary">
                        <div class="bg-primary bg-opacity-25 border border-white border-opacity-10 product_card pb-3 pb-lg-0 d-flex flex-wrap justify-content-center h-auto overflow-hidden">

                            <div class="d-flex order-last order-lg-first flex-column col-lg-6 justify-content-center my-lg-4 align-items-start px-3">
                                <h3 class="card-title text-white w-100 fs-4 text-center fw-bold mt-3">
                                    <?= esc_html($categoryID->name); ?>
                                </h3>
                                <a href="<?= esc_url(get_term_link($categoryID)); ?>"
                                   class="stretched-link mt-3 mx-auto btn btn-white px-5 py-2 fs-6 rounded fw-bold">
                                    <?= esc_html__('بیشتر', 'macan'); ?>
                                </a>
                            </div>
                            <div class="col-lg-6 col-12 product_image_container d-flex justify-content-center">
                                <?php
                                if ($category_image) { ?>
                                    <img src="<?= esc_url($category_image); ?>" class="img-fluid object-fit-cover w-100"
                                         alt="<?= esc_attr($category->name); ?>">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </div>
    </section>
    <?php
}
?>
