<?php
    $dataSwitch = pll_the_languages(['raw' => 1]);
    $html = '';
    foreach ($dataSwitch as $k => $item) {
        if($item['current_lang'] == 1){
            $html.= '<a href="'.$item['url'].'" class="lang-item active">'.$item['slug'].'</a>';
        }else{
            $html.= '<a href="'.$item['url'].'" class="lang-item">'.$item['slug'].'</a>';
        }
    }
?>
<div class="header-container__lang-switcher">
    <?php echo $html; ?>
</div>
