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
        $html .= get_template_part('front/components/product', '', $item);
    }
    echo $html;
    wp_die();
//    wp_send_json(getProducts($count, $property, $order, $tax));
}