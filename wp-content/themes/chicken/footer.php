<div class="popups">
    <div class="popups__callback-form">
		<span class="callback-form__close">
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M7.3481 10.7377C7.7555 10.3303 7.7555 9.66974 7.3481 9.26234L0.30555 2.21979C-0.10185 1.81239 -0.10185 1.15186 0.305549 0.744464L0.744464 0.30555C1.15186 -0.10185 1.81239 -0.101849 2.21979 0.30555L9.26234 7.3481C9.66974 7.7555 10.3303 7.7555 10.7377 7.3481L17.7802 0.30555C18.1876 -0.10185 18.8481 -0.10185 19.2555 0.305549L19.6945 0.744464C20.1019 1.15186 20.1018 1.81239 19.6945 2.21979L12.6519 9.26234C12.2445 9.66974 12.2445 10.3303 12.6519 10.7377L19.6945 17.7802C20.1019 18.1876 20.1019 18.8481 19.6945 19.2555L19.2555 19.6945C18.8481 20.1019 18.1876 20.1018 17.7802 19.6945L10.7377 12.6519C10.3303 12.2445 9.66974 12.2445 9.26234 12.6519L2.21979 19.6945C1.81239 20.1019 1.15186 20.1019 0.744464 19.6945L0.30555 19.2555C-0.10185 18.8481 -0.101849 18.1876 0.30555 17.7802L7.3481 10.7377Z" fill="#676767"/>
			</svg>
		</span>
        <h2>Виникли питання?</h2>
        <p>вкажіть контактні дані і ми з вами зв'яжемось,
            або перейдіть до розділу контаків та сконтактуйте з нами самостійно</p>
        <form class="form-column__c-form" id="c-form" method="post">
            <label for="fio">
                <input name="fio" id="fio" placeholder="Ваше імя">
                <span class="h-t-placeholder">Ваше імя</span>
            </label>
            <label for="phone">
                <input name="phone" id="phone" placeholder="Номер телефону">
                <span class="h-t-placeholder">Номер телефону</span>
            </label>
            <button type="submit">
                <span class="btnrow">Надіслати повідомлення</span>
            </button>
        </form>
    </div>
    <div class="popups__product">

    </div>
</div>
<footer>
    <div class="site-size">
        <div class="site-size__footer-container">
            <img src="<?php echo getMainLogo(); ?>" alt="" class="footer-container__logo">
            <div class="footer-container__col">
                <div class="col__row-box">
                    <span class="row-box__title">Зателефонуйте</span>
                    <a href="tel:+380503215800">+38 050 321-58-00</a>
                    <a href="tel:+380503215800">+38 050 321-58-00</a>
                </div>
                <div class="col__row-box">
                    <span class="row-box__title">Напишіть</span>
                    <a href="mail:znatna@ofc-pkd.com.ua">znatna@ofc-pkd.com.ua</a>
                </div>
                <div class="col__row-box">
                    <span class="row-box__title">Відстежуйте</span>
                    <div class="social-row">
                        <a href="" class="social-row__icon"></a>
                        <a href="" class="social-row__icon"></a>
                        <a href="" class="social-row__icon"></a>
                        <a href="" class="social-row__icon"></a>
                    </div>
                </div>
            </div>
            <div class="footer-container__col">
                <div class="col__row-box">
                    <span class="row-box__title">Наша адреса</span>
                    <p>Україна, 69065, Запоріжжя, вул. Електрозаводська, 3</p>
                </div>
                <div class="col__row-box">
                    <span class="row-box__title">Група компаній «Дніпровська»</span>
                    <p>dneprovska.com.ua</p>
                </div>
                <div class="col__row-box">
                    <span class="row-box__title">Графік роботи офісу</span>
                    <p>
                        Пн – Пт
                        10:00 - 17:00
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>