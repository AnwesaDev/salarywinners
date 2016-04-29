<?php

/*
 * Template Name: Home
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. 
 */
get_header();
?>
        <!--Banner Section-->
        <section class="banner-section">
        	<div class="row">
            	<div class="banner">
                	<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/banner1.jpg" alt="" title="">
                </div>
            </div>
        </section>
        
        <!--Section-->
        <section class="search-section">
            <div class="row">
            	<form method="" action="<?php echo home_url(); ?>" id="search-frm" name="">
                    <div class="input-group search-box">
                    	<span class="larg">Search</span>
                        <input type="search" name="s" placeholder="Enter your Search keywords" >
                       <span class="input-group-btn">
                           <button class="btn btn-submit" type="button">
                              <span class="fa fa-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </section>
        
        <!--Section-->
        <section class="how-to-work">
            <div class="row">
            	<div class="container">
                    <?php if(have_posts()): ?>
                    <?php while(have_posts()): the_post(); ?>
                    <div class="normal">
                            
                    	<h2 class="title"><?php the_title();?></h2>
                        <p><?php the_content(); ?></p>
                    </div>
                    
                    <div class="normal">
                    	<div class="watch-vedio">
                        <button class="btn vedio-btn">Watch Vedio</button>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
        <section class="big-icon">
        	<div class="row">
            	<div class="container">
                	<div class="col-md-3 col-sm-6 col-xs-12">
                    	<div class="icon-holder"><img src="<?php echo get_template_directory_uri();?>/images/big-icon1.png" class="img-responsive" alt="" title=""></div>
                        <div class="content">
                        	<h3>Search</h3>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    	<div class="icon-holder"><img src="<?php echo get_template_directory_uri();?>/images/big-icon2.png" class="img-responsive" alt="" title=""></div>
                        <div class="content">
                        	<h3>Review</h3>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    	<div class="icon-holder"><img src="<?php echo get_template_directory_uri();?>/images/big-icon3.png" class="img-responsive" alt="" title=""></div>
                        <div class="content">
                        	<h3>Select</h3>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    	<div class="icon-holder"><img src="<?php echo get_template_directory_uri();?>/images/big-icon4.png" class="img-responsive" alt="" title=""></div>
                        <div class="content">
                        	<h3>Purchase</h3>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                            </p>
                        </div>
                    </div>
                    <div class="thik-border"></div>
                </div>
            </div>
        </section>
        
        <?php get_template_part('template-parts/block', 'post-gallery'); ?>
        <!--Clients Sectoin-->
        <section class="clients">
        	<div class="row">
            	<div class="container">
                	<h2 class="title">Happy Clients</h2>
                    
                	<div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="list-group-item box">
                        	<img src="<?php echo get_template_directory_uri();?>/images/clients-pic1.png" alt="" title="">
                            <h3 class="name">thomas</h3>
                        	<P>
                             "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin urna risus, congue quis nisi eu, condimentum condimentum ex."
                            </P>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="list-group-item box">
                        	<img src="<?php echo get_template_directory_uri();?>/images/clients-pic2.png" alt="" title="">
                            <h3 class="name">thomas</h3>
                        	<P>
                             "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin urna risus, congue quis nisi eu, condimentum condimentum ex."
                            </P>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="list-group-item box">
                        	<img src="<?php echo get_template_directory_uri();?>/images/clients-pic3.png" alt="" title="">
                            <h3 class="name">thomas</h3>
                        	<P>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin urna risus, congue quis nisi eu, condimentum condimentum ex."
                            </P>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
<?php 
get_footer();