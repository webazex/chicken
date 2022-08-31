<?php
add_action('wp_ajax_get-data-posts-tat', 'getPostsForOneTaxAndTerm');
add_action('wp_ajax_nopriv_get-data-posts-tat', 'getPostsForOneTaxAndTerm');
function getPostsForOneTaxAndTerm(){
   if(!empty($_POST['ptype'])){
       $postType = $_POST['ptype'];
       if(!empty($_POST['count'])){
           $count = intval($_POST['count']);
       }else{
           $count = get_option('posts_per_page');
       }
       $paged = get_query_var('paged') ? get_query_var('paged') : 1;
       if(!empty($_POST['c-page'])){
           $page = intval($_POST['c-page']);
       }else{
           $page = 1;
       }
       if(!empty($_POST['order'])){
           $order = $_POST['order'];
       }else{
           $order = 'DESC';
       }
       if((!empty($_POST['tax']) and(!empty($_POST['term'])))){
           if(intval($_POST['term']) !== 0){
               $field = 'slug';
           }else{
               $field = 'id';
           }
           $tax = [
               [
                   'taxonomy' => $_POST['tax'],
                   'field'    => $field,
                   'terms'    => $_POST['term']
               ]
           ];
       }
       //forming args
       $args = [
           'posts_per_page' => $count,
           'post_type' => $postType,
           'order' => $order,
           'paged' => $paged,
           'page' => $page,
           'tax_guery' => $tax
       ];
       $html = '';
       switch ($postType){
           case "nap":
               $obj = new WP_Query($args);
               $html = '';
               if(!empty($obj->posts)) {
                   $posts = [];
                   foreach ($obj->posts as $post) {
                       $dataPost = get_field('nap-content', $post->ID);
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
                       $html .= get_template_part('/front/components/nap-item', '', $posts);
                   }
               }
               break;
           case "products":
               $obj = new WP_Query($args);
               if(!empty($obj->posts)){
                   foreach ($obj->posts as $postObj) {
                       $dataPost = get_field('product-group', $postObj->ID);
                       $posts = [];
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
                           'id' => $postObj->ID,
                           'title' => $dataPost['title'],
                           'src' => $dataPost['image'],
                           'sku' => $dataPost['sku'],
                           'status' => $dataPost['product-status'],
                           'conditions' => $conditions,
                           'nutritional' => $nutritional,
                       ]);
                       $html .= get_template_part('/front/components/product-item', '', $posts);
                   }
               }
               break;
           case "recipes":
               $obj = new WP_Query($args);
               $html = '';
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
                           if(!empty($props)){
                               $propsArr = [];
                               foreach ($props as $prop) {
                                   if(!empty($prop['complexity']) and !empty($prop['icon'])){
                                       if((($prop['complexity'] !== false) and (!$prop['icon'] !== false))){
                                           array_push($propsArr, $prop);
                                       }
                                   }
                                   if(!empty($prop['portioning']) and !empty($prop['icon'])){
                                       if((($prop['portioning'] !== false) and (!$prop['icon'] !== false))){
                                           array_push($propsArr, $prop);
                                       }
                                   }
                                   if(!empty($prop['time']) and !empty($prop['icon'])){
                                       if((($prop['time'] !== false) and (!$prop['icon'] !== false))){
                                           array_push($propsArr, $prop);
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
                   $html .= get_template_part('/front/components/receipe-item', '', $posts);
               }
               break;
       }
       echo $html;
   }
}

add_action('wp_ajax_get-data-posts', '__getDataPost');
add_action('wp_ajax_nopriv_get-data-posts', '__getDataPost');
function __getDataPost(){
    if(!empty($_POST['pgd'])){
        $paged = intval($_POST['pgd']);
    }else{
        if(is_front_page()){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }else{
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        }
    }
//    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
//    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    if($_POST['count'] == "all"){
        $count = -1;
    }elseif ($_POST['count'] = "" or empty($_POST['count'])){
        $count = get_option('posts_per_page');
    }else{
        $count = intval($_POST['count']);
    }
    if(!empty($_POST['sorted'])){
        $sorted = $_POST['sorted'];
    }else{
        $sorted = "DESC";
    }
    if(!empty($_POST['ptype'])){
        $ptype = $_POST['ptype'];
    }else{
        $ptype = "any";
    }
    $args = [
        'posts_per_page' => $count,
        'post_type' => $ptype,
        'order' => $sorted,
        'paged' => $paged,
    ];
    $tax = $_POST['tax'];
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
                $states = $dataPost['product-states'];
            }
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
                'status' => $dataPost['product-status'],
                'conditions' => $conditions,
                'nutritional' => $nutritional,
            ]);
        }
    }else{
        $posts = [];
    }
    foreach ($posts as $post) {
         echo get_template_part('front/components/product-item', '', $post);
    }
    wp_die();
}
function getPostsForOneTax(){
    if(!empty($_POST['ptype'])){
        $postType = $_POST['ptype'];
        if(!empty($_POST['count'])){
            $count = intval($_POST['count']);
        }else{
            $count = get_option('posts_per_page');
        }
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        if(!empty($_POST['c-page'])){
            $page = intval($_POST['c-page']);
        }else{
            $page = 1;
        }
        if(!empty($_POST['order'])){
            $order = $_POST['order'];
        }else{
            $order = 'DESC';
        }
        if((!empty($_POST['tax']))){
            if(intval($_POST['tax']) !== 0){
                $field = 'id';
            }else{
                $field = 'slug';
            }
            switch ($postType){
                case "nap":
                    $taxonomy = 'nap-tags';
                    break;
                case "products":
                    $taxonomy = 'p-cats';
                    $taxonomyTag = 'p-tags';
                    break;
                case "recipes":
                    $taxonomy = 'r-tags';
                    break;
            }
            $tax = [
                [
                    'taxonomy' => $taxonomy,
                    'field'    => $field,
                    'terms'    => $_POST['tax'],
                ]
            ];
        }
//        var_dump($tax);die();
        //forming args
        $args = [
            'posts_per_page' => $count,
            'post_type' => $postType,
            'order' => $order,
            'paged' => $paged,
            'page' => $page,
            'tax_guery' => $tax
        ];

        $html = '';
        switch ($postType){
            case "nap":
                $obj = new WP_Query($args);
                if(!empty($obj->posts)) {
                    $posts = [];
                    foreach ($obj->posts as $post) {
                        $dataPost = get_field('nap-content', $post->ID);
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
                        $html .= get_template_part('/front/components/nap-item', '', $posts);
                    }
                }
                break;
            case "products":
                $obj = new WP_Query($args);
                if(!empty($obj->posts)){
                    foreach ($obj->posts as $postObj) {
                        $dataPost = get_field('product-group', $postObj->ID);
                        $posts = [];
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
                            'id' => $postObj->ID,
                            'title' => $dataPost['title'],
                            'src' => $dataPost['image'],
                            'sku' => $dataPost['sku'],
                            'status' => $dataPost['product-status'],
                            'conditions' => $conditions,
                            'nutritional' => $nutritional,
                        ]);
                        $post = [
                            'id' => $postObj->ID,
                            'title' => $dataPost['title'],
                            'src' => $dataPost['image'],
                            'sku' => $dataPost['sku'],
                            'status' => $dataPost['product-status'],
                            'conditions' => $conditions,
                            'nutritional' => $nutritional,
                        ];
                        $html .= get_template_part('/front/components/product-item', '', $post);
                    }
                }
                break;
            case "recipes":
                $obj = new WP_Query($args);
                $html = '';
                if(!empty($obj->posts)){
                    $posts = [];
                    foreach ($obj->posts as $post){
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
                    }
                    $html .= get_template_part('/front/components/receipe-item', '', $posts);
                }
                break;
        }
        echo $html;
    }
    echo '';
    wp_die();
}

add_action('wp_ajax_get-filtered-data', 'getFilteredData');
add_action('wp_ajax_nopriv_get-filtered-data', 'getFilteredData');
function getFilteredData(){
    if(!empty($_POST['pgd'])){
        $paged = intval($_POST['pgd']);
    }else{
        if(is_front_page()){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }else{
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        }
    }
    switch ($_POST['ptype']){
        case "products":
            if(!empty($_POST['datafilter'])){
                $terms = [];
                $meta = [];
                $order = "DESC";
                foreach ($_POST['datafilter'] as $item) {
                    switch ($item['name']){
                        case "term":
                            array_push($terms, $item['value']);
                            break;
                        case "meta":
                            $key = explode('__', $item['value'])[1];
                            $val = explode('__', $item['value'])[0];
                            array_push($meta, [
                                'key' => 'product-group_product-'.$key,
                                'value' => $val
                            ]);
                            break;
                        case "order":
                            $order = $item['value'];
                            break;
                    }
                }
                $args = [
                    'posts_per_page' => get_option('posts_per_page'),
                    'post_type' => $_POST['ptype'],
                    'order' => $order,
                    'paged' => $paged,
                ];
                if(!empty($terms)){
                    $tax_query = [
                        [
                            'taxonomy' => 'p-cats',
                            'field' => 'id',
                            'terms' => $terms
                        ]
                    ];
                    $args['tax_query'] = $tax_query;
                }
                if(!empty($meta)){
//                    $args['orderby'] = 'meta_value';
//                    $args['meta_key'] = 'meta_value';
                    $args['meta_query'] = $meta;
                }
//                var_dump($args);die();
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
                }
                foreach ($posts as $post){
                    echo get_template_part('front/components/product-item', '', $post);
                }
            }
            break;
        case "nap":
            break;
        case "receipes":
            break;
        default:
            echo "any";
            break;
    }
    wp_die();
}

add_action('wp_ajax_get-pagination', '__getPagination');
add_action('wp_ajax_nopriv_get-pagination', '__getPagination');

function __getPagination(){
    if(!empty($_POST['pgd'])){
        $paged = intval($_POST['pgd']);
    }else{
        if(is_front_page()){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }else{
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        }
    }
    switch ($_POST['ptype']){
        case "products":
            if(!empty($_POST['datafilter'])){
                $terms = [];
                $meta = [];
                $order = "DESC";
                foreach ($_POST['datafilter'] as $item) {
                    switch ($item['name']){
                        case "term":
                            array_push($terms, $item['value']);
                            break;
                        case "meta":
                            $key = explode('__', $item['value'])[1];
                            $val = explode('__', $item['value'])[0];
                            array_push($meta, [
                                'key' => 'product-group_product-'.$key,
                                'value' => $val
                            ]);
                            break;
                        case "order":
                            $order = $item['value'];
                            break;
                    }
                }
                $args = [
                    'posts_per_page' => get_option('posts_per_page'),
                    'post_type' => $_POST['ptype'],
                    'order' => $order,
                    'paged' => $paged,
                ];
                if(!empty($terms)){
                    $tax_query = [
                        [
                            'taxonomy' => 'p-cats',
                            'field' => 'id',
                            'terms' => $terms
                        ]
                    ];
                    $args['tax_query'] = $tax_query;
                }
                if(!empty($meta)){
//                    $args['orderby'] = 'meta_value';
//                    $args['meta_key'] = 'meta_value';
                    $args['meta_query'] = $meta;
                }
//                var_dump($args);die();
                $obj = new WP_Query($args);
                $max_num_pages = ceil($obj->found_posts / $obj->query['posts_per_page']);
                $links = [];
                for ($i = 1; $i <= $max_num_pages; $i++){
                    array_push($links, $i);
                }
            }
        break;
    }
    wp_send_json($links);
}

add_action('wp_ajax_get-terms', '__getTerms');
add_action('wp_ajax_nopriv_get-terms', '__getTerms');

function __getTerms(){
    $terms = get_terms([
        'taxonomy' => 'p-cats',
        'hide_empty' => true,
    ]);
    $returned = [];
    if(!empty($terms) and !is_wp_error($terms)){
        foreach ($terms as $term) {
            if($term->parent == $_POST['cpc']){
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
    }
    wp_send_json($returned);
}




//add_action('wp_ajax_get-products', 'getAjaxProducts');
//add_action('wp_ajax_nopriv_get-products', 'getAjaxProducts');
//function getAjaxProducts(){
//    if(!empty($_POST['count'])){
//        $count = $_POST['count'];
//    }else{
//        $count = "all";
//    }
//
//    if(!empty($_POST['prop'])){
//        $property = [$_POST['prop']];
//    }else{
//        $property = [];
//    }
//
//    if(!empty($_POST['order'])){
//        $order = $_POST['order'];
//    }else{
//        $order = "DESC";
//    }
//
//    if(!empty($_POST['tax'])){
//        $tax = [
//            'p-cats' => $_POST['tax']
//        ];
//    }else{
//        $tax = [];
//    }
//    $data = getProducts($count, $property, $order, $tax);
//    $html = __('Дані відсутні', 'chicken');
//    foreach ($data as $item) {
//        $html .= get_template_part('front/components/product-item', '', $item);
//    }
//    echo $html;
//    wp_die();
////    wp_send_json(getProducts($count, $property, $order, $tax));
//}
//
//add_action('wp_ajax_get-products-cats', 'getAjaxProductsCats');
//add_action('wp_ajax_nopriv_get-products-cats', 'getAjaxProductsCats');
//function getAjaxProductsCats(){
//    $html = '';
//    if(!empty($_POST['tcat'])){
//        $term = get_term($_POST['tcat']);
//        if(!empty($term) and !is_wp_error($term)){
//            $slug = $term->slug;
//        }else{
//            $slug='';
//        }
//        $html = '<div class="subtabs__subtab current" data-tag-id="'.$_POST['tcat'].'" data-tag-s="'.$slug.'">
//                        <span class="subtab__text">'.__('Все', 'chicken').'</span>
//                    </div>';
//        $cats = getTaxes('p-cats', $_POST['tcat']);
//        foreach ($cats as $cat) {
//            $html .= '<div class="subtabs__subtab" data-tag-id="'.$cat['id'].'" data-tag-s="'.$cat['slug'].'">
//                            <span class="subtab__text">'.$cat['name'].'</span>
//                    </div>';
//        }
//    }
//    echo $html;
//    wp_die();
//}


add_action('wp_ajax_get-product-by-id', 'getProductById');
add_action('wp_ajax_nopriv_get-product-by-id', 'getProductById');

function getProductById(){
    if(!empty($_POST['pid'])){
        $product = getPostById($_POST['pid']);
        echo get_template_part('front/components/popup-product', '', $product);
    }else{
        wp_die();
    }
    wp_die();
}
