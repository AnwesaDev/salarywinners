<?php

/* Template Name: Contact
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header(); ?>
        <!--Section-->
        <section class="search-section">
        	<div class="row">
            	<form method="" action="" id="search-frm" name="">
                    <div class="input-group search-box">
                    	<span class="larg">Search</span>
                        <input type="search" placeholder="Enter your Search keywords" >
                       <span class="input-group-btn">
                           <button class="btn btn-submit" type="button">
                              <span class="fa fa-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </section>
        
        <section class="content-body">
        	<div class="container">
            	<div class="row">
                	<!--Main Conatent section-->
                	<div class="col-md-8 col-sm-8">
                    	<div class="contact-frm">
                           <?php if(have_posts()): ?>
                           <?php while(have_posts()): the_post(); ?>
                            <div class="col-md-12">
                            	<h2 class="title"><?php the_title();?></h2>
                            </div>
                            <?php the_content();?>
                           <?php endwhile; ?>
                           <?php endif; ?>
                        </div>
                    </div>
                    
                    <!--Side Bar-->
                    <div class="col-md-4 col-sm-4">
                    	<div class="sidebar">
                        	<ul>
                            	<li><span class="fa fa-question"></span>FAQ</li>
                                <li><span class="fa fa-mobile-phone"></span>02 3000 1234</li>
                                <li><span class="fa fa-envelope"></span>hello@asallerywiners.com</li>
                                <li><span class="fa fa-headphones"></span>Online chat and ask us to call you</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    

<?php get_footer();