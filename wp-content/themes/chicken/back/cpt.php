<?php
add_action( 'init', 'register_post_types' );
function register_post_types(){
	//products-cats
	register_taxonomy( 'p-cats', [ 'products' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => __('Categories', 'chicken'),
			'singular_name'     => __('Category', 'chicken'),
			'search_items'      => __('Search Categories', 'chicken'),
			'all_items'         => __('All Categories', 'chicken'),
			'view_item '        => __('View Category', 'chicken'),
			'parent_item'       => __('Parent Category', 'chicken'),
			'parent_item_colon' => __('Parent Category:', 'chicken'),
			'edit_item'         => __('Edit Category', 'chicken'),
			'update_item'       => __('Update Category', 'chicken'),
			'add_new_item'      => __('Add New Category', 'chicken'),
			'new_item_name'     => __('New Category Name', 'chicken'),
			'menu_name'         => __('Categories', 'chicken'),
			'back_to_items'     => __('← Back to Categories', 'chicken'),
		],
		'description'           => __('Products Categories', 'chicken'), // описание таксономии
		'public'                => true,
		 'publicly_queryable'    => true, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

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

    register_taxonomy( 'p-tags', [ 'products' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => __('Tags', 'chicken'),
            'singular_name'     => __('Tag', 'chicken'),
            'search_items'      => __('Search tag', 'chicken'),
            'all_items'         => __('All tags', 'chicken'),
            'view_item '        => __('View tag', 'chicken'),
            'parent_item'       => __('Parent tag', 'chicken'),
            'parent_item_colon' => __('Parent tag:', 'chicken'),
            'edit_item'         => __('Edit tag', 'chicken'),
            'update_item'       => __('Update tag', 'chicken'),
            'add_new_item'      => __('Add new tag', 'chicken'),
            'new_item_name'     => __('New tag name', 'chicken'),
            'menu_name'         => __('Products tags', 'chicken'),
            'back_to_items'     => __('← Back to tags', 'chicken'),
        ],
        'description'           => __('Products tags', 'chicken'), // описание таксономии
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
			'name'               => __('Products', 'chicken'), // основное название для типа записи
			'singular_name'      => __('Product', 'chicken'), // название для одной записи этого типа
			'add_new'            => __('Add product', 'chicken'), // для добавления новой записи
			'add_new_item'       => __('Add product title', 'chicken'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Edit product', 'chicken'), // для редактирования типа записи
			'new_item'           => __('New product', 'chicken'), // текст новой записи
			'view_item'          => __('View product', 'chicken'), // для просмотра записи этого типа.
			'search_items'       => __('Search product', 'chicken'), // для поиска по этим типам записи
			'not_found'          => __('Not found', 'chicken'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Not found in trash', 'chicken'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => __('Products', 'chicken'), // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
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
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	//receipes-tags
    register_taxonomy( 'r-tags', [ 'recipes' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => __('Types of dish', 'chicken'),
            'singular_name'     => __('Type of dish', 'chicken'),
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
			'name'               => __('Recipes', 'chicken'), // основное название для типа записи
			'singular_name'      => __('Recipe', 'chicken'), // название для одной записи этого типа
			'add_new'            => __('Add recipe', 'chicken'), // для добавления новой записи
			'add_new_item'       => __('Add recipe title', 'chicken'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Edit recipe', 'chicken'), // для редактирования типа записи
			'new_item'           => __('New recipe', 'chicken'), // текст новой записи
			'view_item'          => __('View recipe', 'chicken'), // для просмотра записи этого типа.
			'search_items'       => __('Search recipe', 'chicken'), // для поиска по этим типам записи
			'not_found'          => __('Not found', 'chicken'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Not found in trash', 'chicken'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => __('Recipes', 'chicken'), // название меню
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
			'name'              => __('Tags', 'chicken'),
			'singular_name'     => __('tag', 'chicken'),
			'search_items'      => __('Search tags', 'chicken'),
			'all_items'         => __('All tags', 'chicken'),
			'view_item '        => __('View tag', 'chicken'),
			'parent_item'       => __('Parent tag', 'chicken'),
			'parent_item_colon' => __('Parent tag:', 'chicken'),
			'edit_item'         => __('Edit tag', 'chicken'),
			'update_item'       => __('Update tag', 'chicken'),
			'add_new_item'      => __('Add new tag', 'chicken'),
			'new_item_name'     => __('New tag name', 'chicken'),
			'menu_name'         => __('Tags', 'chicken'),
			'back_to_items'     => __('← Back to tags', 'chicken'),
		],
		'description'           => __('News and Promotions tags', 'chicken'), // описание таксономии
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
			'name'               => __('News and Promotions', 'chicken'), // основное название для типа записи
			'singular_name'      => __('News or Promotion', 'chicken'), // название для одной записи этого типа
			'add_new'            => __('Add news or promotion', 'chicken'), // для добавления новой записи
			'add_new_item'       => __('Add news or promotion title', 'chicken'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Edit news or promotion', 'chicken'), // для редактирования типа записи
			'new_item'           => __('New news or promotion', 'chicken'), // текст новой записи
			'view_item'          => __('View news or promotion', 'chicken'), // для просмотра записи этого типа.
			'search_items'       => __('Search news or promotion', 'chicken'), // для поиска по этим типам записи
			'not_found'          => __('Not found', 'chicken'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Not found in trash', 'chicken'), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => __('News or Promotion', 'chicken'), // название меню
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
		'query_var'           => true,
	] );
}