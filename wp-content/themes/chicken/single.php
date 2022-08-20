<?php

switch (get_post_type()){
    case "products":
        wp_head();
        $dataProduct = get_field('product-group', $post->ID);
        get_template_part('front/single/product', '', $dataProduct);
        wp_footer();
        break;
    case "nap":

        $acfData = get_field('');
        get_template_part('front/single/nap', '', $post);
        get_footer();
        break;
}

?>
