<?php if(!empty($args)):?>
<section>
    <div class="site-size">
        <div class="site-size__grid auto-fill-columns logos">
            <?php foreach ($args as $logo): ?>
                <img src="<?php echo $logo['logo']; ?>" alt="">
            <?php endforeach;?>
        </div>
    </div>
</section>
<?php endif;?>