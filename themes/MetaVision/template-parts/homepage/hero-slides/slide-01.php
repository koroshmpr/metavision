<?php
// Home
$slide1 = get_field('slide-01');
global $cur_lan;
?>
<div class="swiper-slide overflow-hidden d-flex flex-column align-items-xxl-<?= $cur_lan == 'en' ? 'start' : 'end'; ?> align-items-center">
    <img class="hero_image w-100 z-n1 h-100 position-absolute top-0 start-0 end-0 bottom-0"
         src="<?= esc_url($slide1['img']['url'] ?? ''); ?>"
         alt="<?= esc_url($slide1['img']['title'] ?? ''); ?>">
    <div class="d-flex position-absolute px-lg-5 px-3 col-12 flex-column justify-content-center h-100 align-items-<?= $cur_lan == 'en' ? 'align-items-start' : 'end'; ?>">
        <img class="col-lg-5 col-12" data-aos="fade-right" data-aos-delay="700" data-aos-duration="500" width="400"
             src="<?= $slide1['img_logo']['url'] ?? ''; ?>" alt="<?= $slide1['img_logo']['title'] ?? ''; ?>">
        <h2 data-aos="fade-up" data-aos-delay="900" data-aos-duration="500"
            class="display-lg fw-bolder text-white lh-0 mb-1 mt-2">
            <?= $slide1['big_title']; ?>
        </h2>
        <h3 data-aos="fade-up" data-aos-delay="1100" data-aos-duration="500" class="text-white fs-3">
            <?= $slide1['slogan']; ?>
        </h3>
    </div>
</div>