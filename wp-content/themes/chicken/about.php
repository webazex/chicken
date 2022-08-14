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
                            <div class="breadcrumbs-row__item">
                                <span class="item__crumb">Home</span>
                                <span class="item__sep">/</span>
                            </div>
                        </div>
                        <h1>Про компанію</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="anchors-row">
            <div class="site-size">
                <div class="site-size__anchors">
                    <a href="" class="anchors__item">Цикл виробництва</a>
                    <a href="#serts" class="anchors__item">Сертифікати</a>
                    <a href="" class="anchors__item">Контроль якості</a>
                    <a href="" class="anchors__item">Соціальна відповідальність</a>
                </div>
            </div>
        </section>
        <?php
            if(!empty($dataContent['welcome-section'])){
                $data = [
                    'welcome' => $dataContent['welcome-section'],
                    'advantages' => $dataContent['advantages'],
                    'banner' => $dataContent['banner'],
                ];
                get_template_part('front/sections/about/welcome', '', $data);
            }
            if(!empty($dataContent['cirle'])){
                get_template_part('front/sections/about/welcome', '', $dataContent['cirle']);
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