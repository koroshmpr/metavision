<?php global $cur_lan; ?>
<div class="p-2" data-aos="zoom-in">
    <img class="object-fit-cover rounded-top-3 bg-white img-fluid ratio-1" height="150" src="<?= the_post_thumbnail_url(); ?>"
         alt="<?= get_the_title(); ?>">
        <div class="bg-primary bg-opacity-25 d-flex flex-column rounded-bottom-3 align-items-start text-white p-3">
            <h6 style="height: 60px" class="fs-4"><?= get_the_title(); ?></h6>
            <a class="px-4 py-1 w-auto btn btn-white fw-bold overflow-hidden d-flex justify-content-center gap-1 align-items-center post-card rounded-3" href="<?= get_the_permalink(); ?>">
                <?= esc_html__('بیشتر', 'macan'); ?>
                <span><?= $cur_lan == 'en' ? '→' : '←' ?></span>
            </a>
        </div>
</div>