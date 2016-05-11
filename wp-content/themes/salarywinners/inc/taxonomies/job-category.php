<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Register Custom Taxonomy
function sw_taxonomy_category() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'salarywinners' ),
		'singular_name'              => _x( 'Catagory', 'Taxonomy Singular Name', 'salarywinners' ),
		'menu_name'                  => __( 'Catagory', 'salarywinners' ),
		'all_items'                  => __( 'All Items', 'salarywinners' ),
		'parent_item'                => __( 'Parent Item', 'salarywinners' ),
		'parent_item_colon'          => __( 'Parent Item:', 'salarywinners' ),
		'new_item_name'              => __( 'New Catagory', 'salarywinners' ),
		'add_new_item'               => __( 'Add New Catagory', 'salarywinners' ),
		'edit_item'                  => __( 'Edit Catagory', 'salarywinners' ),
		'update_item'                => __( 'Update Catagory', 'salarywinners' ),
		'view_item'                  => __( 'View Catagory', 'salarywinners' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'salarywinners' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'salarywinners' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'salarywinners' ),
		'popular_items'              => __( 'Popular Catagories', 'salarywinners' ),
		'search_items'               => __( 'Search Catagories', 'salarywinners' ),
		'not_found'                  => __( 'Catagory Not Found', 'salarywinners' ),
		'no_terms'                   => __( 'No items', 'salarywinners' ),
		'items_list'                 => __( 'Items list', 'salarywinners' ),
		'items_list_navigation'      => __( 'Items list navigation', 'salarywinners' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'sw_category', array( 'sw_job' ), $args );

}
add_action( 'init', 'sw_taxonomy_category', 0 );