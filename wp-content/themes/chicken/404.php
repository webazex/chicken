<?php
get_header();
$content = get_field('general-settings', 'options')['nf-group'];
?>
<main>
    <section class="nf-main">
        <div class="site-size">
            <div class="site-size__content-nf">
                <?php if($content['img']):?>
                <img src="<?php echo $content['img'];?>" alt="404">
                <?php endif;?>
                <div class="content-nf__text-box">
                    <?php if(!empty($content['title'])):?>
                        <h2><?php echo $content['title'];?></h2>
                        <?php else: ?>
                        <h2><?php _e('Упс... 404', 'chicken');?></h2>
                    <?php
                    endif;
                    if(!empty($content['desc'])):
                    ?>
                    <p><?php echo $content['desc']; ?></p>
                    <?php else: ?>
                    <p><?php _e('ми запитали в кожної курочки, ало ніхто з них не знає куди подівалася ця сторінка', 'chicken');?></p>
                    <?php endif;?>
                    <a href="/" class="text-box__link-nf"><?php _e('До головної', 'chicken');?></a>
                </div>
            </div>
        </div>
    </section>
</main>
