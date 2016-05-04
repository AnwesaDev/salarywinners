<?php

/* 
 * Template Name: Join Now
 */
get_header();
?>
        <?php get_template_part('template-parts/block', 'search'); ?>
        <section class="content-body sing-login">
        	<div class="container">
            	<div class="row">
                	<!--Main Conatent section-->
                	<div class="normal">
                   	  <h2 class="title">Let's get started!<br>First, tell us what you are looking for</h2>
                    </div>
                  <div class="img-or">
                    	<img src="<?php echo get_template_directory_uri();?>/images/or.png" alt="" title="">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                   	  <div class="c-box">
                        	<div class="icon-holder">
                            	<img src="<?php echo get_template_directory_uri();?>/images/providers.jpg" alt="" title="">
                            </div>
                            <div class="descrption">
                            	<h2 class="title">I'm a Service providers/Sellers</h2>
                            </div>
                            <a class="btn-work btn" href="<?php echo esc_url(get_bloginfo('siteurl').'/signup-seller/'); ?>">work</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                   	  <div class="c-box">
                        	<div class="icon-holder">
                            	<img src="<?php echo get_template_directory_uri();?>/images/customer.jpg" alt="" title="">
                            </div>
                            <div class="descrption">
                            	<h2 class="title">I'm a Customer</h2>
                            </div>
                            <a class="btn-work btn" href="<?php echo esc_url(get_bloginfo('siteurl').'/signup-customer/'); ?>">hire</a>
                        </div>
                    </div>
              </div>
            </div>
        </section>
<?php 
get_footer();