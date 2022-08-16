<?php
add_action('wp_ajax_get-products-f-cat', 'getProductsForCat');
add_action('wp_ajax_nopriv_get-products-f-cat', 'getProductsForCat');
function getProductsForCat(){
    $args = [
        'posts_per_page' => 8,
        'post_type' => 'products',
        'order' => 'DESC',
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => 'p-cats',
                'field' => 'slug',
                'terms'    => 'zc',
            ],
        ]
    ];
}