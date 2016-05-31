<?php

/* 
 * Template name: Dashboard Provider
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!is_user_logged_in()) {
        wp_redirect(get_bloginfo('siteurl'));
    }
$user_id = get_current_user_id();
$user = new WP_User( $user_id );
$user_roles = $user->roles;
        if(!in_array(SW_ROLE_PROVIDER, $user_roles))
        {
             wp_redirect(get_bloginfo('siteurl'));
        }
$user = get_user_by('id', $user_id);
$user_meta = get_user_meta($user_id);

get_header();
?>
<section class="content-body providers-dashbord dashbord">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-3 col-sm-4 padd0">
                    	<nav class="nav nav-tabs">
                        	<ul>
                            	<li class="active"><a data-toggle="tab" href="#profile-setting">
                                <span class="profile"></span> profile setting</a></li>

                                <li><a data-toggle="tab" href="#notification">
                                <span class="notification"></span> notification Setting</a></li>

                                <li><a data-toggle="tab" href="#my-self"><span class="my-self"></span>about myself</a></li>

                                <li><a data-toggle="tab" href="#location"><span class="location"></span>location</a></li>

                                <li><a data-toggle="tab" href="#social-profiles"><span class="social-profiles"></span>Social profiles</a></li>

                                <li><a data-toggle="tab" href="#diary"><span class="diary"></span>my diary</a></li>

                                <li><a  data-toggle="tab" href="#documents"><span class="documents"></span>my documents</a></li>

                                <li><a  data-toggle="tab" href="#services"><span class="services"></span>Services</a></li>

                                <li><a  data-toggle="tab" href="#creat_product"><span class="creat_product"></span>Create a Product</a></li>

                                <li><a  data-toggle="tab" href="#product"><span class="product"></span>Products</a></li>

                                <li><a  data-toggle="tab" href="#job_alerts"><span class="job_alerts"></span>Job Alerts</a></li>


                                <li><a  data-toggle="tab" href="#proposals"><span class="proposals"></span>proposals & Quotations</a></li>

                                <li><a  data-toggle="tab" href="#awarderd-job"><span class="awarderd-job"></span>awarded jobs</a></li>

                                <li><a  data-toggle="tab" href="#completed_jobs"><span class="completed_jobs"></span>Completed Jobs</a></li>

                                <li><a  data-toggle="tab" href="#canceled_jobs"><span class="canceled_jobs"></span>canceled Jobs</a></li>

                                <li><a  data-toggle="tab" href="#massage"><span class="massage"></span>massages</a></li>

                                <li><a  data-toggle="tab" href="#ratings"><span class="ratings"></span>ratings & Reviews</a></li>

                                <li><a  data-toggle="tab" href="#orders"><span class="orders"></span>orders</a></li>

                                <li><a  data-toggle="tab" href="#transaction"><span class="transaction"></span>transaction</a></li>
                                <li><a  href=""><span class="sing-out"></span>sing out</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-9 col-sm-8 provider-dashbord">
                    	<div class="content" style="min-height:1300px;">
                        	<div class="tab-content">
                            	<div id="profile-setting" class="tab-pane active">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">Profile Setting</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right" id="btn-profile-edit">edit</button></div>
                                    </div>
                                    <div class="contact-frm">
                                        <form action="" id="form-provider-profile" method="post" data-toggle="validator" role="form" name="form-setting">
                                            <div class="input-box form-group has-feedback">
                                                <label>First name</label>
                                                <input type="text" placeholder="" class="form-control" name="profile-fname" id="profile-fname" value="<?php echo $user_meta['first_name'][0] ;?>" readonly="" data-error="First name is required" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>Last name</label>
                                                <input type="text" placeholder="" class="form-control" name="profile-lname" id="profile-lname" value="<?php echo $user_meta['last_name'][0] ;?>" readonly=""  data-error="Last name is required" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>Email Address</label>
                                                <input type="email" placeholder="" class="form-control" name="profile-email" id="profile-email" value="<?php echo $user->user_email;?>" readonly="" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" data-error="Please enter a valid email address" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>Password</label>
                                                <input type="password" placeholder="" class="form-control" name="profile-password" id="profile-password" value="" readonly="" data-error="Password is required">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback" style="display: none" id="div-profile-confirm-password">
                                                <label>confirm password</label>
                                                <input type="password" placeholder="" class="form-control" name="profile-confirm" id="profile-confirm" data-match="#profile-password" data-error="Password do not match">
                                                <div class="help-block with-errors has-feedback"></div>
                                            </div>

                                            <div class="input-box end-section form-group">
                                            	<label></label>
                                                <input type="submit" value="Save Settings" id="btn-profile-save" disabled="" >
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="notification" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">notification Setting</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="my-self" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">About myself</h2></div>
                                        <div class="col-xs-4">
                                            <button class="btn btn-edit pull-right" id="btn-about-edit">edit</button></div>
                                    </div>
                                    <div class="">
                                    	<form action="" id="form-provider-about" method="post" data-toggle="validator" role="form" name="form-setting" enctype="multipart/form-data">
                                        	<div class="form-group input-box">
                                            	<label for="">Profile image</label>
                                                <div class="profile-img">
                                                    <?php if(empty($user_meta['avatar'][0])): ?>
                                                    <img id="profile-picture" src="<?php echo get_template_directory_uri(); ?>/images/profile-image.png" class="img-circle" alt="" title="">
                                                    <?php else: ?>
                                                    <?php $avatar_data = wp_get_attachment_image_src($user_meta['avatar'][0]); ?>
                                                    <img id="profile-picture" src="<?php echo $avatar_data[0]; ?>" class="img-circle">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="attachment ">
                                            	<label class="sub-label">Change Image</label>
                                                <button class="disabled btn-upload" >Choose file</button>
                                                 <input type="file" placeholder="" name="avatar" id="btn-profile-image" disabled="">
                                                 <small class="imgae-format">(Fileformat: PNG, JPEG)</small>
                                            </div>
                                            <div class="form-group input-box">
                                            	<label for="">Description</label>
                                                <textarea class="form-control" rows="10" name="description" id="description" readonly="" ><?php echo $user_meta['description'][0] ;?></textarea>
                                            </div>

                                            <div class="form-group input-box">
                                            	<label for=""></label>
                                                <input type="submit" value="Save Settings" id="btn-about-save" disabled="">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div id="location" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">location</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right" id="btn-location-edit">edit</button></div>
                                    </div>
                                    <div class="contact-frm">
                                        <form action="" id="form-provider-location" method="post" data-toggle="validator" role="form" name="form-social-setting">                                          
                                            <div class="input-box form-group has-feedback">
                                                <label>Street No & Name</label>
                                                <input type="text" placeholder="" class="form-control" name="street" id="street" value="<?php echo $user_meta['street'][0] ;?>" readonly="" data-error="" >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>City</label>
                                                <input type="text" placeholder="" class="form-control" name="city" id="city" value="<?php echo $user_meta['city'][0] ;?>" readonly=""  data-error="" >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>State</label>
                                                <input type="text" placeholder="" class="form-control" name="state" id="state" value="<?php echo $user_meta['state'][0] ;?>" readonly="" data-error="" >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>Country</label>
                                                <?php sw_dropdown_country(array(
                                                    'name' => 'country',
                                                    'id' => 'select-country',
                                                    'class' => 'form-control',
                                                    'disabled' => true,
                                                    'selected' => $user_meta['country'][0]
                                                )); ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>Zip</label>
                                                <input type="text" placeholder="" class="form-control" name="zip" id="zip" value="<?php echo $user_meta['zip'][0] ;?>" readonly=""  data-error="" >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box end-section form-group">
                                            	<label></label>
                                                <input type="submit" value="Save Settings" id="btn-location-save" disabled="" >
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div id="social-profiles" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">social profiles</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right" id="btn-social-edit">edit</button></div>
                                    </div>
                                    <div class="contact-frm">
                                        <form action="" id="form-provider-social-profile" method="post" data-toggle="validator" role="form" name="form-social-setting">                                          
                                            <div class="input-box form-group has-feedback">
                                                <label>Facebook</label>
                                                <input type="text" placeholder="" class="form-control" name="social-facebook" id="social-facebook" pattern="^(www\.|http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$" value="<?php echo $user_meta['social_facebook'][0] ;?>" readonly=""  data-error="Please enter a valid url" >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>Twitter</label>
                                                <input type="text" placeholder="" class="form-control" name="social-twitter" id="social-twitter" value="<?php echo $user_meta['social_twitter'][0] ;?>" readonly="" pattern="^(www\.|http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$" data-error="Please enter a valid url"  >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback">
                                                <label>Google Plus</label>
                                                <input type="text" placeholder="" class="form-control" name="social-gplus" id="social-gplus" value="<?php echo $user_meta['social_gplus'][0] ;?>" readonly=""  pattern="^(www\.|http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$" data-error="Please enter a valid url" >
                                                <div class="help-block with-errors"></div>
                                            </div> 
                                            <div class="input-box form-group has-feedback">
                                                <label>Instagram</label>
                                                 <input type="text" placeholder="" class="form-control" name="social-instagram" id="social-instagram" value="<?php echo $user_meta['social_instagram'][0] ;?>" readonly=""  pattern="^(www\.|http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$" data-error="Please enter a valid url">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box end-section form-group">
                                            	<label></label>
                                                <input type="submit" value="Save Settings" id="btn-social-save" disabled="" >
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div id="diary" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">diary</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="documents" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">Documents</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="services" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">services</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="creat_product" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">creat a product</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="product" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">product</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="job_alerts" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">job alerts</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="proposals" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">proposals Quotations</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="awarderd-job" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">awarderd Job</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="completed_jobs" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">completed jobs</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="canceled_jobs" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">Canceled jobs</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="massage" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">massage</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="ratings" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">ratings & Review</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="orders" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">orders</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="transaction" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">transaction</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script>
jQuery(document).ready(function($){
    $('#btn-profile-edit').click(function(){
	$("#profile-fname").attr("readonly", false);			
	$("#profile-lname").attr("readonly", false); 
        $("#profile-email").attr("readonly", false);
        $("#profile-password").attr("readonly", false);
        $("#div-profile-confirm-password").css("display", "block");
        $("#btn-profile-save").attr("disabled", false);
    });
    $('#btn-social-edit').click(function(){
	$("#social-facebook").attr("readonly", false);
        $("#social-twitter").attr("readonly", false);
	$("#social-gplus").attr("readonly", false); 
        $("#social-instagram").attr("readonly", false);
        $("#btn-social-save").attr("disabled", false);
    });
    $('#btn-location-edit').click(function(){
	$("#street").attr("readonly", false);
        $("#city").attr("readonly", false);
	$("#state").attr("readonly", false); 
        $("#select-country").attr("disabled", false);  
        $("#zip").attr("readonly", false);  
        $("#btn-location-save").attr("disabled", false);
    });
    $('#btn-about-edit').click(function(){
	$("#description").attr("readonly", false);         
        $("#btn-profile-image").attr("disabled", false);
        $("#btn-about-save").attr("disabled", false);
    });
});

</script>
<?php
get_footer();
