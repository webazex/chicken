<main>
    <section class="page-gradient-bg">
        <div class="site-size">
            <div class="site-size__content-row">
                <div class="content-row__breadcrumbs-row">
                    <?php get_template_part('front/components/breadcrumbs');?>
                </div>
                <h1><?php _e(get_queried_object()->label,'chicken'); ?></h1>
            </div>
        </div>
    </section>
    <section class="page-products">
        <div class="site-size">
            <div class="site-size__default-grid-container">

                <div class="our-production-container__content">
                    <div class="content__tabs-row">
                        <?php
                        if(!empty($args['cats'])):
                        foreach ($args['cats'] as $k => $cat):
                            if($k == 0):
                                $class='this-tab';
                            else:
                                $class = '';
                            endif;
                            ?>
                            <div class="tabs-row__tab <?php echo $class;?>" data-cat-id="<?php echo $cat['id']; ?>" data-post-type="products">
                                <?php if(!empty($cat['icon'])):?>
                                    <img src="<?php echo $cat['icon']; ?>" alt="icon">
                                <?php endif; ?>
                                <span class="tab__text"><?php echo $cat['name']; ?></span>
                            </div>
                        <?php endforeach; endif;?>
                    </div>
                    <form class="default-grid-container__filters-row ff" method="post">
                        <div class="filters-row__group">
                            <?php
                                if(!empty($args['subcats'])):
                            ?>
                            <div id="filter-type" class="filters-row__filters">
                                <div class="filter__text-row">
                                    <span><?php _e('Тип продукту', 'chicken'); ?></span>
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.24944 0.164337C9.55557 0.44568 9.58585 0.974426 9.31451 1.30082L5.6921 5.65823C5.31328 6.11392 4.68672 6.11392 4.3079 5.65824L0.685489 1.30082C0.414154 0.974426 0.444427 0.44568 0.750559 0.164337C1.015 -0.0786886 1.39401 -0.0491219 1.62839 0.232816L4.3079 3.45601C4.68672 3.91169 5.31328 3.9117 5.6921 3.45601L8.3716 0.232817C8.60599 -0.0491214 8.985 -0.0786881 9.24944 0.164337Z" fill="#232323"/>
                                    </svg>

                                </div>
                                <div style="display: none" class="filter__text-row-select">
                                    <span class="filter__text-row-select-name"><?php _e('Тип продукту', 'chicken'); ?> <span class="filter__text-row-select-counter"></span></span>
                                    <div class="filter__text-row-select-clear"></div>
                                </div>
                                <div class="filters__filter-form cats" method="post">
                                    <div class="cats-container">
                                        <?php foreach ($args['subcats'] as $cat):?>
                                        <label>
                                            <input type="checkbox" name="term" value="<?php echo $cat['id'];?>">
                                            <span><?php echo $cat['name']; ?></span>
                                        </label>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="btns-row">
                                        <button type="submit"><?php _e('Застосувати', 'chicken'); ?></button>
                                        <button type="reset"><?php _e('Очистити', 'chicken'); ?></button>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            <div id="filter-state" class="filters-row__filters">
                                <div class="filter__text-row">
                                    <span><?php _e('Стан', 'chicken'); ?></span>
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.24944 0.164337C9.55557 0.44568 9.58585 0.974426 9.31451 1.30082L5.6921 5.65823C5.31328 6.11392 4.68672 6.11392 4.3079 5.65824L0.685489 1.30082C0.414154 0.974426 0.444427 0.44568 0.750559 0.164337C1.015 -0.0786886 1.39401 -0.0491219 1.62839 0.232816L4.3079 3.45601C4.68672 3.91169 5.31328 3.9117 5.6921 3.45601L8.3716 0.232817C8.60599 -0.0491214 8.985 -0.0786881 9.24944 0.164337Z" fill="#232323"/>
                                    </svg>

                                </div>
                                <div style="display: none" class="filter__text-row-select">
                                    <span class="filter__text-row-select-name"><?php _e('Стан', 'chicken'); ?>: <span class="filter__text-row-select-counter"></span></span>
                                    <div class="filter__text-row-select-clear"></div>
                                </div>
                                <?php $productsStatus = get_meta_values('product-group_product-states', 'products');?>
                                <div class="filters__filter-form">
                                    <?php foreach ($productsStatus as $status):?>
                                    <label>
                                        <input type="radio" name="meta" value="<?php echo $status; ?>">
                                        <span><?php _e($status, 'chicken'); ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                    <div class="btns-row">
                                        <button type="submit"><?php _e('Застосувати', 'chicken'); ?></button>
                                        <button type="reset"><?php _e('Очистити', 'chicken'); ?></button>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none" class="filters-row__filters-clear"><div class="filters-row__filters-clear-icon"></div><?php _e('Очистити фільтр', 'chicken'); ?></div>
                        </div>

                        <div class="filters-row__filters">
                            <div class="filter__text-row">
                                <span><?php _e('Сортувати за', 'chicken'); ?></span>
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.24944 0.164337C9.55557 0.44568 9.58585 0.974426 9.31451 1.30082L5.6921 5.65823C5.31328 6.11392 4.68672 6.11392 4.3079 5.65824L0.685489 1.30082C0.414154 0.974426 0.444427 0.44568 0.750559 0.164337C1.015 -0.0786886 1.39401 -0.0491219 1.62839 0.232816L4.3079 3.45601C4.68672 3.91169 5.31328 3.9117 5.6921 3.45601L8.3716 0.232817C8.60599 -0.0491214 8.985 -0.0786881 9.24944 0.164337Z" fill="#232323"/>
                                </svg>

                            </div>
<!--                            По алфавиту А-Я-->
<!--                            По алфавиту Я-А-->
<!--                            По дате добавления-->
<!--                            По дате добавления-->
<!--                            Времени приготовления-->
<!--                            Времени приготовления-->
                            <div class="filters__filter-form order">
                                <label>
                                    <input type="radio" name="orderby" value="DEF" checked="checked">
                                    <span><?php _e('За замовчуванням', 'chicken');?></span>
                                </label>
                                <label>
                                    <input type="radio" name="orderby" value="DESC">
                                    <span>А - Я</span>
                                </label>
                                <label>
                                    <input type="radio" name="orderby" value="ASC">
                                    <span>Я - А</span>
                                </label>
                                <div class="btns-row">
                                    <button type="submit"><?php _e('Застосувати', 'chicken'); ?></button>
                                    <button type="reset"><?php _e('Очистити', 'chicken'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="content__tabs">
                        <div class="tabs__tab"></div>
                        <div class="tabs__tab-contents targeted">
                            <?php foreach ($args['products']['posts'] as $product) {
                                get_template_part('front/components/product-item', '', $product);
                            }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="site-size">
            <div class="site-size__paginations" style="">
                <?php echo($args['products']['pagination']); ?>
            </div>
        </div>
    </section>
    <?php get_template_part('front/components/two-side');?>
</main>
