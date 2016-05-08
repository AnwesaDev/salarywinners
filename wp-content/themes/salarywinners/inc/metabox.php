<?php


function salarywinners_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}
add_action( 'cmb2_init', 'salarywinners_add_metabox_icon_block' );
function salarywinners_add_metabox_icon_block() {

	$prefix = '_sw_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'home_icon',
		'title'        => __( 'Icon Block', 'salarywinners' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
                'show_on_cb'   => 'salarywinners_show_if_front_page' //call back function name
	) );
        
        $cmb->add_field( array(
		'name' => __( 'Title 1', 'salarywinners' ),
		'id' => $prefix . 'icon_title_1',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Description 1', 'salarywinners' ),
		'id' => $prefix . 'icon_description_1',
		'type' => 'textarea_small',
	) );
        $cmb->add_field( array(
		'name' => __( 'Title 2', 'salarywinners' ),
		'id' => $prefix . 'icon_title_2',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Description 2', 'salarywinners' ),
		'id' => $prefix . 'icon_description_2',
		'type' => 'textarea_small',
	) );
        $cmb->add_field( array(
		'name' => __( 'Title 3', 'salarywinners' ),
		'id' => $prefix . 'icon_title_3',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Description 3', 'salarywinners' ),
		'id' => $prefix . 'icon_description_3',
		'type' => 'textarea_small',
	) );
        $cmb->add_field( array(
		'name' => __( 'Title 4', 'salarywinners' ),
		'id' => $prefix . 'icon_title_4',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Description 4', 'salarywinners' ),
		'id' => $prefix . 'icon_description_4',
		'type' => 'textarea_small',
	) );
}
