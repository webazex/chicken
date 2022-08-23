<?php
//registers cpt and taxs
require_once 'back/cpt.php';
require_once 'back/security.php';
require_once 'back/sources.php';
require_once 'back/resents.php';
require_once 'back/settings.php';
require_once 'back/remove-gutenberg.php';
require_once 'back/customized.php';
require_once 'back/receipts.php';
require_once 'back/products.php';
require_once 'back/ajax.php';
require_once 'back/breadcrumbs.php';
require_once 'back/nap.php';
require_once 'back/sharing.php';
function getTaxes($tax, $parent = null){
    if(!empty($tax)){
        $args = [
            'taxonomy' => [$tax]
        ];
        if(is_null($parent)){
            $args['parent'] = 0;
        }elseif($parent == "showAll"){
            $args['parent'] = '';
        }else{
            $args['parent'] = $parent;
        }
        $taxes = get_terms($args);
        $returned = [];
        foreach ($taxes as $tax) {
            $icon = get_field('icon', $tax);
            if(empty($icon)){
                $icon = false;
            }
            array_push($returned, [
                'id'=>$tax->term_id,
                'name'=>$tax->name,
                'slug'=>$tax->slug,
                'count'=>$tax->count,
                'parent'=>$tax->parent,
                'icon'=>$icon,
            ]);
            if(!empty(get_field('icon', $tax->term_id))){
                $returned['icon'] = get_field('icon', $tax->term_id);
            }
        }
        return $returned;
    }else{
        return [];
    }

}
function getMainLogo(){
    if(!empty(getThemeSettings()['general'])){
        $data = getThemeSettings()['general'];
        if(!empty($data['logos-group'])){
            $logos = $data['logos-group'];
            if(!empty($logos['secondary-logo'])){
                return $logos['secondary-logo'];
            }
        }
    }
}

function getLogos(){
    if(!empty(getThemeSettings()['general'])){
        $data = getThemeSettings()['general'];
        if(!empty($data['logos-group'])){
            $logos = $data['logos-group'];
            if(!empty($logos['main-logo'])){
                echo '<img src="'.$logos['main-logo'].'" class="header-container__logo" alt="logo-main" bl="'.$logos['secondary-logo'].'" wl="'.$logos['main-logo'].'">';
            }
        }
    }
}

function getGradient($gradientField){
    if(!empty($gradientField)){
        $str = "rgba(";
        $str .= implode(", ", $gradientField);
        $str .=")";
    }else{
        $str = "";
    }
    return $str;
}
$args = [
    'post_per_page' => get_option('posts_per_page'),
    'post_type' => 'products',
    'tax_query' => [
        [
            'taxonomy' => 'pcats',
            'field' => 'id',
            'terms' => 42,
            'include_children' => true
        ]
    ]
];
//$query = new WP_Query( array(
//    'post_type' => 'post',
//    'tax_query' => array(
//        array(
//            'taxonomy' => 'category',
//            'field'    => 'id',
//            'terms'    => 11
//        )
//    )
//) );
//$obj = new WP_Query($args);
//var_dump($obj->tax_query);
//var_dump($obj->request);
//var_dump(getProducts(8, ['status'], 'DESC', ['p-cats' => 'zc']));

function __getDataPost(){
    if(is_front_page()){
        $paged = get_query_var('page') ? get_query_var('page') : 1;
    }else{
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    }
//    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
//    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    if($count == "all"){
        $count = -1;
    }elseif ($count = ""){
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