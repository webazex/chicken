<?php

function __fetchProperties($properties){
    $result = [];
    foreach ($properties as $item){
        array_push($result, [$item['property'] => $item['value']]);
    }
    return $result;
}
function getProducts($count = "all", array $property = [], $sorted = "DESC", $tax = [], $paginate = false){
    if(is_front_page()){
        $paged = get_query_var('page') ? get_query_var('page') : 1;
    }else{
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    }
//    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
//    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    if($count == "all"){
        $count = -1;
    }elseif ($count == ""){
        $count = get_option('posts_per_page');
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
            $states = [];
            if(!empty($dataPost['product-states'])){
                foreach ($dataPost['product-states'] as $state){
//                    var_dump($state);die();
                    $conditions = [];
                    if(!empty($state['conditions'])){
                        foreach ($state['conditions'] as $condition) {
                            array_push($conditions, [
                                'property' => $condition['property'],
                                'value' => $condition['value'],
                            ]);
                        }
                    }
                    array_push($states, [
                        'key' => $state['acf_fc_layout'],
                        'text' => $state['name'],
                        'conditions' => $conditions,
                    ]);
                }
            }
//            if(!empty($dataPost['conditions'])){
//                $conditions = __fetchProperties($dataPost['conditions']);
//            }else{
//                $conditions = [];
//            }
            if(!empty($dataPost['nutritional'])){
                $nutritional = __fetchProperties($dataPost['nutritional']);
            }else{
                $nutritional = [];
            }
            array_push($posts, [
               'id' => $post->ID,
               'title' => $dataPost['text-group']['title'],
               'src' => $dataPost['image'],
               'sku' => $dataPost['text-group']['sku'],
               'states' => $states,
                'nutritional' => $nutritional,
            ]);
        }
    }else{
        $posts = [];
    }
    $returned = [];
    if($paginate){
        $max_num_pages = ceil($obj->found_posts / $obj->query['posts_per_page']);
//        $pagination = get_the_posts_pagination( [
//            'show_all'           => false, // показаны все страницы участвующие в пагинации
//            'end_size'           => 1,     // количество страниц на концах
//            'mid_size'           => 1,     // количество страниц вокруг текущей
//            'prev_next'          => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
//            'prev_text'          => __('<'),
//            'next_text'          => __('>'),
//            'add_args'           => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
//            'add_fragment'       => '',     // Текст который добавиться ко всем ссылкам.
//            'screen_reader_text' => __( '' ),
//            'aria_label'         => __( '' ), // aria-label="" для nav элемента. С WP 5.3
//            'class'              => 'pagination',  // class="" для nav элемента. С WP 5.5
//        ] );
        if($count == -1 or $max_num_pages == 1){
            $returned['pagination'] = false;
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
            $returned['pagination'] = $links;
        }
        $returned['posts'] = $posts;
    }else{
        $returned['pagination'] = false;
        $returned['posts'] = $posts;
    }
    return $returned;
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

function getPostById($id){
    if(!empty($id)){
        $post = get_post(intval($id));
        $dataPost = get_field('product-group', $post->ID);
        $states = [];
        if(!empty($dataPost['product-states'])){
            foreach ($dataPost['product-states'] as $state){
//                    var_dump($state);die();
                $conditions = [];
                if(!empty($state['conditions'])){
                    foreach ($state['conditions'] as $condition) {
                        array_push($conditions, [
                            'property' => $condition['property'],
                            'value' => $condition['value'],
                        ]);
                    }
                }
                array_push($states, [
                    'key' => $state['acf_fc_layout'],
                    'text' => $state['name'],
                    'conditions' => $conditions,
                ]);
            }
        }
        if(!empty($dataPost['nutritional'])){
            $nutritional = __fetchProperties($dataPost['nutritional']);
        }else{
            $nutritional = [];
        }
        $returned = [
            'id' => $post->ID,
            'title' => $dataPost['text-group']['title'],
            'src' => $dataPost['image'],
            'sku' => $dataPost['text-group']['sku'],
            'states' => $states,
            'nutritional' => $nutritional,
        ];
        return $returned;
    }else{
        return [];
    }
}