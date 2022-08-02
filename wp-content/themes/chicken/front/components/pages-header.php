<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
</head>
<body>
<header>
    <div class="site-size">
        <div class="site-size__header-container">
            <a href="index-m.html">
                <img src="img/lb.png" class="header-container__logo" alt="logo" data-patch="img/">
            </a>

            <ul class="header-container__menu">
                <li class="menu-item current">
                    <a href="products.html" class="menu-item__link">
							<span class="link__text">
								Продукція
							</span>
                    </a>
                </li>
                <li class="menu-item current">
                    <a href="receipes.html" class="menu-item__link">
							<span class="link__text">
								Рецепти
							</span>
                    </a>
                </li>
                <li class="menu-item current">
                    <a href="about.html" class="menu-item__link">
							<span class="link__text">
								Про компанію
							</span>
                    </a>
                </li>
                <li class="menu-item current">
                    <a href="news.html" class="menu-item__link">
							<span class="link__text">
								Новини та Акції
							</span>
                    </a>
                </li>
                <li class="menu-item current">
                    <a href="contacts.html" class="menu-item__link">
							<span class="link__text">
								Контакти
							</span>
                    </a>
                </li>
            </ul>
            <div class="header-container__search-box"></div>
            <div class="header-container__contact-box">
                <a href="tel:0800101000" class="contact-box__link-tel">
                    <span class="link-tel__text">0800101000</span>
                </a>
                <span class="contact-box__text-desc">Зворотній зв’язок</span>
            </div>
            <div class="header-container__lang-switcher">lang</div>
            <button class="header-container__burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>