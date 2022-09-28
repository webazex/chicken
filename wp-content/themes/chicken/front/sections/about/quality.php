<section id="quality" class="control-section">
    <div class="site-size">
        <div class="site-size__control-section">
            <img src="<?php echo wp_get_attachment_image_url($args['image'], 'full');?>" alt="">
            <div class="control-section__text-block">
                <h2><?php echo $args['title'];?></h2>
                <p><?php echo $args['content'];?></p>
            </div>
        </div>
    </div>
</section>
