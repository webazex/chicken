<?php
get_header();
//var_dump(get_post_type());
switch (get_post_type()){
    case "products":
        $data = [
            'cats' => getTaxes('p-cats'),
            'subcats' => getTaxes('p-cats', 2),
            'products' => getProducts('', [], [], [], true)
        ];
        get_template_part('front/catalog/products', '', $data);
        break;
    case "recipes":
        $data = [
            'tags' => getTaxes('r-tags'),
            //'products' => getProducts(get_option( 'posts_per_page' ))
            'recipes' => getReceipts()
        ];
        get_template_part('front/catalog/receipes', '', $data);
        break;
    case "nap":
        $data = [
            'cats' => getTaxes('p-cats'),
            'subcats' => getTaxes('p-cats', "showAll"),
            //'products' => getProducts(get_option( 'posts_per_page' ))
            'products' => getProducts()
        ];
        get_template_part('front/catalog/nap', '', $data);
        break;
}
//get_template_part('front/components/pagination');
get_footer();
?>