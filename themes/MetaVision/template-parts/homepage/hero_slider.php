<?php global $cur_lan;
?>
<section id="heroSlide" class="swiper hero_slider">
    <div class="swiper-wrapper" <?= $cur_lan == 'en' ? '' : 'style="direction:ltr;"' ?>>
        <?php
        get_template_part('template-parts/homepage/hero-slides/hero');
        get_template_part('template-parts/homepage/hero-slides/productcat-slide');
        get_template_part('template-parts/homepage/hero-slides/solutions');
        get_template_part('template-parts/homepage/hero-slides/aboutus-slide');
        get_template_part('template-parts/homepage/hero-slides/projects-slide');
        ?>
    </div>
</section>