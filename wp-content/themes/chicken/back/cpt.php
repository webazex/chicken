<?php
add_action( 'init', 'register_post_types' );
function register_post_types(){
	//products-cats
	register_taxonomy( 'p-cats', [ 'products' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => _e('Categories'),
			'singular_name'     => 'Category',
			'search_items'      => 'Search Categories',
			'all_items'         => 'All Categories',
			'view_item '        => 'View Category',
			'parent_item'       => 'Parent Category',
			'parent_item_colon' => 'Parent Category:',
			'edit_item'         => 'Edit Category',
			'update_item'       => 'Update Category',
			'add_new_item'      => 'Add New Category',
			'new_item_name'     => 'New Category Name',
			'menu_name'         => 'Categories',
			'back_to_items'     => '← Back to Categories',
		],
		'description'           => 'Products Categories', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
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
	//products
	register_post_type( 'products', [
		'label'  => null,
		'labels' => [
			'name'               => 'Products', // основное название для типа записи
			'singular_name'      => 'Product', // название для одной записи этого типа
			'add_new'            => 'Add product', // для добавления новой записи
			'add_new_item'       => 'Add product title', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit product', // для редактирования типа записи
			'new_item'           => 'New product', // текст новой записи
			'view_item'          => 'View product', // для просмотра записи этого типа.
			'search_items'       => 'Search product', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Products', // название меню
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

	//recipes
	register_post_type( 'recipes', [
		'label'  => null,
		'labels' => [
			'name'               => 'Recipes', // основное название для типа записи
			'singular_name'      => 'Recipe', // название для одной записи этого типа
			'add_new'            => 'Add recipe', // для добавления новой записи
			'add_new_item'       => 'Add recipe title', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit recipe', // для редактирования типа записи
			'new_item'           => 'New recipe', // текст новой записи
			'view_item'          => 'View recipe', // для просмотра записи этого типа.
			'search_items'       => 'Search recipe', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Recipes', // название меню
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
			'name'              => 'Tags',
			'singular_name'     => 'tag',
			'search_items'      => 'Search tags',
			'all_items'         => 'All tags',
			'view_item '        => 'View tag',
			'parent_item'       => 'Parent tag',
			'parent_item_colon' => 'Parent tag:',
			'edit_item'         => 'Edit tag',
			'update_item'       => 'Update tag',
			'add_new_item'      => 'Add new tag',
			'new_item_name'     => 'New tag name',
			'menu_name'         => 'Tags',
			'back_to_items'     => '← Back to tags',
		],
		'description'           => 'News and Promotions tags', // описание таксономии
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
			'name'               => 'News and Promotions', // основное название для типа записи
			'singular_name'      => 'News or Promotion', // название для одной записи этого типа
			'add_new'            => 'Add news or promotion', // для добавления новой записи
			'add_new_item'       => 'Add news or promotion title', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit news or promotion', // для редактирования типа записи
			'new_item'           => 'New news or promotion', // текст новой записи
			'view_item'          => 'View news or promotion', // для просмотра записи этого типа.
			'search_items'       => 'Search news or promotion', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'News or Promotion', // название меню
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