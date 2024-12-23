<?php
// Product
$slide4 = get_field('slide-04');
global $cur_lan;
?>
<div class="swiper-slide bg-cover lazy overflow-hidden" style="background-position:center;">
    <div class="row row-cols-lg-2 h-100 bg-secondary justify-content-center align-content-center bg-opacity-10">
        <?php
        $categoryList = $slide4['product_cats'];
        // Check if categoryList is available and not empty
        if ($categoryList) {
            $total_categories = count($categoryList);
            foreach ($categoryList as $index => $category_id) :
                $category = get_term_by('id', $category_id, 'product_cat');
                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $category_image = wp_get_attachment_url($thumbnail_id);
                ?>
                <a data-aos="zoom-out" data-aos-delay="800" href="<?= esc_url(get_term_link($category)); ?>"
                   class="category_container text-center border border-1 border-white border-opacity-50 py-lg-5 py-3 text-uppercase overflow-hidden <?= $index == 1 ? 'active' : ''; ?>"
                   data-image="<?= $category_image ?? ''; ?>">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="card-title fs-2 fs-bolder mb-0">
                            <?= esc_html($category->name); ?>
                        </p>
                    </div>
                </a>
            <?php
            endforeach;
        }
        ?>
    </div>
</div>