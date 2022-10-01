<?php $pageContent = get_field('page-content', get_option('page_on_front'))['slider'];?>
<section class="section-two-side">
    <div class="site-size">
        <div class="site-size__recipes-grid-container">
            <?php
                if(!empty($pageContent['left-block'])):
                    if(!empty($pageContent['left-block']['data-gradient'])):
                        $start = $pageContent['left-block']['data-gradient']['gradient-start'];
                        $startColor = getGradient($start);
                        $end = $pageContent['left-block']['data-gradient']['gradient-end'];
                        $endColor = getGradient($end);
                        $style = "background: linear-gradient(180deg, $startColor 0%, $endColor 100%);";
                    else:
                        $style = "";
                    endif;
            ?>
            <div class="recipes-grid-container__new-receipes" style="<?php echo $style; ?>">
                <?php if(!empty($pageContent['left-block']['image'])):?>
                <img src="<?php echo $pageContent['left-block']['image']['url']; ?>" class="new-receipes__img so" alt="<?php echo $pageContent['left-block']['image']['title']; ?>">
                <?php endif; ?>
                <div class="new-receipes__content">
                    <span class="content__title-box"><?php if(!empty($pageContent['left-block']['title'])): echo $pageContent['left-block']['title']; endif;?></span>
                    <span class="content__desc-box"><?php if(!empty($pageContent['left-block']['desc'])): echo $pageContent['left-block']['desc']; endif;?></span>
                    <?php if(!empty($pageContent['left-block']['link']['url'])):?>
                    <a href="<?php echo $pageContent['left-block']['link']['url']; ?>" class="content__link-btn-box" <?php echo $pageContent['left-block']['link']['target']; ?>>
                        <span class="link-btn-box__text"><?php echo $pageContent['left-block']['link']['title']; ?></span>
                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="link-btn-box__icon">
                            <path d="M0.676505 9.04036L9.65092 0.959757M9.65092 0.959757L3.57357 1.0493M9.65092 0.959757L8.92661 6.99446" stroke="white" stroke-width="1.4"/>
                        </svg>
                    </a>
                    <?php endif;?>
                </div>
            </div>
            <?php
                endif;
                if(!empty($pageContent['right-block'])):
                    if(!empty($pageContent['right-block']['data-gradient'])):
                        $start = $pageContent['right-block']['data-gradient']['gradient-start'];
                        $end = $pageContent['right-block']['data-gradient']['gradient-end'];
                        $startColor = getGradient($start);
                        $endColor = getGradient($end);
                        $style = "background: linear-gradient(180deg, $startColor 0%, $endColor 100%);";
                    else:
                        $style = "";
                    endif;
            ?>
            <div class="recipes-grid-container__marked-receipes" style="<?php echo $style;?>">
                <?php if(!empty($pageContent['right-block']['image'])):?>
                <img src="<?php echo $pageContent['right-block']['image']['url']; ?>" class="marked-receipes__img so" alt="">
                <?php endif; ?>
                <div class="marked-receipes__content">
                    <span class="content__title-box"><?php if(!empty($pageContent['right-block']['title'])): echo $pageContent['right-block']['title']; endif;?></span>
                    <span class="content__desc-box"><?php if(!empty($pageContent['right-block']['desc'])): echo $pageContent['right-block']['desc']; endif;?></span>
                    <?php if(!empty($pageContent['right-block']['link']['url'])):?>
                    <a href="<?php echo $pageContent['right-block']['link']['url']; ?>" class="content__link-btn-box" <?php echo $pageContent['left-block']['link']['target']; ?>>
                        <span class="link-btn-box__text"><?php echo $pageContent['left-block']['link']['title']; ?></span>
                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="link-btn-box__icon">
                            <path d="M0.676505 9.04036L9.65092 0.959757M9.65092 0.959757L3.57357 1.0493M9.65092 0.959757L8.92661 6.99446" stroke="white" stroke-width="1.4"/>
                        </svg>
                    </a>
                    <?php endif;?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
