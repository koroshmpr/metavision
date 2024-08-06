<?php
/**
 * The template for displaying all single solution
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

// Check if it's a single post and not a product
global $cur_lan;
if (is_single() && !is_product()) {
    get_header();

    while (have_posts()) :
        the_post();
        ?>
        <section class="row row-gap-4 h-100 justify-content-lg-between justify-content-lg-center align-content-start">
            <div class="bg-secondary solution-header position-relative bg-cover"
                 style="background-image: url('<?= get_field('background')['url'] ?? ''; ?>'); ">
                <div class="col-lg-4 col-11 h-75 d-flex flex-column align-items-start justify-content-lg-center justify-content-start pt-2 pt-lg-0 px-5">
                    <h1 class="fs-1 fw-bold text-primary mb-0 text-uppercase">
                        <?php the_title(); ?>
                    </h1>
                    <h2 class="fs-4 fw-bold text-primary mb-0">
                        <?= get_field('subtitle'); ?>
                    </h2>
                    <div><?= get_field('info'); ?></div>
                </div>
                <div style="height: 400px"
                     class="col-lg-6 col-12 position-absolute top-100 bottom-0 px-4 translate-middle-y">
                    <div data-aos="fade-down-<?= $cur_lan == 'en' ? 'left' : 'right'; ?>" data-aos-delay="100"
                         class="col-6 col-lg-3 bg-primary position-absolute bottom-0 <?= $cur_lan == 'en' ? 'end-0 me-3' : 'start-0 ms-3'; ?> h-50 z-n1 mb-4"></div>
                    <?php if (get_the_post_thumbnail_url()) { ?>
                        <img data-aos="fade-down" src="<?php echo get_the_post_thumbnail_url() ?>"
                             height="350"
                             class="object-fit-cover w-100"
                             alt="<?php the_title(); ?>">
                    <?php } ?>
                </div>
            </div>
            <article class="col-11 row row-cols-lg-2 mx-auto py-lg-3 overflow-hidden">
                <div>
                    <?php
                    $listItems = get_field('list_items');
                    if ($listItems): ?>
                        <div class="px-0" data-aos="fade-right" data-aos-delay="300">
                            <?php foreach ($listItems as $index => $listItem) : ?>
                                <div class="pb-3 <?= $index == 0 ? 'solution-details' : ''; ?>">
                                    <h3 class="text-primary fw-bold"><?= $listItem['title']; ?></h3>
                                    <?php $type = $listItem['type'];
                                    if ($type == 'list') :?>
                                        <ul class="py-2 border-top lh-normal border-bottom border-primary border-2 text-column-2 marker-primary">
                                            <?php
                                            $lists = $listItem['lists'];
                                            foreach ($lists as $list) : ?>
                                                <li><?= $list['list']; ?></li>
                                            <?php endforeach;
                                            ?>
                                        </ul>
                                    <?php endif;
                                    if ($type == 'text') :
                                        echo $listItem['text'];
                                    endif;
                                    ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif;
                    $capabilities = get_field('capabilities');
                    if ($capabilities):
                        ?>
                        <div class="d-flex gap-3 flex-wrap align-items-center justify-content-center">
                            <?php foreach ($capabilities as $index => $capability): ?>
                                <img data-aos-offset="-500" data-aos="zoom-in" data-aos-delay="<?= $index * 5;?>0" class="p-2 border borer-dark rounded-1 object-fit-cover" width="70" height="70"
                                     src="<?= $capability['url'] ?>" alt="<?= $capability['title'] ?>" title="<?= $capability['title'] ?>">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="px-lg-5 pt-3 pt-lg-0" data-aos="fade-down" data-aos-delay="500">
                    <?php the_content() ?>
                </div>
            </article>
        </section>
    <?php endwhile;
    get_footer();
}
