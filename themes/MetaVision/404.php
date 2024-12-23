<?php
get_header();
global $cur_lan;
?>

<section class="py-5 d-flex bg-secondary h-100 flex-column justify-content-center align-items-center">
    <article class="z-top position-relative text-center p-5 shadow-lg bg-primary text-white" data-aos="zoom-in">
        <div class="fw-bolder my-auto d-flex align-items-center justify-content-center gap-1 overflow-hidden">
            <div data-aos="fade-down" data-aos-delay="600" style="font-size:120px">4</div>
            <div data-aos="fade-down" data-aos-delay="400" style="font-size:120px">0</div>
            <div data-aos="fade-down" data-aos-delay="200" style="font-size:120px">4</div>
        </div>
        <p data-aos="zoom-in" data-aos-delay="100"><?= $cur_lan == 'en' ? 'Page not found!' : 'صفحه یافت نشد!'; ?></p>
        <h3 data-aos="zoom-in" data-aos-delay="150"><?= $cur_lan == 'en' ? 'Your page has been deleted!' : 'صفحه مورد نظر حذف شده است!'; ?></h3>
        <p data-aos="zoom-in" data-aos-delay="200">
            <?= $cur_lan == 'en' ? 'You can use the return button to go back to the main page of the website' : 'برای بازگشت به صفحه اصلی وب سایت می توانید از دکمه بازگشت استفاده کنید'; ?></p>
        <div class="overflow-hidden mt-5">
            <a data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" href="/" class="btn btn-white rounded px-3 py-2 fw-bold shadow-sm">
                <?= $cur_lan == 'en' ? 'Return to the main page' : 'بازگشت به خانه'; ?> </a>
        </div>
    </article>
</section>

<?php
get_footer();
?>
