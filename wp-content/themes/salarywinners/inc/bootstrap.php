<?php

/* 
 * Salarywinners App bootstrap
 */

// All Definations


// Include Anwesa Infotech core
require dirname( __FILE__ ) . '/ai-core/bootstrap.php';

// Redux Framework options for app
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/theme-options.php' ) ) {
    require_once( dirname( __FILE__ ) . '/theme-options.php' );
}

// Include Post Types and Taxonomies


// Include app class

// Include other functions


/**
 * Load CMB2
 */
require_once(dirname( __FILE__ ) . '/metabox.php');


require_once(dirname( __FILE__ ) . '/ajax-functions.php');