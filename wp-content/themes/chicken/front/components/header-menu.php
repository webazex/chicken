<?php
$menu = wp_nav_menu([
    'theme_location' => 'header_menu',
    'echo' => false,
    'fallback_cb' => 'null',
    'depth' => 0,
    'walker' => '',
]);
echo '<div class="header-container__menu">' . strip_tags($menu, '<a>') . '</div>';
//echo '<ul class="header-container__menu">' . $menu . '</ul>';
