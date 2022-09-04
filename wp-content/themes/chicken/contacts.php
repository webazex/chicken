<?php
/* Template Name: Contact */
get_header();
$contentData = get_field('kontent');
$contactData = get_field('contacts', 'options');
$socialData = get_field('socials', 'options');
?>
<main>
    <section class="top-contacts">
        <div class="site-size">
            <div class="site-size__content-row">
                <div class="content-row__breadcrumbs-row contacts">
                    <?php get_template_part('front/components/breadcrumbs');?>
                </div>
            </div>
        </div>
    </section>
    <section class="content-contacts">
        <div class="site-size">
            <h2><?php echo $contentData['title-contacts']; ?></h2>
            <div class="site-size__container-contact">
                <div class="container-contact__block">
                    <span class="row-box__title"><?php echo $contentData['phone-subtitle']; ?></span>
                    <?php
                        if(!empty($contactData['phones'])):
                            foreach($contactData['phones'] as $phone):
                                $cleanTelephoneNumber = str_replace( [' ','-','(',')','+'], '', $phone['phone-number']);
                                ?>
                                <a href="tel:<?php echo $cleanTelephoneNumber;?>"><?php echo $phone['phone-number'];?></a>
                                <?php
                            endforeach;
                        endif;
                    ?>
                </div>
                <div class="container-contact__block">
                    <span class="row-box__title"><?php echo $contentData['mail-subtitle']; ?></span>
                    <a href="mail:<?php echo $contactData['mail'];?>"><?php echo $contactData['mail'];?></a>
                </div>
                <div class="container-contact__block">
                    <span class="row-box__title"><?php echo $contentData['soc-subtitle']; ?></span>
                    <?php if(!empty($socialData)):?>
                    <div class="social-row">
                        <?php foreach ($socialData as $social): ?>
                            <a href="<?php echo $social['link']?>" class="social-row__icon">
                                <img src="<?php echo $social['icon'];?>" alt="<?php echo $social['title'];?>">
                            </a>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
<!--                ====-->
                <div class="container-contact__block">
                    <span class="row-box__title"><?php echo $contentData['locate-subtitle']; ?></span>
                    <p><?php echo $contactData['country'].', '.$contactData['post-index'].', '.$contactData['city']
                    .', <br>'.$contactData['street-adres']; ?></p>
                </div>
                <div class="container-contact__block">
                    <span class="row-box__title"><?php echo $contentData['other-subtitle']; ?></span>
                    <p><?php echo $contactData['other-link']['title'];?></p>
                </div>
                <div class="container-contact__block">
                    <span class="row-box__title"><?php echo $contentData['workime-subtitle']; ?></span>
                    <p>
                       <?php echo $contactData['text'];?>
                    </p>
                </div>
                <img src="<?php echo $contentData['img']; ?>" class="container-contact__img" alt="">
            </div>
        </div>
    </section>
    <section class="line-section">
        <div class="site-size">
            <span class="lined"></span>
        </div>
    </section>
    <section>
        <div class="site-size">
            <div class="site-size__contact-section">
                <div class="contact-section__form-column">
                    <h2><?php echo $contentData['title-callback']; ?></h2>
                    <p><?php echo $contentData['form-subtitle']; ?></p>
                    <form class="form-column__c-form" id="c-form" method="post">
                        <label for="fio">
                            <input name="fio" id="fio" placeholder="<?php _e('Ваше імя', 'chicken'); ?>">
                            <span class="h-t-placeholder"><?php _e('Ваше імя', 'chicken'); ?></span>
                        </label>
                        <label for="email">
                            <input name="email" id="email" placeholder="<?php _e('Ваш email', 'chicken'); ?>">
                            <span class="h-t-placeholder"><?php _e('Ваш email', 'chicken'); ?></span>
                        </label>
                        <label for="email">
                            <input name="phone" id="phone" placeholder="<?php _e('Номер телефону', 'chicken'); ?>">
                            <span class="h-t-placeholder"><?php _e('Номер телефону', 'chicken'); ?></span>
                        </label>
                        <textarea placeholder="<?php _e('Повідомлення тут', 'chicken'); ?>...">

							</textarea>
                        <button type="submit">
                            <span class="btnrow"><?php _e('Надіслати повідомлення', 'chicken'); ?></span>
                        </button>
                    </form>
                </div>
                <div class="contact-section__img-column">
                    <img src="<?php echo $contentData['form-img']; ?>" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer();?>
