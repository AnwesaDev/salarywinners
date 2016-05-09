<?php

/* 
 * Template name: Dashboard Customer
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!is_user_logged_in()) {
        wp_redirect(get_bloginfo('siteurl'));
    }
$user_id = get_current_user_id();
$user = get_user_by('id', $user_id);
$user_meta = get_user_meta($user_id);

get_header();
?>

<section class="content-body customer-dashbord dashbord">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-3 col-sm-4 padd0">
                    	<nav class="nav nav-tabs">
                        	<ul>
                            	<li class="active"><a data-toggle="tab" href="#profile-setting">
                                <span class="profile"></span> profile setting</a></li>

                                <li><a data-toggle="tab" href="#notification">
                                <span class="notification"></span> notification Setting</a></li>

                                <li><a data-toggle="tab" href="#my-self"><span class="my-self"></span>about my self</a></li>

                                <li><a data-toggle="tab" href="#location"><span class="location"></span>location</a></li>

                                <li><a data-toggle="tab" href="#social-profiles"><span class="social-profiles"></span>Social profiles</a></li>

                                <li><a data-toggle="tab" href="#diary"><span class="diary"></span>my diary</a></li>

                                <li><a  data-toggle="tab" href="#documents"><span class="documents"></span>my documents</a></li>

                                <li><a  data-toggle="tab" href="#posted-job"><span class="posted-job"></span>posted job</a></li>

                                <li><a  data-toggle="tab" href="#proposals"><span class="proposals"></span>proposals & Quotations</a></li>

                                <li><a  data-toggle="tab" href="#awarderd-job"><span class="awarderd-job"></span>awarded jobs</a></li>

                                <li><a  data-toggle="tab" href="#massage"><span class="massage"></span>massages</a></li>

                                <li><a  data-toggle="tab" href="#ratings"><span class="ratings"></span>ratings & Reviews</a></li>

                                <li><a  data-toggle="tab" href="#orders"><span class="orders"></span>orders</a></li>

                                <li><a  data-toggle="tab" href="#transaction"><span class="transaction"></span>transaction</a></li>
                                <li><a  href=""><span class="sing-out"></span>sing out</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-9 col-sm-8 padd0">
                    	<div class="content">
                        	<div class="tab-content">
                            	<div id="profile-setting" class="tab-pane active">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">Profile Setting</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right" id="btn-profile-edit">edit</button></div>
                                    </div>
                                    <div class="contact-frm">
                                        <form action="" method="post" data-toggle="validator" role="form" name="form-setting">
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
                                                <input type="password" placeholder="" class="form-control" name="profile-password" id="profile-password" value="<?php echo $user->user_pass;?>" readonly="" data-error="Password is required" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="input-box form-group has-feedback" style="display: none" id="div-profile-confirm-password">
                                                <label>confirm password</label>
                                                <input type="password" placeholder="" class="form-control" name="profile-confirm-password" id="profile-confirm-password" data-match="#profile-password" data-match-error="Password do not match" required="">
                                                <div class="help-block with-errors has-feedback"></div>
                                            </div>

                                            <div class="input-box end-section form-group">
                                            	<label></label>
                                                <input type="submit" value="Save Settings" id="profile-save" disabled="" >
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="notification" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">notification Setting</h2></div>
                                        <div class="col-xs-4">
                                        <button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class="">

                                    </div>
                                </div>

                                <div id="my-self" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">About my self</h2></div>
                                        <div class="col-xs-4">
                                        <button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class="">
                                    	<form action="" method="">
                                        	<div class="form-group input-box">
                                            	<label for="">Profile image</label>
                                                <div class="profile-img"><img src="images/profile-image.png" alt="" title=""></div>
                                            </div>
                                            <div class="attachment ">
                                            	<label class="sub-label">Change Image</label>
                                                <button class="disabled btn-uplaod">Choose file</button>
                                                 <input type="file" placeholder="">
                                                 <small class="imgae-format">(Fileformat: PNG, JPEG)</small>
                                            </div>
                                            <div class="form-group input-box">
                                            	<label for="">Description</label>
                                                <textarea class="form-control" rows="10"></textarea>
                                            </div>

                                            <div class="form-group input-box">
                                            	<label for=""></label>
                                                <input type="submit" value="Save Settings">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div id="location" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">location</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="social-profiles" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">social profiles</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
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
                                        <div class="col-xs-8"><h2 class="title">notification Setting</h2></div>
                                        <div class="col-xs-4"><button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class=""></div>
                                </div>

                                <div id="posted-job" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">posted Job</h2></div>
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
        $("#profile-save").attr("disabled", false);
    });
    
    $('#profile-save').click(function(){
	var first_name = $("#profile-fname").attr('value');
        //alert(first_name);
        var last_name = $("#profile-lname").attr('value');
        var email = $("#profile-email").attr('value');
        var password = $("#profile-password").attr('value');
	
        var data = {
            action: 'update_user_profile',
            first_name: first_name,
            last_name: last_name,
            email: email,
            password: password
        };
        $.ajax({
            url: sw.ajaxurl,
            type: 'POST',
            data: data,
            success: function(response) {
            if(response.success == true){
                    var nclass = 'success';
                }    
                else
                {
                    var nclass = 'error';
                }
                
            $.notifyBar({
            cssClass: nclass,
            html: response.data['message'],
            close: true,
            delay: 100000,
            closeOnClick: false
        });
            }
                
         });            
    });
});
</script>
<?php
get_footer();
