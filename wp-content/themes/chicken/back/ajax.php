<?phpadd_action( 'wp_ajax_get-data', 'getData' );add_action( 'wp_ajax_nopriv_get-data', 'getData' );function getData(){//    print_r($_POST);    if(!empty($_POST['count'])){        $count = $_POST['count'];    }else{        $count = get_option('posts_per_page');    }    if(!empty($_POST['ptype'])){        $pType = $_POST['ptype'];    }else{        $pType = "any";    }    $args = [      'posts_per_page' => $count,      'post_type' => $pType,    ];    switch ($pType){        case "products":            if(!empty($_POST['tax'])){                $taxQuery = [];                if(count($_POST['tax']) > 1){                    $taxQuery = ['relation' => "AND"];                }                foreach ($_POST['tax'] as $k => $tax) {                    array_push($taxQuery, [                        'taxonomy' => $k,                        'field' => 'term_id',                        'terms' => $tax                    ]);                }                $args['tax_query'] = $taxQuery;            }            break;        case "nap":            break;        case "recipes":            break;    }    if(!empty($_POST['spaginate'])){        $paginate = boolval($_POST['spaginate']);    }    $page = ($_POST['apaged'])? intval($_POST['apaged']) : 1;    $obj = new WP_Query($args);    $max_num_pages = ceil($obj->found_posts / $obj->query['posts_per_page']);    if($max_num_pages > 1){        $html = '<span class="pg-item prev"><</span>';        for($i = 1; $i <= $max_num_pages; $i++){            $html .= '<span data-page="'.$i.'" class="pg-item">'.$i.'</span>';        }        $html .= '<span class="pg-item next">></span>';    }else{        $html = '';    }    $paginateHtml = $html;    $postsHtml = '';    if(!empty($obj->posts)){        foreach ($obj->posts as $post) {            switch ($pType){                case "products":                    $postsHtml .= get_template_part('front/components/product-item', '', __getDataProduct($post));                    break;                case "nap":                    $postsHtml .= get_template_part('front/components/nap-item', '', __getDataNap($post));                    break;                case "recipes":                    $postsHtml .= get_template_part('front/components/receipe-item', '', __getDataReceipt($post));                    break;            }        }    }   if($paginate) {       echo $paginateHtml;   }else{       echo $postsHtml;   }   wp_die();}add_action('wp_ajax_get-terms', '__getTerms');add_action('wp_ajax_nopriv_get-terms', '__getTerms');function __getTerms(){    if(!empty($_POST['tax'])){        $terms = get_terms([            'taxonomy' => 'p-cats',            'hide_empty' => true,        ]);        $returned = [];        if(!empty($terms) and !is_wp_error($terms)){            foreach ($terms as $term) {                if($term->parent == $_POST['cpc']){                    $icon = get_field('icon', $term->term_id);                    if(empty($icon)){                        $icon = false;                    }                    array_push($returned, [                        'id' => $term->term_id,                        'slug' => $term->slug,                        'name' => $term->name,                        'count' => $term->count,                        'icon' => $icon,                    ]);                }            }        }    }else{        $returned = [];    }    wp_send_json($returned);}function getPostByIds(){    $id = intval($_POST['pid']);    if(!empty($id)){        $post = get_post($id);        $dataProduct = get_field('product-group', $post->ID);        get_template_part('front/single/product', '', $dataProduct);    }else{        return [];    }}add_action('wp_ajax_get-product-by-id', 'getPostByIds');add_action('wp_ajax_nopriv_get-product-by-id', 'getPostByIds');//====search===add_action('wp_ajax_c-search', 'c_search');add_action('wp_ajax_nopriv_c-search', 'c_search');function c_search(){    if(!empty($_POST['as']) or is_search()){        $searchString = $_POST['as'];        $args = [            'posts_per_page' => 5,            'post_type' => ['nap', 'products', 'recipes'],            'meta_query' => [                'relation' => 'OR',                [                    'key' => 'product-group_text-group_title',                    'value' => $searchString,                    'compare' => "LIKE"                ],                [                    'key' => 'receipt-content-group_general-info_title',                    'value' => $searchString,                    'compare' => "LIKE"                ],                [                    'key' => 'nap-content_title',                    'value' => $searchString,                    'compare' => "LIKE"                ],                [                    'key' => 'nap-content_content',                    'value' => $searchString,                    'compare' => "LIKE"                ]            ],            'fields' => 'ids'        ];        $searchObj = new WP_Query($args);        $arr = [];        if (empty($searchObj->posts)){            foreach ($searchObj->posts as $postObj) {                switch (get_post_type($postObj)){                    case "nap":                        $title = get_field('nap-content', $postObj)['title'];                        $falseCrumbRow = __('Головна', 'chicken')." - ".__('Новини та акції', 'chicken');                        break;                    case "products":                        $title = get_field('product-group', $postObj)['text-group']['title'];                        $falseCrumbRow = __('Головна', 'chicken')." - ".__('Продукція', 'chicken');                        break;                    case "recipes":                        $title = get_field('receipt-content-group', $postObj)['general-info']['title'];                        $falseCrumbRow = __('Головна', 'chicken')." - ".__('Рецепти', 'chicken');                        break;                }                $html .= '<div class="search__container-popup-item">';                $html .= '<a class="search__container-popup-item-flex" href="'.get_permalink($postObj).'">';                $html .= '<div class="search__container-popup-item-name">'.$title.'</div>';                $html .= '<div class="search__container-popup-item-icon"></div>';                $html .= '</a>';                $html .= '<div class="search__container-popup-item-desc">'.$falseCrumbRow.'</div>';                $html .= '</div>';            }        }        echo $html;    }    wp_die();}