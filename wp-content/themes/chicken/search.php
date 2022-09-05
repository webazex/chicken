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

                    <div class="form-search-item">
                        <a href="/" class="form-search-item-name">Печінка курчат бойлерів</a>
                        <div class="form-search-item-desc">Фарш «Домашній» кулінарний із м′яса курчат-бройлерів напівфабрикат посічений, у малиновому маринаді</div>
                    </div>
                    <div class="form-search-item">
                        <a href="/" class="form-search-item-name">Печінка курчат бойлерів</a>
                        <div class="form-search-item-desc">Фарш «Домашній» кулінарний із м′яса курчат-бройлерів напівфабрикат посічений, у малиновому маринаді</div>
                    </div>
                    <div class="form-search-item">
                        <a href="/" class="form-search-item-name">Печінка курчат бойлерів</a>
                        <div class="form-search-item-desc">Фарш «Домашній» кулінарний із м′яса курчат-бройлерів напівфабрикат посічений, у малиновому маринаді</div>
                    </div>

                </div>
                <div class="form-search-pagination">
                    <?php echo($args['search']['pagination']); ?>
                </div>
                <?php while ( have_posts() ) : the_post();

                endwhile; ?>
            </div>
        </section>
    </main>
<?php
get_footer();
?>