<?php global $cur_lan; ?>
<nav id="desktop-header" class="d-none d-lg-grid justify-content-center pt-5 px-3">
    <a class="navbar-brand mb-4 px-3" href="<?= home_url() ?>">
        <?php
        $logoType = get_field('logo_type', 'option');
        $logoSvg = get_field('site_logo_svg', 'option');
        $logoImg = get_field('site_logo_image', 'option');
        if ($logoType == 'svg') {
            echo $logoSvg;
        }
        if ($logoType == 'img') { ?>
            <img class="img-fluid img-fluid w-100" width="113" height="156" src="<?= $logoImg['url'] ?>"
                 alt="<?= $logoImg['title'] ?>">
        <?php } ?>
    </a>

    <?php
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
    if ($menu) :
        wp_nav_menu(array(
            'theme_location' => 'headerMenuLocation',
            'menu_class' => 'desktop-menu px-3 mt-3 row navbar-nav gap-1 align-items-center justify-items-center',
            'container' => false,
            'menu_id' => 'navbarTogglerMenu',
            'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
            'link_class' => 'nav-link p-0 pb-1 fs-6', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
            'depth' => 2,
        ));
    endif;
    ?>
    <?php do_action('wpml_add_language_selector'); ?>
    <?php get_template_part('template-parts/search-button'); ?>
</nav>
<nav id="mobileMenu" class="d-lg-none d-flex navbar z-3 <?= is_front_page() ? 'position-absolute top-0 left-0' : 'bg-secondary'; ?> p-3">
    <button class="btn p-2 <?= is_front_page() ? 'bg-dark bg-opacity-75' : ''; ?> border-0 text-white" type="button" aria-labelledby="offcanvasRight"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list-nested"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5"/>
        </svg>
    </button>
    <?php
    if (!is_front_page()): ?>
        <a class="navbar-brand px-3" href="<?= home_url() ?>">
            <?php
            $logoType = get_field('logo_type', 'option');
            $logoSvg = get_field('site_logo_svg', 'option');
            $logoImg = get_field('site_logo_image', 'option');
            if ($logoType == 'svg') {
                echo $logoSvg;
            }
            if ($logoType == 'img') { ?>
                <img class="img-fluid img-fluid" width="113" height="156" src="<?= $logoImg['url'] ?>"
                     alt="<?= $logoImg['title'] ?>">
            <?php } ?>
        </a>
    <?php endif; ?>
    <div class="offcanvas offcanvas-bottom bg-secondary" tabindex="-1" id="offcanvasRight"
         aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title mx-auto ps-4"
                id="offcanvasRightLabel"><?php get_template_part('template-parts/logo_brand'); ?></h5>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between align-items-center">
            <?php
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
            if ($menu) :
                wp_nav_menu(array(
                    'theme_location' => 'headerMenuLocation',
                    'menu_class' => 'desktop-menu px-3 col-11 row navbar-nav gap-1 align-items-center justify-items-center',
                    'container' => false,
                    'menu_id' => 'navbarHomeMenu',
                    'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
                    'link_class' => 'nav-link p-0 pb-1 fs-3 text-center', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                ));
            endif;
            ?>
            <?php do_action('wpml_add_language_selector'); ?>
            <?php get_template_part('template-parts/search-button'); ?>
            <a class="navbar-brand m-0 text-center" href="<?= home_url() ?>">
                <?php
                $logoType = get_field('logo_type', 'option');
                $logoSvg = get_field('site_logo_svg', 'option');
                $logoImg = get_field('site_logo_image', 'option');
                if ($logoType == 'svg') {
                    echo $logoSvg;
                }
                if ($logoType == 'img') { ?>
                    <img class="img-fluid col-4" width="57" height="78" src="<?= $logoImg['url'] ?>"
                         alt="<?= $logoImg['title'] ?>">
                <?php } ?>
            </a>
        </div>
    </div>
</nav>