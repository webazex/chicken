<?php if(!empty($args['products'])): ?>
<section>
    <div class="site-size">
        <div class="site-size__our-production-container">
            <div class="our-production-container__title-row">
                <h3 class="title-row__title"><span class="title__text"><?php echo $args['acf']['title'];?></span></h3>
                <?php if(!empty($args['acf']['link']['url'])): ?>
                    <a href="<?php echo $args['acf']['link']['url']; ?>" class="title-row__link">
                        <span class="link__text products-link link-color"><?php echo $args['acf']['link']['title']; ?></span>
                    </a>
                <?php endif;?>
            </div>
            <!--					==content==-->
            <div class="our-production-container__content">
                <div class="content__tabs-row">
                    <?php
                        foreach ($args['cats'] as $k => $cat):
                            if($k == 0):
                                $class='this-tab';
                            else:
                                $class = '';
                            endif;
                            ?>
                            <div class="tabs-row__tab <?php echo $class;?>" data-cat-id="<?php echo $cat['id']; ?>">
                                <?php if(!empty($cat['icon'])):?>
                                    <img src="<?php echo $cat['icon']; ?>" alt="icon">
                                <?php endif; ?>
                                <span class="tab__text"><?php echo $cat['name']; ?></span>
                            </div>
                        <?php endforeach; ?>
                </div>
                <div class="content__subtabs">
                    <div class="subtabs__subtab current">
                        <span class="subtab__text">Все</span>
                    </div>
                    <?php foreach ($args['subcats'] as $subcat): if($subcat['parent'] !== 0):?>
                        <div class="subtabs__subtab" data-tag-id="<?php echo $subcat['id']; ?>">
                            <span class="subtab__text"><?php echo $subcat['name']; ?></span>
                        </div>
                    <?php endif; endforeach; ?>
                </div>
                <div class="content__tabs">
                    <div class="tabs__tab"></div>
                    <div class="tabs__tab-contents">
                        <!--								==card-->
                        <?php foreach ($args['products'] as $product): ?>
                        <div class="tab-contents__card" data-card-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['src'];?>" class="card__image" alt="">
                            <div class="card__marks">
                                <div class="marks__mark-row cold">
                                    <span class="mark-row__text"><?php _e('Охолоджений продукт', 'chicken'); ?></span>
                                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect x="35" y="35" width="32" height="32" rx="16" transform="rotate(-180 35 35)" fill="#0AAE5E"/>
                                        <rect x="36.5" y="36.5" width="35" height="35" rx="17.5" transform="rotate(-180 36.5 36.5)" stroke="#0AAE5E" stroke-opacity="0.25" stroke-width="3"/>
                                        <rect x="7" y="7" width="24" height="24" fill="url(#pattern0)"/>
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_2_403" transform="scale(0.00195313)"/>
                                            </pattern>
                                            <image id="image0_2_403" width="512" height="512" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIAEAQAAAAO4cAyAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAAAGAAAABgAPBrQs8AAAAHdElNRQfmBhYPBjpt8ZbVAAA3QklEQVR42u3deZRcdZn/8c9T2feVRSSkA5IFYlgiCUvI0oIsAgJHISOCM8qwCIogSyQiERdAf8imwqDHM4cZZQwMiIwmAlkgISQmCIRAwiLp7CzpJGQhvXGf3x8FQtN7d1U/t6rfr3P6ZOnu6s/93up6nrr3e79XAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIBiZtEBALQf9wEDsn/p00fWuXP27zU1sh07JMls69bojADaBw0AUCTc+/eXjxkjO/BAqaTknx8+eLBs0CBp0CApk2n8UZJEKi+XNm/O/rl6tVRWJpWVyV99VfbCC2bbtkVvK4C2owEACpB7z57SuHHyCRNk48ZJY8ZIQ4e2z09fs0ZavlxaskRauFBautTs3XejxwRAy9AAAAXAPZORjx0rO+kk6cQTpSOOkN4/hB+uulpaulQ+a5Y0e7bs7383S5LoVAAAFCT3Tp3cS0vd777b/c03vWC88Yb7XXe5T5ni3qlT9DgCAFAQ3A86yP2227KFtNBt2uTJz3/uPmpU9LgCAJA6nnTt6slXvuK+cGF0yc6fBQvczznHky5doscbAIBQnvTt637ZZe5r10aX5/azaZP7jBnuAwdGjz8AAO3KfcAA9x/9yH379uhyHOedd9xvuMG9f//o/QEAQF659+rlft117lu3Rpff9NiyxX369OyljQAAFBF3M0++9CX3srLocpte69d7ct557sblyQCAwud+6KGeLF4cXV4Lx1NPeTJmTPR+AwCgVdy7d89OdqusjC6phae62v2mm9y7d4/ejwAANJsn48e7v/xydBkteMnKlZ4ccUT0/gQAoFHZ1fuuuYZ3/blUXZ09ksKqggCAFHLfZ5/sYjfIi2TePPe9947ez0CxYLYtkAOeTJggmzlT+sQnorMUt7fekqZONZs3LzoJUOgybX8IoGPz5NJLZXPnUvzbw557SrNnu198cXQSAEAHlT3ff/vt0UfGO67bb3fP8CYGaCVOAQCt4N6rl/T730unnRadpWN76CHpK18xe/fd6CRAoaEBAFrIk969ZX/6kzRlSnQWSNKCBfJTTrHM9u3RSYBCQgMAtID7gAHyWbNk48dHZ8FHPfOMdMIJZuXl0UmAQkEDADRT9va1c+dKhxwSnQX18Oeek5WWmm3dGh0FKARMoAGawZO+faXZsyn+KWaHHirNnu1Jnz7RUYBCQAMANMG9Z0/Zn/8ssSRt+o0bJ3vkEfcePaKTAGlHAwA0InuZ2e9+J02YEJ0FzTVpkjRzJksHA42jAQAadeut0umnR6dAS51yivzmm6NTAGnGJECgAe7f/KZ0xx3ROdAW3/iG2V13RacA0ogGAKiH+9FHS/PmSV27RmdBW1RXyz/7WcssWBCdBEgbGgDgY7J3nHvmGWmffaKzIBfeeEMaO9Zs48boJECaMAcA+IjsxLH776f4F5O995b/7nfcNwCojV8IoJbp05nxX4Rs8mTp6qujYwBpwikA4H2efOYzskWLpC5dorMgH2pq5BMmWGbJkugkQBrQAACSsgvHPPecNHx4dBbk08qV8sMOs0xlZXQSIBqnAABJ0vXXU/w7glGjZNdeG50CSAOOAKDD8+SQQ2RLl3Lov6OoqZGOOMLsueeikwCROAKADs3dTPqP/6D4dySdO0t33JHd90DHxS8AOjRPzj1Xdu+90TnyvJUurVsnf/llac0a6Z13ZLt2Sbt2ZT/fq5e8Vy+pXz+ppEQ2fLi0337RqfNv6lSzP/whOgUQhQYAHZZ7r17Syy9Ln/xkdJbcbtiuXbIFC6R58+Tz58tefNHsg2LfgrHx0aNlkydLU6bIJ0yQ9eoVvWm5tXatNHKk2e7d0UkAAO3I/brrvGhUVLjff78np57qSe5PZ3jStav7aae5P/BA9mcVi2nTop+HAIB25D5ggPvWrdHlp+3WrXP/9rfdBwxo37G74gr3DRuit77tyss96dcv+vkIAGgn7j/6UXTpaZvXX/fk3//dk7ibFXnSrZv7RRe5l5VFj0bbXH999PMRANAOsu9gt2+PLjuts3u3+/XXu3fvHj2OH45njx7uN9xQuKcGtm3jKAAAdADu06ZFl5xWSR591P2AA6LHr8FxTQ480JM5c6KHqXVje+WV0eMHAMgjT7p0yZ43LyTV1e4zZhTC3ezczdwvu8y9qip61Fpm/frI0ykAgDzz5Nxzo0tNywtT4d2d0JOJE903bowevZY555zocQMA5In7U09Fl5lmS1au9KRwF+TxZOhQ91Wrooex+Z58MnrMAAB54D5qVHSJab6//c2TPfaIHrO2j/nAge6LFkWPZvMddFD0mAHtJfXnFIHcufDC6ATN4kuWyEtLLfP229FR2spsyxb5CSdIS5dGZ2kW/9rXoiMAAHLIvVMn9zfeiH5/2bRXXvFkzz2jxyvn458MHuzJypXRo9u0TZvcO3WKHi+gPXAEAB3E5MnSXntFp2jchg3y446zzFtvRSfJNcts3iw76SRp06boLI3be2+p8CZdAq1BA4COwc8+OzpC42pq5FOnWmbt2ugk+WJWViafOlWqqYnO0rizzopOAADIAfdMxv2tt6IPLjeu49yUxn369OjRbtzGje7GnVIBoNB5Mm5cdElpVPLoo4WwyE/O9odnMulfMfDww6PHCci3DvOigw7MTjwxOkLDKiulSy81S5LoJO0lu60XXihVVERnaVianzNAbtAAoANI84v5jTda5pVXolO0N8u89pr0s59F52hYmp8zQG5wngtFzb1nT2nbNqlLl+gsdcO9/rrs4IPN0vxOOI+b7z16SCtXSkOHRmepq7JS6t+/o+4bdAwcAUCRGz8+lcVfknTTTR25wJjt3i3dfHN0jvp16yY/4ojoFEA+0QCguPkxx0RHqN/69dK990anCOe//a20YUN0jHoZ6wGguNEAoLjZuHHREep3yy2WqayMThEtOwY//3l0jvqNHx+dAMgn5gCgqLmvXSsNGRKdo7aqKmmffczKy6OTpIH7wIHSxo1St27RWWpbvdps//2jUwD5whEAFC33/v2lffeNzlE32MMPU/w/ZLZli/SXv0TnqKukxJO+faNTAPlCA4Di5WPGSGlc0e2//is6QfqkcUzMZKNHR6cA8oUGAMXLDjwwOkJdO3dKf/1rdIrU8b/8RXr33egYdaXxOQTkBg0AilhJSXSCuhYutExVVXSKtLFMZaV80aLoHHUNGxadAMgXGgAU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"/>
                                        </defs>
                                    </svg>
                                </div>
                                <span class="marks__mark freeze"></span>
                            </div>
                            <h5 class="card__title">
                                <span class="title__text-card"><?php echo $product['title'];?></span>
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
                        <?php endforeach;?>
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
<?php endif;?>