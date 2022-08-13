<?php
function getNaP($count = "all", $property = null, $sorted = 'DESC', $tax = []){
    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
    if($count == "all"){
        $count = -1;
    }

    if(is_string($property)){
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'nap',
            'paged' => $paged,
            'meta_query'	=> [
                'relation' => 'OR',
                [
                    'key' => 'nap-content_'.$property,
//                    'key' => 'complexity',
                ],
            ],
            'orderby' => 'meta_value_num',
            'order' => $sorted
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
            'post_type' => 'nap',
            'order' => $sorted,
            'paged' => $paged,
            'meta_query' => $meta
        ]);
    }
    if(is_null($property)){
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'nap',
            'paged' => $paged,
            'order' => $sorted
        ]);
    }
    if(!empty($tax)){
        foreach ($tax as $k => $v){
            $args[$k] = $v;
        }
    }
//    print_r($obj);
    if(!empty($obj->posts)) {
        $posts = [];
        foreach ($obj->posts as $post){
            $dataPost = get_field('nap-content', $post->ID);
            echo $dataPost['title'].'<br>';
        }


    }
    return $posts;
//    'receipt-group'
}