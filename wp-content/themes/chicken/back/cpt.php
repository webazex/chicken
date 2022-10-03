<?php
add_action( 'init', 'register_post_types' );
function register_post_types(){
	//products-cats
	register_taxonomy( 'p-cats', [ 'products' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => __('Всі категорії', 'chicken'),
			'singular_name'     => __('Категорія', 'chicken'),
			'search_items'      => __('Пошук категорій', 'chicken'),
			'all_items'         => __('Всі категорії', 'chicken'),
			'view_item '        => __('Переглянути категорію', 'chicken'),
			'parent_item'       => __('Parent Category', 'chicken'),
			'parent_item_colon' => __('Parent Category:', 'chicken'),
			'edit_item'         => __('Редагувати категорію', 'chicken'),
			'update_item'       => __('Оновити категорію', 'chicken'),
			'add_new_item'      => __('Додати нову категорію', 'chicken'),
			'new_item_name'     => __('Нова назва категорії', 'chicken'),
			'menu_name'         => __('Категорії', 'chicken'),
			'back_to_items'     => __('← Повернутись до категорій', 'chicken'),
		],
		'description'           => __('Категорії Продуктів', 'chicken'), // описание таксономии
		'public'                => true,
		 'publicly_queryable'    => true, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => true,
		'query_var'             => true, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

    register_taxonomy( 'p-tags', [ 'products' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => __('Теги', 'chicken'),
            'singular_name'     => __('Тег', 'chicken'),
            'search_items'      => __('Пошук тегів', 'chicken'),
            'all_items'         => __('Всі теги', 'chicken'),
            'view_item '        => __('Переглянути тег', 'chicken'),
            'parent_item'       => __('Parent tag', 'chicken'),
            'parent_item_colon' => __('Parent tag:', 'chicken'),
            'edit_item'         => __('Редагувати тег', 'chicken'),
            'update_item'       => __('Оновити тег', 'chicken'),
            'add_new_item'      => __('Додати новий тег', 'chicken'),
            'new_item_name'     => __('Новий тег', 'chicken'),
            'menu_name'         => __('Теги продуктів', 'chicken'),
            'back_to_items'     => __('← Повернутись до тегів', 'chicken'),
        ],
        'description'           => __('Теги продуктів', 'chicken'), // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => false,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );
	//products
	register_post_type( 'products', [
		'label'  => null,
		'labels' => [
			'name'               => __('Продукція', 'chicken'), // основное название для типа записи
			'singular_name'      => __('Продукт', 'chicken'), // название для одной записи этого типа
			'add_new'            => __('Додати продукт', 'chicken'), // для добавления новой записи
			'add_new_item'       => __('Додати назву продукту', 'chicken'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Редагувати продукт', 'chicken'), // для редактирования типа записи
			'new_item'           => __('Новий продукт', 'chicken'), // текст новой записи
			'view_item'          => __('Переглянути продукцію', 'chicken'), // для просмотра записи этого типа.
			'search_items'       => __('Пошук продукції', 'chicken'), // для поиска по этим типам записи
			'not_found'          => __('Не знайдено', 'chicken'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Не знайдено у видаленних', 'chicken'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => __('Продукція', 'chicken'), // название меню
		],
		'description'         => '',
		'public'              => true,
		 'publicly_queryable'  => true, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		 'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-cart',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => true,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
//		'query_var'           => true,
	] );

	//receipes-tags
    register_taxonomy( 'r-tags', [ 'recipes' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => __('Типи страв', 'chicken'),
            'singular_name'     => __('Типи страв', 'chicken'),
            'search_items'      => __('Search type', 'chicken'),
            'all_items'         => __('All types', 'chicken'),
            'view_item '        => __('View types', 'chicken'),
            'parent_item'       => __('Parent types', 'chicken'),
            'parent_item_colon' => __('Parent types:', 'chicken'),
            'edit_item'         => __('Edit type', 'chicken'),
            'update_item'       => __('Update type', 'chicken'),
            'add_new_item'      => __('Add new type', 'chicken'),
            'new_item_name'     => __('New type name', 'chicken'),
            'menu_name'         => __('Types of dish', 'chicken'),
            'back_to_items'     => __('← Back to Categories', 'chicken'),
        ],
        'description'           => __('Products Categories', 'chicken'), // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => false,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );
    register_taxonomy( 'ingridients', [ 'recipes' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => __('Інгрідієнти', 'chicken'),
            'singular_name'     => __('Інгрідієнт', 'chicken'),
            'search_items'      => __('Знайти інгрідієнт', 'chicken'),
            'all_items'         => __('Всі інгрідієнти', 'chicken'),
            'view_item '        => __('Показади інгрідієнт', 'chicken'),
            'parent_item'       => __('Parent types', 'chicken'),
            'parent_item_colon' => __('Parent types:', 'chicken'),
            'edit_item'         => __('Редагувати інгрідієнт', 'chicken'),
            'update_item'       => __('Обновити інгрідієнт', 'chicken'),
            'add_new_item'      => __('Додати новий інгрідієнт', 'chicken'),
            'new_item_name'     => __('Назва нового інгрідієнту', 'chicken'),
            'menu_name'         => __('Інгрідієнти', 'chicken'),
            'back_to_items'     => __('← Назад до інгрідієнтів', 'chicken'),
        ],
        'description'           => __('Інгрідієнти', 'chicken'), // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => false,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );

	//recipes
	register_post_type( 'recipes', [
		'label'  => null,
		'labels' => [
			'name'               => __('Рецепти', 'chicken'), // основное название для типа записи
			'singular_name'      => __('Рецепт', 'chicken'), // название для одной записи этого типа
			'add_new'            => __('Додати рецепт', 'chicken'), // для добавления новой записи
			'add_new_item'       => __('Додати назву рецепту', 'chicken'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Редагувати рецепт', 'chicken'), // для редактирования типа записи
			'new_item'           => __('Новий рецепт', 'chicken'), // текст новой записи
			'view_item'          => __('Переглянути рецепт', 'chicken'), // для просмотра записи этого типа.
			'search_items'       => __('Пошук рецептів', 'chicken'), // для поиска по этим типам записи
			'not_found'          => __('Не знайдено', 'chicken'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Не знайдено у видаленних', 'chicken'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => __('Рецепти', 'chicken'), // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-media-text',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	//news and promotions tags
	register_taxonomy( 'nap-tags', [ 'nap' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => __('Теги', 'chicken'),
			'singular_name'     => __('тег', 'chicken'),
			'search_items'      => __('Пошук тегів', 'chicken'),
			'all_items'         => __('Всі теги', 'chicken'),
			'view_item '        => __('Переглянути тег', 'chicken'),
			'parent_item'       => __('Parent tag', 'chicken'),
			'parent_item_colon' => __('Parent tag:', 'chicken'),
			'edit_item'         => __('Редагувати тег', 'chicken'),
			'update_item'       => __('Оновити тег', 'chicken'),
			'add_new_item'      => __('Додати новий тег', 'chicken'),
			'new_item_name'     => __('Новий тег', 'chicken'),
			'menu_name'         => __('Теги', 'chicken'),
			'back_to_items'     => __('← Повернутись до тегів', 'chicken'),
		],
		'description'           => __('Теги новин та акцій', 'chicken'), // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
	//news and promotions
	register_post_type( 'nap', [
		'label'  => null,
		'labels' => [
			'name'               => __('Новини та акції', 'chicken'), // основное название для типа записи
			'singular_name'      => __('Статті', 'chicken'), // название для одной записи этого типа
			'add_new'            => __('Додати статтю', 'chicken'), // для добавления новой записи
			'add_new_item'       => __('Додати назву статті', 'chicken'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Редагувати статтю', 'chicken'), // для редактирования типа записи
			'new_item'           => __('Нова стаття', 'chicken'), // текст новой записи
			'view_item'          => __('Переглянути статтю', 'chicken'), // для просмотра записи этого типа.
			'search_items'       => __('Пошук статтей', 'chicken'), // для поиска по этим типам записи
			'not_found'          => __('Не знайдено', 'chicken'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Не знайдено у видаленних', 'chicken'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => __('Новини та акції', 'chicken'), // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-buddicons-groups',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
//		'query_var'           => true,
	] );
}