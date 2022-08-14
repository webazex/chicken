<div class="grid-default__item recipes">
    <img src="<?php echo $args['image'];?>" alt="" class="receipes__img">
    <div class="receipes__info">
        <div class="info__title-row">
            <span class="title-row__text"><?php echo $args['title'];?></span>
            <div class="info__peppers"></div>
        </div>

        <p class="info__desc"><?php echo $args['desc'];?></p>
        <div class="info__properties-row">
            <div class="properties-row__property-box">
                <span class="property-box__icon time"></span>
                <span class="property-box__value"><?php echo $args['time']?></span>
            </div>
            <div class="properties-row__property-box">
                <span class="property-box__icon count"></span>
                <span class="property-box__value"><?php echo $args['portioning']?></span>
            </div>
            <?php
                if(!empty($args['complexity'])):
            ?>
            <div class="properties-row__property-box">
                <span class="property-box__icon lvl"></span>
                <span class="property-box__value"><?php echo $args['complexity']['label']?></span>
            </div>
            <?php endif;?>
        </div>
        <div class="info__hidden-block">
            <p class="hidden-block__desc"><?php echo $args['desc'];?></p>
            <?php if(!empty($args['short-info'])):?>
            <div class="hidden-block__row-props">
                <?php
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
</div>
