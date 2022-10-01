<section>
    <div class="site-size">
        <div class="site-size__contact-section">
            <div class="contact-section__form-column">
                <h2><?php echo $args['title']; ?></h2>
                <p><?php echo $args['desc']; ?></p>
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
                <img src="<?php echo $args['image']; ?>" alt="">
            </div>
        </div>
    </div>
</section>
