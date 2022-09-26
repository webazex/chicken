<?php
function getNaP($count = "", $property = null, $sorted = 'DESC', $tax = [], $paginate = true){
    $paged = (!empty($_POST['paged'])) ? $_POST['paged'] : 1;
    if($count == "all"){
        $count = -1;
    }elseif ($count == ''){
        $count = get_option('posts_per_page');
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
    if(!empty($obj->posts)) {
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
                'id' => $post->ID,
                'title' => $dataPost['title'],
                'image' => $dataPost['image'],
                'content' => $dataPost['content'],
                'cats' => $cats,
            ]);
        }
        if(!empty($links)){
            $returned['pagination'] = $links;
        }
        if(!empty($_POST['npage'])){
            if(is_front_page()){
                $args['page'] = $_POST['npage'];
            }else{
                $args['paged'] = $_POST['npage'];
            }
        }
        $returned['posts'] = $posts;
    }else{
        $posts = [];
    }
    return $returned;
//    'receipt-group'
}

function __getDataNap($post){
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
    return [
        'id' => $post->ID,
        'title' => $dataPost['title'],
        'image' => $dataPost['image'],
        'content' => $dataPost['content'],
        'cats' => $cats,
    ];
}