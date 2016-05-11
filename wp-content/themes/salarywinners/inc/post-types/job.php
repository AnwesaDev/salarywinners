<?php

/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action( 'init', 'sw_post_job' );

function sw_post_job() {
	$labels = array(
		'name'               => _x( 'Jobs', 'post type general name', 'salarywinners' ),
		'singular_name'      => _x( 'Job', 'post type singular name', 'salarywinners' ),
		'menu_name'          => _x( 'Jobs', 'admin menu', 'salarywinners' ),
		'name_admin_bar'     => _x( 'Job', 'add new on admin bar', 'salarywinners' ),
		'add_new'            => _x( 'Add New', 'Job', 'salarywinners' ),
		'add_new_item'       => __( 'Add New Job', 'salarywinners' ),
		'new_item'           => __( 'New Job', 'salarywinners' ),
		'edit_item'          => __( 'Edit Job', 'salarywinners' ),
		'view_item'          => __( 'View Job', 'salarywinners' ),
		'all_items'          => __( 'All Jobs', 'salarywinners' ),
		'search_items'       => __( 'Search Jobs', 'salarywinners' ),
		'parent_item_colon'  => __( 'Parent Jobs:', 'salarywinners' ),
		'not_found'          => __( 'No jobs found.', 'salarywinners' ),
		'not_found_in_trash' => __( 'No jobs found in Trash.', 'salarywinners' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'salarywinners' ),
                
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'job' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author' )
	);

	register_post_type( 'job', $args );
}