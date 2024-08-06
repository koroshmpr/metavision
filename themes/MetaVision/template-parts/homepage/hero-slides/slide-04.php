<?php
// Product
$slide4 = get_field('slide-04');
global $cur_lan;
?>
<div class="swiper-slide bg-lg-contain bg-mobile-cover lazy">
    <div class="row h-100">
        <?php
        $categoryList = $slide4['product_cats'];
        // Check if categoryList is available and not empty
        if ($categoryList) {
            $total_categories = count($categoryList);
            foreach ($categoryList as $category_id) {
                $category = get_term_by('id', $category_id, 'product_cat');
                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                    $category_image = wp_get_attachment_url($thumbnail_id);
                    ?>
                    <a data-aos="zoom-in" data-aos-delay="800" href="<?= esc_url(get_term_link($category)); ?>"
                       class="category_container border-bottom border-white border-opacity-25 text-uppercase overflow-hidden w-100"
                       style="height: calc(100vh / <?= $total_categories; ?> );" data-image="<?= $category_image ?? ''; ?>">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <p class="card-title fs-2 fs-bold">
                                <?= esc_html($category->name); ?>
                            </p>
                        </div>
                    </a>
                <?php
            }
        }
        ?>
    </div>
</div>
