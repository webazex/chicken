<?php
function getReceipts($count = "all", $callbackType = 'html', $property = null, $sorted = 'DESC'){
    if($count == "all"){
        $count = -1;
    }
    if(is_string($property)){
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'recipes',
            'meta_query'	=> [
                'relation' => 'OR',
                [
                    'key' => 'receipt-group_properties_complexity',
//                    'key' => 'complexity',
                ],
            ],
            'orderby' => 'meta_value_num',
            'order' => 'ASC'
        ]);
    }
    if(is_array($property)){
        $meta = [
            'relation' => 'AND'
        ];
        foreach ($property as $item){
            array_push($meta, ['key' => $item]);
        }
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'recipes',
            'order' => $sorted,
            'meta_query' => $meta
        ]);
    }
    if(is_null($property)){
        echo "s";
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'recipes',
            'order' => $sorted
        ]);
    }
    $posts = [];
//    print_r($obj);
    if(!empty($obj->posts)){
        foreach ($obj->posts as $post){
            $data = get_field('receipt-group', $post->ID);
            echo $data['properties']['complexity'].'<br>';
        }
    }
//    'receipt-group'
}