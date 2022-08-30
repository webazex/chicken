<?php ?>
<div class="site-size__container-product">
    <img src="<?php echo $args['src'];?>" alt="<?php echo $args['title'];?>" class="container-product__img">
    <div class="container-product__info-box">
        <div class="info-box__status-row">
            <?php echo $icon;?>
        </div>
        <h2 class="info-box__title"><?php echo $args['title'];?></h2>
        <p class="info-box__sku"><?php echo $args['sku'];?></p>
        <span class="line"></span>
        <div class="info-box__properties">
            <p class="properties__title"><?php echo $blockTitle;?></p>
            <?php if(!empty($conditions)): foreach ($conditions as $condition): ?>
                <div class="properties__property-row product">
                    <?php foreach ($condition as $item): ?>
                        <span><?php echo $item;?></span>
                    <?php
                    endforeach;?>
                </div>
            <?php
            endforeach;  endif;
            ?>
            <span class="line"></span>
            <p class="properties__title"><?php echo $args['block-title-two'];?></p>

            <?php foreach ($nutritional as $nutrition): ?>
                <div class="properties__property-row product">
                    <?php foreach ($nutrition as $item):?>
                        <span><?php echo $item;?></span>
                    <?php
                    endforeach;
                    ?>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
<span class="line-section-product"></span>
<h3 class="recents-title"><?php the_field('recents-title');?></h3>
<div class="recents">
    <?php
    $recents = getRecentsProducts();
    foreach ($recents as $product):
        get_template_part('front/components/product-item', '', $product);
    endforeach;
    ?>
</div>
