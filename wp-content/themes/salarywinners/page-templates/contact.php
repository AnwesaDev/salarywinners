<?php

/* Template Name: Contact
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header(); ?>
       
        <?php 
        // get_template_part('template-parts/block', 'search'); ?>

        <section class="content-body contact-us-page">
            <div class="container">
            	<div class="row">
                	<!--Main Conatent section-->
                	<div class="col-md-9 col-sm-8">
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
                    <div class="col-md-3 col-sm-4">
                    	<div class="row">
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
            </div>
        </section>
    

<?php get_footer();