<?php
/* Template Name: About */
get_header();
$dataContent = get_field('about-page-content');
if(!empty($dataContent)):?>
    <main>
        <section class="page-top-bg">
            <div class="top-bg">
                <div class="site-size">
                    <div class="site-size__content-row">
                        <div class="content-row__breadcrumbs-row">
                            <?php get_template_part('front/components/breadcrumbs');?>
                        </div>
                        <h1><?php _e('Про компанію', 'chicken'); ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="anchors-row">
            <div class="site-size">
                <div class="site-size__anchors">
                    <a href="#circle" class="anchors__item">Цикл виробництва</a>
                    <a href="#serts" class="anchors__item">Сертифікати</a>
                    <a href="#quality" class="anchors__item">Контроль якості</a>
                    <a href="#soc" class="anchors__item">Соціальна відповідальність</a>
                </div>
            </div>
        </section>
        <?php
            if(!empty($dataContent['welcome'])){
                $data = [
                    'welcome' => $dataContent['welcome'],
                    'advantages' => $dataContent['advantages'],
                    'banner' => $dataContent['banner'],
                ];
                get_template_part('front/sections/about/welcome', '', $data);
            }
            if(!empty($dataContent['cirle'])){
                get_template_part('front/sections/about/circle', '', $dataContent['cirle']);
            }
            if(!empty($dataContent['certificates'])){
                get_template_part('front/sections/about/serts', '', $dataContent['certificates']);
            }
            if(!empty($dataContent['quality'])){
                get_template_part('front/sections/about/quality', '', $dataContent['quality']);
            }
            if(!empty($dataContent['soc-section-content'])){
                get_template_part('front/sections/about/soc', '', $dataContent['soc-section-content']);
            }
        ?>
    </main>
<?php
endif;
get_footer();
?>