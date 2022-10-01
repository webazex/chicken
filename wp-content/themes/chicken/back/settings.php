<?php
//====options page====
add_action('acf/init', 'settings_options');
function settings_options(){
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title' 	=> 'General',
            'menu_title'	=> 'General settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Socials',
            'menu_title'	=> 'Socials',
            'parent_slug'	=> 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Contacts',
            'menu_title'	=> 'Contacts',
            'parent_slug'	=> 'theme-general-settings',
        ));
    }
}

function getThemeSettings():array{
    $returned = [];
    $generalSettings = get_field('general-settings', 'option');
    $socials = get_field('socials', 'option');
    $contacts = get_field('contacts', 'option');
    if(!empty($generalSettings)){
        $returned['general'] = $generalSettings;
    }
    if(!empty($socials)){
        $returned['socials'] = $socials;
    }
    if(!empty($contacts)){
        $returned['contacts'] = $contacts;
    }
    return $returned;
}