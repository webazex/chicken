<?php
/*
Template Name: Search
*/
get_header();
?>
    <main class="page-search">
        <section class="page-gradient-bg">
            <div class="site-size">
                <div class="site-size__content-row">
                    <div class="content-row__breadcrumbs-row">
                        <?php get_template_part('front/components/breadcrumbs');?>
                    </div>
                    <h1>Пошук на сайті</h1>
                </div>
            </div>
        </section>
        <section>
            <div class="site-size">
                <form id="form-search" action="/" method="GET">
                    <div class="form-search">
                        <div class="form-search-label">Пошук на сайті: <b><?php the_search_query(); ?></b></div>
                        <div class="form-search-input"><input type="text" name="s" id="search" value="<?php the_search_query(); ?>" /><div class="form-search-input-icon"></div></div>
                    </div>
                </form>
                <div class="form-search-content">
                    <?php
                    $searchString = $_GET['s'];
                    $args = array(
                        "post_type"      => array("products", "nap", "recipes"), // Тип записи: post, page, кастомный тип записи
                        "post_status"    => "publish",
                        "order"          => "DESC",
                        "orderby"        => "date",
                        "s"              => $searchString,
                        "posts_per_page" => 50
                    );
                    $searchObj = new WP_Query($args);
                    $arr = [];
                    if (count($searchObj->posts)){
                        foreach ($searchObj->posts as $postObj) {
                            $link = get_permalink($postObj);
                            switch (get_post_type($postObj)){
                                case "nap":
                                    $title = get_field('nap-content', $postObj)['title'];
                                    $falseCrumbRow = __('Головна', 'chicken')." - ".__('Новини та акції', 'chicken');
                                    array_push($arr, [
                                        'title' => $title,
                                        'breadcrumbs' => $falseCrumbRow,
                                        'link' => $link,
                                    ]);
                                    break;
                                case "products":
                                    $title = get_field('product-group', $postObj)['text-group']['title'];
                                    $falseCrumbRow = __('Головна', 'chicken')." - ".__('Продукція', 'chicken');
                                    array_push($arr, [
                                        'title' => $title,
                                        'breadcrumbs' => $falseCrumbRow,
                                        'link' => $link,
                                    ]);
                                    break;
                                case "recipes":
                                    $title = get_field('receipt-content-group', $postObj)['general-info']['title'];
                                    $falseCrumbRow = __('Головна', 'chicken')." - ".__('Рецепти', 'chicken');
                                    array_push($arr, [
                                        'title' => $title,
                                        'breadcrumbs' => $falseCrumbRow,
                                        'link' => $link,
                                    ]);
                                    break;
                            }
                        }
                    }
                    if (count($arr)) {
                        foreach($arr as $data) {
                        ?>
                        <div class="form-search-item">
                            <a href="<?php echo $data['link']; ?>" class="form-search-item-name"><?php echo $data['title']; ?></a>
                            <div class="form-search-item-desc"><?php echo $data['breadcrumbs']; ?></div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
?>