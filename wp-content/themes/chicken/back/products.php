<?php

function __fetchProperties($properties){
    $result = [];
    foreach ($properties as $item){
        array_push($result, [$item['property'] => $item['value']]);
    }
    return $result;
}
function getProducts($count = "all", $cType = 'html', array $property = [], $sorted = "DESC", $cat = ''){
    if($count == "all"){
        $count = -1;
    }
    if(empty($property)){
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'products',
            'order' => $sorted,
        ]);
    }elseif(empty($cat)){
        $meta = [];
        foreach ($property as $prop){
            $key = 'product-group_product-'.$prop;
            array_push($meta, ['key' => $key]);
        }
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'products',
            'order' => $sorted,
            'meta_query'	=> [
                'relation' => 'AND',
                $meta
            ],
            'orderby' => 'meta_value_num',
        ]);
    }else{
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'products',
            'order' => $sorted,
            'cat' => $cat,
            'meta_query'	=> [
                'relation' => 'OR',
                [
                    'key' => 'product-group_product-status',
//                    'key' => 'complexity',
                ],
            ],
            'orderby' => 'meta_value_num',
        ]);
    }
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