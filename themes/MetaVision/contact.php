<?php
/** Template Name: Contact us */

get_header(); ?>
<section class="bg-secondary d-flex flex-wrap align-content-lg-center align-content-start justify-content-center min-vh-100">
    <div class="p-lg-4 p-2 overflow-hidden col-11 text-white bg-primary"
         style="background-image: url('<?= get_the_post_thumbnail_url() ?? ''; ?>');">
        <h1 data-aos="fade-down" data-aos-delay="300"
            class="display-1 text-center fw-bold"> <?= get_the_title(); ?></h1>
        <div class="row justify-content-center pt-4">
            <?php $containerClass = 'overflow-hidden col-lg-10 d-flex px-0 flex-wrap border border-white border-opacity-50 text-white';
            $svgContainer = 'col-2 col-lg-1 bg-white text-white bg-opacity-10 d-flex justify-content-center align-items-center';
            $svgSize = '35';
            ?>
            <div class="row row-gap-3 justify-content-center">
                <a data-aos="fade-up" class="<?= $containerClass; ?>" href="tel:<?= get_field('phone', 'option'); ?>">
                    <div class="<?= $svgContainer; ?>">
                        <svg width="<?= $svgSize; ?>" height="<?= $svgSize; ?>" fill="currentColor"
                             class="bi bi-headphones" viewBox="0 0 16 16">
                            <path d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5"/>
                        </svg>
                    </div>
                    <div class="col-10 p-3 d-flex justify-content-center align-items-center">
                        <span class="ltr" data-aos="zoom-in"><?= get_field('phone', 'option'); ?></span>
                    </div>
                </a>
                <div data-aos="fade-up" data-aos-delay="100" class="<?= $containerClass; ?>">
                    <div class="<?= $svgContainer; ?>">
                        <svg width="<?= $svgSize; ?>" height="<?= $svgSize; ?>" fill="currentColor"
                             class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                        </svg>
                    </div>
                    <address class="col-10 p-3 mb-0 d-flex justify-content-center align-items-center"
                             data-aos="fade-up"
                             data-aos-duration="1000">
                        <?= get_field('address', 'option'); ?>
                    </address>
                </div>
                <a data-aos="fade-up" data-aos-delay="200" class="<?= $containerClass; ?>"
                   href="mailto:<?= get_field('email', 'option'); ?>">
                    <div class="<?= $svgContainer; ?>">
                        <svg width="<?= $svgSize; ?>" height="<?= $svgSize; ?>" fill="currentColor"
                             class="bi bi-envelope-open-fill"
                             viewBox="0 0 16 16">
                            <path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.314l6.709 3.932L8 8.928l1.291.718L16 5.714V5.4a2 2 0 0 0-1.059-1.765zM16 6.873l-5.693 3.337L16 13.372v-6.5Zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516M0 13.373l5.693-3.163L0 6.873z"/>
                        </svg>
                    </div>
                    <div class="col-10 p-3 mb-0 d-flex justify-content-center align-items-center" data-aos="fade-up"
                         data-aos-duration="1000">
                        <?= get_field('email', 'option'); ?>
                    </div>
                </a>
            </div>
            <div class="w-100 d-flex align-items-center justify-content-center gap-4 py-3">
                <?php
                if (have_rows('social', 'option')):
                    // Loop through rows.
                    while (have_rows('social', 'option')) : the_row(); ?>
                        <a target="_blank" class="text-primary" aria-label="<?= get_sub_field('name', 'option'); ?>"
                           href="<?= get_sub_field('link', 'option')['url']; ?>">
                            <?= get_sub_field('icon', 'option'); ?>
                        </a>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <div class="col-11 map-container overflow-hidden" style="filter: invert(1)">
        <?= get_field('map', 'option'); ?>
    </div>
</section>
<style>
    .map-container iframe {
        max-width:100%;
    }
</style>

<?php get_footer(); ?>
