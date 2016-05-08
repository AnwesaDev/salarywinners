<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/vendor/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/vendor/ReduxFramework/ReduxCore/framework.php' );
}

/**
 * Get the CMB2 bootstrap!
 */
if ( file_exists(  __DIR__ . '/vendor/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/vendor/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/vendor/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/vendor/CMB2/init.php';
}

// Core Options
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ai-options.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ai-options.php' );
}

// WP_Session by Eric https://github.com/ericmann/wp-session-manager
require dirname( __FILE__ ) . '/vendor/wp-session-manager/wp-session-manager.php';

require_once dirname( __FILE__ ).'/class-ai-base.php';
require_once dirname( __FILE__ ).'/class-ai-mailing.php';
require_once dirname( __FILE__ ).'/class-ai-user.php';
require_once dirname( __FILE__ ).'/class-ai-post.php';

//General core functions
require_once dirname( __FILE__ ).'/functions.php';

//Core Ajax functions
require_once dirname( __FILE__ ).'/ajax-functions.php';