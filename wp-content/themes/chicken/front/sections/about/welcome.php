<section class="welcome-section">
    <div class="site-size">
        <div class="site-size__about-welcome-section">
            <h2 class="about-welcome-section__title"><?php echo $args['welcome']['title'];?></h2>
            <div class="about-welcome-section__content">
                <p>
                    <?php echo $args['welcome']['content'];?>
                </p>
                <img src="<?php echo $args['welcome']['image'];?>" alt="">
            </div>
            <?php if(!empty($args['banner'])):?>
            <div class="about-welcome-section__banner">
                <?php if(!empty($args['banner']['content'])):?>
                <p>
                    <?php echo $args['banner']['content'];?>
                </p>
                <?php
                endif;
                if(!empty($args['banner']['image'])):
                ?>
                <img src="<?php echo $args['banner']['image']; ?>" class="banner__img" alt="">
                <?php endif; ?>
            </div>
            <?php
            endif;
            if(!empty($args['advantages'])):
            ?>
            <div class="about-welcome-section__row-content">
                <img src="<?php echo wp_get_attachment_image_url($args['advantages']['image'], 'full');?>" class="row-content__img" alt="">
                <div class="row-content__text-box">
                    <h3><?php echo $args['advantages']['title'];?></h3>
                    <p>
                        <?php echo $args['advantages']['content']; ?>
                    </p>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>