<?php
    $title = $args['title'];
    $desc = $args['desc'];
    if(!empty($args['gradient'])){
        $startColor = $args['gradient']['gradient-start'];
        $endColor = $args['gradient']['gradient-end'];
    }else{
        $startColor = 'blue';
        $endColor = 'white';
    }
?>
<section class="main-gradient-bg" style="background: linear-gradient(167.9deg, <?php echo $startColor?>, <?php echo $endColor?>);">
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
