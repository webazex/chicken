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
                    'cats' => getTaxes('p-cats', true),
                    'subcats' => getTaxes('p-cats'),
                    'products' => getProducts(8, ['status'], 'DESC', ['p-cats' => 'zc'])
                ];
                get_template_part('front/sections/front-page/products-group', '', $data);
            }
        ?>

        <section>
            <div class="site-size">
                <div class="site-size__default-grid-container">
                    <div class="default-grid-container__title-row">
                        <div class="title-row__title-box">
                            <h3 class="title-box">
                                <span class="title__text">Рецепти</span>
                            </h3>
                            <span class="title-box__subtitle">тільки найсмачніші</span>
                        </div>
                        <a href="/" class="title-row__link">
                            <span class="link__text products-link link-color">Всі рецепти</span>
                        </a>
                    </div>
                    <div class="default-grid-container__grid-default">
                        <div class="grid-default__item recipes">
                            <img src="img/photo.jpg" alt="" class="receipes__img">
                            <div class="receipes__info">
                                <div class="info__title-row">
                                    <span class="title-row__text">Курячий рамен</span>
                                    <div class="info__peppers"></div>
                                </div>

                                <p class="info__desc">з м’ясом стегна та рисовою локшиною</p>
                                <div class="info__properties-row">
                                    <div class="properties-row__property-box">
                                        <span class="property-box__icon time"></span>
                                        <span class="property-box__value">40 хв</span>
                                    </div>
                                    <div class="properties-row__property-box">
                                        <span class="property-box__icon count"></span>
                                        <span class="property-box__value">1 порція</span>
                                    </div>
                                    <div class="properties-row__property-box">
                                        <span class="property-box__icon lvl"></span>
                                        <span class="property-box__value">Складний</span>
                                    </div>
                                </div>
                                <div class="info__hidden-block">
                                    <p class="hidden-block__desc">На 100г готової страви</p>
                                    <div class="hidden-block__row-props">
                                        <div class="row-props__item">
                                            <span class="item__prop-name">243</span>
                                            <span class="item__prop-val">ккал</span>
                                            <span class="item__prop-text">колорії</span>
                                        </div>
                                        <div class="row-props__item">
                                            <span class="item__prop-name">243</span>
                                            <span class="item__prop-val">ккал</span>
                                            <span class="item__prop-text">колорії</span>
                                        </div>
                                        <div class="row-props__item">
                                            <span class="item__prop-name">243</span>
                                            <span class="item__prop-val">ккал</span>
                                            <span class="item__prop-text">колорії</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
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