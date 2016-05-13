<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Template Name: Job Listing
 */

    global $query_string;
    $query_args = explode("&", $query_string);
    $query_args_array = array();

    if( strlen($query_string) > 0 ) {
            foreach($query_args as $key => $string) {
                    $query_split = explode("=", $string);
                    $query_args_array[$query_split[0]] = urldecode($query_split[1]);
            } // foreach
    } //if
    print_r($query_args_array);
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array('post_type' => 'sw_job');
    if(!empty($query_args_array['job_category']))
    {
       $args['tax_query'] = array(array('taxonomy' => 'sw_category',
                                    'field'  => 'id',
                                    'terms'  => $query_args_array['job_category'],
          ) );
      
    }
    if(!empty($query_args_array['keywords']))
    {
    $args['s'] = $query_args_array['keywords'];
        
    }
    
    $jobs = new WP_Query($args);
    get_header();
?>
    <section class="content-body job-listing">
        	<div class="container">
            	<div class="row">
                	<div class="filter-section">
                            <div class="filter-tab adv-filter"><p>Advanced filters</p></div>
                                <form name="form-search" id="form-search" method="get" >
                                    <div class="filter-tab">
                        	<div class="form-group">
                            	<label>keywords:</label>
                                <input type="text" placeholder="" name="keywords" id="keywords" class="form-control">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                                    <div class="filter-tab">
                        	<div class="form-group">
                            	<label>Category:</label>
                                <?php
                                    $args = array(
                                            'show_option_all'    => '',
                                            'show_option_none'   => 'select',
                                            'option_none_value'  => '',
                                            'order'              => 'ASC',
                                            'show_count'         => 0,
                                            'hide_empty'         => 0, 
                                            'child_of'           => 0,
                                            'exclude'            => '',
                                            'echo'               => 1,
                                            'selected'           => 0,
                                            'hierarchical'       => 0, 
                                            'name'               => 'job_category',
                                            'id'                 => 'job_category',
                                            'class'              => 'form-control',
                                            'depth'              => 0,
                                            'tab_index'          => 0,
                                            'taxonomy'           => 'sw_category',
                                            'hide_if_empty'      => false,
                                            'value_field'	 => 'term_id',	
                                        );
                                    wp_dropdown_categories( $args );
                                    ?>
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                                    <div class="filter-tab">
                        	<div class="form-group">
                            	<label>Location:</label>
                                <select type="search" placeholder="" class="form-control">
                                	<option selected>Location</option>
                                    <option>Location</option>
                                    <option>Location</option>
                                    <option>Location</option>
                                </select>
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                                    <div class="filter-tab">
                        	<div class="form-group">
<!--                            	<label>Rating:</label>
                                <select type="search" placeholder="" class="form-control">
                                	<option selected>Location</option>
                                    <option>Location</option>
                                    <option>Location</option>
                                    <option>Location</option>
                                </select>
                                <i class="fa fa-angle-down"></i>-->
<!--
-->								<label>Price($):</label>
                            <input id="ex2" type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000" data-slider-step="5" data-slider-value="[250,450]">


<!--								please include bootstrap slider.css and bootstrap-slider.js-->
                            </div>
                        </div>
                                    <div class="filter-tab">
                        	<a href="">X</a>
                            <small>Clear All</small>
                        </div>
                                </form>
                            </div>
                    <!--end filter button section-->
                    
                    <div class="normal">
                    	<div class="col-md-9 col-sm-8 ">
                        	<div class="row">
                                <div class="content">
                                    <?php if($jobs->have_posts()):                                  
                                    
                                        while ( $jobs->have_posts() ) : $jobs->the_post(); 
                                        $post_id = get_the_ID ();
                                        $post_meta = get_post_meta ( $post_id );
                                        $user_id = $post->post_author;
                                        $user = get_user_by('id', $user_id);
                                        $user_meta = get_user_meta($user_id);
                                        ?>
                                    
                                    <div class="job-details">
                                    	<h3 class="title"><?php the_title();?></h3>
                                        <div class="normal">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <?php if(empty($user_meta['avatar'][0])): ?>
                                                    <figure><img src="<?php echo get_template_directory_uri(); ?>/images/profile-image.png" class="img-circle" alt="" title=""></figure>
                                                <?php else: ?>
                                                 <?php $avatar_data = wp_get_attachment_image_src($user_meta['avatar'][0]); ?>
                                                    <figure><img src="<?php echo $avatar_data[0]; ?>" class="img-circle" alt="" title=""></figure>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <div class="job-author-name"><b><?php echo $user_meta['first_name'][0].' '.$user_meta['last_name'][0] ;?></b></div>
                                                <div class="clearfix"><a href="<?php the_permalink();?>" class="btn btn-work" target="_blank">View Details</a></div>
                                                <div class="job-location"><i class="location"></i> <b><?php echo $user_meta['city'][0].','.$user_meta['state'][0] ;?></b></div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="rating">
                                                            <em>5</em>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="row">
                                                        	<div class="date">
                                                                <span class="clock"></span>
                                                                <b>Posted: <?php the_date('F j, Y'); ?></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="row">
                                                        	<div class="budget">
                                                                <span class="dollar-tag"></span>
                                                                <b>
                                                                Est. Budget: <span>$<?php echo $post_meta['_min_price'][0].' to $'.$post_meta['_max_price'][0];?></span>
                                                                </b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                   <div class="row">
                                                   	<p>
                                                            <?php the_content();?>
                                                    </p>
                                                   </div>
                                                   
                                                   <div class="row">
                                                   		<div class="tags">
                                                            <span>Skill:</span>
                                                            <?php
                                                                echo get_the_term_list($post_id, 'sw_skill', '<ul><li>', '</li><li>', '</li></ul>' );
                                                            ?>
                                                        </div>
                                                        
                                                        <div class="tags">
                                                            <span>Category:</span>
                                                            <?php
                                                                echo get_the_term_list($post_id, 'sw_category', '<ul><li>', '</li><li>', '</li></ul>' );
                                                            ?>
                                                        </div>
                                                   </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php endwhile;?>
                                    <?php endif;?>
                                    
                                   
                                    
                                    
                                    
                                </div>
                                
                                <div class="paginatioon">                               	
                                   
                                    <?php echo paginate_links( array('type'=>'plain','prev_text'=>'<','next_text'=>'>')); ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                        	<div class="row">
								<div class="sidebar contact-info">
									<ul>
										<li><span class="fa fa-question"></span>FAQ</li>
										<li><span class="fa fa-mobile-phone"></span>02 3000 1234</li>
										<li><span class="fa fa-envelope"></span>hello@asallerywiners.com</li>
										<li><span class="fa fa-headphones"></span>Online chat and ask us to call you</li>
									</ul>
								</div>

                            <div class="sidebar">
                                <div class="normal">
                                    <h3 class="title">suggested products</h3>
                                    <div class="sugested-prduct">
                                    	<div class="product-img">
                                            <a href=""><img src="images/style-report.jpg" alt="" title=""></a>
                                        </div>
                                        <a href="">Personality style report</a>
                                        <div class="rating">
                                        	<em>4.5</em>
                                        	<span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-half-empty"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="sugested-prduct">
                                    	<div class="product-img">
                                            <a href=""><img src="images/style-report.jpg" alt="" title=""></a>
                                        </div>
                                        <a href="">Personality style report</a>
                                        <div class="rating">
                                        	<em>3.5</em>
                                        	<span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-half-empty"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="sugested-prduct">
                                    	<div class="product-img">
                                            <a href=""><img src="images/style-report.jpg" alt="" title=""></a>
                                        </div>
                                        <a href="">Personality style report</a>
                                        <div class="rating">
                                        	<em>4.5</em>
                                        	<span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-half-empty"></span>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
						</div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>

<?php
    get_footer();
