<?php

/**
 * Salarywinners App bootstrap
 * @author Sandeep
 * @package Salary_Winners
 */

// All APP Definations
define(SW_ROLE_CUSTOMER,'customer');
define(SW_ROLE_PROVIDER,'provider');

define(SW_PT_JOB,'sw_job');
define(SW_PT_PRODUCT,'sw_product');

// Include Anwesa Infotech core
require dirname( __FILE__ ) . '/ai-core/bootstrap.php';

// Redux Framework options for app
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/theme-options.php' ) ) {
    require_once( dirname( __FILE__ ) . '/theme-options.php' );
}

// Include Post Types and Taxonomies
    require_once(dirname( __FILE__ ) . '/post-types/job.php');
    
    require_once(dirname( __FILE__ ) . '/taxonomies/job-category.php');
    require_once(dirname( __FILE__ ) . '/taxonomies/job-skill.php');
// Include app classes
require dirname( __FILE__ ) . '/class/mail.php';


// Include other functions


/**
 * Load CMB2
 */
require_once(dirname( __FILE__ ) . '/metabox.php');


require_once(dirname( __FILE__ ) . '/ajax-functions.php');


