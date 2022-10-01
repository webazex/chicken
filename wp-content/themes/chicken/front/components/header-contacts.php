<?php
    if(empty($args)){
        $content = getThemeSettings()['contacts'];
    }else{
        $content = $args;
    }
    $phone = $content['call-center-phone'];
    if(!empty($phone)):
        $cleanTelephoneNumber = str_replace( [' ','-','(',')','+'], '', $phone);
?>
<div class="header-container__contact-box">
    <a href="tel:<?php echo $cleanTelephoneNumber; ?>" class="contact-box__link-tel">
        <span class="link-tel__text"><?php echo $phone; ?></span>
    </a>
    <span class="contact-box__text-desc"><?php _e('Зворотній зв’язок', 'chicken'); ?></span>
</div>
<?php endif; ?>