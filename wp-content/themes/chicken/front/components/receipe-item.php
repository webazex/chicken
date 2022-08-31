<?php $props = $args['props']; ?><a href="<?php echo get_permalink($args['id']); ?>" class="grid-default__item recipes">
    <img src="<?php echo $args['image'];?>" alt="" class="receipes__img">
    <div class="receipes__info">
        <div class="info__title-row">
            <span class="title-row__text"><?php echo $args['title'];?></span>
            <div class="info__peppers"></div>
        </div>

        <p class="info__desc"><?php echo $args['subtitle'];?></p>
        <?php if(!empty($props)):?>
        <div class="info__properties-row">
            <?php foreach ($props as $prop):?>
            <div class="properties-row__property-box">
                <?php
                    $key = array_key_first($prop);
                    switch ($key){
                        case "complexity":
                            $text = $prop[$key]['label'];
                            break;
                        default:
                            $text = $prop[$key];
                            break;
                    }
                ?>
                <img src="<?php echo $prop['icon'];?>" class="property-box__icon time" alt="">
                <span class="property-box__value"><?php echo $text; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif;?>
        <div class="info__hidden-block">
            <p class="hidden-block__desc"><?php echo $args['desc'];?></p>
            <?php if(!empty($args['short-info'])):?>
            <div class="hidden-block__row-props">
                <?php
//                var_dump($args['short-info']);
                    foreach ($args['short-info'] as $k => $info):
                        if(!empty($info)): ?>
                <div class="row-props__item">
                    <?php
                        switch($k):
                    case "cal":
                        $text = __('калорії', 'chicken');
                        break;
                    case "prot":
                        $text = __('протеїни', 'chicken');
                        break;
                    case "fats":
                        $text = __('жири', 'chicken');
                        break;
                        endswitch;
                    ?>
                    <span class="item__prop-name"><?php echo $info; ?></span>
                    <span class="item__prop-text"><?php echo $text; ?></span>
                </div>
                <?php  endif; endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</a>
