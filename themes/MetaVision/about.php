<?php
/** Template Name: about us */
global $cur_lan;
get_header(); ?>
<section class="row bg-secondary h-100 justify-content-center">
    <div class="row justify-content-between bg-secondary align-content-start  overflow-hidden">
        <div class="col-lg-7 d-flex justify-content-center align-items-center">
            <h1 data-aos="fade-right" data-aos-delay="300"
                class="text-center display-lg col-lg-6 lh-1 text-white fw-bold mb-3 mb-lg-0">
                <?= get_the_title(); ?>
            </h1>
        </div>
        <img data-aos="zoom-out" class="img-fluid object-fit-cover col-12 px-0 col-lg-4"
             src="<?= get_field('image')['url'] ?? '' ?>" alt="metavision about">
    </div>
    <div class="row justify-content-lg-end mt-lg-n5" data-aos="fade-right" data-aos-delay="500">
        <article class="text-white col-lg-6 bg-primary p-lg-5 p-3 text-opacity-75 text-center fs-6 d-flex align-items-center">
            <?= get_field('about_desctiption'); ?>
        </article>
        <div class="col-lg-4"></div>
    </div>
</section>
<?php
$personnelSwitch = get_field('personnels-switch');
if ($personnelSwitch) {
    ?>
    <section class="py-3 px-0" data-aos="fade-up">
        <div class="swiper card-slide">
            <div class="swiper-wrapper">
                <?php
                $personnels = get_field('personnels');
                if ($personnels) {
                    foreach ($personnels as $personnel) :
                        ?>
                        <div class="swiper-slide bg-primary bg-opacity-75">
                            <div class="row gap-5 justify-content-center p-5">
                                <img class="col-lg-8 rounded-circle px-0 ratio-1 object-fit-cover"
                                     src="<?= $personnel['image']['url'] ?? '' ?>"
                                     alt="<?= $personnel['image']['title'] ?? '' ?>">
                                <h3 class="text-secondary text-center"><?= $personnel['name'] ?></h3>
                            </div>
                        </div>
                    <?php
                    endforeach;
                }
                ?>
            </div>

        </div>
    </section>
<?php } ?>
<?php get_footer(); ?>
