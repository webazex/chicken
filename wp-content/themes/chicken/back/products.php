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
            if(intval($v) === 0){
                $args['tax_query'] = [
                    [
                        'taxonomy' => $k,
                        'field'    => 'slug',
                        'terms'    => $v
                    ]
                ];
            }else{
                $args['tax_query'] = [
                    [
                        'taxonomy' => $k,
                        'field'    => 'id',
                        'terms'    => $v
                    ]
                ];
            }

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