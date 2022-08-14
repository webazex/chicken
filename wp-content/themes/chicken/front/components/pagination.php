<?php
$pagination = get_the_posts_pagination( [
    'show_all'           => false, // показаны все страницы участвующие в пагинации
    'end_size'           => 1,     // количество страниц на концах
    'mid_size'           => 1,     // количество страниц вокруг текущей
    'prev_next'          => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
    'prev_text'          => __('<'),
    'next_text'          => __('>'),
    'add_args'           => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
    'add_fragment'       => '',     // Текст который добавиться ко всем ссылкам.
    'screen_reader_text' => __( '' ),
    'aria_label'         => __( '' ), // aria-label="" для nav элемента. С WP 5.3
    'class'              => 'pagination',  // class="" для nav элемента. С WP 5.5
] );
//var_dump($pagination);
?>