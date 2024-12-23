<?php
/** Template Name: our services */
global $cur_lan;
$bgPattern = get_field('background', 'option');
get_header(); ?>
<section class="h-100 bg-cover text-white" style="background: url('<?= $bgPattern['url'] ?? '' ?>');">
    <div class="bg-secondary h-100 bg-opacity-75 px-lg-5 px-3 pt-5 pt-lg-0 d-flex flex-column justify-content-center">
           <h1 class="fw-bold mt-lg-5 w-auto mb-4 d-flex mx-auto mx-lg-0 text-lg-start text-center border-start border-3 border-white ps-3"><?php the_title(); ?></h1>
           <article class="py-lg-4 text-justify">
               <?php the_content(); ?>
           </article>
           <div class="pb-5 mb-5 mb-lg-0 pb-lg-0">
               <?= do_shortcode('[gravityform id="' . get_field('form-id') . '" title="false" description="false" ajax="true"]') ?>
           </div>
       </div>
</section>
<?php get_footer(); ?>
