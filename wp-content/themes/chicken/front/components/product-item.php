<?php $product = $args; ?>
<div class="tab-contents__card" data-card-id="<?php echo $product['id']; ?>">
    <a href="<?php the_permalink($product['id']);?>" class="card__container-link">
        <img src="<?php echo $product['src'];?>" class="card__image" alt="">
        <div class="card__marks">
            <div class="marks__mark-row">
                <?php if($product['status'] == 1):?>
                    <span class="mark-row__text cold"><?php _e('Охолоджений продукт', 'chicken'); ?></span>
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="35" y="35" width="32" height="32" rx="16" transform="rotate(-180 35 35)" fill="#225FE4"/>
                        <rect x="36.5" y="36.5" width="35" height="35" rx="17.5" transform="rotate(-180 36.5 36.5)" stroke="#225FE4" stroke-opacity="0.25" stroke-width="3"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9998 9C19.4361 9 19.7898 9.3444 19.7898 9.76923L19.7898 28.2308C19.7898 28.6556 19.4361 29 18.9998 29C18.5635 29 18.2098 28.6556 18.2098 28.2308L18.2098 9.76923C18.2098 9.3444 18.5635 9 18.9998 9Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M27.894 14C28.1122 14.3679 27.9827 14.8384 27.6049 15.0508L11.1851 24.2816C10.8073 24.494 10.3241 24.3679 10.106 24C9.88782 23.6321 10.0173 23.1616 10.3951 22.9492L26.8149 13.7184C27.1927 13.506 27.6759 13.6321 27.894 14Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M27.894 24C27.6759 24.3679 27.1927 24.494 26.8149 24.2816L10.3951 15.0508C10.0173 14.8384 9.88782 14.3679 10.106 14C10.3241 13.6321 10.8073 13.506 11.1851 13.7184L27.6049 22.9492C27.9827 23.1616 28.1122 23.6321 27.894 24Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.689 11.4247C15.9135 11.0605 16.3988 10.9423 16.7729 11.1609L18.9998 12.4619L21.2267 11.1609C21.6008 10.9423 22.086 11.0605 22.3105 11.4247C22.535 11.789 22.4137 12.2615 22.0395 12.4801L18.9998 14.256L15.96 12.4801C15.5859 12.2615 15.4646 11.789 15.689 11.4247Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.689 26.5753C15.9135 26.9395 16.3988 27.0577 16.7729 26.8391L18.9998 25.5381L21.2267 26.8391C21.6008 27.0577 22.086 26.9395 22.3105 26.5753C22.535 26.211 22.4137 25.7385 22.0395 25.5199L18.9998 23.744L15.96 25.5199C15.5859 25.7385 15.4646 26.211 15.689 26.5753Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6071 18.0042C10.3954 17.6327 10.5329 17.1645 10.9144 16.9583L13.185 15.7309L13.1413 13.2026C13.1339 12.7778 13.4816 12.4277 13.9179 12.4205C14.3541 12.4134 14.7137 12.7519 14.721 13.1767L14.7807 16.628L11.6813 18.3034C11.2998 18.5096 10.8189 18.3756 10.6071 18.0042Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.0817 25.5794C24.5179 25.5723 24.8656 25.2221 24.8583 24.7974L24.8146 22.269L27.0852 21.0417C27.4666 20.8355 27.6042 20.3672 27.3924 19.9958C27.1807 19.6243 26.6998 19.4904 26.3183 19.6966L23.2189 21.372L23.2785 24.8232C23.2859 25.248 23.6455 25.5866 24.0817 25.5794Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9179 25.5794C13.4816 25.5723 13.1339 25.2221 13.1413 24.7974L13.185 22.269L10.9144 21.0417C10.5329 20.8355 10.3954 20.3672 10.6071 19.9958C10.8189 19.6243 11.2998 19.4904 11.6813 19.6966L14.7807 21.372L14.721 24.8232C14.7137 25.248 14.3541 25.5866 13.9179 25.5794Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M27.3924 18.0042C27.6042 17.6327 27.4666 17.1645 27.0852 16.9583L24.8146 15.7309L24.8583 13.2026C24.8656 12.7778 24.5179 12.4277 24.0817 12.4205C23.6455 12.4134 23.2859 12.7519 23.2785 13.1767L23.2189 16.628L26.3183 18.3034C26.6998 18.5096 27.1807 18.3756 27.3924 18.0042Z" fill="white"/>
                    </svg>
                <?php elseif ($product['status'] == 2): ?>
                    <span class="mark-row__text freeze"><?php _e('Заморожений продукт', 'chicken'); ?></span>
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="35" y="35" width="32" height="32" rx="16" transform="rotate(-180 35 35)" fill="#0AAE5E"/>
                        <rect x="36.5" y="36.5" width="35" height="35" rx="17.5" transform="rotate(-180 36.5 36.5)" stroke="#0AAE5E" stroke-opacity="0.25" stroke-width="3"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6315 24.9175C14.6315 26.6199 16.1664 28 18.0598 28C19.9532 28 21.4881 26.6199 21.4881 24.9175V24.7273C21.4881 22.9198 19.8585 21.4545 17.8482 21.4545H8.88881C8.39793 21.4545 8 21.8123 8 22.2537C8 22.6951 8.39793 23.0529 8.88881 23.0529H17.8482C18.8767 23.0529 19.7105 23.8025 19.7105 24.7273V24.9175C19.7105 25.7372 18.9715 26.4017 18.0598 26.4017C17.1482 26.4017 16.4092 25.7372 16.4092 24.9175V24.7273C16.4092 24.2859 16.0112 23.9281 15.5204 23.9281C15.0295 23.9281 14.6315 24.2859 14.6315 24.7273V24.9175Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6315 13.0825C14.6315 11.3801 16.1664 10 18.0598 10C19.9532 10 21.4881 11.3801 21.4881 13.0825V13.2727C21.4881 15.0802 19.8585 16.5455 17.8482 16.5455H8.88881C8.39793 16.5455 8 16.1877 8 15.7463C8 15.3049 8.39793 14.9471 8.88881 14.9471H17.8482C18.8767 14.9471 19.7105 14.1975 19.7105 13.2727V13.0825C19.7105 12.2628 18.9715 11.5983 18.0598 11.5983C17.1482 11.5983 16.4092 12.2628 16.4092 13.0825V13.2727C16.4092 13.7141 16.0112 14.0719 15.5204 14.0719C15.0295 14.0719 14.6315 13.7141 14.6315 13.2727V13.0825Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.1299 16.3552C23.1299 14.6528 24.6678 13.2727 26.5649 13.2727C28.4621 13.2727 30 14.6528 30 16.3552V16.5455C30 18.3529 28.3671 19.8182 26.3529 19.8182H8.89057C8.39872 19.8182 8 19.4604 8 19.019C8 18.5777 8.39872 18.2199 8.89057 18.2199H26.3529C27.3834 18.2199 28.2189 17.4702 28.2189 16.5455V16.3552C28.2189 15.5355 27.4784 14.871 26.5649 14.871C25.6515 14.871 24.911 15.5355 24.911 16.3552V16.5455C24.911 16.9868 24.5123 17.3446 24.0205 17.3446C23.5286 17.3446 23.1299 16.9868 23.1299 16.5455V16.3552Z" fill="white"/>
                    </svg>
                <?php endif;?>
            </div>
        </div>
        <h5 class="card__title">
            <span class="title__text-card"><?php echo $product['title'];?></span>
        </h5>
        <div class="card__properties">
            <?php if(!empty($product['conditions'])): ?>
                <div class="properties__property-row">
                    <?php foreach($product['conditions'] as $condition):
                        foreach ($condition as $item):?>
                            <div class="property-row__property">
                                <?php echo($item); ?>
                            </div>
                        <?php endforeach; endforeach;?>
                </div>
            <?php endif; if(!empty($product['nutritional'])):?>
                <div class="properties__property-row">
                    <?php foreach ($product['nutritional'] as $nutrition):
                        foreach ($nutrition as $k => $item):?>
                            <div class="property-row__box">
                                <div class="box__row">

                                    <?php
                                    $html = explode(" ", $item);
                                    foreach ($html as $span):
                                        ?><span class="row__value"><?php echo $span; ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <span class="box__property-name"><?php echo $k;?></span>
                            </div>
                        <?php endforeach; endforeach;?>
                </div>
            <?php endif; ?>
        </div>
    </a>
    <span class="card__more">
        <span class="more__text"><?php _e('Детальніше', 'chicken'); ?></span>
        <span class="more__icon"></span>
    </span>
</div>
