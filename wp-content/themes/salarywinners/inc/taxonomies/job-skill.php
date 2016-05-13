<?php


// Register Custom Taxonomy
function sw_taxonomy_skill() {

	$labels = array(
		'name'                       => _x( 'Skills', 'Taxonomy General Name', 'salarywinners' ),
		'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'salarywinners' ),
		'menu_name'                  => __( 'Skill', 'salarywinners' ),
		'all_items'                  => __( 'All Items', 'salarywinners' ),
		'parent_item'                => __( 'Parent Item', 'salarywinners' ),
		'parent_item_colon'          => __( 'Parent Item:', 'salarywinners' ),
		'new_item_name'              => __( 'New Skill', 'salarywinners' ),
		'add_new_item'               => __( 'Add New Skill', 'salarywinners' ),
		'edit_item'                  => __( 'Edit Skill', 'salarywinners' ),
		'update_item'                => __( 'Update Skill', 'salarywinners' ),
		'view_item'                  => __( 'View Skill', 'salarywinners' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'salarywinners' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'salarywinners' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'salarywinners' ),
		'popular_items'              => __( 'Popular Skills', 'salarywinners' ),
		'search_items'               => __( 'Search Skills', 'salarywinners' ),
		'not_found'                  => __( 'Skill Not Found', 'salarywinners' ),
		'no_terms'                   => __( 'No items', 'salarywinners' ),
		'items_list'                 => __( 'Items list', 'salarywinners' ),
		'items_list_navigation'      => __( 'Items list navigation', 'salarywinners' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( SW_TX_SKILL, array( 'sw_job' ), $args );

}
add_action( 'init', 'sw_taxonomy_skill', 0 );