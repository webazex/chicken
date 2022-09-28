<?php
    $cats = $args['cats'];
    $naps = $args['nap'];
?>
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
    <section>
        <div class="site-size">
            <div class="site-size__default-grid-container">
                <div class="default-grid-container__filters-row">
                    <div class="filters-row__tabs">
                        <div class="tabs__nap-tab current" data-post-type="nap">
                            <span>Все</span>
                        </div>
                        <?php if(!empty($cats)): foreach ($cats as $cat):?>
                        <div class="tabs__nap-tab" data-cat-id="<?php echo $cat['id']; ?>" data-post-type="nap">
                            <img src="<?php echo $cat['icon']; ?>" alt="icon"
                            <span><?php echo $cat['name']; ?></span>
                        </div>
                        <?php endforeach; endif;?>
                    </div>
                    <div class="filters-row__filters">
                        <div class="filter__text-row">
                            <span>Сортувати за</span>
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.24944 0.164337C9.55557 0.44568 9.58585 0.974426 9.31451 1.30082L5.6921 5.65823C5.31328 6.11392 4.68672 6.11392 4.3079 5.65824L0.685489 1.30082C0.414154 0.974426 0.444427 0.44568 0.750559 0.164337C1.015 -0.0786886 1.39401 -0.0491219 1.62839 0.232816L4.3079 3.45601C4.68672 3.91169 5.31328 3.9117 5.6921 3.45601L8.3716 0.232817C8.60599 -0.0491214 8.985 -0.0786881 9.24944 0.164337Z" fill="#232323"/>
                            </svg>

                        </div>
                        <form class="filters__filter-form">
                            <label>
                                <input type="radio" name="orderby" value="DEF" checked="checked">
                                <span><?php _e('За замовчуванням', 'chicken');?></span>
                            </label>
                            <label>
                                <input type="radio" name="orderby" value="DESC">
                                <span><?php _e('А - Я', 'chicken'); ?></span>
                            </label>

                            <label>
                                <input type="radio" name="orderby" value="ASC">
                                <span><?php _e('Я - А', 'chicken'); ?></span>
                            </label>
                            <button type="submit"><?php _e('Застосувати', 'chicken'); ?></button>
                        </form>
                    </div>
                </div>
                <?php if(!empty($naps)):?>
                <div class="default-grid-container__grid-default targeted-nap">
                  <?php
                  foreach ($naps as $nap) {
                      get_template_part('front/components/nap-item', '', $nap);
                    }
                  ?>
                </div>
                <?php endif;?>
            </div>
            <div class="site-size__paginations"><?php if(!empty($args['pagination'])): echo $args['pagination']; endif;?></div>
        </div>
    </section>
    <?php get_template_part('front/components/two-side'); ?>


</main>
