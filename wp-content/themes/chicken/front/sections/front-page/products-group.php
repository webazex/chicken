<?php if(!empty($args['products'])):?>
<section>
    <div class="site-size">
        <div class="site-size__our-production-container">
            <div class="our-production-container__title-row">
                <h3 class="title-row__title"><span class="title__text"><?php echo $args['acf']['title'];?></span></h3>
                <?php if(!empty($args['acf']['link']['url'])): ?>
                    <a href="<?php echo $args['acf']['link']['url']; ?>" class="title-row__link">
                        <span class="link__text products-link link-color"><?php echo $args['acf']['link']['title']; ?></span>
                    </a>
                <?php endif;?>
            </div>
            <!--					==content==-->
            <div class="our-production-container__content">
                <div class="content__tabs-row">
                    <?php
                        foreach ($args['cats'] as $k => $cat):
                            if($k == 0):
                                $class='this-tab';
                            else:
                                $class = '';
                            endif;
                            ?>
                            <div class="tabs-row__tab f <?php echo $class;?>" data-post-type="products" data-cat-id="<?php echo $cat['id']; ?>" data-cat-s="<?php echo $cat['slug']; ?>">
                                <?php if(!empty($cat['icon'])):?>
                                    <img src="<?php echo $cat['icon']; ?>" alt="icon">
                                <?php endif; ?>
                                <span class="tab__text"><?php echo $cat['name']; ?></span>
                            </div>
                        <?php endforeach; ?>
                </div>
                <div class="content__subtabs subterms-target">
                    <div class="subtabs__subtab current">
                        <span class="subtab__text"><?php _e('Все', 'chicken'); ?></span>
                    </div>
                    <?php foreach ($args['subcats'] as $subcat): if($subcat['parent'] !== 0):?>
                        <div class="subtabs__subtab" data-tag-id="<?php echo $subcat['id']; ?>" data-tag-s="<?php echo $subcat['slug']; ?>">
                            <span class="subtab__text"><?php echo $subcat['name']; ?></span>
                        </div>
                    <?php endif; endforeach; ?>
                </div>
                <div class="content__tabs">
                    <div class="tabs__tab"></div>
                    <div class="tabs__tab-contents targeted-product">
                        <!--								==card-->
                        <?php foreach ($args['products'] as $product):
                            get_template_part('front/components/product-item', '', $product);
                        endforeach;?>
                        <!--								==card=end-->
                    </div>
                </div>
            </div>
            <?php if(!empty($args['acf']['link']['url'])): ?>
                <a href="<?php echo $args['acf']['link']['url']; ?>" class="title-row__link_mobile">
                    <span class="link__text products-link link-color"><?php echo $args['acf']['link']['title']; ?></span>
                </a>
            <?php endif;?>
        </div>
    </div>
</section>
<?php endif;?>