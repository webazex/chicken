<?php
//if(!empty($args['sep'])){
//    $sep = $args['sep'];
//}else{
//    $sep = ' » ';
//}
if(!empty($args['loc'])){
    $loc = $args['loc'];
}else{
    $loc = [
        'home'       => __('Главная', 'chicken'),
        'paged'      => __('Страница %d', 'chicken'),
        '_404'       => __('Ошибка 404', 'chicken'),
        'search'     => __('Результаты поиска по запросу - <b>%s</b>', 'chicken'),
        'author'     => __('Архив автора: <b>%s</b>', 'chicken'),
        'year'       => __('Архив за <b>%d</b> год', 'chicken'),
        'month'      => __('Архив за: <b>%s</b>', 'chicken'),
        'day'        => __('Архив за <b>%d</b> день', 'chicken'),
        'attachment' => __('Медиа: %s', 'chicken'),
        'tag'        => __('Записи по метке: <b>%s</b>', 'chicken'),
        'tax_tag'    => __('%1$s из "%2$s" по тегу: <b>%3$s</b>', 'chicken')
    ];
}
//if(!empty($args['params'])){
//    $p = $args['params'];
//}else{
//    $p = [];
//}

    if (function_exists('kama_breadcrumbs')) kama_breadcrumbs("/", $loc, [
        'show_post_title' => true,
        'show_term_title' => true,
    ]);
?>