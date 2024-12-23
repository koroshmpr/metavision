<?php
// Project
$slide6 = get_field('slide-06');
$solutions = $slide6['solutions'];
$showSolutions = $slide6['show'];
$bgPattern = get_field('background', 'option');
global $cur_lan;
if ($showSolutions):
    ?>

    <div class="swiper-slide d-flex bg-cover flex-wrap bg-secondary align-items-center vh-sm-90 justify-content-center" style="background: url('<?= $bgPattern['url'] ?? '' ?>');">
        <div class="swiper py-3 bg-secondary h-100 bg-opacity-75 solution_swiper">
            <div class="swiper-wrapper">
                <?php
                foreach ($solutions as $index => $solution):
                    // Assuming $project is an array, get the post ID
                    $post_id = $solution->ID;
                    // Get the featured image URL
                    $featured_image_url = get_the_post_thumbnail_url($post_id, 'full'); // You can change 'full' to any registered image size
                    ?>

                    <div class="swiper-slide text-center">
                        <div class="row w-100 h-100 row row-cols-md-2 py-5 mx-auto justify-content-center align-items-center">
                            <div>
                                <img class="object-fit-cover rounded-top-3 bg-white w-100" style="height:50vh" src="<?= esc_url($featured_image_url); ?>"
                                     alt="<?= esc_attr(get_the_title($post_id)); ?>">
                                <div class="bg-primary bg-opacity-25 d-flex flex-column rounded-bottom-3 align-items-center text-white p-3">
                                    <h6 style="height: 60px" class="fs-4"><?= esc_attr(get_the_title($post_id)); ?></h6>
                                    <a class="px-4 py-1 w-auto btn btn-white fw-bold overflow-hidden d-flex justify-content-center gap-1 align-items-center post-card rounded-3" href="<?= get_the_permalink($post_id); ?>">
                                        <?= esc_html__('بیشتر', 'macan'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach; ?>
            </div>
        </div>
        <?php $svgSize = '25'; ?>
        <div class="solution-button-next me-lg-5 me-2 position-absolute top-50 top-sm-90 end-0 z-2 rounded-circle p-2 bg-white bg-opacity-25 border border-white border-opacity-50">
            <svg width="<?= $svgSize; ?>" height="<?= $svgSize; ?>" fill="currentColor"
                 class="bi bi-chevron-left text-white" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
            </svg>
        </div>
        <div class="solution-button-prev ms-lg-5 ms-2 position-absolute top-50 top-sm-90 start-0 z-2 rounded-circle p-2 bg-white bg-opacity-25 border border-white border-opacity-50">
            <svg width="<?= $svgSize; ?>" height="<?= $svgSize; ?>" fill="currentColor"
                 class="bi bi-chevron-right text-white" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
            </svg>
        </div>
        <div class="solution-pagination z-3 position-absolute bottom-0 pb-5 mb-2 start-50 translate-middle-x d-flex gap-2 justify-content-center align-items-center"></div>
    </div>
<?php
endif;
?>