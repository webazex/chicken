<section class="our-serts" id="serts">
    <div class="site-size">
        <div class="site-size__container-serts">
            <h2><?php echo $args['title'];?></h2>
            <div class="container-serts__serts">
                <?php
                    if(!empty($args['certs'])):
                        foreach ($args['certs'] as $cert):
                            ?>
                                <div class="serts__sert">
                                    <img src="<?php echo $cert['icon'];?>" alt="">
                                    <p>
                                        <?php echo $cert['text'];?>
                                    </p>
                                    <?php if(!empty($cert['file'])):?>
                                        <a href="<?php echo $cert['file']['url'];?>" download="download" class="sert__download-doc">
                                            <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19 10V7L13 0H2.00276C0.896666 0 0 0.898338 0 2.00733V24.9927C0 26.1013 0.890925 27 1.99742 27H17.0026C18.1057 27 19 26.1018 19 25.0092V23H26.9932C28.6538 23 30 21.6577 30 20.0012V12.9988C30 11.3426 28.664 10 26.9932 10H19ZM18 23V25.0066C18 25.5551 17.5523 26 17 26H1.99996C1.45471 26 1 25.5543 1 25.0045V1.99546C1 1.45526 1.44574 1 1.99558 1H12V5.99408C12 7.11344 12.8945 8 13.9979 8H18V10H10.0068C8.34621 10 7 11.3423 7 12.9988V20.0012C7 21.6574 8.33599 23 10.0068 23H18ZM13 1.5V5.99122C13 6.54835 13.4507 7 13.9967 7H17.7L13 1.5ZM9.99456 11C8.89299 11 8 11.9002 8 12.992V20.008C8 21.1081 8.90234 22 9.99456 22H27.0054C28.107 22 29 21.0998 29 20.008V12.992C29 11.8919 28.0977 11 27.0054 11H9.99456ZM23 16V14H27V13H22V20H23V17H26V16H23ZM10 15V20H11V17H12.9951C14.1024 17 15 16.1123 15 15C15 13.8954 14.1061 13 12.9951 13H10V15ZM11 14V16H13.001C13.5528 16 14 15.5561 14 15C14 14.4477 13.5573 14 13.001 14H11ZM16 13V20H18.9951C20.1024 20 21 19.1134 21 17.9941V15.0059C21 13.8981 20.1061 13 18.9951 13H16ZM17 14V19H19.001C19.5528 19 20 18.5563 20 18.0002V14.9998C20 14.4476 19.5573 14 19.001 14H17Z" fill="#E50746"/>
                                            </svg>
                                            <span>PDF, <?php echo $cert['file']['filesize']; ?></span>
                                        </a>
                                    <?php endif;?>
                                </div>
                            <?php
                        endforeach;
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>