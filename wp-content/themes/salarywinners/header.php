<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Salary_Winners
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">	
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
	<div class="main-wrapper">
    	<!--Header Section-->
		<header class="header-section">
        	<!--To Navigaion Section-->
            
        	<div class="row"> 
                <div class="top-nav">
                	<nav class="navbar-right">
                        <ul>
                            <li><a href=""><span class="user"></span>Providers</a></li>
                            <li><a href=""><span class="login"></span>Login</a></li>
                            <li><a href=""><span class="join-now"></span>Join Now</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <!--Primery Navigaion Section-->
            <div class="row">
            	<div class="primery-nav" id="navigation">
                	<div class="col-md-4 col-sm-12 col-xs-8">
                    	<div class="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="" title="" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-4" id="navigaition">
                    <button class="button" id="btn-s-nav"><span class="fa fa-navicon"></span></button>
                    	<nav class="nav-right">
                        <button id="hide-nav" class="button"><span class="fa fa-times"></span></button>
                        <a class="on-mobile" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="" title="" class="img-responsive"></a>
                            <ul class="">
                                <li><a href=""><span class="h-wrk"></span>How it works</a></li>
                                <li><a href=""><span class="br-job"></span>browse job</a></li>
                                <li><a href=""><span class="prdct"></span>products</a></li>
                                <li><a href=""><span class="job"></span>post a job</a></li>
                                <li><a href=""><span class="cart"></span>cart</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
