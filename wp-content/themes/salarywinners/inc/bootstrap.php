<?php

/**
 * Salarywinners App bootstrap
 * @author Sandeep
 * @package Salary_Winners
 */

// All APP Definations
define(SW_ROLE_CUSTOMER,'customer');
define(SW_ROLE_PROVIDER,'provider');

define(SW_PT_PROFILE,'sw_profile');
define(SW_PT_JOB,'sw_job');
define(SW_PT_PRODUCT,'sw_product');

define(SW_TX_CATEGORY,'sw_category');
define(SW_TX_SKILL,'sw_skill');
define(SW_TX_PRODUCT_CATEGORY,'sw_product_category');
define(SW_TX_PRODUCT_KEYWORDS,'sw_product_keywords');
// Include Anwesa Infotech core
require dirname( __FILE__ ) . '/ai-core/bootstrap.php';

// Redux Framework options for app
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/theme-options.php' ) ) {
    require_once( dirname( __FILE__ ) . '/theme-options.php' );
}

// Include Post Types and Taxonomies
    require_once(dirname( __FILE__ ) . '/post-types/job.php');
    require_once(dirname( __FILE__ ) . '/post-types/product.php');
    require_once(dirname( __FILE__ ) . '/post-types/profile.php');
    
    require_once(dirname( __FILE__ ) . '/taxonomies/job-category.php');
    require_once(dirname( __FILE__ ) . '/taxonomies/job-skill.php');
    require_once(dirname( __FILE__ ) . '/taxonomies/product-category.php');
    require_once(dirname( __FILE__ ) . '/taxonomies/product-keywords.php');
// Include app classes
require dirname( __FILE__ ) . '/class/mail.php';


// Include other functions


/**
 * Load CMB2
 */
require_once(dirname( __FILE__ ) . '/metabox.php');


require_once(dirname( __FILE__ ) . '/ajax-functions.php');


