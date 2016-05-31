<?php
function sw_post_product() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'salarywinners' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'salarywinners' ),
		'menu_name'             => __( 'Products', 'salarywinners' ),
		'name_admin_bar'        => __( 'Product', 'salarywinners' ),
		'archives'              => __( 'Product Archives', 'salarywinners' ),
		'parent_item_colon'     => __( 'Parent Item:', 'salarywinners' ),
		'all_items'             => __( 'All Products', 'salarywinners' ),
		'add_new_item'          => __( 'Add New Product', 'salarywinners' ),
		'add_new'               => __( 'Add New Product', 'salarywinners' ),
		'new_item'              => __( 'New Product', 'salarywinners' ),
		'edit_item'             => __( 'Edit Product', 'salarywinners' ),
		'update_item'           => __( 'Update Product', 'salarywinners' ),
		'view_item'             => __( 'View Product', 'salarywinners' ),
		'search_items'          => __( 'Search Product', 'salarywinners' ),
		'not_found'             => __( 'Product Not found', 'salarywinners' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'salarywinners' ),
		'featured_image'        => __( 'Featured Image', 'salarywinners' ),
		'set_featured_image'    => __( 'Set featured image', 'salarywinners' ),
		'remove_featured_image' => __( 'Remove featured image', 'salarywinners' ),
		'use_featured_image'    => __( 'Use as featured image', 'salarywinners' ),
		'insert_into_item'      => __( 'Insert into job', 'salarywinners' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'salarywinners' ),
		'items_list'            => __( 'Products list', 'salarywinners' ),
		'items_list_navigation' => __( 'Products list navigation', 'salarywinners' ),
		'filter_items_list'     => __( 'Filter Products list', 'salarywinners' ),
	);
	$args = array(
		'label'                 => __( 'Product', 'salarywinners' ),
		'description'           => __( 'Product Description', 'salarywinners' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', ),
		'taxonomies'            => array( SW_TX_PRODUCT_CATEGORY, 'sw_skill' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-products',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( SW_PT_PRODUCT, $args );

}
add_action( 'init', 'sw_post_product', 0 );