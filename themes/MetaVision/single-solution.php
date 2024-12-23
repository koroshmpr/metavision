<?php
/**
 * The template for displaying all single solution
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

// Check if it's a single post and not a product
global $cur_lan;
$bgPattern = get_field('background', 'option');
if (is_single() && !is_product()) {
    get_header();

    while (have_posts()) :
        the_post();
        ?>
        <section style="background: url('<?= $bgPattern['url'] ?? '' ?>');"
                 class="h-100 bg-cover">
            <div class="bg-secondary bg-opacity-75 row row-gap-4 pt-5 h-100 justify-content-lg-start justify-content-center align-content-start px-lg-5 px-3">
                <h1 class="fs-1 fw-bold mt-lg-5 text-white mb-0 text-uppercase border-start border-3 border-white ps-3">
                    <?php the_title(); ?>
                </h1>
                <article class="fs-5 text-white text-justify"><?= get_field('info') ?? ''; ?></article>
                <?php $gallery = get_field('gallery');
                if ($gallery) :?>
                    <div class="swiper post_swiper overflow-hidden">
                        <div class="swiper-wrapper">
                            <?php foreach ($gallery as $item): ?>
                                <div class="swiper-slide">
                                    <img height="400" class="w-100 object-fit-cover" src="<?= $item['url'] ?>"
                                         alt="<?= $item['title'] ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php $svgSize = '25'; ?>
                        <div class="post-button-next position-absolute top-50 end-0 z-2 rounded-circle p-2 bg-white bg-opacity-25 border border-white border-opacity-50">
                            <svg width="<?= $svgSize; ?>" height="<?= $svgSize; ?>" fill="currentColor"
                                 class="bi bi-chevron-left text-white" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                            </svg>
                        </div>
                        <div class="post-button-prev position-absolute top-50 start-0 z-2 rounded-circle p-2 bg-white bg-opacity-25 border border-white border-opacity-50">
                            <svg width="<?= $svgSize; ?>" height="<?= $svgSize; ?>" fill="currentColor"
                                 class="bi bi-chevron-right text-white" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-pagination d-flex gap-2 justify-content-center align-items-center pb-3"></div>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile;
    get_footer();
}
