<?php
/* Template Name: Frontpage */
get_header();
$pageContent = get_field('page-content');
if(!empty($pageContent)):
?>
    <main>
        <?php
            if(!empty($pageContent['welcome'])):
                get_template_part('front/sections/front-page/welcome', '', $pageContent['welcome']);
            endif;
            if(!empty($pageContent['slider'])):
                get_template_part('front/sections/front-page/slider', '', $pageContent['slider']);
            endif;
            if(!empty($pageContent['products-group'])){
                $data = [
                    'acf' => $pageContent['products-group'],
                    'cats' => getTaxes('p-cats'),
                    'subcats' => getTaxes('p-cats', "showAll"),
                    'products' => getProducts("", [], 'DESC', ['p-cats' => 2], true )['posts'],
                    'pagination' => getProducts("", [], 'DESC', ['p-cats' => 2], true )['pagination']
                ];
                get_template_part('front/sections/front-page/products-group', '', $data);
            }
            if(!empty($pageContent['receipes-group'])){
                $data = [
                    'acf' => $pageContent['receipes-group'],
                    'posts' => getReceipts($count = "all", $property = null, $sorted = 'DESC', $tax = [], $pagination = false)
                ];
                get_template_part('front/sections/front-page/receipes-group', '', $data);
            }
            if(!empty($pageContent['np-group'])){
                $data = [
                    'acf' => $pageContent['np-group'],
                    'posts' => getNaP()['posts']
                ];
                get_template_part('front/sections/front-page/nap', '', $data);
            }
            if(!empty($pageContent['chicken-content'])){
                get_template_part('front/sections/front-page/two-col', '', $pageContent['chicken-content']);
            }
            if(!empty($pageContent['feeds'])){
                get_template_part('front/sections/front-page/advantages-four-col', '', $pageContent['feeds']);
            }
            if(!empty($pageContent['partners'])){
                get_template_part('front/sections/front-page/partners', '', $pageContent['partners']);
            }
            if(!empty($pageContent['map-content'])){
                get_template_part('front/sections/front-page/map', '', $pageContent['map-content']);
            }
            if(!empty($pageContent['contact-form'])){
                get_template_part('front/sections/front-page/form', '', $pageContent['contact-form']);
            }
            if(!empty($pageContent['seo-text'])){
                get_template_part('front/sections/front-page/seo-text', '', $pageContent['seo-text']);
            }
        ?>


    </main>
<?php
endif;
get_footer();
?>