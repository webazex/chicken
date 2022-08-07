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
//getReceipts('3', 'html', 's');
//print_r(getProducts(1, 'html', [], 'DESC'));
function getMainLogo(){
    if(!empty(getThemeSettings()['general'])){
        $data = getThemeSettings()['general'];
        if(!empty($data['logos-group'])){
            $logos = $data['logos-group'];
            if(!empty($logos['main-logo'])){
                return $logos['main-logo'];
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