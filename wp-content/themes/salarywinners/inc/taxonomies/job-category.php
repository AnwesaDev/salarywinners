<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
add_action( 'init', 'sw_taxonomy_job_category', 0 );
function sw_taxonomy_job_category() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'salarywinners' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'salarywinners' ),
		'menu_name'                  => __( 'Category', 'salarywinners' ),
		'all_items'                  => __( 'All Categories', 'salarywinners' ),
		'parent_item'                => __( 'Parent Category', 'salarywinners' ),
		'parent_item_colon'          => __( 'Parent Category:', 'salarywinners' ),
		'new_item_name'              => __( 'New Category', 'salarywinners' ),
		'add_new_item'               => __( 'Add New Category', 'salarywinners' ),
		'edit_item'                  => __( 'Edit Category', 'salarywinners' ),
		'update_item'                => __( 'Update Category', 'salarywinners' ),
		'view_item'                  => __( 'View Category', 'salarywinners' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', 'salarywinners' ),
		'add_or_remove_items'        => __( 'Add or remove Category', 'salarywinners' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'salarywinners' ),
		'popular_items'              => __( 'Popular Categories', 'salarywinners' ),
		'search_items'               => __( 'Search Categories', 'salarywinners' ),
		'not_found'                  => __( 'Not Found', 'salarywinners' ),
		'no_terms'                   => __( 'No items', 'salarywinners' ),
		'items_list'                 => __( 'Categories list', 'salarywinners' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'salarywinners' ),
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
	register_taxonomy( 'job-category', array('job'), $args );

}
