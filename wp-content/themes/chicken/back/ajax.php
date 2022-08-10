<?php
add_action('wp_ajax_get-products', 'getAjaxProducts');
add_action('wp_ajax_nopriv_get-products', 'getAjaxProducts');
function getAjaxProducts(){
    if(!empty($_POST['count'])){
        $count = $_POST['count'];
    }else{
        $count = "all";
    }

    if(!empty($_POST['prop'])){

        $property = [$_POST['count']];
    }else{
        $property = [];
    }

    if(!empty($_POST['order'])){
        $order = $_POST['order'];
    }else{
        $order = "DESC";
    }

    if(!empty($_POST['tax'])){
       $tax = [
           'p-cats' => $_POST['tax']
       ];
    }else{
        $tax = [];
    }
    $data = getProducts($count, $property, $order, $tax);
    $html = '';
    foreach ($data as $item) {
        $html .= get_template_part('front/components/product-item', '', $item);
    }
    echo $html;
    wp_die();
//    wp_send_json(getProducts($count, $property, $order, $tax));
}

add_action('wp_ajax_get-products-cats', 'getAjaxProductsCats');
add_action('wp_ajax_nopriv_get-products-cats', 'getAjaxProductsCats');
function getAjaxProductsCats(){
    $html = '';
    if(!empty($_POST['tcat'])){
        $term = get_term($_POST['tcat']);
        if(!empty($term) and !is_wp_error($term)){
            $slug = $term->slug;
        }else{
            $slug='';
        }
        $html = '<div class="subtabs__subtab current" data-tag-id="'.$_POST['tcat'].'" data-tag-s="'.$slug.'">
                        <span class="subtab__text">'.__('Все', 'chicken').'</span>
                    </div>';
        $cats = getTaxes('p-cats', $_POST['tcat']);
        foreach ($cats as $cat) {
            $html .= '<div class="subtabs__subtab" data-tag-id="'.$cat['id'].'" data-tag-s="'.$cat['slug'].'">
                            <span class="subtab__text">'.$cat['name'].'</span>
                    </div>';
        }
    }
    echo $html;
    wp_die();
}