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

        ?>
        <section>
            <div class="site-size">
                <div class="site-size__recipes-grid-container">
                    <div class="recipes-grid-container__new-receipes">
                        <img src="img/p1.png" class="new-receipes__img so" alt="">
                        <div class="new-receipes__content">
                            <span class="content__title-box">Нові рецепти від Знатної Курки</span>
                            <span class="content__desc-box">порадуй себе та здивуй рідних</span>
                            <a href="" class="content__link-btn-box">
                                <span class="link-btn-box__text">До розділу</span>
                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="link-btn-box__icon">
                                    <path d="M0.676505 9.04036L9.65092 0.959757M9.65092 0.959757L3.57357 1.0493M9.65092 0.959757L8.92661 6.99446" stroke="white" stroke-width="1.4"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="recipes-grid-container__marked-receipes">
                        <img src="img/p2.png" class="marked-receipes__img so" alt="">
                        <div class="marked-receipes__content">
                            <span class="content__title-box">Зустрічай! Мітболи з філе</span>
                            <span class="content__desc-box">смачні та соковиті, на 100% знатні</span>
                            <a href="" class="content__link-btn-box">
                                <span class="link-btn-box__text">Детальніше</span>
                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="link-btn-box__icon">
                                    <path d="M0.676505 9.04036L9.65092 0.959757M9.65092 0.959757L3.57357 1.0493M9.65092 0.959757L8.92661 6.99446" stroke="white" stroke-width="1.4"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="recipes-grid-container__slider-container">
                        <div class="slider-container__slider">
                            <!--							==start=slide==-->
                            <div class="slider__container-slide">
                                <div class="container-slide__slide">
                                    <div class="slide__text-block">
                                        <div class="text-block__slide-title">
                                            <span class="slide-title__text">Готуй смачніше ніж будь-коли</span>
                                        </div>
                                        <p class="slide__desc">Сотні пошагових рецептів від знатної курки</p>
                                        <a href="" class="text-block__link">
                                            <span class="link__slide-text">Знатні рецепти</span>
                                        </a>
                                    </div>
                                    <img src="img/collage%20large.png" class="slide__img" alt="">
                                </div>
                            </div>
                            <!--							==end=slide==-->
                            <div class="slider__container-slide">
                                <div class="container-slide__slide">
                                    <div class="slide__text-block">
                                        <div class="text-block__slide-title">
                                            <span class="slide-title__text">Готуй смачніше ніж будь-коли</span>
                                        </div>
                                        <p class="slide__desc">Сотні пошагових рецептів від знатної курки</p>
                                        <a href="" class="text-block__link">
                                            <span class="link__slide-text">Знатні рецепти</span>
                                        </a>
                                    </div>
                                    <img src="img/collage%20large.png" class="slide__img" alt="">
                                </div>
                            </div>
                            <div class="slider__container-slide">
                                <div class="container-slide__slide">
                                    <div class="slide__text-block">
                                        <div class="text-block__slide-title">
                                            <span class="slide-title__text">Готуй смачніше ніж будь-коли</span>
                                        </div>
                                        <p class="slide__desc">Сотні пошагових рецептів від знатної курки</p>
                                        <a href="" class="text-block__link">
                                            <span class="link__slide-text">Знатні рецепти</span>
                                        </a>
                                    </div>
                                    <img src="img/collage%20large.png" class="slide__img" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="site-size">
                <div class="site-size__our-production-container">
                    <div class="our-production-container__title-row">
                        <h3 class="title-row__title"><span class="title__text">Наша продукція</span></h3>
                        <a href="" class="title-row__link">
                            <span class="link__text products-link link-color">Вся продукція</span>
                        </a>
                    </div>
                    <!--					==content==-->
                    <div class="our-production-container__content">
                        <div class="content__tabs-row">
                            <div class="tabs-row__tab this-tab">
                                <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.001 8.89272C22.0603 7.90347 22.9091 6.73467 22.9091 5.76441C22.9091 4.79415 22.0603 3.62534 20.001 2.6361C18.0097 1.67958 15.1824 1.05769 12 1.05769C8.81755 1.05769 5.99026 1.67958 3.99903 2.6361C1.93968 3.62534 1.09091 4.79415 1.09091 5.76441C1.09091 6.73467 1.93968 7.90347 3.99903 8.89272C5.99026 9.84924 8.81755 10.4711 12 10.4711C15.1824 10.4711 18.0097 9.84924 20.001 8.89272ZM12 11.5288C18.6274 11.5288 24 8.948 24 5.76441C24 2.58081 18.6274 0 12 0C5.37258 0 0 2.58081 0 5.76441C0 8.948 5.37258 11.5288 12 11.5288Z" fill="#E50746"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7305 6.96095C21.1736 6.5095 21.3818 6.05229 21.3818 5.60581C21.3818 5.15932 21.1736 4.70212 20.7305 4.25067C20.2853 3.79704 19.6203 3.36927 18.7653 3.00082C17.0563 2.2644 14.6648 1.79812 12 1.79812C9.33522 1.79812 6.9437 2.2644 5.23472 3.00082C4.37968 3.36927 3.71475 3.79704 3.26948 4.25067C2.82635 4.70212 2.61818 5.15932 2.61818 5.60581C2.61818 6.05229 2.82635 6.5095 3.26948 6.96095C3.71475 7.41458 4.37968 7.84235 5.23472 8.21079C6.9437 8.94721 9.33522 9.41349 12 9.41349C14.6648 9.41349 17.0563 8.94721 18.7653 8.21079C19.6203 7.84235 20.2853 7.41458 20.7305 6.96095ZM12 9.83657C17.4224 9.83657 21.8182 7.94239 21.8182 5.60581C21.8182 3.26922 17.4224 1.37505 12 1.37505C6.57757 1.37505 2.18182 3.26922 2.18182 5.60581C2.18182 7.94239 6.57757 9.83657 12 9.83657Z" fill="#E50746"/>
                                    <path d="M12 22C18.6274 22 24 19.3955 24 16.1827C24 16.1827 20.7273 20.9423 12 20.9423C3.27273 20.9423 0 16.1827 0 16.1827C0 19.3955 5.37258 22 12 22Z" fill="#E50746"/>
                                    <path d="M12 19.8846C18.6274 19.8846 24 17.2801 24 14.0673C24 14.0673 20.7273 18.8269 12 18.8269C3.27273 18.8269 0 14.0673 0 14.0673C0 17.2801 5.37258 19.8846 12 19.8846Z" fill="#E50746"/>
                                    <path d="M0 5.60581H1.09091V17.7692L0 16.1827V5.60581Z" fill="#E50746"/>
                                    <path d="M24 5.60581H22.9091V17.7692L24 16.1827V5.60581Z" fill="#E50746"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0575 6.06085L13.2924 3.09378C13.1441 2.5188 12.6113 2.11543 12 2.11543C11.3887 2.11543 10.8559 2.5188 10.7076 3.09378L9.94253 6.06085C9.82204 6.52814 10.1866 6.9808 10.6834 6.9808H13.3166C13.8134 6.9808 14.178 6.52814 14.0575 6.06085ZM12 1.37505C11.0383 1.37505 10.2 2.00963 9.96676 2.91421L9.20169 5.88128C8.96071 6.81586 9.68977 7.72119 10.6834 7.72119H13.3166C14.3102 7.72119 15.0393 6.81586 14.7983 5.88128L14.0332 2.91421C13.8 2.00964 12.9617 1.37505 12 1.37505Z" fill="#E50746"/>
                                    <path d="M13.0909 5.2885C13.0909 5.6974 12.6025 6.02888 12 6.02888C11.3975 6.02888 10.9091 5.6974 10.9091 5.2885C10.9091 4.8796 11.3975 4.54812 12 4.54812C12.6025 4.54812 13.0909 4.8796 13.0909 5.2885Z" fill="#E50746"/>
                                    <path d="M4.36364 11.4231C4.36364 11.7152 4.11943 11.9519 3.81818 11.9519C3.51694 11.9519 3.27273 11.7152 3.27273 11.4231C3.27273 11.131 3.51694 10.8943 3.81818 10.8943C4.11943 10.8943 4.36364 11.131 4.36364 11.4231Z" fill="#E50746"/>
                                    <path d="M4.36364 13.0096C4.36364 13.3017 4.11943 13.5385 3.81818 13.5385C3.51694 13.5385 3.27273 13.3017 3.27273 13.0096C3.27273 12.7176 3.51694 12.4808 3.81818 12.4808C4.11943 12.4808 4.36364 12.7176 4.36364 13.0096Z" fill="#E50746"/>
                                    <path d="M4.36364 14.5962C4.36364 14.8882 4.11943 15.125 3.81818 15.125C3.51694 15.125 3.27273 14.8882 3.27273 14.5962C3.27273 14.3041 3.51694 14.0673 3.81818 14.0673C4.11943 14.0673 4.36364 14.3041 4.36364 14.5962Z" fill="#E50746"/>
                                    <path d="M11.7007 16.5434C12.2665 16.6884 12.9183 16.7327 13.4882 16.861C14.1693 17.0144 14.9119 16.826 15.4422 16.2957C16.2647 15.4732 16.2647 14.1396 15.4422 13.3171C14.6197 12.4946 13.2861 12.4946 12.4635 13.3171C12.1644 13.6163 11.7675 13.8389 11.3952 14.0399C11.2822 14.1008 11.1761 14.1791 11.0806 14.2745C10.5518 14.8033 10.5518 15.6606 11.0806 16.1893C11.2585 16.3672 11.4735 16.4852 11.7007 16.5434Z" stroke="#E50746" stroke-width="0.7"/>
                                </svg>

                                <span class="tab__text">Знатна курка</span>
                            </div>
                            <div class="tabs-row__tab">
                                <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.001 8.89272C22.0603 7.90347 22.9091 6.73467 22.9091 5.76441C22.9091 4.79415 22.0603 3.62534 20.001 2.6361C18.0097 1.67958 15.1824 1.05769 12 1.05769C8.81755 1.05769 5.99026 1.67958 3.99903 2.6361C1.93968 3.62534 1.09091 4.79415 1.09091 5.76441C1.09091 6.73467 1.93968 7.90347 3.99903 8.89272C5.99026 9.84924 8.81755 10.4711 12 10.4711C15.1824 10.4711 18.0097 9.84924 20.001 8.89272ZM12 11.5288C18.6274 11.5288 24 8.948 24 5.76441C24 2.58081 18.6274 0 12 0C5.37258 0 0 2.58081 0 5.76441C0 8.948 5.37258 11.5288 12 11.5288Z" fill="#E50746"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7305 6.96095C21.1736 6.5095 21.3818 6.05229 21.3818 5.60581C21.3818 5.15932 21.1736 4.70212 20.7305 4.25067C20.2853 3.79704 19.6203 3.36927 18.7653 3.00082C17.0563 2.2644 14.6648 1.79812 12 1.79812C9.33522 1.79812 6.9437 2.2644 5.23472 3.00082C4.37968 3.36927 3.71475 3.79704 3.26948 4.25067C2.82635 4.70212 2.61818 5.15932 2.61818 5.60581C2.61818 6.05229 2.82635 6.5095 3.26948 6.96095C3.71475 7.41458 4.37968 7.84235 5.23472 8.21079C6.9437 8.94721 9.33522 9.41349 12 9.41349C14.6648 9.41349 17.0563 8.94721 18.7653 8.21079C19.6203 7.84235 20.2853 7.41458 20.7305 6.96095ZM12 9.83657C17.4224 9.83657 21.8182 7.94239 21.8182 5.60581C21.8182 3.26922 17.4224 1.37505 12 1.37505C6.57757 1.37505 2.18182 3.26922 2.18182 5.60581C2.18182 7.94239 6.57757 9.83657 12 9.83657Z" fill="#E50746"/>
                                    <path d="M12 22C18.6274 22 24 19.3955 24 16.1827C24 16.1827 20.7273 20.9423 12 20.9423C3.27273 20.9423 0 16.1827 0 16.1827C0 19.3955 5.37258 22 12 22Z" fill="#E50746"/>
                                    <path d="M12 19.8846C18.6274 19.8846 24 17.2801 24 14.0673C24 14.0673 20.7273 18.8269 12 18.8269C3.27273 18.8269 0 14.0673 0 14.0673C0 17.2801 5.37258 19.8846 12 19.8846Z" fill="#E50746"/>
                                    <path d="M0 5.60581H1.09091V17.7692L0 16.1827V5.60581Z" fill="#E50746"/>
                                    <path d="M24 5.60581H22.9091V17.7692L24 16.1827V5.60581Z" fill="#E50746"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0575 6.06085L13.2924 3.09378C13.1441 2.5188 12.6113 2.11543 12 2.11543C11.3887 2.11543 10.8559 2.5188 10.7076 3.09378L9.94253 6.06085C9.82204 6.52814 10.1866 6.9808 10.6834 6.9808H13.3166C13.8134 6.9808 14.178 6.52814 14.0575 6.06085ZM12 1.37505C11.0383 1.37505 10.2 2.00963 9.96676 2.91421L9.20169 5.88128C8.96071 6.81586 9.68977 7.72119 10.6834 7.72119H13.3166C14.3102 7.72119 15.0393 6.81586 14.7983 5.88128L14.0332 2.91421C13.8 2.00964 12.9617 1.37505 12 1.37505Z" fill="#E50746"/>
                                    <path d="M13.0909 5.2885C13.0909 5.6974 12.6025 6.02888 12 6.02888C11.3975 6.02888 10.9091 5.6974 10.9091 5.2885C10.9091 4.8796 11.3975 4.54812 12 4.54812C12.6025 4.54812 13.0909 4.8796 13.0909 5.2885Z" fill="#E50746"/>
                                    <path d="M4.36364 11.4231C4.36364 11.7152 4.11943 11.9519 3.81818 11.9519C3.51694 11.9519 3.27273 11.7152 3.27273 11.4231C3.27273 11.131 3.51694 10.8943 3.81818 10.8943C4.11943 10.8943 4.36364 11.131 4.36364 11.4231Z" fill="#E50746"/>
                                    <path d="M4.36364 13.0096C4.36364 13.3017 4.11943 13.5385 3.81818 13.5385C3.51694 13.5385 3.27273 13.3017 3.27273 13.0096C3.27273 12.7176 3.51694 12.4808 3.81818 12.4808C4.11943 12.4808 4.36364 12.7176 4.36364 13.0096Z" fill="#E50746"/>
                                    <path d="M4.36364 14.5962C4.36364 14.8882 4.11943 15.125 3.81818 15.125C3.51694 15.125 3.27273 14.8882 3.27273 14.5962C3.27273 14.3041 3.51694 14.0673 3.81818 14.0673C4.11943 14.0673 4.36364 14.3041 4.36364 14.5962Z" fill="#E50746"/>
                                    <path d="M11.7007 16.5434C12.2665 16.6884 12.9183 16.7327 13.4882 16.861C14.1693 17.0144 14.9119 16.826 15.4422 16.2957C16.2647 15.4732 16.2647 14.1396 15.4422 13.3171C14.6197 12.4946 13.2861 12.4946 12.4635 13.3171C12.1644 13.6163 11.7675 13.8389 11.3952 14.0399C11.2822 14.1008 11.1761 14.1791 11.0806 14.2745C10.5518 14.8033 10.5518 15.6606 11.0806 16.1893C11.2585 16.3672 11.4735 16.4852 11.7007 16.5434Z" stroke="#E50746" stroke-width="0.7"/>
                                </svg>


                                <span class="tab__text">Знатний маринад</span>
                            </div>
                            <div class="tabs-row__tab">
                                <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.001 8.89272C22.0603 7.90347 22.9091 6.73467 22.9091 5.76441C22.9091 4.79415 22.0603 3.62534 20.001 2.6361C18.0097 1.67958 15.1824 1.05769 12 1.05769C8.81755 1.05769 5.99026 1.67958 3.99903 2.6361C1.93968 3.62534 1.09091 4.79415 1.09091 5.76441C1.09091 6.73467 1.93968 7.90347 3.99903 8.89272C5.99026 9.84924 8.81755 10.4711 12 10.4711C15.1824 10.4711 18.0097 9.84924 20.001 8.89272ZM12 11.5288C18.6274 11.5288 24 8.948 24 5.76441C24 2.58081 18.6274 0 12 0C5.37258 0 0 2.58081 0 5.76441C0 8.948 5.37258 11.5288 12 11.5288Z" fill="#E50746"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7305 6.96095C21.1736 6.5095 21.3818 6.05229 21.3818 5.60581C21.3818 5.15932 21.1736 4.70212 20.7305 4.25067C20.2853 3.79704 19.6203 3.36927 18.7653 3.00082C17.0563 2.2644 14.6648 1.79812 12 1.79812C9.33522 1.79812 6.9437 2.2644 5.23472 3.00082C4.37968 3.36927 3.71475 3.79704 3.26948 4.25067C2.82635 4.70212 2.61818 5.15932 2.61818 5.60581C2.61818 6.05229 2.82635 6.5095 3.26948 6.96095C3.71475 7.41458 4.37968 7.84235 5.23472 8.21079C6.9437 8.94721 9.33522 9.41349 12 9.41349C14.6648 9.41349 17.0563 8.94721 18.7653 8.21079C19.6203 7.84235 20.2853 7.41458 20.7305 6.96095ZM12 9.83657C17.4224 9.83657 21.8182 7.94239 21.8182 5.60581C21.8182 3.26922 17.4224 1.37505 12 1.37505C6.57757 1.37505 2.18182 3.26922 2.18182 5.60581C2.18182 7.94239 6.57757 9.83657 12 9.83657Z" fill="#E50746"/>
                                    <path d="M12 22C18.6274 22 24 19.3955 24 16.1827C24 16.1827 20.7273 20.9423 12 20.9423C3.27273 20.9423 0 16.1827 0 16.1827C0 19.3955 5.37258 22 12 22Z" fill="#E50746"/>
                                    <path d="M12 19.8846C18.6274 19.8846 24 17.2801 24 14.0673C24 14.0673 20.7273 18.8269 12 18.8269C3.27273 18.8269 0 14.0673 0 14.0673C0 17.2801 5.37258 19.8846 12 19.8846Z" fill="#E50746"/>
                                    <path d="M0 5.60581H1.09091V17.7692L0 16.1827V5.60581Z" fill="#E50746"/>
                                    <path d="M24 5.60581H22.9091V17.7692L24 16.1827V5.60581Z" fill="#E50746"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0575 6.06085L13.2924 3.09378C13.1441 2.5188 12.6113 2.11543 12 2.11543C11.3887 2.11543 10.8559 2.5188 10.7076 3.09378L9.94253 6.06085C9.82204 6.52814 10.1866 6.9808 10.6834 6.9808H13.3166C13.8134 6.9808 14.178 6.52814 14.0575 6.06085ZM12 1.37505C11.0383 1.37505 10.2 2.00963 9.96676 2.91421L9.20169 5.88128C8.96071 6.81586 9.68977 7.72119 10.6834 7.72119H13.3166C14.3102 7.72119 15.0393 6.81586 14.7983 5.88128L14.0332 2.91421C13.8 2.00964 12.9617 1.37505 12 1.37505Z" fill="#E50746"/>
                                    <path d="M13.0909 5.2885C13.0909 5.6974 12.6025 6.02888 12 6.02888C11.3975 6.02888 10.9091 5.6974 10.9091 5.2885C10.9091 4.8796 11.3975 4.54812 12 4.54812C12.6025 4.54812 13.0909 4.8796 13.0909 5.2885Z" fill="#E50746"/>
                                    <path d="M4.36364 11.4231C4.36364 11.7152 4.11943 11.9519 3.81818 11.9519C3.51694 11.9519 3.27273 11.7152 3.27273 11.4231C3.27273 11.131 3.51694 10.8943 3.81818 10.8943C4.11943 10.8943 4.36364 11.131 4.36364 11.4231Z" fill="#E50746"/>
                                    <path d="M4.36364 13.0096C4.36364 13.3017 4.11943 13.5385 3.81818 13.5385C3.51694 13.5385 3.27273 13.3017 3.27273 13.0096C3.27273 12.7176 3.51694 12.4808 3.81818 12.4808C4.11943 12.4808 4.36364 12.7176 4.36364 13.0096Z" fill="#E50746"/>
                                    <path d="M4.36364 14.5962C4.36364 14.8882 4.11943 15.125 3.81818 15.125C3.51694 15.125 3.27273 14.8882 3.27273 14.5962C3.27273 14.3041 3.51694 14.0673 3.81818 14.0673C4.11943 14.0673 4.36364 14.3041 4.36364 14.5962Z" fill="#E50746"/>
                                    <path d="M11.7007 16.5434C12.2665 16.6884 12.9183 16.7327 13.4882 16.861C14.1693 17.0144 14.9119 16.826 15.4422 16.2957C16.2647 15.4732 16.2647 14.1396 15.4422 13.3171C14.6197 12.4946 13.2861 12.4946 12.4635 13.3171C12.1644 13.6163 11.7675 13.8389 11.3952 14.0399C11.2822 14.1008 11.1761 14.1791 11.0806 14.2745C10.5518 14.8033 10.5518 15.6606 11.0806 16.1893C11.2585 16.3672 11.4735 16.4852 11.7007 16.5434Z" stroke="#E50746" stroke-width="0.7"/>
                                </svg>

                                <span class="tab__text">Знатна тушонка</span>
                            </div>
                        </div>
                        <div class="content__subtabs">
                            <div class="subtabs__subtab current">
                                <span class="subtab__text">Все</span>
                            </div>
                            <div class="subtabs__subtab">
                                <span class="subtab__text">Тушка</span>
                            </div>
                        </div>
                        <div class="content__tabs">
                            <div class="tabs__tab"></div>
                            <div class="tabs__tab-contents">
                                <!--								==card-->
                                <div class="tab-contents__card">
                                    <img src="img/Photo%20220x168.jpg" class="card__image" alt="">
                                    <div class="card__marks">
                                        <span class="marks__mark cold"></span>
                                        <span class="marks__mark freeze"></span>
                                    </div>
                                    <h5 class="card__title">
                                        <span class="title__text-card">Печінка курчат бройлерів</span>
                                    </h5>
                                    <div class="card__properties">
                                        <div class="properties__property-row">
                                            <div class="property-row__property">
                                                від 0 до +2 °C
                                            </div>
                                            <div class="property-row__property">
                                                не більше 5 діб
                                            </div>
                                        </div>
                                        <div class="properties__property-row">
                                            <div class="property-row__box">
                                                <div class="box__row">
													<span class="row__value">
														243
													</span>
                                                    <span class="row__value">
														кал
													</span>
                                                </div>
                                                <span class="box__property-name">калорії</span>
                                            </div>

                                            <div class="property-row__box">
                                                <div class="box__row">
													<span class="row__value">
														17
													</span>
                                                    <span class="row__value">
														г
													</span>
                                                </div>
                                                <span class="box__property-name">білки</span>
                                            </div>
                                            <div class="property-row__box">
                                                <div class="box__row">
													<span class="row__value">
														4
													</span>
                                                    <span class="row__value">
														г
													</span>
                                                </div>
                                                <span class="box__property-name">жири</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card__more">
                                        <span class="more__text">Детальніше</span>
                                        <span class="more__icon"></span>
                                    </div>
                                </div>
                                <!--								==card=end-->
                                <!--								==card-->
                                <div class="tab-contents__card">
                                    <img src="img/Photo%20220x168.jpg" class="card__image" alt="">
                                    <div class="card__marks">
                                        <span class="marks__mark cold"></span>
                                        <span class="marks__mark freeze"></span>
                                    </div>
                                    <h5 class="card__title">
                                        <span class="title__text-card">Печінка курчат бройлерів</span>
                                    </h5>
                                    <div class="card__properties">
                                        <div class="properties__property-row">
                                            <div class="property-row__property">
                                                від 0 до +2 °C
                                            </div>
                                            <div class="property-row__property">
                                                не більше 5 діб
                                            </div>
                                        </div>
                                        <div class="properties__property-row">
                                            <div class="property-row__box">
                                                <div class="box__row">
													<span class="row__value">
														243
													</span>
                                                    <span class="row__value">
														кал
													</span>
                                                </div>
                                                <span class="box__property-name">калорії</span>
                                            </div>

                                            <div class="property-row__box">
                                                <div class="box__row">
													<span class="row__value">
														17
													</span>
                                                    <span class="row__value">
														г
													</span>
                                                </div>
                                                <span class="box__property-name">білки</span>
                                            </div>
                                            <div class="property-row__box">
                                                <div class="box__row">
													<span class="row__value">
														4
													</span>
                                                    <span class="row__value">
														г
													</span>
                                                </div>
                                                <span class="box__property-name">жири</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card__more">
                                        <span class="more__text">Детальніше</span>
                                        <span class="more__icon"></span>
                                    </div>
                                </div>
                                <!--								==card=end-->

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