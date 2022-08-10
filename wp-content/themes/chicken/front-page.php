<?php
get_header();
$pageContent = get_field('page-content');
if(!empty($pageContent)):
?>
    <main>
        <?php
            if(!empty($pageContent['welcome'])):
                get_template_part('front/sections/front-page/welcome', '', $pageContent['welcome']);
            endif;
            if(!empty($pageContent['slider'])):
                get_template_part('front/sections/front-page/slider', '', $pageContent['slider']);
            endif;
            if(!empty($pageContent['products-group'])){
                $data = [
                    'acf' => $pageContent['products-group'],
                    'cats' => getTaxes('p-cats'),
                    'subcats' => getTaxes('p-cats', "showAll"),
                    'products' => getProducts(8, ['status'], 'DESC', ['p-cats' => 'zc'])
                ];
                get_template_part('front/sections/front-page/products-group', '', $data);
            }
            if(!empty($pageContent['receipes-group'])){
                $data = [
                    'acf' => $pageContent['receipes-group'],
                    'posts' => getReceipts(4)
                ];
            }
        ?>


        <section>
            <div class="site-size">
                <div class="site-size__default-grid-container">
                    <div class="default-grid-container__title-row">
                        <div class="title-row__title-box">
                            <h3 class="title-box">
                                <span class="title__text">Новини та Акції</span>
                            </h3>
                            <span class="title-box__subtitle">цікавинки Знатної Курки</span>
                        </div>
                        <a href="/" class="title-row__link">
                            <span class="link__text products-link link-color">Всі новини та акції</span>
                        </a>
                    </div>
                    <div class="default-grid-container__grid-default">
                        <div class="grid-default__item news">
                            <img src="img/photo2.jpg" alt="">
                            <div class="news__info-block">
                                <span class="info-block__title">Купуй звичайну + мариновану курку, та отримай -15% на чек</span>
                                <span class="info-block__date">20 червень 2022</span>
                                <span class="info-block__tag">#Акція</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="site-size">
                <div class="site-size__two-col-content">
                    <div class="two-col-content__col-one">
                        <h2 class="col-one__title">
                            <span class="title__text">Курка знатна - бо смачна</span>
                        </h2>
                        <p class="col-one__desc">
                            Знатна курка забезпечує покупця завжди свіжим та смачним м’ясом. Ми досягаємо цього завдяки
                            унікальній рецептурі, міжнародним стандартам
                            та контролю всіх етапів виробництва: від зерна до курки!
                        </p>
                        <div class="col-one__row-links">
                            <a href="" class="row-links__link-default">
                                <span class="link-default__text link-color">Все про компанію</span>
                            </a>
                            <a href="" class="row-links__link-default">
                                <span class="link-default__text link-color">Гарантії якості</span>
                            </a>
                        </div>
                    </div>
                    <div class="two-col-content__col-two">
                        <img src="img/photo3.png" class="col-two__img" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="site-size">
                <div class="site-size__grid four-columns">
                    <div class="four-columns__item-card">
                        <img src="img/01.png" class="item-card__icon">
                        <h4 class="item-card__title">Тільки природні корми</h4>
                        <p class="item-card__desc">
                            спеціально розроблені,
                            унікальні рецепти кормів з власновирощеного зерна</p>
                    </div>
                    <div class="four-columns__item-card">
                        <img src="img/01.png" class="item-card__icon">
                        <h4 class="item-card__title">Тільки природні корми</h4>
                        <p class="item-card__desc">
                            спеціально розроблені,
                            унікальні рецепти кормів з власновирощеного зерна</p>
                    </div>
                    <div class="four-columns__item-card">
                        <img src="img/01.png" class="item-card__icon">
                        <h4 class="item-card__title">Тільки природні корми</h4>
                        <p class="item-card__desc">
                            спеціально розроблені,
                            унікальні рецепти кормів з власновирощеного зерна</p>
                    </div>
                    <div class="four-columns__item-card">
                        <img src="img/01.png" class="item-card__icon">
                        <h4 class="item-card__title">Тільки природні корми</h4>
                        <p class="item-card__desc">
                            спеціально розроблені,
                            унікальні рецепти кормів з власновирощеного зерна</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="site-size">
                <div class="site-size__grid auto-fill-columns logos">
                    <img src="img/image%2019.jpg" alt="">
                    <img src="img/image%2023.jpg" alt="">
                    <img src="img/image%2019.jpg" alt="">
                    <img src="img/image%2023.jpg" alt="">
                    <img src="img/image%2019.jpg" alt="">
                    <img src="img/image%2023.jpg" alt="">
                </div>
            </div>
        </section>

        <section>
            <div class="site-size">
                <div class="site-size__map">
                    <h2 class="map__title-h2">Шукай в своїх улюблених магазинах по всій Україні</h2>
                    <img src="img/map.png">
                </div>
            </div>
        </section>

        <section>
            <div class="site-size">
                <div class="site-size__contact-section">
                    <div class="contact-section__form-column">
                        <h2>Виникли питання?</h2>
                        <p>вкажіть контактні дані і ми з вами зв'яжемось,
                            або перейдіть до розділу контаків та сконтактуйте
                            з нами самостійно
                        </p>
                        <form class="form-column__c-form" id="c-form" method="post">
                            <label for="fio">
                                <input name="fio" id="fio" placeholder="Ваше імя">
                                <span class="h-t-placeholder">Ваше імя</span>
                            </label>
                            <label for="email">
                                <input name="email" id="email" placeholder="Ваш email">
                                <span class="h-t-placeholder">Ваш email</span>
                            </label>
                            <label for="email">
                                <input name="email" id="phone" placeholder="Номер телефону">
                                <span class="h-t-placeholder">Номер телефону</span>
                            </label>
                            <textarea placeholder="Повідомлення тут...">

							</textarea>
                            <button type="submit">
                                <span class="btnrow">Надіслати повідомлення</span>
                            </button>
                        </form>
                    </div>
                    <div class="contact-section__img-column">
                        <img src="img/collage2.png" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
endif;
get_footer();
?>