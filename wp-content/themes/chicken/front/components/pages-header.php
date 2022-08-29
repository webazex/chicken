<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
</head>
<body>
<header class="second">
    <div class="site-size">
        <div class="site-size__header-container">
            <a href="<?php echo get_home_url();?>">
                <img src="<?php echo getMainLogo();?>" class="header-container__logo" alt="logo" data-patch="img/">
            </a>
            <?php
                get_template_part('front/components/header-menu');
                get_template_part('front/components/search-field');
                get_template_part('front/components/header-contacts');
                get_template_part('front/components/lang-switcher');
            ?>
            <button class="header-container__burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>