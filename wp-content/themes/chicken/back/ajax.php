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
}

add_action('wp_ajax_get-data-posts', 'getPostsForOneTax');
add_action('wp_ajax_nopriv_get-data-posts', 'getPostsForOneTax');
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