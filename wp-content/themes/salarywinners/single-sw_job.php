<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


get_header();
?>
     <section class="content-body job-detail-page">
        	<div class="container">
            	<div class="row">
                    <?php if(have_posts()): ?>
                    <?php while(have_posts()): the_post(); 
                            $post_id = get_the_ID ();
                            $post_meta = get_post_meta ( $post_id );
                            $user_id = $post->post_author;
                            $user = get_user_by('id', $user_id);
                            $user_meta = get_user_meta($user_id);
                    ?>
                    <div class="normal">
                    	<div class="col-md-9 col-sm-8 ">
                        	<div class="row">
                                <div class="content">
                                
                                    <div class="job-details">
                                        <h3 class="title"><?php the_title();?></h3>
                                        <div class="normal">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <?php if(empty($user_meta['avatar'][0])): ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/profile-image.png" class="img-circle img-responsive" alt="" title="">
                                                <?php else: ?>
                                                 <?php $avatar_data = wp_get_attachment_image_src($user_meta['avatar'][0]); ?>
                                                    <figure><img src="<?php echo $avatar_data[0]; ?>" class="img-circle" alt="" title=""></figure>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <div class="row">
                                                	<div class="job-author-name"><b><?php echo $user_meta['first_name'][0].' '.$user_meta['last_name'][0] ;?></b></div>
                                                	<div class="job-location"><i class="location"></i> <b><?php echo $user_meta['city'][0].','.$user_meta['state'][0] ;?></b></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="row">
                                                        	<div class="rating">
                                                                <em>5</em>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                            </div>
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
                                                   	<div class="col-md-12">
                                                            <?php the_content();?>
							</div> 
                                                   </div>
                                                    <?php if(!empty($post_meta['job_attachment'][0]))
                                                        {
                                                        ?>
                                                   <div class="attachment">
                                                       <a href="<?php echo wp_get_attachment_url($post_meta['job_attachment'][0]);?>" target="_blank">
                                                        <i class="fa fa-paperclip"></i>
                                                        <span>Open Attachment</span>
                                                        </a>
                                                   </div>
                                                    <?php } ?>
                                                   
                                                   <div class="row">
                                                   		<div class="tags">
                                                            <span>Skill:</span>
<!--                                                            <ul>
                                                                <li>Print Design</li>
                                                                <li>Print Advertising</li>
                                                                <li>Graphic Design</li>
                                                                <li>Web Design</li>
                                                                <li>Adobe Photoshop</li>
                                                            </ul>-->
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
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                        	<div class="row">
								<div class="sidebar">
									<div class="submit-proposal">
										<form action="" method="">
											<div class="input-box form-group">
												<label for="" class="cover-letter">Cover letter</label>
												<textarea rows="16" placeholder="" class="form-control"></textarea>
											</div>
											<div class="input-box attachment form-group">
												<label><span class="fa fa-paperclip"></span>attachment</label>
												<button class="disabled btn-upload">Choose file</button>
												<input  type="file" value="" class="form-control">
												<small>(Fileformat: PDF, DOC, DOCX, PNG, JPEG)</small>
											</div>
											<div class=" input-box form-group">
												<h4 class="title">Propose Terms</h4>
											</div>
											<div class="input-box dollar form-group">
												<label>Bid<small>This is what the client sees</small></label>
												<strong>$</strong>
												<input type="text" value="100.00">
											</div>

											<div class="input-box dollar form-group">
												<label>You'll earn<small>Estimated</small></label>
												<strong>$</strong>
												<input type="text" value="90.00">
											</div>

											<div class="input-box form-group">
												<h4 class="title">The client's budget is <b>$100.00</b></h4>
											</div>

											<div class="input-box form-group">
												<input type="submit" class="form-control" value="Submit proposal">
											</div>

										</form>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    
                </div>
            </div>
        </section>
<?php 
get_footer();
