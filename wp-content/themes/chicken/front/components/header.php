<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
</head>
<body>
<header class="main">
    <div class="site-size">
        <div class="site-size__header-container">
            <a href="<?php echo get_home_url();?>">
               <?php echo getLogos(); ?>
            </a>
            <?php 
                get_template_part('front/components/header-menu');
                get_template_part('front/components/search-field');
                get_template_part('front/components/header-contacts');
            ?>
            <div class="header-container__lang-switcher"><?php //pll_the_languages(['hide_current' => 1]);?></div>
            <button class="header-container__burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>