<?php
    $content = $args['fields'];
    $properties = $content['properties'];
?>
<main>
    <section>
        <div class="receipt-container">
            <div class="receipt-container__article">
                <div class="article__info-row">
                    <?php if(!empty($properties)):?>
                    <div class="info-row__properties">
                        <?php
                            foreach ($properties as $property):
                                $src = $property['icon'];
                                foreach ($property as $k => $item):
                                switch ($k):
                                    case "complexity":?>
                                        <div class="properties__property">
                                            <img src="<?php echo $src;?>" class="property__icon" alt="icon">
                                            <span><?php echo $item['label'];?></span>
                                        </div>
                                        <?php
                                    break;
                                    case "time": ?>
                                        <div class="properties__property">
                                            <img src="<?php echo $src;?>" class="property__icon" alt="icon">
                                            <span><?php echo $item; ?></span>
                                        </div>
                        <?php break;
                        case "portioning": ?>
                        <div class="properties__property">
                            <img src="<?php echo $src;?>" class="property__icon" alt="icon">
                            <span><?php echo $item;?></span>
                        </div>
                        <?php break; endswitch; endforeach; endforeach;?>
                    </div>
                    <?php endif;?>
                    <?php
                        if(!empty($content['receipt-content-group']['file'])):
                            $parsed = parse_url( wp_get_attachment_url( $content['receipe-group']['file']) );
                            $url    = dirname( $parsed['path'] ) . '/' . rawurlencode( basename( $parsed['path'] ) );
                    ?>
                    <a href="<?php echo $url?>" class="info-row__download-link">
                        <span><?php _e('Завантажити рецепт', 'chicken'); ?></span>
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 21.5C5.20101 21.5 0.500001 16.799 0.500001 11C0.500002 5.20101 5.20101 0.499999 11 0.5C16.799 0.5 21.5 5.20101 21.5 11C21.5 16.799 16.799 21.5 11 21.5Z" stroke="#E50746"/>
                            <path d="M11 5L11 16M11 16L7 11.4237M11 16L15 11.4237" stroke="#E50746"/>
                        </svg>
                    </a>
                    <?php endif;?>
                </div>
                <div class="article__title-row">
                    <h1 class="title-row__receipe-title">
                        <?php echo $content['general-info']['title']; ?>
                    </h1>
                    <?php $peppersLvl = ($properties['row']['complexity']['value'])? intval($properties['row']['complexity']['value']) : 0;?>
                    <div class="title-row__peppers-box">
                        <?php for($i = 1; $i <= 3; $i++): if($i <= $peppersLvl):?>
                        <svg width="10" height="25" viewBox="0 0 10 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.53347 7.93161C9.82352 7.86618 10.0283 7.62196 9.99681 7.34474C9.9488 6.92149 9.83631 6.50605 9.66208 6.1113C9.42347 5.57071 9.07374 5.07951 8.63285 4.66575C8.19196 4.252 7.66854 3.92379 7.09249 3.69987C6.51644 3.47594 5.89904 3.36069 5.27552 3.36069C4.65201 3.36069 4.0346 3.47594 3.45855 3.69987C2.8825 3.92379 2.35909 4.252 1.9182 4.66575C1.47731 5.07951 1.12758 5.57071 0.88897 6.1113C0.714738 6.50605 0.602249 6.92149 0.554233 7.34474C0.522784 7.62196 0.727523 7.86618 1.01757 7.93161C1.91833 8.13482 3.87327 8.53576 5.27552 8.53576C6.67777 8.53576 8.63272 8.13482 9.53347 7.93161Z" fill="#E52F07"/>
                            <path d="M1.41199 9.21205C0.994797 9.12399 0.588599 9.40644 0.580744 9.80595C0.519543 12.9189 0.277229 23.3078 0.00199238 24.8853C-0.107433 25.5124 4.31556 23.5744 7.10209 18.927C8.90747 15.9159 9.66385 11.6946 9.91786 9.89567C9.97757 9.47282 9.56007 9.1384 9.11431 9.23052C8.10909 9.43824 6.4726 9.73111 5.25354 9.72685C4.03298 9.72258 2.38517 9.41749 1.41199 9.21205Z" fill="#E52F07"/>
                            <path d="M5.27423 1.60374C4.62389 2.42926 4.53794 3.91787 4.54221 4.70478C4.54385 5.0056 4.79512 5.24507 5.11577 5.27255L5.16672 5.27692C5.57501 5.31192 5.92334 4.9937 5.93397 4.61079C5.95253 3.9419 6.06675 2.9745 6.5305 2.41138C7.08085 1.74308 8.30493 1.42383 9.11006 1.28095C9.50951 1.21007 9.78707 0.841944 9.68837 0.473451L9.68197 0.449522C9.60224 0.151854 9.30147 -0.0443622 8.97796 0.0086411C8.01042 0.167163 6.06443 0.600696 5.27423 1.60374Z" fill="#E52F07"/>
                        </svg>
                        <?php else: ?>
                        <svg width="11" height="25" viewBox="0 0 11 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.4868 7.93161C10.8059 7.86618 11.0311 7.62196 10.9965 7.34474C10.9437 6.92149 10.8199 6.50605 10.6283 6.1113C10.3658 5.57071 9.98111 5.07951 9.49613 4.66575C9.01115 4.252 8.4354 3.92379 7.80174 3.69987C7.16809 3.47594 6.48894 3.36069 5.80308 3.36069C5.11721 3.36069 4.43806 3.47594 3.80441 3.69987C3.17075 3.92379 2.595 4.252 2.11002 4.66575C1.62504 5.07951 1.24034 5.57071 0.977867 6.1113C0.786212 6.50605 0.662474 6.92149 0.609656 7.34474C0.575062 7.62196 0.800276 7.86618 1.11933 7.93161C2.11016 8.13482 4.2606 8.53576 5.80308 8.53576C7.34555 8.53576 9.49599 8.13482 10.4868 7.93161Z" fill="#F8C1B5"/>
                            <path d="M1.55319 9.21205C1.09428 9.12399 0.647459 9.40644 0.638819 9.80595C0.571497 12.9189 0.304952 23.3078 0.00219161 24.8853C-0.118177 25.5124 4.74711 23.5744 7.81229 18.927C9.79822 15.9159 10.6302 11.6946 10.9096 9.89567C10.9753 9.47282 10.5161 9.1384 10.0257 9.23052C8.91999 9.43824 7.11986 9.73111 5.7789 9.72685C4.43627 9.72258 2.62368 9.41749 1.55319 9.21205Z" fill="#F8C1B5"/>
                            <path d="M5.80166 1.60374C5.08628 2.42926 4.99174 3.91787 4.99643 4.70478C4.99823 5.0056 5.27463 5.24507 5.62735 5.27255L5.68339 5.27692C6.13251 5.31192 6.51567 4.9937 6.52736 4.61079C6.54778 3.9419 6.67342 2.9745 7.18355 2.41138C7.78894 1.74308 9.13542 1.42383 10.0211 1.28095C10.4605 1.21007 10.7658 0.841944 10.6572 0.473451L10.6502 0.449522C10.5625 0.151854 10.2316 -0.0443622 9.87576 0.0086411C8.81146 0.167163 6.67088 0.600696 5.80166 1.60374Z" fill="#F8C1B5"/>
                        </svg>
                        <?php endif; endfor;?>
                    </div>
                </div>
                <h2><?php echo $content['general-info']['subtitle'];?></h2>
                <article>
                    <p class="desc">
                        <?php echo $content['general-info']['story'];?>
                    </p>
                    <img src="<?php echo $content['general-info']['image'];?>" alt="" class="article-thumbnail-img">
                    <div class="receipt-tabs-section">
                        <div class="receipt-tabs-section__row-tabs">
                            <div class="row-tabs__tab">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2341 0.802904C9.99034 1.47801 8.26685 3.2558 7.68717 5.49309L6.33002 10.6562C6.11101 11.4895 6.17349 12.3703 6.5077 13.1659L4.51149 15.4204C4.0294 15.1977 3.48767 15.1323 2.96528 15.2336C2.44284 15.3349 1.96684 15.5977 1.60662 15.9837C1.22833 16.4043 1.01364 16.9431 1.00063 17.5047C0.987616 18.0662 1.177 18.6141 1.53548 19.0514C1.89378 19.4886 2.39805 19.7868 2.95859 19.8932C3.18718 20.5436 3.69018 21.0654 4.33826 21.3245C4.98638 21.5836 5.71655 21.5547 6.34139 21.2453C6.9664 20.936 7.42508 20.3761 7.60014 19.7097C7.77499 19.0432 7.64907 18.3347 7.25444 17.7663L9.25407 15.5073C9.66749 15.6178 10.0963 15.6623 10.524 15.639C10.9621 15.6094 11.3924 15.51 11.7983 15.3452L16.8105 13.3158L16.8105 13.3157C18.9781 12.4379 20.5292 10.5181 20.9101 8.24223C21.2907 5.9661 20.4469 3.65832 18.6795 2.14306C16.9159 0.620017 14.4731 0.112311 12.2344 0.803252L12.2341 0.802904ZM5.98573 17.5047C5.85207 17.6663 5.73086 17.7393 5.66078 17.9462C5.69289 18.1521 5.72759 18.269 5.90445 18.3837C6.0953 18.5542 6.21077 18.7915 6.22586 19.0448C6.2411 19.2982 6.15488 19.5474 5.98573 19.7389C5.81486 19.9313 5.57354 20.0491 5.3145 20.0668C5.05546 20.0844 4.79989 20.0004 4.60372 19.8329C4.40756 19.6656 4.28674 19.4285 4.26781 19.1737C4.245 18.9914 4.15456 18.8238 4.01389 18.7032C3.87321 18.5826 3.69217 18.5175 3.50547 18.5204C3.24728 18.534 2.99343 18.449 2.79724 18.2831C2.60324 18.1141 2.48467 17.8767 2.46692 17.6224C2.44915 17.368 2.53361 17.1168 2.70229 16.9233C2.87391 16.7346 3.11273 16.6184 3.36923 16.599C3.62588 16.5796 3.87994 16.6585 4.07889 16.819C4.21758 16.9764 4.29964 17.0125 4.51149 17.0153C4.67956 16.9463 4.7118 16.7527 4.85478 16.599L7.00087 14.1752C7.08479 14.2611 7.49857 14.584 7.59114 14.6634C7.68371 14.7428 8.03938 15.0025 8.138 15.073L5.98573 17.5047ZM19.475 8.01044C19.1822 9.79993 17.9623 11.3095 16.2564 11.9931L11.2446 14.0218C10.6462 14.2642 9.97743 14.2784 9.36902 14.0615C8.76045 13.8445 8.25604 13.412 7.95447 12.8486C7.65274 12.2851 7.57553 11.6313 7.73777 11.0148L9.09476 5.85173C9.54976 4.09517 10.9029 2.69951 12.6644 2.16954C13.0614 2.04809 13.4715 1.97235 13.8863 1.94416C15.5033 1.84046 17.08 2.46864 18.1683 3.64999C19.2568 4.83144 19.7378 6.43704 19.4748 8.01052L19.475 8.01044Z" fill="#E50746"/>
                                    <path d="M14.8772 4.05983C14.8772 4.40259 14.5948 4.68045 14.2464 4.68045C13.898 4.68045 13.6156 4.40259 13.6156 4.05983C13.6156 3.71708 13.898 3.43922 14.2464 3.43922C14.5948 3.43922 14.8772 3.71708 14.8772 4.05983Z" fill="#E50746"/>
                                    <path d="M14.0362 6.61125C14.0362 6.95401 13.7537 7.23187 13.4054 7.23187C13.057 7.23187 12.7746 6.95401 12.7746 6.61125C12.7746 6.2685 13.057 5.99064 13.4054 5.99064C13.7537 5.99064 14.0362 6.2685 14.0362 6.61125Z" fill="#E50746"/>
                                    <path d="M12.284 4.88732C12.284 5.23008 12.0016 5.50794 11.6532 5.50794C11.3048 5.50794 11.0224 5.23008 11.0224 4.88732C11.0224 4.54457 11.3048 4.26671 11.6532 4.26671C12.0016 4.26671 12.284 4.54457 12.284 4.88732Z" fill="#E50746"/>
                                </svg>
                                <span><?php _e('Що потрібно', 'chicken'); ?></span>
                            </div>
                            <div class="row-tabs__tab">
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
                                <span><?php _e('Як готувати', 'chicken'); ?></span>
                            </div>
                        </div>
                        <div class="tab-targeted">
                            <div class="tab-targeted__item">
                                <div class="receipt-tabs-section__content-tabs">
                                    <?php
                                    if(!empty($content['first-i'])):
//                                        $ingridient = get_term($content['first-i']['text-group']['name']);
                                        ?>
                                        <div class="content-tabs__ingridient">
                                            <img src="<?php echo $content['first-i']['image']?>" alt="<?php echo $content['first-i']['text-group']['name'];?>">
                                            <a href="<?php echo $content['first-i']['text-group']['i-link'];?>" class="ingridient__title-link"><?php echo $content['first-i']['text-group']['name'];?><span class="ingridient__title-link-icon"></span></a>
                                            <span class="ingridient__subtitle"><?php echo $content['first-i']['text-group']['count']?></span>
                                        </div>
                                    <?php
                                    endif;
                                    $otherIngridients = $content['others-ingridients'];
                                    //                            var_dump($content['others-ingridients']);
                                    if(!empty($otherIngridients)){
                                        foreach($otherIngridients as $otherIngridient){
                                            $term = get_term($otherIngridient['ingridiyent']);
                                            $iData = get_field('ihgrid-data', $term);
                                            ?>
                                            <div class="content-tabs__ingridient">
                                                <img src="<?php echo $iData['image']?>" alt="<?php echo $iData['name']?>">
                                                <span class="ingridient__title"><?php echo $term->name;?></span>
                                                <span class="ingridient__subtitle"><?php echo $otherIngridient['face']?></span>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            if(!empty($content['receipe-group']['receipe'])){
                                $editorContent = $content['receipe-group']['receipe'];
                            }else{
                                $editorContent = '<p class="empty-content">'._e("Даний рецепт вже пишеться, зачекайте будь-ласка", "chicken").'</p>';
                            }
                            ?>
                            <div class="tab-targeted__item">
                                <div class="receipt-tabs-section__content-second">
                                    <div class="content-second__content">
                                        <?php echo $editorContent;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
                <div class="article__social-row">
                    <div class="social-row__socials">
                       <?php foreach (getSharedLinks($content['repost-content']) as $link){
                         echo $link;
                       };?>
                    </div>
                    <a href="/recipes" class="socials__link"><?php _e('Всі рецепти', 'chicken');?></a>
                </div>
                <?php $recents = getRecentsReceipe(); ?>
                <div class="recents-section">
                    <h2><?php _e('Вас також може зацікавити', 'chicken'); ?></h2>
                    <div class="recents-section__grid-posts">
                        <?php
                            foreach ($recents as $recent):
                                get_template_part('front/components/receipe-item', '', $recent);
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
