<?php
// Load CSS & JS
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', array(), '1.0.0' );
    wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.0.0' );
    wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0.0' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '' );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri().'/js/jQuery360.js' );
    wp_register_script( 'slick', get_template_directory_uri().'/js/slick.js' );
    wp_enqueue_script( 'jquery' );
});