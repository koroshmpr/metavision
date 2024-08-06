<?php global $cur_lan;
$sliderType = get_field('slide-type');
?>
<section id="heroSlide" class="swiper hero_slider">
    <div class="swiper-wrapper" <?= $cur_lan == 'en' ? '' : 'style="direction:ltr;"' ?>>
        <?php
        if ($sliderType == 'sections-slider') :
            get_template_part('template-parts/homepage/hero-slides/slide-01');
            get_template_part('template-parts/homepage/hero-slides/slide-02');
            get_template_part('template-parts/homepage/hero-slides/slide-04');
            get_template_part('template-parts/homepage/hero-slides/slide-03');
//            get_template_part('template-parts/homepage/hero-slides/slide-05');
        endif;
        if ($sliderType == 'slider') :
        $slider = get_field('slider');
        if ($slider) :
            foreach ($slider as $slide):?>
                <div class="swiper-slide">
                    <img class="object-fit-cover w-100 h-100 img-fluid" src="<?= $slide['image']['url'] ?? ''; ?>" alt="<?= $slide['image']['title'] ?? ''; ?>">

                </div>
            <?php
            endforeach;
        endif; ?>
    </div>
    <?php endif;
    ?>
</section>