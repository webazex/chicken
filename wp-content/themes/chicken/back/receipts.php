<?php
function getReceipts($count = "all", $property = null, $sorted = 'DESC', $tax = [], $pagination = true){
    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
    if(!empty($count)){
        if($count == "all"){
            $count = -1;
            $pagination = false;
        }
    }else{
        $count = get_option('posts_per_page');
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
    if(is_front_page()){
        $paged = get_query_var('page') ? get_query_var('page') : 1;
    }else{
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    }
    $max_num_pages = ceil($obj->found_posts / $obj->query['posts_per_page']);
    if($max_num_pages <=1){
        $links = '';
    }else{
        $links = '<span class="pg-item-btn prev"><</span>';
        for ($i = 1; $i <= $max_num_pages; $i++){
            if($i == 1){
                $class = 'cp';
            }else{
                $class = "";
            }
            $links .= '<span data-page="'.$i.'" class="pg-item '.$class.'">'.$i.'</span>';
        }
        $links .= '<span class="pg-item-btn next">></span>';
    }
    if(!empty($obj->posts)){
        $posts = [];
        foreach ($obj->posts as $post){
//            $dataPost = get_field('receipt-group', $post->ID);
            $dataPost = get_field('receipt-content-group', $post->ID);
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
                $propsArr = [];
                $icons = get_field('general-settings', 'options')['receipt-propertys-icons'];
                if(!empty($props)){
                    foreach ($props as $prop) {
                        if(!empty($prop['complexity'])){
                            if(($prop['complexity'] !== false)){
                                if(!empty($icons)){
                                    if(!empty($prop['complexity'])){
                                        $lvl = $prop['complexity']['value'];
                                        if(!empty($icons['icons-levels'])){
                                            $levelIcons = $icons['icons-levels'];
                                        }else{
                                            $levelIcons = [];
                                        }
                                        switch ($lvl){
                                            case "1":
                                                if(!empty($levelIcons['low'])){
                                                    $icon = $levelIcons['low'];
                                                }else{
                                                    $icon = '';
                                                }
                                                break;
                                            case "2":
                                                if(!empty($levelIcons['normal'])){
                                                    $icon = $levelIcons['normal'];
                                                }else{
                                                    $icon = '';
                                                }
                                                break;
                                            case "3":
                                                if(!empty($levelIcons['hard'])){
                                                    $icon = $levelIcons['hard'];
                                                }else{
                                                    $icon = '';
                                                }
                                                break;
                                        }
                                    }
                                }else{
                                    $icon = '';
                                }
                                array_push($propsArr, [
                                    'prop' => $prop,
                                    'icon' => $icon
                                ]);
                            }
                        }
                        if(!empty($prop['portioning'])){
                            if(($prop['portioning'] !== false)){
                                if(!empty($icons['icon-p'])){
                                    $icon = $icons['icon-p'];
                                }else{
                                    $icon = '';
                                }
                                array_push($propsArr, [
                                    'prop' => $prop,
                                    'icon' => $icon
                                ]);
                            }
                        }
                        if(!empty($prop['time'])){
                            if(($prop['time'] !== false)){
                                if(!empty($icons['icon-time'])){
                                    $icon = $icons['icon-time'];
                                }else{
                                    $icon = '';
                                }
                                array_push($propsArr, [
                                    'prop' => $prop,
                                    'icon' => $icon
                                ]);
                            }
                        }
                    }
                }
                $posts[$post->ID]['desc'] = $dataPost['properties-desc'];
                $posts[$post->ID]['props'] = $propsArr;
            }else{
                $posts[$post->ID]['props'] = [];
                $posts[$post->ID]['desc'] = "";
            }
            if(!empty($dataPost['first-i'])){
                $firstIngridient = $dataPost['first-i'];
//                $term = get_term($firstIngridient['text-group']['name']);
                $posts[$post->ID]['first-i'] = [
                    'name' => $firstIngridient['text-group']['name']
                ];
//                $posts[$post->ID]['notes'] = $ingridientsNotes;

            }else{
                $posts[$post->ID]['first-i'] = [];
                $posts[$post->ID]['notes'] = "";
            }
            if(!empty($dataPost['others-ingridients'])){
                $othersIngridients = $dataPost['others-ingridients'];
                $ingridients = [];
                foreach ($othersIngridients as $ingridient){
                    $oTerm = get_term($firstIngridient['text-group']['name']);
                    $image = get_field('ihgrid-data', $oTerm)['image'];
                    array_push($ingridients, [
                        'name' => $oTerm->name,
                        'count' => $ingridient['face'],
                        'src' => $image,
                    ]);
                }
                $posts[$post->ID]['others-i'] = $ingridients;
            }else{
                $posts[$post->ID]['others-i'] = [];
            }
            if(!empty($dataPost['receipt-content-group'])){
                $receipeGroup = $dataPost['receipt-content-group'];

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
    $returned = [];
    if($pagination){
        if(!empty($links)){
            $returned['pagination'] = $links;
            $returned['posts'] = $posts;
        }
    }else{
        $returned['posts'] = $posts;
    }
    return $returned;
//    'receipt-group'
}

function __getDataReceipt($post){
    $dataPost = get_field('receipt-content-group', $post->ID);
    $dataThisPost = [];
    if(!empty($dataPost['general-info'])){
        $generalInfo = $dataPost['general-info'];
        $dataThisPost['id'] = $post->ID;
        $dataThisPost['title'] = $generalInfo['title'];
        $dataThisPost['subtitle'] = $generalInfo['subtitle'];
        $dataThisPost['image'] = $generalInfo['image'];
    }else{
        $dataThisPost['title'] = '';
        $dataThisPost['subtitle'] = '';
        $dataThisPost['image'] = '';
    }
    if(!empty($dataPost['properties'])){
        $props = $dataPost['properties'];
        $propsArr = [];
        $icons = get_field('general-settings', 'options')['receipt-propertys-icons'];
        if(!empty($props)){
            foreach ($props as $prop) {
                if(!empty($prop['complexity'])){
                    if(($prop['complexity'] !== false)){
                        if(!empty($icons)){
                            if(!empty($prop['complexity'])){
                                $lvl = $prop['complexity']['value'];
                                if(!empty($icons['icons-levels'])){
                                    $levelIcons = $icons['icons-levels'];
                                }else{
                                    $levelIcons = [];
                                }
                                switch ($lvl){
                                    case "1":
                                        if(!empty($levelIcons['low'])){
                                            $icon = $levelIcons['low'];
                                        }else{
                                            $icon = '';
                                        }
                                        break;
                                    case "2":
                                        if(!empty($levelIcons['normal'])){
                                            $icon = $levelIcons['normal'];
                                        }else{
                                            $icon = '';
                                        }
                                        break;
                                    case "3":
                                        if(!empty($levelIcons['hard'])){
                                            $icon = $levelIcons['hard'];
                                        }else{
                                            $icon = '';
                                        }
                                        break;
                                }
                            }
                        }else{
                            $icon = '';
                        }
                        array_push($propsArr, [
                            'prop' => $prop,
                            'icon' => $icon
                        ]);
                    }
                }
                if(!empty($prop['portioning'])){
                    if(($prop['portioning'] !== false)){
                        if(!empty($icons['icon-p'])){
                            $icon = $icons['icon-p'];
                        }else{
                            $icon = '';
                        }
                        array_push($propsArr, [
                            'prop' => $prop,
                            'icon' => $icon
                        ]);
                    }
                }
                if(!empty($prop['time'])){
                    if(($prop['time'] !== false)){
                        if(!empty($icons['icon-time'])){
                            $icon = $icons['icon-time'];
                        }else{
                            $icon = '';
                        }
                        array_push($propsArr, [
                            'prop' => $prop,
                            'icon' => $icon
                        ]);
                    }
                }
            }
        }
        $dataThisPost['desc'] = $dataPost['properties-desc'];
        $dataThisPost['props'] = $propsArr;
    }else{
        $dataThisPost['props'] = [];
        $dataThisPost['desc'] = "";
    }
    if(!empty($dataPost['first-i'])){
        $firstIngridient = $dataPost['first-i'];
//                $term = get_term($firstIngridient['text-group']['name']);
        $dataThisPost['first-i'] = [
            'name' => $firstIngridient['text-group']['name']
        ];
//                $posts[$post->ID]['notes'] = $ingridientsNotes;

    }else{
        $dataThisPost['first-i'] = [];
        $dataThisPost['notes'] = "";
    }
    if(!empty($dataPost['others-ingridients'])){
        $othersIngridients = $dataPost['others-ingridients'];
        $ingridients = [];
        foreach ($othersIngridients as $ingridient){
            $oTerm = get_term($firstIngridient['text-group']['name']);
            $image = get_field('ihgrid-data', $oTerm)['image'];
            array_push($ingridients, [
                'name' => $oTerm->name,
                'count' => $ingridient['face'],
                'src' => $image,
            ]);
        }
        $dataThisPost['others-i'] = $ingridients;
    }else{
        $dataThisPost['others-i'] = [];
    }
    if(!empty($dataPost['receipt-content-group'])){
        $receipeGroup = $dataPost['receipt-content-group'];

        $dataThisPost['file'] = $receipeGroup['file'];
        $dataThisPost['receipe'] = $receipeGroup['receipe'];
    }else{
        $dataThisPost['file'] = [];
        $dataThisPost['receipe'] = "";
    }

    if(!empty($dataPost['nutritional-group'])){
        $nutritionalGroup = $dataPost['nutritional-group'];
        $dataThisPost['info'] = $nutritionalGroup['info'];
        $dataThisPost['short-info'] = $nutritionalGroup['short_info'];

    }else{
        $dataThisPost['info'] = '';
        $dataThisPost['short-info'] = [];
    }
    return $dataThisPost;
}