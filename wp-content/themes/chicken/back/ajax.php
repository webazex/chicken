<?phpadd_action( 'wp_ajax_get-data', 'getData' );add_action( 'wp_ajax_nopriv_get-data', 'getData' );function getData(){    if(!empty($_POST['count'])){        $count = $_POST['count'];    }else{        $count = get_option('posts_per_page');    }    if(!empty($_POST['ptype'])){        $pType = $_POST['ptype'];    }else{        $pType = "any";    }    $args = [      'posts_per_page' => $count,      'post_type' => $pType,    ];    switch ($pType){        case "products":            if(!empty($_POST['tax'])){                $taxQuery = [];                if(count($_POST['tax']) > 1){                    $taxQuery = ['relation' => "AND"];                }                foreach ($_POST['tax'] as $k => $tax) {                    array_push($taxQuery, [                        'taxonomy' => $k,                        'field' => 'id',                        'terms' => $tax                    ]);                }                $args['tax_query'] = $taxQuery;            }            break;        case "nap":            echo "nap";            break;        case "recipes":            break;    }    if(!empty($_POST['spaginate']) or !is_null($_POST['spaginate'])){        $paginate = boolval($_POST['spaginate']);    }else{        $paginate = false;    }    $page = ($_POST['apaged'])? intval($_POST['apaged']) : 1;    $obj = new WP_Query($args);    $max_num_pages = ceil($obj->found_posts / $obj->query['posts_per_page']);    $postsHtml = '';   if($paginate) {       if($max_num_pages > 1){           $html = '<span class="pg-item-btn prev"><</span>';           for($i = 1; $i <= $max_num_pages; $i++){               if($i == 1){                   $html .= '<span data-page="'.$i.'" class="pg-item cp">'.$i.'</span>';               }else{                   $html .= '<span data-page="'.$i.'" class="pg-item">'.$i.'</span>';               }           }           $html .= '<span class="pg-item-btn next">></span>';       }else{           $html = '';       }       $paginateHtml = $html;       echo $paginateHtml;       wp_die();   }   if($paginate === false){       if(!empty($obj->posts)){           foreach ($obj->posts as $post) {               switch ($pType){                   case "products":                       $postsHtml .= get_template_part('front/components/product-item', '', __getDataProduct($post));                       break;                   case "nap":                       $postsHtml .= get_template_part('front/components/nap-item', '', __getDataNap($post));                       break;                   case "recipes":                       $postsHtml .= get_template_part('front/components/receipe-item', '', __getDataReceipt($post));                       break;               }           }       }       echo $postsHtml;       wp_die();   }}add_action('wp_ajax_get-terms', '__getTerms');add_action('wp_ajax_nopriv_get-terms', '__getTerms');function __getTerms(){    if(!empty($_POST['tax'])){        $terms = get_terms([            'taxonomy' => 'p-cats',            'hide_empty' => true,        ]);        $returned = [];        if(!empty($terms) and !is_wp_error($terms)){            foreach ($terms as $term) {                if($term->parent == $_POST['cpc']){                    $icon = get_field('icon', $term->term_id);                    if(empty($icon)){                        $icon = false;                    }                    array_push($returned, [                        'id' => $term->term_id,                        'slug' => $term->slug,                        'name' => $term->name,                        'count' => $term->count,                        'icon' => $icon,                    ]);                }            }        }    }else{        $returned = [];    }    wp_send_json($returned);}function getPostByIds(){    $id = intval($_POST['pid']);    if(!empty($id)){        $post = get_post($id);        $dataProduct = get_field('product-group', $post->ID);        get_template_part('front/single/product', '', $dataProduct);    }else{        return [];    }    wp_die();}add_action('wp_ajax_get-product-by-id', 'getPostByIds');add_action('wp_ajax_nopriv_get-product-by-id', 'getPostByIds');//====search===add_action('wp_ajax_c-search', 'c_search');add_action('wp_ajax_nopriv_c-search', 'c_search');function c_search(){    if(!empty($_POST['as'])){        $searchString = $_POST['as'];        $args = [            'posts_per_page' => 5,            'post_type' => ['nap', 'products', 'recipes'],            'meta_query' => [                'relation' => 'OR',                [                    'key' => 'product-group_text-group_title',                    'value' => $searchString,                    'compare' => "LIKE"                ],                [                    'key' => 'receipt-content-group_general-info_title',                    'value' => $searchString,                    'compare' => "LIKE"                ],                [                    'key' => 'nap-content_title',                    'value' => $searchString,                    'compare' => "LIKE"                ],                [                    'key' => 'nap-content_content',                    'value' => $searchString,                    'compare' => "LIKE"                ]            ],            'fields' => 'ids'        ];        $searchObj = new WP_Query($args);        $arr = [];        if (!empty($searchObj->posts)){            foreach ($searchObj->posts as $postObj) {                $link = get_permalink($postObj);                switch (get_post_type($postObj)){                    case "nap":                        $title = get_field('nap-content', $postObj)['title'];                        $falseCrumbRow = __('Головна', 'chicken')." - ".__('Новини та акції', 'chicken');                        array_push($arr, [                            'title' => $title,                            'breadcrumbs' => $falseCrumbRow,                            'link' => $link,                        ]);                        break;                    case "products":                        $title = get_field('product-group', $postObj)['text-group']['title'];                        $falseCrumbRow = __('Головна', 'chicken')." - ".__('Продукція', 'chicken');                        array_push($arr, [                            'title' => $title,                            'breadcrumbs' => $falseCrumbRow,                            'link' => $link,                        ]);                        break;                    case "recipes":                        $title = get_field('receipt-content-group', $postObj)['general-info']['title'];                        $falseCrumbRow = __('Головна', 'chicken')." - ".__('Рецепти', 'chicken');                        array_push($arr, [                            'title' => $title,                            'breadcrumbs' => $falseCrumbRow,                            'link' => $link,                        ]);                        break;                }            }        }        wp_send_json($arr);    }}add_action('wp_ajax_get-filtered-data', '__getFData');add_action('wp_ajax_nopriv_get-filtered-data', '__getFData');function __getFData(){    if(!empty($_POST['datafilter'])){        $pType = $_POST['ptype'];        $args = [            'posts_per_page' => get_option('posts_per_page'),            'post_type' => $pType,        ];        switch ($pType) {            case "products":                $terms = [];                foreach ($_POST['datafilter'] as $item) {                    if($item['name'] === "orderby"){                        if($item['value'] === "DEF"){                            $defOrder = "DESC";                        }else{                            $args['orderby'] = 'title';                            $args['order'] = $item['value'];                        }                    }elseif ($item['name'] === "meta"){                        $statusMeta = [                            'relation' => 'OR',                            [                                'key' => 'product-group_product-states_0_name',                                'compare' => '=',                                'value' => $item['value']                            ],                            [                                'key' => 'product-group_product-states_1_name',                                'compare' => '=',                                'value' => $item['value']                            ],                            [                                'key' => 'product-group_product-states_2_name',                                'compare' => '=',                                'value' => $item['value']                            ]                        ];                    }elseif ($item['name'] === "term"){                        if(!empty($item['value'])){                            array_push($terms, $item['value']);                            $tq = [                                [                                    'taxonomy' => 'p-cats',                                    'field' => 'id',                                    'terms' => $terms                                ]                            ];                        }                    }                }                if(!empty($tq)){                    $args['tax_query'] = $tq;                }                if(!empty($statusMeta) and !empty($metaQuerySorted)){                    $args['meta_query'] = [                        'relation' => 'AND',                        $statusMeta                    ];                }elseif(!empty($defOrder) and !empty($statusMeta)){                    $args['meta_query'] = $statusMeta;                    $args['order'] = $defOrder;                }elseif(!empty($defOrder) and empty($statusMeta) and empty($metaQuerySorted)){                    $args['order'] = $defOrder;                }elseif((!empty($statusMeta) OR !empty($metaQuerySorted))){                    if(!empty($statusMeta)){                        $args['meta_query'] = $statusMeta;                    }else{                        echo "2";                    }                }                if(!empty($_POST['npage'])){                    $args['paged'] = intval($_POST['npage']);                }                break;            case "nap":                $terms = [];                $args = [                    'posts_per_page' => get_option('posts_per_page'),                    'post_type' => $_POST['ptype']                ];                foreach ($_POST['datafilter'] as $item){                    if($item['name'] === "term"){                        if(!empty($item['value'])){                            array_push($terms, $item['value']);                            $tq = [                                [                                    'taxonomy' => 'nap-tags',                                    'field' => 'id',                                    'terms' => $terms                                ]                            ];                        }                    }elseif($item['name'] === "date"){                        $args['order'] = $item['value'];                    }elseif ($item['name'] === "orderby"){                        if($item['value'] === "DEF"){                            $defOrder = "DESC";                        }else{                            $args['orderby'] = 'title';                            $args['order'] = $item['value'];                        }                    }                }                if(!empty($_POST['npage'])){                    $args['paged'] = intval($_POST['npage']);                }                break;            case "recipes":                $terms = [];                $meta = [];                $args = [                    'posts_per_page' => get_option('posts_per_page'),                    'post_type' => $_POST['ptype']                ];                foreach ($_POST['datafilter'] as $item){                    if($item['name'] === 'meta'){                        $dataF = explode('###', $item['value']);                        array_push($meta,  [                            'key' => $dataF[0],                            'compare' => '=',                            'value' => $dataF[1]                        ]);                    }elseif($item['name'] === 'term'){                        if(!empty($item['value'])){                            array_push($terms, $item['value']);                            $tq = [                                [                                    'taxonomy' => 'r-tags',                                    'field' => 'id',                                    'terms' => $terms                                ]                            ];                        }                    }elseif ($item['name'] === 'orderby'){                        if($item['value'] === "DEF"){                            $defOrder = "DESC";                        }else{                            $dataF = explode('###', $item['value']);                            $args['orderby'] = $dataF[0];                            $args['order'] = $dataF[1];                        }                    }                }                if(!empty($meta) and !empty($tq)){                    $args['meta_query'] = [                        'relation' => 'AND',                        $meta                    ];                    $args['tax_query'] = $tq;                }elseif(!empty($defOrder) and !empty($meta)){                    $meta['relations'] = 'AND';                    $args['meta_query'] = $meta;                    $args['order'] = $defOrder;                }elseif(!empty($defOrder) and empty($statusMeta) and empty($metaQuerySorted)){                    $args['order'] = $defOrder;                }elseif((!empty($statusMeta) OR !empty($metaQuerySorted))){                    if(!empty($statusMeta)){                        $args['meta_query'] = $statusMeta;                    }else{                        echo "2";                    }                }elseif(!empty($tq)){                    $args['tax_query'] = $tq;                }                if(!empty($_POST['npage'])){                    $args['paged'] = intval($_POST['npage']);                }            break;        }        $obj = new WP_Query($args);        $postsHtml = '';        if(!empty($obj->posts)){            foreach ($obj->posts as $post) {                switch ($pType){                    case "products":                        $postsHtml .= get_template_part('front/components/product-item', '', __getDataProduct($post));                        break;                    case "nap":                        $postsHtml .= get_template_part('front/components/nap-item', '', __getDataNap($post));                        break;                    case "recipes":                        $postsHtml .= get_template_part('front/components/receipe-item', '', __getDataReceipt($post));                        break;                }            }        }    }    $paginateHtml = '';    $paginate = boolval($_POST['paginate']);    if($paginate){        echo $paginateHtml;    }else{        echo $postsHtml;    }    wp_die();}add_action('wp_ajax_get-pagination', '__getPagination');add_action('wp_ajax_nopriv_get-pagination', '__getPagination');function __getPagination(){    if(!empty($_POST['datafilter'])){        $pType = $_POST['ptype'];        $args = [            'posts_per_page' => get_option('posts_per_page'),            'post_type' => $pType,        ];        switch ($pType) {            case "products":                $terms = [];                foreach ($_POST['datafilter'] as $item) {                    if($item['name'] === "orderby"){                        if($item['value'] === "DEF"){                            $defOrder = "DESC";                        }else{                            $args['orderby'] = 'title';                            $args['order'] = $item['value'];                        }                    }elseif ($item['name'] === "meta"){                        $statusMeta = [                            'relation' => 'OR',                            [                                'key' => 'product-group_product-states_0_name',                                'compare' => '=',                                'value' => $item['value']                            ],                            [                                'key' => 'product-group_product-states_1_name',                                'compare' => '=',                                'value' => $item['value']                            ],                            [                                'key' => 'product-group_product-states_2_name',                                'compare' => '=',                                'value' => $item['value']                            ]                        ];                    }elseif ($item['name'] === "term"){                        if(!empty($item['value'])){                            array_push($terms, $item['value']);                            $tq = [                                [                                    'taxonomy' => 'p-cats',                                    'field' => 'id',                                    'terms' => $terms                                ]                            ];                        }                    }                }                if(!empty($tq)){                    $args['tax_query'] = $tq;                }                if(!empty($statusMeta) and !empty($metaQuerySorted)){                    $args['meta_query'] = [                        'relation' => 'AND',                        $statusMeta                    ];                }elseif(!empty($defOrder) and !empty($statusMeta)){                    $args['meta_query'] = $statusMeta;                    $args['order'] = $defOrder;                }elseif(!empty($defOrder) and empty($statusMeta) and empty($metaQuerySorted)){                    $args['order'] = $defOrder;                }elseif((!empty($statusMeta) OR !empty($metaQuerySorted))){                    if(!empty($statusMeta)){                        $args['meta_query'] = $statusMeta;                    }else{                        echo "2";                    }                }                if(!empty($_POST['npage'])){                    $args['paged'] = intval($_POST['npage']);                }                break;            case "nap":                $terms = [];                $args = [                    'posts_per_page' => get_option('posts_per_page'),                    'post_type' => $_POST['ptype']                ];                foreach ($_POST['datafilter'] as $item){                    if($item['name'] === "term"){                        if(!empty($item['value'])){                            array_push($terms, $item['value']);                            $tq = [                                [                                    'taxonomy' => 'nap-tags',                                    'field' => 'id',                                    'terms' => $terms                                ]                            ];                        }                    }elseif($item['name'] === "date"){                        $args['order'] = $item['value'];                    }elseif ($item['name'] === "orderby"){                        if($item['value'] === "DEF"){                            $defOrder = "DESC";                        }else{                            $args['orderby'] = 'title';                            $args['order'] = $item['value'];                        }                    }                }                if(!empty($_POST['npage'])){                    $args['paged'] = intval($_POST['npage']);                }                var_dump($args);            break;            case "recipes":                $terms = [];                $meta = [];                $args = [                    'posts_per_page' => get_option('posts_per_page'),                    'post_type' => $_POST['ptype']                ];                foreach ($_POST['datafilter'] as $item){                    if($item['name'] === 'meta'){                        $dataF = explode('###', $item['value']);                        array_push($meta,  [                            'key' => $dataF[0],                            'compare' => '=',                            'value' => $dataF[1]                        ]);                    }elseif($item['name'] === 'term'){                        if(!empty($item['value'])){                            array_push($terms, $item['value']);                            $tq = [                                [                                    'taxonomy' => 'r-tags',                                    'field' => 'id',                                    'terms' => $terms                                ]                            ];                        }                    }elseif ($item['name'] === 'orderby'){                        if($item['value'] === "DEF"){                            $defOrder = "DESC";                        }else{                            $dataF = explode('###', $item['value']);                            $args['orderby'] = $dataF[0];                            $args['order'] = $dataF[1];                        }                    }                }                if(!empty($meta) and !empty($tq)){                    $args['meta_query'] = [                        'relation' => 'AND',                        $meta                    ];                    $args['tax_query'] = $tq;                }elseif(!empty($defOrder) and !empty($meta)){                    $meta['relations'] = 'AND';                    $args['meta_query'] = $meta;                    $args['order'] = $defOrder;                }elseif(!empty($defOrder) and empty($statusMeta) and empty($metaQuerySorted)){                    $args['order'] = $defOrder;                }elseif((!empty($statusMeta) OR !empty($metaQuerySorted))){                    if(!empty($statusMeta)){                        $args['meta_query'] = $statusMeta;                    }else{                        echo "2";                    }                }elseif(!empty($tq)){                    $args['tax_query'] = $tq;                }                if(!empty($_POST['npage'])){                    $args['paged'] = intval($_POST['npage']);                }                break;        }        $obj = new WP_Query($args);        $page = ($_POST['apaged'])? intval($_POST['apaged']) : 1;        $max_num_pages = ceil($obj->found_posts / $obj->query['posts_per_page']);        $paginateHtml = '';        $paginate = boolval($_POST['paginate']);        if($paginate) {            if($max_num_pages > 1){                $html = '<span class="pg-item-btn prev"><</span>';                for($i = 1; $i <= $max_num_pages; $i++){                    if($i == 1){                        $html .= '<span data-page="'.$i.'" class="pg-item cp">'.$i.'</span>';                    }else{                        $html .= '<span data-page="'.$i.'" class="pg-item">'.$i.'</span>';                    }                }                $html .= '<span class="pg-item-btn next">></span>';            }else{                $html = '';            }            $paginateHtml = $html;            echo $paginateHtml;            wp_die();        }    }    wp_die();}