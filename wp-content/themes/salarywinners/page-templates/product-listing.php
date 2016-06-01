<?php

/* 
 * Template name: Product Listing
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => SW_PT_PRODUCT,
        'paged' => $paged // required for pagination
        ); 
    $products = new WP_Query($args); 
get_header();
?>
<section class="content-body product-details-page">
        	<div class="row">
            	<div class="container">
                	<div class="filter-section">
                    	<div class="filter-tab"><p>Advanced filters</p></div>
                        <div class="filter-tab">
                        	<div class="form-group">
                            	<label>keywords:</label>
                                <input type="search" placeholder="" class="form-control">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                        <div class="filter-tab">
                        	<div class="form-group">
                            	<label>Category:</label>
                                <select type="search" placeholder="" class="form-control">
                                	<option selected>Category</option>
                                    <option>Category</option>
                                    <option>Category</option>
                                    <option>Category</option>
                                </select>
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
                            	<label>Rating:</label>
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
                        	<a href="">X</a>
                            <small>Clear All</small>
                        </div>
                    </div>
                    <!--end filter button section-->
                    
                    <div class="normal">
                    	<div class="col-md-9 col-sm-8 ">
                        	<div class="row">
                                <div class="content">
                                    <?php if($products->have_posts()):                                  
                                           
                                        while ( $products->have_posts() ) : $products->the_post(); 
                                            
                                        $post_id = get_the_ID ();
                                        $post_meta = get_post_meta ( $post_id );
                                        $user_id = $post->post_author;
                                        $user = get_user_by('id', $user_id);
                                        $user_meta = get_user_meta($user_id);
                                        ?>
                                    <div class="product-details">
                                        <div class="normal">
                                            <div class="col-md-3 col-sm-3 col-xs-12">                                               
                                                
                                                     <?php if(!empty($post_meta['product_image'][0]))
                                                        {
                                                        ?>
                                                    <?php $avatar_data = wp_get_attachment_image_src($post_meta['product_image'][0]); ?>
                                                    <img id="profile-picture" src="<?php echo $avatar_data[0]; ?>" class="img-responsive">
                                                        <!--<img src="images/style-report.jpg" alt="" title="" class="img-responsive">-->
                                                    <?php } else { ?>
                                                        <img id="product_image" src="<?php echo get_template_directory_uri(); ?>/images/profile-image.png" class="img-responsive" alt="" title="">

                                                    <?php } ?>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <div class="col-xs-6">
                                                	<div class="row">
                                                    	<h3 class="title"><?php the_title();?></h3>
                                                    	<div class="job-author-name"><span class="user"></span><p><?php echo $user_meta['first_name'][0].' '.$user_meta['last_name'][0] ;?></p></div>
                                                    	<div class="job-location"><i class="location"></i> <b><?php echo $user_meta['city'][0].','.$user_meta['state'][0] ;?></b></div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                	<div class="button">
                                                    <a href="<?php the_permalink();?>" class="btn btn-work pull-right">View Details</a>
                                                    <a href="" class="btn btn-work pull-right"><span class="cart"></span>Cart</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="rating">
                                                            <em>5</em>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    	<h3 class="price"><span>Price:</span><b>$</b> <?php echo $post_meta['_price'][0];?></h3>
                                                    </div>
                                                    
                                                   <div class="col-md-12">
                                                   	<p>
                                                   <?php the_excerpt();?>
                                                    </p>
                                                   </div>
                                                   
                                                   <div class="row">
                                                        <div class="tags">
                                                            <span>Keywords:</span>
                                                            <?php
                                                                echo strip_tags(get_the_term_list($post_id, SW_TX_PRODUCT_KEYWORDS, '<ul><li>', '</li><li>', '</li></ul>' ),'<ul><li>');
                                                            ?>
                                                        </div>
                                                       <div class="tags">
                                                            <span>Category:</span>
                                                            <?php
                                                                echo strip_tags(get_the_term_list($post_id, SW_TX_PRODUCT_CATEGORY, '<ul><li>', '</li><li>', '</li></ul>' ),'<ul><li>');
                                                            ?>
                                                        </div>
                                                   </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                        <?php
                                            
                                        endwhile;
                                        
                                        ?>
                                    <?php 
                                    else:
                                    echo "No result found.";
                                    endif;?>
                                </div>
                                
                                <div class="">                               	
                                   <?php if (function_exists("sw_pagination"))
                                    {
                                        sw_pagination($products->max_num_pages);
                                    }
                                    ?>
                                   
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
