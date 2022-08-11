<?php if(!empty($args['posts'])):?>
<section>
    <div class="site-size">
        <div class="site-size__default-grid-container">
            <div class="default-grid-container__title-row">
                <div class="title-row__title-box">
                    <h3 class="title-box">
                        <span class="title__text"><?php echo $args['title'];  ?></span>
                    </h3>
                    <span class="title-box__subtitle"><?php echo $args['subtitle'];  ?></span>
                </div>
                <?php if(!empty($link['link']['url'])):?>
                <a href="<?php echo $link['link']['url']; ?>" class="title-row__link" <?php echo $link['link']['target']; ?>>
                    <span class="link__text products-link link-color"><?php echo $link['link']['title']; ?></span>
                </a>
                <?php endif;?>
            </div>
            <div class="default-grid-container__grid-default">
                <?php foreach ($args['posts'] as $post) {
                    get_template_part('front/components/receipe-item', '', $post);
                }?>
            </div>
        </div>
    </div>
    </div>
</section>
<?php endif; ?>
