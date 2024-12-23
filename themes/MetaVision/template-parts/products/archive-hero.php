<div class="row">
    <div class="col-lg-12 mx-0 swiper product_image_swiper px-0 bg-secondary">
        <h1 class="text-white display-2 text-center text-lg-start fw-bold p-5 z-2 position-absolute bottom-0 start-0 text-uppercase">
            <?php
            if (is_product_category()):?>
                <?= single_cat_title('', false); ?>
            <?php
            else :
                the_title();
            endif ?>
        </h1>
        <div class="swiper-wrapper">
            <?php
            $category = get_queried_object();
            $category_id = $category->term_id;
            $categoryImages = get_field('images', 'product_cat_' . $category_id);
            if ($categoryImages) {
                $images = get_field('images', 'product_cat_' . $category_id);
            }
            if (!$categoryImages) {
                $images = get_field('images', 'options');
            }
            foreach ($images as $image): ?>
                <div class="swiper-slide">
                    <?php $image = $image['image']; ?>
                    <?php $imageMobile = $image['image_mobile']; ?>
                    <img class="w-100 object-fit-cover <?= $imageMobile ? 'd-none d-lg-block' : ''; ?>"
                         src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" style="height: 600px"/>
                    <?php if ($imageMobile) { ?>
                        <img class="w-100 object-fit-cover h-auto d-lg-none" src="<?= $imageMobile['url']; ?>"
                             alt="<?= $imageMobile['title']; ?>"/>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>