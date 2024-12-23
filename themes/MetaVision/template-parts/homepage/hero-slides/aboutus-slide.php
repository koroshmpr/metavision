<?php
// About
$slide2 = get_field('slide-02');
global $cur_lan;
?>
<div class="swiper-slide">
    <div class="h-100 justify-content-center gap-0 d-flex align-items-center <?= $cur_lan == 'en' ? 'flex-lg-row-reverse' : '';?>">
        <div class="col-4 col-lg-9 h-100 overflow-hidden">
            <div class="h-100" style="background: url('<?php echo $slide2['img']['url'] ?? ''; ?>') center center / cover;"></div>
        </div>
        <div class="col-lg-3 h-100 d-flex flex-column justify-content-center bg-white px-3 px-lg-5 <?= $cur_lan == 'en' ? 'text-end'  : 'text-start';?>" data-aos="fade-up" data-aos-delay="700">
            <h3 class="display-3 fw-bold text-dark"><?= $slide2['title']; ?></h3>
            <p class="text-dark text-justify text-opacity-75 fs-5 <?= $cur_lan == 'en' ? 'd-ltr' : 'd-rtl';?>">
                <?= $slide2['content']; ?>
            </p>
            <a class="btn btn-primary py-2 rounded col-11 col-lg-6"
               href="<?= esc_url($slide2['btn-link']['url'] ?? ''); ?>"
               title="about us page">
                <?=  esc_html__('بیشتر', 'macan');  ?>
            </a>
        </div>
    </div>
</div>
