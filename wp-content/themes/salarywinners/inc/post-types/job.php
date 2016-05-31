<?php

// Register Custom Post Type

function sw_post_job() {

	$labels = array(
		'name'                  => _x( 'Jobs', 'Post Type General Name', 'salarywinners' ),
		'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'salarywinners' ),
		'menu_name'             => __( 'Jobs', 'salarywinners' ),
		'name_admin_bar'        => __( 'Jobs', 'salarywinners' ),
		'archives'              => __( 'Job Archives', 'salarywinners' ),
		'parent_item_colon'     => __( 'Parent Item:', 'salarywinners' ),
		'all_items'             => __( 'All Jobs', 'salarywinners' ),
		'add_new_item'          => __( 'Add New Item', 'salarywinners' ),
		'add_new'               => __( 'Add New Job', 'salarywinners' ),
		'new_item'              => __( 'New Job', 'salarywinners' ),
		'edit_item'             => __( 'Edit Job', 'salarywinners' ),
		'update_item'           => __( 'Update Job', 'salarywinners' ),
		'view_item'             => __( 'View Job', 'salarywinners' ),
		'search_items'          => __( 'Search Job', 'salarywinners' ),
		'not_found'             => __( 'Job Not found', 'salarywinners' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'salarywinners' ),
		'featured_image'        => __( 'Featured Image', 'salarywinners' ),
		'set_featured_image'    => __( 'Set featured image', 'salarywinners' ),
		'remove_featured_image' => __( 'Remove featured image', 'salarywinners' ),
		'use_featured_image'    => __( 'Use as featured image', 'salarywinners' ),
		'insert_into_item'      => __( 'Insert into job', 'salarywinners' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'salarywinners' ),
		'items_list'            => __( 'Items list', 'salarywinners' ),
		'items_list_navigation' => __( 'Items list navigation', 'salarywinners' ),
		'filter_items_list'     => __( 'Filter items list', 'salarywinners' ),
	);
	$args = array(
		'label'                 => __( 'Job', 'salarywinners' ),
		'description'           => __( 'Job Description', 'salarywinners' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', ),
		'taxonomies'            => array( SW_TX_CATEGORY, SW_TX_SKILL ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( SW_PT_JOB, $args );

}
add_action( 'init', 'sw_post_job', 0 );