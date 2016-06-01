<?php


// Register Custom Taxonomy
function sw_taxonomy_keywords() {

	$labels = array(
		'name'                       => _x( 'Keywords', 'Taxonomy General Name', 'salarywinners' ),
		'singular_name'              => _x( 'Keyword', 'Taxonomy Singular Name', 'salarywinners' ),
		'menu_name'                  => __( 'Keyword', 'salarywinners' ),
		'all_items'                  => __( 'All Items', 'salarywinners' ),
		'parent_item'                => __( 'Parent Item', 'salarywinners' ),
		'parent_item_colon'          => __( 'Parent Item:', 'salarywinners' ),
		'new_item_name'              => __( 'New Keyword', 'salarywinners' ),
		'add_new_item'               => __( 'Add New Keyword', 'salarywinners' ),
		'edit_item'                  => __( 'Edit Keyword', 'salarywinners' ),
		'update_item'                => __( 'Update Keyword', 'salarywinners' ),
		'view_item'                  => __( 'View Keyword', 'salarywinners' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'salarywinners' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'salarywinners' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'salarywinners' ),
		'popular_items'              => __( 'Popular Keywords', 'salarywinners' ),
		'search_items'               => __( 'Search Keywords', 'salarywinners' ),
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
	register_taxonomy( SW_TX_PRODUCT_KEYWORDS, array( SW_PT_PRODUCT ), $args );

}
add_action( 'init', 'sw_taxonomy_keywords', 0 );