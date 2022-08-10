<?php
function getReceipts($count = "all", $property = null, $sorted = 'DESC'){
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
//    print_r($obj);
    if(!empty($obj->posts)){
        $posts = [];
        foreach ($obj->posts as $post){
            $dataPost = get_field('receipt-group', $post->ID);
            if(!empty($dataPost['general-info'])){
                $generalInfo = $dataPost['general-info'];
                array_push($posts, [
                    'title' => $generalInfo['title'],
                    'subtitle' => $generalInfo['subtitle'],
                    'image' => $generalInfo['image'],
                ]);
            }else{
                array_push($posts, [
                    'title' => '',
                    'subtitle' => '',
                    'image' => '',
                ]);
            }
            if(!empty($dataPost['properties'])){
                $props = $dataPost['properties'];
                array_push($posts, [
                    'complexity' => $props['complexity'],
                    'time' => $props['time'],
                    'portioning' => $props['portioning'],
                ]);
            }else{
                array_push($posts, [
                    'complexity' => 1,
                    'time' => '',
                    'portioning' => '',
                ]);
            }
            if(!empty($dataPost['ingridients'])){
                $ingridients = $dataPost['ingridients'];
                $ingridientsNotes = $dataPost['notes'];
                array_push($posts, [
                    'ingridients' => $ingridients,
                    'notes' => $ingridientsNotes,
                ]);

            }else{
                array_push($posts, [
                    'ingridients' => [],
                    'notes' => "",
                ]);
            }

            if(!empty($dataPost['receipe-group'])){
                $receipeGroup = $dataPost['receipe-group'];
                array_push($posts, [
                    'file' => $receipeGroup['file'],
                    'receipe' => $receipeGroup['receipe'],
                ]);
            }else{
                array_push($posts, [
                    'file' => [],
                    'receipe' => "",
                ]);
            }

            if(!empty($dataPost['nutritional-group'])){
                $nutritionalGroup = $dataPost['nutritional-group'];
                array_push($posts, [
                    'info' => $nutritionalGroup['info'],
                    'short-info' => $nutritionalGroup['short_info'],
                ]);
            }else{
                array_push($posts, [
                    'info' => '',
                    'short-info' => [],
                ]);
            }
        }
    }else{
        $posts = [];
    }
    return $posts;
//    'receipt-group'
}