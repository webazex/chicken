<?php
    get_header();
    $recents = getRecentsNap();
?>
<main>
    <section>
        <div class="site-size-nap">
            <div class="site-size-nap__topped-row">
                <div class="topped-row__breadcrumbs">
                    <?php
                    $data['params'] = [
                        'show_post_title' => false
                    ];
                        get_template_part('front/components/breadcrumbs', '', $data);
                    ?>
                </div>
                <div class="topped-row__block-info"></div>
            </div>
            <img src="<?php echo $args['image'];?>" alt="<?php echo $args['title'];?>" class="site-size-nap__image">
            <h1 class="site-size-nap__title">
                <?php echo $args['title'];?>
            </h1>
            <div class="site-size-nap__article">
                <?php echo $args['content'];?>
            </div>
            <div class="site-size-nap__bottomed-row">
                <div class="bottomed-row__socials">

                </div>
                <a href=""></a>
            </div>

        </div>
    </section>
</main>
<?php get_footer(); ?>
