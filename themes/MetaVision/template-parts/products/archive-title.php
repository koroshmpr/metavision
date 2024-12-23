<h1 class="fw-bold mt-lg-5 w-100 mb-4 d-flex ms-3 ms-lg-5 text-white text-lg-start text-center border-start border-3 border-white ps-3">
    <?php
    if (is_product_category()):?>
        <?= single_cat_title('', false); ?>
    <?php
    else :
        the_title();
    endif ?>
</h1>