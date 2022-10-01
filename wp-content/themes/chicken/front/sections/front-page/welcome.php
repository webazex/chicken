<?php
    $title = $args['title'];
    $desc = $args['desc'];
    if(!empty($args['data-gradient'])){
        $startColor = $args['data-gradient']['gradient-start'];
        $startStyle = getGradient($startColor);
        $endColor = $args['data-gradient']['gradient-end'];
        $endStyle = getGradient($endColor);
    }else{
        $startStyle = 'blue';
        $endStyle = 'white';
    }
?>
<section class="main-gradient-bg" style="background: linear-gradient(167.9deg, <?php echo $startStyle?>, <?php echo $endStyle;?>);">
    <div class="site-size">
        <div class="main-section-grid-container">
            <div class="main-section-grid-container__text-box">
                <h1>
                    <?php echo $title; ?>
                </h1>
                <p class="text-box__desc"><?php echo $desc; ?></p>
            </div>
            <img src="<?php echo $args['image'];?>" class="main-section-grid-container__img" alt="">
        </div>
    </div>
</section>
