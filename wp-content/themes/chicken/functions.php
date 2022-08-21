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