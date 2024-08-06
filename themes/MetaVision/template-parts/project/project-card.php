<div class="p-2" data-aos="zoom-in">
    <a class="px-0 overflow-hidden post-card rounded-3" href="<?= get_the_permalink(); ?>">
        <img class="object-fit-cover img-fluid ratio-1" height="150" src="<?php echo the_post_thumbnail_url(); ?>"
             alt="<?php echo get_the_title(); ?>">
        <div class="w-100 bg-primary card_detail d-flex flex-column text-white px-4 py-3">
            <h6 class="fs-6 mb-0"><?= get_the_title(); ?></h6>
        </div>
    </a>
</div>