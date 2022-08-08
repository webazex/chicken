<?php

function __fetchProperties($properties){
    $result = [];
    foreach ($properties as $item){
        array_push($result, [$item['property'] => $item['value']]);
    }
    return $result;
}
function getProducts($count = "all", $cType = 'html', array $property = [], $sorted = "DESC", $tax = []){
    if($count == "all"){
        $count = -1;
    }
    $args = [
        'posts_per_page' => $count,
        'post_type' => 'products',
        'order' => $sorted,
    ];
    if(!empty($tax)){
        foreach ($tax as $k => $v){
            $args[$k] = $v;
        }
    }
    if(!empty($property)){
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