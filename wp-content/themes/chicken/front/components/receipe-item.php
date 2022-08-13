<?php ?>
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
        <?php var_dump($args['short-info']);?>
        <div class="info__hidden-block">
            <p class="hidden-block__desc">На 100г готової страви</p>
            <div class="hidden-block__row-props">
                <div class="row-props__item">
                    <span class="item__prop-name">243</span>
                    <span class="item__prop-val">ккал</span>
                    <span class="item__prop-text">колорії</span>
                </div>
                <div class="row-props__item">
                    <span class="item__prop-name">243</span>
                    <span class="item__prop-val">ккал</span>
                    <span class="item__prop-text">колорії</span>
                </div>
                <div class="row-props__item">
                    <span class="item__prop-name">243</span>
                    <span class="item__prop-val">ккал</span>
                    <span class="item__prop-text">колорії</span>
                </div>
            </div>
        </div>
    </div>
</div>
