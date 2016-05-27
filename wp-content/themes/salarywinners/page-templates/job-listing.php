<?php
/** 
 * 
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
    
    //print_r($query_args_array);
    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'sw_job',
        'paged' => $paged // required for pagination
        ); 
    
    $getKeyword = '';
    if(isset($query_args_array['keywords']) && !empty($query_args_array['keywords'])){
        $args['s'] = $query_args_array['keywords'];
        $getKeyword = $query_args_array['keywords'];
    }
    $selectedCategory = 0;
    
    if(isset($query_args_array['job_category']) && !empty($query_args_array['job_category'])){
        $tax_query[] = array(
            'taxonomy' => 'sw_category',
            'field' => 'id',
            'terms' => $query_args_array['job_category']
        );
        $selectedCategory = $query_args_array['job_category'];
    }
    
    $selectedCountry = false;
    
    if(isset($query_args_array['country']) && !empty($query_args_array['country'])){
        $user_search = new WP_User_Query( array(
        'meta_key' => 'country' , 
        'meta_value' => $query_args_array['country']
        ));
        $selectedCountry = $query_args_array['country'];
        
        $listers = $user_search->get_results();
        $lister_ids = array();
        foreach($listers as $lister) {
            $lister_ids[] = $lister->ID;
        }
        
        //$authors = implode(',', $lister_ids);
        //print_r($authors);
        
        if(!empty($lister_ids)){
            $args['author__in'] = $lister_ids;
        } else {
            $args['author__in'] = array(0);
        }
        
    }
    
    $meta_query  = array();
    $min = $max = 0;
    if(isset($query_args_array['min']) && !empty($query_args_array['min'])){
       
        if(is_numeric($query_args_array['min'])){
            $min = (int) $query_args_array['min'];
        }
        
        if(isset($query_args_array['max']) && !empty($query_args_array['max'])){
            if(is_numeric($query_args_array['max'])){
                $max = (int) $query_args_array['max'];
            }
        }
        
        if($max > 0 ){
            // between clause
            $meta_query = array(
                        'relation' => 'AND',
                        array(
                                'key'     => '_price',
                                'value'   => array($min,$max),
                                'compare' => 'BETWEEN',
                                'type'    => 'numeric'
                        )
                );
            
        } else {
            // min
            $meta_query = array(
                'relation' => 'AND',
                array(
                    'key'   => '_price',
                    'value' => $min,
                    'compare' => '>=',
                    'type'  => 'numeric',
                ),
            );
        }
    }
    
    if(!empty($tax_query)){
        $args['tax_query'] = $tax_query;
    }
    
    if(!empty($meta_query)){
        $args['meta_query'] = $meta_query;
    }
    
    //print_r($args);
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
                                        <input type="text" placeholder="keywords" value="<?php echo $getKeyword; ?>" name="keywords" id="keywords" class="form-control">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                                    <div class="filter-tab">
                        	<div class="form-group">
                            	<label>Category:</label>
                                <?php
                                    $args = array(
                                            'show_option_all'    => '',
                                            'show_option_none'   => 'Select Category',
                                            'option_none_value'  => '',
                                            'order'              => 'ASC',
                                            'show_count'         => 0,
                                            'hide_empty'         => 0, 
                                            'child_of'           => 0,
                                            'exclude'            => '',
                                            'echo'               => 1,
                                            'selected'           => $selectedCategory,
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
                                <?php sw_dropdown_country(
                                        array(
                                            'name'=>'country',
                                            'id' => 'select-country',
                                            'class' => 'form-control',
                                            'selected' => $selectedCountry,
                                            'blank'=>'Select Country',
                                            )); ?>
                            </div>
                        </div>
                        <div class="filter-tab">
                            <div class="form-group">
				<label>Price($):</label>
                                <input type="number" value="<?php echo $min; ?>" name="min" class="form-control input-range">
                                <b class="f-left">-</b>
                                <input type="number" value="<?php echo $max; ?>" name="max" class="form-control input-range">
                            </div>
                        </div>
                        <div class="filter-tab">
                        	<a href="">X</a>
<!--                            <small>Clear All</small>-->
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
                                                                Est. Budget: <span>$<?php echo $post_meta['_price'][0];?></span>
                                                                </b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                   <div class="row">
                                                       <?php the_content();?>
                                                   </div>
                                                   
                                                   <div class="row">
                                                   		<div class="tags">
                                                            <span>Skill:</span>
                                                            <?php
                                                                echo strip_tags(get_the_term_list($post_id, 'sw_skill', '<ul><li>', '</li><li>', '</li></ul>' ),'<ul><li>');
                                                            ?>
                                                        </div>
                                                        
                                                        <div class="tags">
                                                            <span>Category:</span>
                                                            <?php
                                                                echo strip_tags(get_the_term_list($post_id, 'sw_category', '<ul><li>', '</li><li>', '</li></ul>' ),'<ul><li>');
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
                                        sw_pagination($jobs->max_num_pages);
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
                                            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/style-report.jpg" alt="" title=""></a>
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
                                            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/style-report.jpg" alt="" title=""></a>
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
                                            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/style-report.jpg" alt="" title=""></a>
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
<script>
    jQuery(document).ready(function($){
        $("#keywords, .input-range").keypress(function(event) {
            if (event.which == 13) {
            event.preventDefault();
            $("form").submit();
           }
        });
       $("#job_category").on("change", function (e) { 
           //alert('hii');
           $( "#form-search" ).submit();
       }); 
       $("#select-country").on("change", function (e) { 
           //alert('hii');
           $( "#form-search" ).submit();
       });
       $("#ex2").on("slide", function (e) { 
           //alert('hii');
           $( "#form-search" ).submit();
       });
    });
</script>
<?php
    get_footer();
