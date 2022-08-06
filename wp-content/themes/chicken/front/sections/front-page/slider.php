<?php
    $slider = $args['slider'];
?>
<section>
    <div class="site-size">
        <div class="site-size__recipes-grid-container">
            <?php
                if(!empty($args['left-block'])):
                    if(!empty($args['left-block']['data-gradient'])):
                        $start = $args['left-block']['data-gradient']['gradient-start'];
                        $startColor = getGradient($start);
                        $end = $args['left-block']['data-gradient']['gradient-end'];
                        $endColor = getGradient($end);
                        $style = "background: linear-gradient(180deg, $startColor 0%, $endColor 100%);";
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
                    if(!empty($args['right-block']['data-gradient'])):
                        $start = $args['right-block']['data-gradient']['gradient-start'];
                        $end = $args['right-block']['data-gradient']['gradient-end'];
                        $startColor = getGradient($start);
                        $endColor = getGradient($end);
                        $style = "background: linear-gradient(180deg, $startColor 0%, $endColor 100%);";
                    else:
                        $style = "";
                    endif;
            ?>
            <div class="recipes-grid-container__marked-receipes" style="<?php echo $style;?>">
                <?php if(!empty($args['right-block']['image'])):?>
                <img src="<?php echo $args['right-block']['image']['url']; ?>" class="marked-receipes__img so" alt="">
                <?php endif; ?>
                <div class="marked-receipes__content">
                    <span class="content__title-box"><?php if(!empty($args['right-block']['title'])): echo $args['right-block']['title']; endif;?></span>
                    <span class="content__desc-box"><?php if(!empty($args['right-block']['desc'])): echo $args['right-block']['desc']; endif;?></span>
                    <?php if(!empty($args['right-block']['link']['url'])):?>
                    <a href="<?php echo $args['right-block']['link']['url']; ?>" class="content__link-btn-box" <?php echo $args['left-block']['link']['target']; ?>>
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
//                print_r($args['slider']);
                $slider = $args['slider'];
                if(!empty($slider)):
            ?>
            <div class="recipes-grid-container__slider-container">
                <div class="slider-container__slider">
                    <!--							==start=slide==-->
                    <?php foreach ($slider as $slide): ?>
                    <div class="slider__container-slide">
                        <div class="container-slide__slide">
                            <div class="slide__text-block">
                                <div class="text-block__slide-title">
                                    <?php if(!empty($slide['title'])): ?>
                                    <span class="slide-title__text"><?php echo $slide['title']; ?></span>
                                    <?php endif;?>
                                </div>
                                <?php if(!empty($slide['desc'])): ?>
                                <p class="slide__desc"><?php echo $slide['desc']; ?></p>
                                <?php
                                endif;
                                if(!empty($slide['link']['url'])):
                                    ?>
                                    <a href="<?php echo $slide['link']['url'];?>" class="text-block__link" <?php echo $slide['link']['target']; ?>>
                                        <span class="link__slide-text"><?php echo $slide['link']['title'];?></span>
                                    </a>
                                    <?php
                                endif;
                                ?>
                            </div>
                            <img src="<?php echo $slide['image'];?>" class="slide__img" alt="">
                        </div>
                    </div>
                    <!--							==end=slide==-->
                    <?php endforeach; ?>
                </div>
            </div>
            <?php  endif;?>
        </div>
    </div>
</section>
