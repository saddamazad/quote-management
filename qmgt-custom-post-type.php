<?php
$labels = array(
	'name' => _x('Quotes', 'Quote name', 'RMTheme'),
	'singular_name' => _x('Quote', 'Quote type singular name', 'RMTheme'),
	'add_new' => _x('Add New', 'Quote', 'RMTheme'),
	'add_new_item' => __('Add New Quote', 'RMTheme'),
	'edit_item' => __('Edit Quote', 'RMTheme'),
	'new_item' => __('New Quote', 'RMTheme'),
	'view_item' => __('View Quote', 'RMTheme'),
	'search_items' => __('Search Quote', 'RMTheme'),
	'not_found' => __('No Quote Found', 'RMTheme'),
	'not_found_in_trash' => __('No Quote Found in Trash', 'RMTheme'),
	'parent_item_colon' => ''
);

register_post_type('quote', array('labels' => $labels,

		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => array('quote_post','quote_posts'),
		'map_meta_cap' => true,			
		'hierarchical' => false,
		'publicly_queryable' => true,
		'query_var' => true,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'quote'),
		'show_in_nav_menus' => false,
		'supports' => array('title',  'editor', 'page-attributes', 'revisions')
	)
);

$labels_author = array(
	'name'                       => _x( 'Author', 'taxonomy general name' ),
	'singular_name'              => _x( 'Author', 'taxonomy singular name' ),
	'search_items'               => __( 'Search Author' ),
	'popular_items'              => __( 'Popular Author' ),
	'all_items'                  => __( 'All Authors' ),
	'parent_item'                => __( 'Parent Author' ),
	'parent_item_colon'          => __( 'Parent Author:' ),
	'edit_item'                  => __( 'Edit Author' ),
	'update_item'                => __( 'Update Author' ),
	'add_new_item'               => __( 'Add New Author' ),
	'new_item_name'              => __( 'New Author Name' ),
	'separate_items_with_commas' => __( 'Separate authors with commas' ),
	'add_or_remove_items'        => __( 'Add or remove author' ),
	'choose_from_most_used'      => __( 'Choose from the most used authors' ),
	'not_found'                  => __( 'No tags found.' ),
	'menu_name'                  => __( 'Authors' ),
);

$args_author = array(
	'hierarchical'          => false,
	'labels'                => $labels_author,
	'capabilities' => array (
			'manage_terms' => 'read',
			'edit_terms' => 'read',
			'delete_terms' => 'read',
			'assign_terms' => 'read'
			),		
	'show_ui'               => true,
	'show_admin_column'     => true,
	'update_count_callback' => '_update_post_term_count',
	'query_var'             => true,
	'rewrite'               => array( 'slug' => 'author-tag' ),
);

register_taxonomy( 'quoteauthor', 'quote', $args_author );		


$labels_tag = array(
	'name'                       => _x( 'Tag', 'taxonomy general name' ),
	'singular_name'              => _x( 'Tag', 'taxonomy singular name' ),
	'search_items'               => __( 'Search Tag' ),
	'popular_items'              => __( 'Popular Tag' ),
	'all_items'                  => __( 'All Tags' ),
	'parent_item'                => __( 'Parent Tag' ),
	'parent_item_colon'          => __( 'Parent Tag:' ),
	'edit_item'                  => __( 'Edit Tag' ),
	'update_item'                => __( 'Update Tag' ),
	'add_new_item'               => __( 'Add New Tag' ),
	'new_item_name'              => __( 'New Tag Name' ),
	'separate_items_with_commas' => __( 'Separate tags with commas' ),
	'add_or_remove_items'        => __( 'Add or remove tag' ),
	'choose_from_most_used'      => __( 'Choose from the most used tags' ),
	'not_found'                  => __( 'No tags found.' ),
	'menu_name'                  => __( 'Tags' ),
);

$args_tag = array(
	'hierarchical'          => false,
	'labels'                => $labels_tag,
	'capabilities' => array (
			'manage_terms' => 'read',
			'edit_terms' => 'read',
			'delete_terms' => 'read',
			'assign_terms' => 'read'
			),				
	'show_ui'               => true,
	'show_admin_column'     => true,
	'update_count_callback' => '_update_post_term_count',
	'query_var'             => true,
	'rewrite'               => array( 'slug' => 'quote-tag' ),
);

register_taxonomy( 'quotetag', 'quote', $args_tag );	


$labels_book_credit = array(
	'name'                       => _x( 'Book Credit', 'taxonomy general name' ),
	'singular_name'              => _x( 'Book Credit', 'taxonomy singular name' ),
	'search_items'               => __( 'Search Book Credit' ),
	'popular_items'              => __( 'Popular Book Credit' ),
	'all_items'                  => __( 'All Book Credits' ),
	'parent_item'                => __( 'Parent Book Credit' ),
	'parent_item_colon'          => __( 'Parent Book Credit:' ),
	'edit_item'                  => __( 'Edit Book Credit' ),
	'update_item'                => __( 'Update Book Credit' ),
	'add_new_item'               => __( 'Add New Book Credit' ),
	'new_item_name'              => __( 'New Book Credit Name' ),
	'separate_items_with_commas' => __( 'Separate book credits with commas' ),
	'add_or_remove_items'        => __( 'Add or remove book credit' ),
	'choose_from_most_used'      => __( 'Choose from the most used book credits' ),
	'not_found'                  => __( 'No book credits found.' ),
	'menu_name'                  => __( 'Book Credits' ),
);

$args_book_credit = array(
	'hierarchical'          => false,
	'labels'                => $labels_book_credit,
	'capabilities' => array (
			'manage_terms' => 'read',
			'edit_terms' => 'read',
			'delete_terms' => 'read',
			'assign_terms' => 'read'
			),				
	'show_ui'               => true,
	'show_admin_column'     => true,
	'update_count_callback' => '_update_post_term_count',
	'query_var'             => true,
	'rewrite'               => array( 'slug' => 'quote-book-credits' ),
);

register_taxonomy( 'quotebookcredits', 'quote', $args_book_credit );	



$email_labels = array(
	'name' => _x('Emails', 'Email name', 'RMTheme'),
	'singular_name' => _x('Email', 'Email singular name', 'RMTheme'),
	'add_new' => _x('Add New', 'Email', 'RMTheme'),
	'add_new_item' => __('Add New Email', 'RMTheme'),
	'edit_item' => __('Edit Email', 'RMTheme'),
	'new_item' => __('New Email', 'RMTheme'),
	'view_item' => __('View Email', 'RMTheme'),
	'search_items' => __('Search Email', 'RMTheme'),
	'not_found' => __('No Email Found', 'RMTheme'),
	'not_found_in_trash' => __('No Email Found in Trash', 'RMTheme'),
	'parent_item_colon' => ''
);

if ( current_user_can( 'manage_options' ) ) {
	/* A user with admin privileges */
	register_post_type('emails', array('labels' => $email_labels,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'map_meta_cap' => true,			
			'hierarchical' => false,
			'publicly_queryable' => true,
			'query_var' => true,
			'exclude_from_search' => false,
			'rewrite' => array('slug' => 'email'),
			'show_in_nav_menus' => false,
			'supports' => array('title')
		)
	);	
} else {
	/* A user without admin privileges */
	register_post_type('emails', array('labels' => $email_labels,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => array('email_post','email_posts'),
			'map_meta_cap' => true,			
			'hierarchical' => false,
			'publicly_queryable' => true,
			'query_var' => true,
			'exclude_from_search' => false,
			'rewrite' => array('slug' => 'email'),
			'show_in_nav_menus' => false,
			'supports' => array('title',  'editor', 'page-attributes', 'revisions')
		)
	);	
}
