<section id="soc" class="soc-section">
    <div class="site-size soc">
        <h2><?php echo $args['title'];?></h2>
        <?php if(!empty($args['content'])): ?>
            <div class="site-size__soc-content">
                <?php foreach ($args['content'] as $row):
                    ?>
                    <div class="soc-content__row-content">
                        <div class="row-content__text-block">
                            <h3><?php echo $row['row']['title'];?></h3>
                            <p>
                                <?php echo $row['row']['text'];?>
                            </p>
                        </div>
                        <img src="<?php echo $row['row']['image']['url'];?>" alt="">
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</section>
