<?php
$meetTypes = get_meta_values('receipt-content-group_first-i_text-group_name', 'recipes');
$portioning = get_meta_values('receipt-content-group_properties_row-tw_portioning', 'recipes');
$typesDish = get_terms([
        'taxonomy'=> 'r-tags'
]);
$terms = [];
foreach ($typesDish as $objDish) {
    array_push($terms, [
       'name' => $objDish->name,
        'id' => $objDish->term_id,
        'count' => $objDish->count
    ]);
}
var_dump($typesDish);
?>
<main>
    <section class="page-gradient-bg">
        <div class="site-size">
            <div class="site-size__content-row">
                <div class="content-row__breadcrumbs-row">
                    <?php get_template_part('front/components/breadcrumbs');?>
                </div>
                <h1><?php __('Рецепти', 'chicken'); ?></h1>
            </div>
        </div>
    </section>
    <section class="page-receipes">
        <div class="site-size">
            <div class="site-size__default-grid-container">
                <div class="default-grid-container__filters-row" style="">
                    <div class="filters-row__group">
                        <div class="filters-row__filters">
                            <form class="default-grid-container__filters-row" method="post">
                                <div class="filters-row__group">
                                        <div id="filter-type" class="filters-row__filters">
                                            <div class="filter__text-row">
                                                <span><?php _e('Тип мяса', 'chicken'); ?></span>
                                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.24944 0.164337C9.55557 0.44568 9.58585 0.974426 9.31451 1.30082L5.6921 5.65823C5.31328 6.11392 4.68672 6.11392 4.3079 5.65824L0.685489 1.30082C0.414154 0.974426 0.444427 0.44568 0.750559 0.164337C1.015 -0.0786886 1.39401 -0.0491219 1.62839 0.232816L4.3079 3.45601C4.68672 3.91169 5.31328 3.9117 5.6921 3.45601L8.3716 0.232817C8.60599 -0.0491214 8.985 -0.0786881 9.24944 0.164337Z" fill="#232323"/>
                                                </svg>

                                            </div>
                                            <div style="display: none" class="filter__text-row-select">
                                                <span class="filter__text-row-select-name"><?php _e('Тип мяса', 'chicken'); ?> <span class="filter__text-row-select-counter"></span></span>
                                                <div class="filter__text-row-select-clear"></div>
                                            </div>
                                            <div class="filters__filter-form cats" method="post">
                                                <div class="cats-container">
                                                    <?php foreach ($meetTypes as $meetType):?>
                                                        <label>
                                                            <input type="checkbox" name="mtypes[]" value="<?php echo $meetType;?>">
                                                            <span><?php echo $meetType; ?></span>
                                                        </label>
                                                    <?php endforeach;?>
                                                </div>
                                                <div class="btns-row">
                                                    <button type="submit"><?php _e('Застосувати', 'chicken'); ?></button>
                                                    <button type="reset"><?php _e('Очистити', 'chicken'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="filter-state" class="filters-row__filters">
                                            <div class="filter__text-row">
                                                <span><?php _e('Вид страви', 'chicken'); ?></span>
                                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.24944 0.164337C9.55557 0.44568 9.58585 0.974426 9.31451 1.30082L5.6921 5.65823C5.31328 6.11392 4.68672 6.11392 4.3079 5.65824L0.685489 1.30082C0.414154 0.974426 0.444427 0.44568 0.750559 0.164337C1.015 -0.0786886 1.39401 -0.0491219 1.62839 0.232816L4.3079 3.45601C4.68672 3.91169 5.31328 3.9117 5.6921 3.45601L8.3716 0.232817C8.60599 -0.0491214 8.985 -0.0786881 9.24944 0.164337Z" fill="#232323"/>
                                                </svg>

                                            </div>
                                            <div style="display: none" class="filter__text-row-select">
                                                <span class="filter__text-row-select-name"><?php _e('Вид страви', 'chicken'); ?>: <span class="filter__text-row-select-counter"></span></span>
                                                <div class="filter__text-row-select-clear"></div>
                                            </div>
                                            <div class="filters__filter-form">
                                                <?php foreach ($terms as $term):?>
                                                    <label>
                                                        <input type="checkbox" name="term" value="<?php echo $term['id']; ?>">
                                                        <span><?php echo $term['name']; ?></span>
                                                    </label>
                                                <?php endforeach; ?>
                                                <div class="btns-row">
                                                    <button type="submit"><?php _e('Застосувати', 'chicken'); ?></button>
                                                    <button type="reset"><?php _e('Очистити', 'chicken'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    <div id="filter-time" class="filters-row__filters">
                                        <div class="filter__text-row">
                                            <span><?php _e('Спосіб приготування', 'chicken'); ?></span>
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.24944 0.164337C9.55557 0.44568 9.58585 0.974426 9.31451 1.30082L5.6921 5.65823C5.31328 6.11392 4.68672 6.11392 4.3079 5.65824L0.685489 1.30082C0.414154 0.974426 0.444427 0.44568 0.750559 0.164337C1.015 -0.0786886 1.39401 -0.0491219 1.62839 0.232816L4.3079 3.45601C4.68672 3.91169 5.31328 3.9117 5.6921 3.45601L8.3716 0.232817C8.60599 -0.0491214 8.985 -0.0786881 9.24944 0.164337Z" fill="#232323"/>
                                            </svg>

                                        </div>
                                        <div style="display: none" class="filter__text-row-select">
                                            <span class="filter__text-row-select-name"><?php _e('Спосіб приготування', 'chicken'); ?>: <span class="filter__text-row-select-counter"></span></span>
                                            <div class="filter__text-row-select-clear"></div>
                                        </div>
                                        <div class="filters__filter-form">
                                            <?php foreach ($portioning as $portion):?>
                                                <label>
                                                    <input type="checkbox" name="portion" value="<?php echo $portion; ?>">
                                                    <span><?php echo $portion; ?></span>
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
                            </form>
                        </div>
                        <div class="filters-row__filters">
                            <form class="filters__filter-form">
                                <label>
                                    <input type="radio" name="filter" value="date">
                                    <span>Датою</span>
                                </label>

                                <label>
                                    <input type="radio" name="filter" value="timec">
                                    <span>Часом приготування</span>
                                </label>

                                <label>
                                    <input type="radio" name="filter" value="lvl">
                                    <span>Складністю</span>
                                </label>

                                <label>
                                    <input type="radio" name="filter" value="h">
                                    <span>Популярністю</span>
                                </label>

                                <button type="submit">Застосувати</button>
                            </form>
                        </div>
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
                                <input type="radio" name="filter" value="date">
                                <span>Датою</span>
                            </label>

                            <label>
                                <input type="radio" name="filter" value="timec">
                                <span>Часом приготування</span>
                            </label>

                            <label>
                                <input type="radio" name="filter" value="lvl">
                                <span>Складністю</span>
                            </label>

                            <label>
                                <input type="radio" name="filter" value="h">
                                <span>Популярністю</span>
                            </label>

                            <button type="submit">Застосувати</button>
                        </form>
                    </div>
                </div>
                <?php  if(!empty($args['recipes'])):?>
                <div class="default-grid-container__grid-default targeted">
                    <?php foreach ($args['recipes'] as $recipe):
                        get_template_part('front/components/receipe-item', '', $recipe);
                    endforeach;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </section>
    <?php get_template_part('front/components/two-side');?>


</main>

