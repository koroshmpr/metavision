<?php
/* Template Name: faq */
get_header();
$faqs = get_field('faqs'); ?>
<section>
    <div class="row">
        <div class="col-lg-8 mx-0 swiper product_image_swiper px-0">
            <div class="swiper-wrapper">
                <div class="position-absolute top-0 bottom-0 z-2 start-0 triangle-border"></div>
                <?php
                $images = get_field('slider');
                foreach ($images as $image): ?>
                    <div class="swiper-slide">
                        <?php $image = $image['image']; ?>
                        <?php $imageMobile = $image['image_mobile']; ?>
                        <img class="w-100 h-100 object-fit-cover <?= $imageMobile ? 'd-none d-lg-block' : ''; ?>"
                             src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" style="height: 600px"/>
                        <?php if ($imageMobile) { ?>
                            <img class="w-100 object-fit-cover h-auto d-lg-none" src="<?= $imageMobile['url']; ?>"
                                 alt="<?= $imageMobile['title']; ?>"/>
                        <?php } ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination text-white"></div>
        </div>
        <div class="col-lg-4 d-flex align-items-center text-white bg-primary px-lg-5">
            <h1 data-aos="fade-right" class="display-1 text-uppercase"><?= get_the_title(); ?></h1>
        </div>
    </div>
</section>
<section class="p-lg-3 p-2 bg-secondary">
    <div class="d-flex justify-content-center py-3">
        <div class="d-flex col-lg-6 col-10 justify-content-center position-relative">
            <input type="text" id="faq-search" class="col-11 form-control p-3" placeholder="Search for ...">
            <svg class="position-absolute start-0 translate-middle top-50 ms-4" width="30" height="30"
                 viewBox="0 0 61 49" fill="none">
                <path d="M0.729403 24.9898C3.0629 36.2106 14.0394 43.4078 25.2603 41.0743C28.6793 40.3632 31.7382 38.8414 34.2687 36.7352L51.3156 47.9125C52.6461 48.7849 54.2807 49.1631 55.9558 48.8148C59.2601 48.1276 61.3636 44.8893 60.6812 41.608C60.3329 39.9329 59.3343 38.5845 58.0086 37.7351L40.9617 26.5577C41.8844 23.3974 42.0654 20.0083 41.3496 16.5663C39.0161 5.34544 28.0396 -1.85169 16.8187 0.481803C5.59304 2.79235 -1.60409 13.7689 0.729403 24.9898ZM56.3318 40.2622C57.0199 40.6936 57.5216 41.3793 57.6934 42.2054C58.037 43.8575 56.9829 45.4652 55.3307 45.8088C54.4817 45.9854 53.6529 45.7986 53.0058 45.3347L53.0106 45.3577L36.518 34.5438C37.8762 33.0165 39.003 31.298 39.8622 29.4436L56.3318 40.2622ZM37.9717 17.2448C39.9139 26.5841 33.9163 35.7312 24.577 37.6734C15.2378 39.6156 6.06769 33.6228 4.12549 24.2835C2.1833 14.9443 8.17614 5.77419 17.5383 3.82723C26.8546 1.88981 36.0295 7.90559 37.9717 17.2448ZM9.19668 23.2289C9.10124 22.77 9.41021 22.2988 9.86914 22.2033C10.3281 22.1079 10.7993 22.4168 10.8947 22.8758C12.0591 28.4747 17.5474 32.0733 23.1463 30.9089C23.6053 30.8135 24.0765 31.1225 24.1719 31.5814C24.2673 32.0403 23.9584 32.5115 23.4994 32.607C16.9597 33.967 10.5567 29.7687 9.19668 23.2289Z"
                      fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <?php if ($faqs): ?>
        <div class="container masonry border border-white border-opacity-25 p-3 rounded-3">
            <?php foreach ($faqs as $key => $faq):
                $faqTitle = $faq['name'];
                $questions = $faq['faq'];
                foreach ($questions as $question) : ?>
                    <div class="masonry-item col-11 col-md-6 text-white rounded-1 col-lg-4 col-xl-3 p-3 border-3 border-dark border-opacity-25 bg-dark">
                        <h3 class="border-bottom pt-2 pb-3 border-white border-opacity-50 d-flex gap-2 align-items-end fs-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                 class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg>
                            <?= $faqTitle; ?>
                        </h3>
                        <div class="p-3">
                            <h6 class="fs-4"><?= $question['question']; ?></h6>
                            <article class="text-white text-opacity-75"><?= $question['answer']; ?></article>
                        </div>
                    </div>
                <?php endforeach;
            endforeach; ?>
        </div>
    <?php endif; ?>
</section>
<?php
get_footer(); ?>
