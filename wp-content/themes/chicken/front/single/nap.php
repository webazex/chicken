<?php
    get_header();
    $content = $args['fields'];
    $tags = $args['cats'];
?>
<main>
    <section>
        <div class="site-size-nap">
            <div class="site-size-nap__topped-row">
                <div class="topped-row__breadcrumbs">
                    <?php
                    $data = [
                        'params' => [
                                'show_post_title' => false
                            ],
                        'sep' => " \\ "
                    ];
                        get_template_part('front/components/breadcrumbs', '', $data);
                    ?>
                </div>
                <div class="topped-row__block-info">
                    <?php if(!empty($tags)):?>
                    <div class="block-info__tags">
                        <?php
                            foreach ($tags as $tag):
                                ?><span>#<?php echo $tag['name'];?></span><?php
                            endforeach;
                        ?>
                    </div>
                    <?php endif;?>
                    <span class="block-info__date"><?php echo get_the_date( "d F Y", $post->ID ); //the_time("d F Y");?></span>
                </div>
            </div>
            <img src="<?php echo $content['image'];?>" alt="<?php echo $content['title'];?>" class="site-size-nap__image">
            <h1 class="site-size-nap__title">
                <?php echo $content['title'];?>
            </h1>
            <div class="site-size-nap__article">
                <?php echo $content['content'];?>
            </div>
            <div class="site-size-nap__bottomed-row">
                <div class="bottomed-row__socials">
                    <?php
                        $sharedLinks = getSharedLinks($content['repost-content']);
                        if(!empty($sharedLinks)){
                            foreach ($sharedLinks as $sharedLink) {
                                echo $sharedLink;
                            }
                        }
                    ?>
                </div>
                <a href="">Всі новини</a>
            </div>
            <h2 class="recents-title"><?php echo $content['recents-title'];?></h2>
                <div class="recents">
                    <?php
                    $recents = getRecentsNap();
                    foreach ($recents as $item):
                        get_template_part('front/components/nap-item', '', $item);
                    endforeach;
                    ?>
                </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
