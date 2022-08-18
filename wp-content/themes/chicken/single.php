<?php
get_header('product');
switch (get_post_type()){
    case "products":
        $dataProduct = get_field('product-group', $post->ID);
        get_template_part('front/single/product', '', $dataProduct);
        break;
}
get_footer('product');
?>
