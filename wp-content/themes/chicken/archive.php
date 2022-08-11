<?php
//var_dump(get_queried_object());
get_header();
switch (get_post_type()){
    case "products":
        $data = [
            'cats' => getTaxes('p-cats'),
            'subcats' => getTaxes('p-cats', "showAll"),
            'products' => getProducts(get_option( 'posts_per_page' ))
        ];
        get_template_part('front/catalog/products', '', $data);
        break;
}
get_template_part('front/components/pagination');
get_footer();
?>