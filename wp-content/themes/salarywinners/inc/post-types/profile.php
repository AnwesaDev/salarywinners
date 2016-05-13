<?php
function sw_post_profile() {

	$labels = array(
		'name'                  => _x( 'Profiles', 'Post Type General Name', 'salarywinners' ),
		'singular_name'         => _x( 'Profile', 'Post Type Singular Name', 'salarywinners' ),
		'menu_name'             => __( 'Profiles', 'salarywinners' ),
		'name_admin_bar'        => __( 'Profile', 'salarywinners' ),
		'archives'              => __( 'Profile Archives', 'salarywinners' ),
		'parent_item_colon'     => __( 'Parent Item:', 'salarywinners' ),
		'all_items'             => __( 'All Profiles', 'salarywinners' ),
		'add_new_item'          => __( 'Add New Profile', 'salarywinners' ),
		'add_new'               => __( 'Add New Profile', 'salarywinners' ),
		'new_item'              => __( 'New Profile', 'salarywinners' ),
		'edit_item'             => __( 'Edit Profile', 'salarywinners' ),
		'update_item'           => __( 'Update Profile', 'salarywinners' ),
		'view_item'             => __( 'View Profile', 'salarywinners' ),
		'search_items'          => __( 'Search Profile', 'salarywinners' ),
		'not_found'             => __( 'Profile Not found', 'salarywinners' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'salarywinners' ),
		'featured_image'        => __( 'Featured Image', 'salarywinners' ),
		'set_featured_image'    => __( 'Set featured image', 'salarywinners' ),
		'remove_featured_image' => __( 'Remove featured image', 'salarywinners' ),
		'use_featured_image'    => __( 'Use as featured image', 'salarywinners' ),
		'insert_into_item'      => __( 'Insert into job', 'salarywinners' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'salarywinners' ),
		'items_list'            => __( 'Profiles list', 'salarywinners' ),
		'items_list_navigation' => __( 'Profiles list navigation', 'salarywinners' ),
		'filter_items_list'     => __( 'Filter Profile list', 'salarywinners' ),
	);
	$args = array(
		'label'                 => __( 'Profile', 'salarywinners' ),
		'description'           => __( 'Profile Description', 'salarywinners' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', ),
		//'taxonomies'            => array( 'sw_category', 'sw_skill' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( SW_PT_PROFILE, $args );

}
add_action( 'init', 'sw_post_profile', 0 );