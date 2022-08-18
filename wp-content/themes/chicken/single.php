<?php
wp_head();
switch (get_post_type()){
    case "products":
        $dataProduct = get_field('product-group', $post->ID);
        get_template_part('front/single/product', '', $dataProduct);
        break;
}
wp_footer();
?>
