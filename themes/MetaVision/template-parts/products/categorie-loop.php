       <?php
       $uncategorized_cat = get_term_by('slug', 'uncategorized', 'product_cat');
        $uncategorized_id = $uncategorized_cat ? $uncategorized_cat->term_id : 0;
        $categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'orderby' => 'date', // Order categories randomly
            'number' => 3, // Limit to 3 categories
            'parent' => 0, // Get only parent categories
            'hide_empty' => false,
            'exclude' => array($uncategorized_id), // Exclude the uncategorized category
        ));

        if ($categories) {
            $total_categories = count($categories);
            foreach ($categories as $category) {
                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $category_image = wp_get_attachment_url($thumbnail_id);
                ?>
                <a data-aos="zoom-in" data-aos-delay="800" href="<?= esc_url(get_term_link($category)); ?>"
                   class="category_container border-bottom border-white border-opacity-25 text-uppercase overflow-hidden w-100"
                   style="height: calc(100vh / <?= $total_categories; ?>/* );" data-image="*/<?= $category_image ?? ''; ?>">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="card-title fs-2 fs-bold">
                            <?= esc_html($category->name); ?>
                        </p>
                    </div>
                </a>
            <?php }
        }