<?php //print_r($args); ?>
<section>
    <div class="site-size">
        <?php if(!empty($args)):?>
        <div class="site-size__grid four-columns">
            <?php foreach ($args as $k => $item):
                if(!empty($item['icon'])){
                    $icon = $item['icon'];
                }else{
                    $icon = get_template_directory_uri().'/img/0'.($k+1).'.png';
                }
            ?>
            <div class="four-columns__item-card">
                <img src="<?php echo $icon; ?>" class="item-card__icon">
                <h4 class="item-card__title"><?php echo $item['title'];?></h4>
                <p class="item-card__desc"><?php echo $item['desc'];?></p>
            </div>
            <?php endforeach;?>
        </div>
        <?php endif;?>
    </div>
</section>
