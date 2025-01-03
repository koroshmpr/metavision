<?php
// Project
$slide3 = get_field('slide-03');
$projects = $slide3['projects'];
$show = $slide3['show'];
global $cur_lan;
if ($show):
    ?>

    <div class="swiper-slide d-flex flex-wrap bg-secondary align-items-center justify-content-center">
        <div class="d-flex col-12 bg-primary bg-opacity-75 h-50 justify-content-center align-items-center">
            <h4 data-aos="zoom-out" data-aos-delay="700" class="text-white display-lg text-uppercase">
                <?= $slide3['title']; ?>
            </h4>
        </div>
        <div class="swiper h-50 py-3 bg-secondary solution_swiper">
            <div class="swiper-wrapper">
                <?php
                foreach ($projects as $index => $project):
                    // Assuming $project is an array, get the post ID
                    $post_id = $project->ID;
                    // Get the featured image URL
                    $featured_image_url = get_the_post_thumbnail_url($post_id, 'full'); // You can change 'full' to any registered image size
                    ?>
                    <div class="swiper-slide" data-aos-delay="<?= $index; ?>00">
                        <div class="position-absolute top-0 left-0 right-0 bottom-0 bg-primary bg-opacity-25 w-100"></div>
                        <img class="object-fit-cover w-100 h-100" height="400"
                             src="<?= esc_url($featured_image_url); ?>"
                             alt="<?= esc_attr(get_the_title($post_id)); ?>">
                    </div>
                <?php
                endforeach; ?>
            </div>
        </div>
    </div>
<?php
endif;
?>