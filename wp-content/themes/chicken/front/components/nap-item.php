<a href="<?php echo get_permalink($args['id']); ?>" class="grid-default__item news">
    <?php if(!empty($args['image'])):?>
        <img src="<?php echo $args['image']; ?>" alt="<?php echo $args['title'];?>">
    <?php endif;?>
    <div class="news__info-block">
        <?php if(!empty($args['title'])):?>
            <span class="info-block__title"><?php echo $args['title'];?></span>
        <?php endif; ?>
        <span class="info-block__date"><?php echo get_the_date("d F Y", $args['id']); ?></span>
        <?php if(!empty($args['cats'])): foreach ($args['cats'] as $cat): ?>
            <span class="info-block__tag">#<?php echo $cat['name'];?></span>
        <?php endforeach; endif;?>
    </div>
</a>
