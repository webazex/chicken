<?php print_r($args);?>
<div class="grid-default__item recipes">
    <img src="<?php echo $args['image'];?>" alt="" class="receipes__img">
    <div class="receipes__info">
        <div class="info__title-row">
            <span class="title-row__text"><?php echo $args['title'];?></span>
            <div class="info__peppers"></div>
        </div>

        <p class="info__desc">з м’ясом стегна та рисовою локшиною</p>
        <div class="info__properties-row">
            <div class="properties-row__property-box">
                <span class="property-box__icon time"></span>
                <span class="property-box__value">40 хв</span>
            </div>
            <div class="properties-row__property-box">
                <span class="property-box__icon count"></span>
                <span class="property-box__value">1 порція</span>
            </div>
            <div class="properties-row__property-box">
                <span class="property-box__icon lvl"></span>
                <span class="property-box__value">Складний</span>
            </div>
        </div>
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
