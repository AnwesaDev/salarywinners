<?php
/**
 * Template Name: Post a Job
 */
    
    global $wpdb, $mail, $wp_session;
        if(!is_user_logged_in()) {
            $error = true;
            $message = 'Please login as a customer to post a job';
            if($error){
                $notifyClass = 'error';
            } else {
                $notifyClass = 'success';
            }
            
            $wp_session['notify'] = array(
                'class' => $notifyClass,
                'message' => $message,
            );
            if($error){
                wp_redirect(get_bloginfo('siteurl'));
                exit();
             }
        }
            $user_id = get_current_user_id();
            $user = new WP_User( $user_id );
            $user_roles = $user->roles;
        if(!in_array(SW_ROLE_CUSTOMER, $user_roles))
        {
            $error = true;
            $message = 'Please login as a customer to post a job';
            if($error){
                $notifyClass = 'error';
            } else {
                $notifyClass = 'success';
            }
            
            $wp_session['notify'] = array(
                'class' => $notifyClass,
                'message' => $message,
            );
            if($error){
                wp_redirect(get_bloginfo('siteurl'));
                exit();
             }
        }
        if($_POST['btn-job-submit']=='Post the job')
        {
            $job_title = $wpdb->escape(trim($_POST['job-title']));
            $job_description = $wpdb->escape(trim($_POST['job-description']));
            $category = $wpdb->escape(trim($_POST['job_category']));
            $skill = $wpdb->escape(trim($_POST['skill']));
            $price = $wpdb->escape(trim($_POST['price']));
            
            //$job_attachment = $_FILES['job_attachment'];
            
            $post_id = wp_insert_post(array (
            'post_type' => 'sw_job',
            'post_title' => $job_title,
            'post_content' => $job_description,
            'post_status' => 'publish',            
            ));
            if ($post_id) {
            // insert taxonomies
                wp_set_post_terms( $post_id, $category, 'sw_category' );
                wp_set_post_terms( $post_id, $skill, 'sw_skill' );
                
            // insert post meta
             
            add_post_meta($post_id, '_price', $price);
            
            
            // These files need to be included as dependencies when on the front end.
            require_once( ABSPATH . 'wp-admin/includes/image.php' );
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            require_once( ABSPATH . 'wp-admin/includes/media.php' );
            // Let WordPress handle the upload.
            // Remember, 'avatar' is the name of our file input.
            $attachment_id = media_handle_upload( 'job_attachment', $post_id );
            if ( !is_wp_error( $attachment_id ) ) {
                add_post_meta($post_id, 'job_attachment', $attachment_id); 
                $attachment_id = wp_get_attachment_url($attachment_id);
                
                if($attachment_id){
                    //
                } else {
                    
                }
            } else {
                $error = true;
                $message = 'problem to upload attachment';
            }
            //print_r($attachment_id);die();
            
            }
             $message = 'Your job has been posted successfully'; 
             if($error){
                $notifyClass = 'error';
            } else {
                $notifyClass = 'success';
            }
            
            $wp_session['notify'] = array(
                'class' => $notifyClass,
                'message' => $message,
            );
            if(!$error){
                wp_redirect(get_bloginfo('siteurl'));
                exit();
             }
        }
        
get_header();
?>

<section class="content-body post-a-job">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-9 col-sm-8">
                    	<div class="contact-frm">
                            <div class="col-md-12">
                            	<h2 class="title">Post a Job</h2>
                            </div>
                            <form action="" method="POST" id="job-post" data-toggle="validator" role="form" enctype="multipart/form-data">
                                <div class="input-box form-group has-feedback">
                                    <label for="">Job Title</label>
                                    <input type="text" placeholder="Job Title" class="form-control" name="job-title" id="job-title" data-error="Job Title is required" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="input-box">
                                    <label for="">Category</label>
                                    <?php
                                    $args = array(
                                            'show_option_all'    => '',
                                            'show_option_none'   => '',
                                            'option_none_value'  => '-1',
                                            'orderby'            => 'ID', 
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
                                            'class'              => '',
                                            'depth'              => 0,
                                            'tab_index'          => 0,
                                            'taxonomy'           => 'sw_category',
                                            'hide_if_empty'      => false,
                                            'value_field'	 => 'term_id',	
                                        );
                                    wp_dropdown_categories( $args );
                                    ?>
                                </div>
                                <div class="input-box">
                                    <label for="">Desired skill</label>
                                    <input type="text" placeholder="Desired skill" name="skill" id="skill">
                                </div>
                                <div class="input-box form-group has-feedback">
                                    <label for="">Job Description</label>
                                    <textarea placeholder="Job Description" class="form-control" name="job-description" id="job-description" data-error="Job description is required" required="" cols="" rows="6"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="input-box dollar form-group has-feedback">
                                    <label for="">Price</label>
                                    <strong>$</strong><input type="text" value="0.00" class="form-control" name="price" id="price" data-error="Min price is required" required="">
                                    <div class="help-block with-errors"></div>                                    
                                </div>
                                
                                <div class="input-box attachment">
                                    <strong for=""><span class="fa fa-paperclip"></span>attachment</strong>
                                    <button class="disabled btn-upload">Choose file</button>
                                    <input  type="file" value="" id="job_attachment" name="job_attachment" accept=".pdf,.doc, .docs, .png, .jpeg">
                                    <small>(Fileformat: PDF, DOC, DOCX, PNG, JPEG)</small>
                                </div>
                                
                                <div class="input-box">
                                    <input type="submit" value="Post the job" name="btn-job-submit" id="btn-job-submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <script type="text/javascript">
					document.getElementById("uploadBtn").onchange = function () {
					document.getElementById("uploadFile").value = this.value;
					};
					</script>
                    <!--Side Bar-->
                    <div class="col-md-3 col-sm-4">
                    	<div class="row">
							<div class="sidebar">
                        
								<div class="sidebar-search">
									<form method="" action="">
										<input type="search" placeholder="Search">
										<i class="fa fa-search"></i>
									</form>
								</div>

								<div class="recent-post">
									<h2 class="title">recent Post</h2>
									<ul>
										<li><a href="">Vivamus vehicula leo scelerisque</a></li>
										<li><a href="">eu pharetra odio interdum.</a></li>
										<li><a href="">Suspendisse nec justo a enim mattis.</a></li>
										<li><a href="">parturient montes, nascetur ridiculus mus.</a></li>
									</ul>
								</div>

								<div class="recent-comment">
									<h2 class="title">recent Comment</h2>
									<ul>
										<li><span class="fa fa-comment"></span><a href="">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean aliquam leo vel risus sodales condimen a molestie libero. Duis lacus est, porttitor vel cursus scelerisque, laoreet et tortor. Suspendisse sagittis massa tellus, sit amet dapibus magna mollis quis.
										</a></li>
									</ul>
								</div>

								<div class="catagory">
									<h2 class="title">catagories</h2>
									<ul>
										<li><a href="">Lorem ipsum dolor sit amet</a></li>
										<li><a href="">Lorem ipsum dolor sit amet</a></li>
										<li><a href="">Lorem ipsum dolor sit amet</a></li>
										<li><a href="">Lorem ipsum dolor sit amet</a></li>
										<li><a href="">Lorem ipsum dolor sit amet</a></li>
									</ul>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </section>
<?php 
get_footer();
