<?php
function customizedThemes()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', [
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
        'script',
        'style'
    ]);

    //Register menu(s)
    register_nav_menus( [
        'header_menu' => 'Header menu',
        'footer_menu' => 'Footer menu'
    ] );

    //menu classes
    // add_filter( 'nav_menu_css_class', 'add_class_for_menuitem', 10, 4 );

    /**
     * Function for `nav_menu_css_class` filter-hook.
     *
     * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
     * @param WP_Post  $menu_item The current menu item object.
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param int      $depth     Depth of menu item. Used for padding.
     *
     * @return string[]
     */
//	function add_class_for_menuitem( $classes, $menu_item, $args, $depth ){
//		if($depth === 0){}
//		return $classes;
//	}


    // Load textdomain
    // load_theme_textdomain('bamboo', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'customizedThemes');

add_filter('navigation_markup_template', 'my_navigation_markup_template');
function my_navigation_markup_template() {
    return '
     <nav class="navigation %1$s" role="navigation">
         <div class="nav-links">%3$s</div>
     </nav>';
}