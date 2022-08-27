<?php
function getReceipts($count = "all", $property = null, $sorted = 'DESC', $tax = []){
    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
    if($count == "all"){
        $count = -1;
    }

    if(is_string($property)){
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'recipes',
            'paged' => $paged,
            'meta_query'	=> [
                'relation' => 'OR',
                [
                    'key' => 'receipt-group_properties_'.$property,
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
            'post_type' => 'recipes',
            'order' => $sorted,
            'paged' => $paged,
            'meta_query' => $meta
        ]);
    }
    if(is_null($property)){
        $obj = new WP_Query([
            'posts_per_page' => $count,
            'post_type' => 'recipes',
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
    if(!empty($obj->posts)){
        $posts = [];
        foreach ($obj->posts as $post){
            $dataPost = get_field('receipt-group', $post->ID);
            if(!empty($dataPost['general-info'])){
                $generalInfo = $dataPost['general-info'];
                $posts[$post->ID]['id'] = $post->ID;
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
        }
    }else{
        $posts = [];
    }
    return $posts;
//    'receipt-group'
}