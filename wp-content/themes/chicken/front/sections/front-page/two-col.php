<section>
    <div class="site-size">
        <div class="site-size__two-col-content">
            <div class="two-col-content__col-one">
                <h2 class="col-one__title">
                    <span class="title__text"><?php echo $args['title']; ?></span>
                </h2>
                <p class="col-one__desc"><?php echo $args['desc'];?></p>
                <?php if(!empty($args['links'])):?>
                <div class="col-one__row-links">
                    <?php
                        foreach($args['links'] as $link):
                            if(!empty($link['link']['url'])):
                                ?>
                                <a href="<?php echo $link['link']['url'];?>" class="row-links__link-default" <?php echo $link['link']['target'];?>>
                                    <span class="link-default__text link-color">
                                        <?php echo $link['link']['title'];?>
                                    </span>
                                </a>
                                <?php
                            endif;
                        endforeach;
                    ?>
                </div>
                <?php endif;?>
            </div>
            <div class="two-col-content__col-two">
                <img src="<?php echo $args['image']; ?>" class="col-two__img" alt="">
            </div>
        </div>
    </div>
</section>
