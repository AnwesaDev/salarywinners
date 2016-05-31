<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Salary_Winners
 */

?>


<section class="content-body">
        	<div class="container">
            	<div class="row">
                	<!--Main Conatent section-->
                	<div class="col-md-9 col-sm-8">
                            
                        <div class="content">
                            <h2 class="title"><?php the_title();?></h2>
                            <?php the_content();?>
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
