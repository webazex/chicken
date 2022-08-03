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
            'page_title' 	=> 'General',
            'menu_title'	=> 'General',
            'parent_slug'	=> 'theme-general-settings',
            'menu_slug' 	=> 'gs',
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