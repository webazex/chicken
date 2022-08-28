<?php

switch (get_post_type()){
    case "products":
        wp_head();
        $dataProduct = get_field('product-group', $post->ID);
        get_template_part('front/single/product', '', $dataProduct);
        wp_footer();
        break;
    case "nap":
        $acfData = get_field('nap-content',$post->ID );
        $terms = get_the_terms($post->ID, 'nap-tags');
        $cats = [];
        if(!is_wp_error($terms) and ($terms !== false)){
            foreach ($terms as $termObj) {
                array_push($cats, [
                    'id' => $termObj->term_id,
                    'name' => $termObj->name,
                    'slug' => $termObj->slug,
                    'count' => $termObj->count,
                ]);
            }
        }
        $data = [
            'fields' => $acfData,
            'cats' => $cats
        ];
        get_template_part('front/single/nap', '', $data);
        get_footer();
        break;
    case "recipes":
        get_header();
        $terms = get_the_terms($post->ID, 'r-tags');
        $acfData = get_field('receipt-content-group',$post->ID );
        $cats = [];
        if(!is_wp_error($terms) and ($terms !== false)){
            foreach ($terms as $termObj) {
                array_push($cats, [
                    'id' => $termObj->term_id,
                    'name' => $termObj->name,
                    'slug' => $termObj->slug,
                    'count' => $termObj->count,
                ]);
            }
        }
        $data = [
            'fields' => $acfData,
            'cats' => $cats
        ];
        get_template_part('front/single/receipt', '', $data);
        get_footer();
}

?>
