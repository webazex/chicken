<?php
//registers cpt and taxs
require_once 'back/cpt.php';
require_once 'back/security.php';
require_once 'back/sources.php';
require_once 'back/resents.php';
require_once 'back/settings.php';
require_once 'back/remove-gutenberg.php';
require_once 'back/customized.php';

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
                echo '<img src="'.$logos['secondary-logo'].'" class="header-container__logo" alt="logo-main" data-path="'.$logos['secondary-logo'].'" data-s-path="'.$logos['main-logo'].'">';
            }
        }
    }
}