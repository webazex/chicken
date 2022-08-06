<?php
    $slider = $args['slider'];
    print_r($args);
?>
<section>
    <div class="site-size">
        <div class="site-size__recipes-grid-container">
            <?php
                if(!empty($args['left-block'])):
                    if(!empty($args['left-block']['gradient'])):
                        $start = $args['left-block']['gradient']['gradient-start'];
                    var_dump($start);
                        $rS = "rgba(";
                        $rS .= implode(", ", $start);
                        $rS .=")";
                        $end = $args['left-block']['gradient']['gradient-end'];
                        $rE = "rgba(";
                        $rE .= implode(", ", $start);
                        $rE .=")";
                        $style = "background: linear-gradient(180deg, $rS 0%, $rE 100%);";
                    else:
                        $style = "";
                    endif;
            ?>
            <div class="recipes-grid-container__new-receipes" style="<?php echo $style; ?>">
                <?php if(!empty($args['left-block']['image'])):?>
                <img src="<?php echo $args['left-block']['image']['url']; ?>" class="new-receipes__img so" alt="<?php echo $args['left-block']['image']['title']; ?>">
                <?php endif; ?>
                <div class="new-receipes__content">
                    <span class="content__title-box"><?php if(!empty($args['left-block']['title'])): echo $args['left-block']['title']; endif;?></span>
                    <span class="content__desc-box"><?php if(!empty($args['left-block']['desc'])): echo $args['left-block']['desc']; endif;?></span>
                    <?php if(!empty($args['left-block']['link']['url'])):?>
                    <a href="<?php echo $args['left-block']['link']['url']; ?>" class="content__link-btn-box" <?php echo $args['left-block']['link']['target']; ?>>
                        <span class="link-btn-box__text"><?php echo $args['left-block']['link']['title']; ?></span>
                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="link-btn-box__icon">
                            <path d="M0.676505 9.04036L9.65092 0.959757M9.65092 0.959757L3.57357 1.0493M9.65092 0.959757L8.92661 6.99446" stroke="white" stroke-width="1.4"/>
                        </svg>
                    </a>
                    <?php endif;?>
                </div>
            </div>
            <?php
                endif;
                if(!empty($args['right-block'])):
                    if(!empty($args['right-block']['gradient'])):
                        $start = $args['right-block']['gradient']['gradient-start'];
                        $end = $args['right-block']['gradient']['gradient-end'];
                        $style = "background: linear-gradient(180deg, $start 0%, $end 100%);";
                    else:
                        $style = "";
                    endif;
            ?>
            <div class="recipes-grid-container__marked-receipes" style="<?php echo $style;?>">
                <img src="img/p2.png" class="marked-receipes__img so" alt="">
                <div class="marked-receipes__content">
                    <span class="content__title-box">Зустрічай! Мітболи з філе</span>
                    <span class="content__desc-box">смачні та соковиті, на 100% знатні</span>
                    <a href="" class="content__link-btn-box">
                        <span class="link-btn-box__text">Детальніше</span>
                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="link-btn-box__icon">
                            <path d="M0.676505 9.04036L9.65092 0.959757M9.65092 0.959757L3.57357 1.0493M9.65092 0.959757L8.92661 6.99446" stroke="white" stroke-width="1.4"/>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <div class="recipes-grid-container__slider-container">
                <div class="slider-container__slider">
                    <!--							==start=slide==-->
                    <div class="slider__container-slide">
                        <div class="container-slide__slide">
                            <div class="slide__text-block">
                                <div class="text-block__slide-title">
                                    <span class="slide-title__text">Готуй смачніше ніж будь-коли</span>
                                </div>
                                <p class="slide__desc">Сотні пошагових рецептів від знатної курки</p>
                                <a href="" class="text-block__link">
                                    <span class="link__slide-text">Знатні рецепти</span>
                                </a>
                            </div>
                            <img src="img/collage%20large.png" class="slide__img" alt="">
                        </div>
                    </div>
                    <!--							==end=slide==-->
                    <div class="slider__container-slide">
                        <div class="container-slide__slide">
                            <div class="slide__text-block">
                                <div class="text-block__slide-title">
                                    <span class="slide-title__text">Готуй смачніше ніж будь-коли</span>
                                </div>
                                <p class="slide__desc">Сотні пошагових рецептів від знатної курки</p>
                                <a href="" class="text-block__link">
                                    <span class="link__slide-text">Знатні рецепти</span>
                                </a>
                            </div>
                            <img src="img/collage%20large.png" class="slide__img" alt="">
                        </div>
                    </div>
                    <div class="slider__container-slide">
                        <div class="container-slide__slide">
                            <div class="slide__text-block">
                                <div class="text-block__slide-title">
                                    <span class="slide-title__text">Готуй смачніше ніж будь-коли</span>
                                </div>
                                <p class="slide__desc">Сотні пошагових рецептів від знатної курки</p>
                                <a href="" class="text-block__link">
                                    <span class="link__slide-text">Знатні рецепти</span>
                                </a>
                            </div>
                            <img src="img/collage%20large.png" class="slide__img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
