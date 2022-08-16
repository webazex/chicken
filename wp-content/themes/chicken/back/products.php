<?php

function __fetchProperties($properties){
    $result = [];
    foreach ($properties as $item){
        array_push($result, [$item['property'] => $item['value']]);
    }
    return $result;
}
function getProducts($count = "all", array $property = [], $sorted = "DESC", $tax = []){
//    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    if($count == "all"){
        $count = -1;
    }
    $args = [
        'posts_per_page' => $count,
        'post_type' => 'products',
        'order' => $sorted,
        'paged' => $paged,
    ];
    if(!empty($tax)){
        foreach ($tax as $k => $v){
            $args['tax_query'] = [
                [
                    'taxonomy' => $k,
                    'terms'    => $v
                ]
            ];
        }
    }
    if(!empty($property)){
//        print_r($property);
        $meta = [];
        foreach ($property as $prop){
            $key = 'product-group_product-'.$prop;
            array_push($meta, ['key' => $key]);
        }
        $args['meta_query']	= [
                'relation' => 'AND',
                $meta
            ];
        $args['orderby'] = 'meta_value_num';
    }
    $obj = new WP_Query($args);
    if(!empty($obj->posts)){
        $posts = [];
        foreach ($obj->posts as $post){
            $dataPost = get_field('product-group', $post->ID);
            if(!empty($dataPost['conditions'])){
                $conditions = __fetchProperties($dataPost['conditions']);
            }else{
                $conditions = [];
            }
            if(!empty($dataPost['nutritional'])){
                $nutritional = __fetchProperties($dataPost['nutritional']);
            }else{
                $nutritional = [];
            }
            array_push($posts, [
               'id' => $post->ID,
               'title' => $dataPost['title'],
               'src' => $dataPost['image'],
               'sku' => $dataPost['sku'],
               'status' => $dataPost['product-status'],
                'conditions' => $conditions,
                'nutritional' => $nutritional,

            ]);
        }
    }else{
        $posts = [];
    }
    return $posts;
}

function getDataPosts($args){
    $obj = new WP_Query($args);
    if(!empty($obj->posts)){
        $posts = [];
        foreach ($obj->posts as $post){
            switch (get_post_type($post->ID)){
                case "nap":
                    $dataPost = get_field('product-group', $post->ID);
                    $cats = [];
                    $terms = get_the_terms($post, 'nap-tags');
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
                    array_push($posts, [
                        'title' => $dataPost['title'],
                        'image' => $dataPost['image'],
                        'content' => $dataPost['content'],
                        'cats' => $cats,
                    ]);
                break;
                case "recipes":
                    $dataPost = get_field('receipt-group', $post->ID);
                    if(!empty($dataPost['general-info'])){
                        $generalInfo = $dataPost['general-info'];
                        $posts[$post->ID]['title'] = $generalInfo['title'];
                        $posts[$post->ID]['subtitle'] = $generalInfo['subtitle'];
                        $posts[$post->ID]['image'] = $generalInfo['image'];
                    }else{
                        $posts[$post->ID]['title'] = '';
                        $posts[$post->ID]['subtitle'] = '';
                        $posts[$post->ID]['image'] = '';
                    }
                    if(!empty($dataPost['properties'])){
                        $props = $dataPost['properties'];
                        $posts[$post->ID]['desc'] = $dataPost['properties-desc'];
                        $posts[$post->ID]['complexity'] = $props['complexity'];
                        $posts[$post->ID]['time'] = $props['time'];
                        $posts[$post->ID]['portioning'] = $props['portioning'];
                    }else{
                        $posts[$post->ID]['complexity'] = 1;
                        $posts[$post->ID]['time'] = '';
                        $posts[$post->ID]['portioning'] = '';
                    }
                    if(!empty($dataPost['ingridients'])){
                        $ingridients = $dataPost['ingridients'];
                        $ingridientsNotes = $dataPost['notes'];

                        $posts[$post->ID]['ingridients'] = $ingridients;
                        $posts[$post->ID]['notes'] = $ingridientsNotes;

                    }else{
                        $posts[$post->ID]['ingridients'] = [];
                        $posts[$post->ID]['notes'] = "";
                    }

                    if(!empty($dataPost['receipe-group'])){
                        $receipeGroup = $dataPost['receipe-group'];

                        $posts[$post->ID]['file'] = $receipeGroup['file'];
                        $posts[$post->ID]['receipe'] = $receipeGroup['receipe'];
                    }else{
                        $posts[$post->ID]['file'] = [];
                        $posts[$post->ID]['receipe'] = "";
                    }

                    if(!empty($dataPost['nutritional-group'])){
                        $nutritionalGroup = $dataPost['nutritional-group'];
                        $posts[$post->ID]['info'] = $nutritionalGroup['info'];
                        $posts[$post->ID]['short-info'] = $nutritionalGroup['short_info'];

                    }else{
                        $posts[$post->ID]['info'] = '';
                        $posts[$post->ID]['short-info'] = [];
                    }
                    echo "recipes";
                break;
                case "products":
                    $dataPost = get_field('product-group', $post->ID);
                    if(!empty($dataPost['conditions'])){
                        $conditions = __fetchProperties($dataPost['conditions']);
                    }else{
                        $conditions = [];
                    }
                    if(!empty($dataPost['nutritional'])){
                        $nutritional = __fetchProperties($dataPost['nutritional']);
                    }else{
                        $nutritional = [];
                    }
                    array_push($posts, [
                        'id' => $post->ID,
                        'title' => $dataPost['title'],
                        'src' => $dataPost['image'],
                        'sku' => $dataPost['sku'],
                        'status' => $dataPost['product-status'],
                        'conditions' => $conditions,
                        'nutritional' => $nutritional,
                    ]);
                break;
            }
        }
    }else{
        $posts = [];
    }
    return $posts;
}
function getAllProductsCategory():array{
    $terms = get_terms([
        'taxonomy' => 'p-cats',
        'hide_empty' => true,
    ]);
    $returned = [];
    if(!empty($terms) and !is_wp_error($terms)){
        foreach ($terms as $term) {
            $icon = get_field('icon', $term->term_id);
            if(empty($icon)){
                $icon = false;
            }
            array_push($returned, [
               'id' => $term->term_id,
               'slug' => $term->slug,
               'name' => $term->name,
               'count' => $term->count,
               'icon' => $icon,
            ]);
        }
    }
    return $returned;
}

function getProductsForVal($count = "all", array $property = [], $sorted = "DESC", $tax = []){
//    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    if($count == "all"){
        $count = -1;
    }
    $args = [
        'posts_per_page' => $count,
        'post_type' => 'products',
        'order' => $sorted,
        'paged' => $paged,
    ];
    if(!empty($tax)){
        foreach ($tax as $k => $v){
            $args['tax_query'] = [
                [
                    'taxonomy' => $k,
                    'terms'    => $v
                ]
            ];
        }
    }
    if(!empty($property)){
//        print_r($property);
        $meta = [];
        foreach ($property as $k => $prop){
            $key = 'product-group_product-'.$k;
            array_push($meta, [
                'key' => $key,
                'value' => $prop,
            ]);
        }
        $args['meta_query']	= [
            'relation' => 'AND',
            $meta
        ];
        $args['orderby'] = 'meta_value_num';
    }
    $obj = new WP_Query($args);
    if(!empty($obj->posts)){
        $posts = [];
        foreach ($obj->posts as $post){
            $dataPost = get_field('product-group', $post->ID);
            if(!empty($dataPost['conditions'])){
                $conditions = __fetchProperties($dataPost['conditions']);
            }else{
                $conditions = [];
            }
            if(!empty($dataPost['nutritional'])){
                $nutritional = __fetchProperties($dataPost['nutritional']);
            }else{
                $nutritional = [];
            }
            array_push($posts, [
                'id' => $post->ID,
                'title' => $dataPost['title'],
                'src' => $dataPost['image'],
                'sku' => $dataPost['sku'],
                'status' => $dataPost['product-status'],
                'conditions' => $conditions,
                'nutritional' => $nutritional,

            ]);
        }
    }else{
        $posts = [];
    }
    return $posts;
}