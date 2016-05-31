<?php

/* 
 * Template Name: Signup Provider
 */
wp_insert_user( $userdata );

$err = '';
$message = '';

global $wpdb, $mail, $wp_session;

if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
    
	$pwd = $wpdb->escape(trim($_POST['pwd']));
	$cpwd = $wpdb->escape(trim($_POST['cpwd']));
	$fname = $wpdb->escape(trim($_POST['fname']));
	$lname = $wpdb->escape(trim($_POST['lname']));
	$email = $wpdb->escape(trim($_POST['email']));
	$company = $wpdb->escape(trim($_POST['company']));
        $phone = $wpdb->escape(trim($_POST['phone']));
        $country = $wpdb->escape(trim($_POST['country']));
        $category = $wpdb->escape(trim($_POST['category']));
        $specialized = $wpdb->escape(trim($_POST['specialized']));
	
	if (empty($pwd)) {
		$message = 'Please enter your password';
                $error = true;
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$message = 'Invalid email address.';
                $error = true;
	} else if(email_exists($email) ) {
		$message = 'Email already exist.';
                $error = true;
	} else if($pwd != $cpwd){
		$message = 'Password do not match.';
                $error = true;
	} else {
               
		$user_id = wp_insert_user( array ('first_name' => $fname, 'last_name' => $lname, 'user_login' => $email, 'user_pass' => $pwd, 'user_email' => $email, 'role' => 'provider' ) );
		if( is_wp_error($user_id) ) {
			$message = 'Error on user creation.';
                        $error = true;
		} else {
			do_action('user_register', $user_id);
                     $token = mt_rand(00000, 99999);
                     $token = md5($token);
                     $token = substr($token, 0, 10);
                    update_user_meta($user_id, 'company', $company);                    
                    update_user_meta($user_id, 'phone',   $phone);
                    update_user_meta($user_id, 'country', $country);
                    update_user_meta($user_id, 'category', $category);
                    update_user_meta($user_id, 'specialized', $specialized);
                    update_user_meta($user_id, 'status', 'inactive');
                    update_user_meta($user_id, 'activation_token', $token);
                    
//                 <--------- Resistration Mail----------->
                        $mail->userRegistration($user_id);
                      
//                       
 //    <------------------------Registration Mail End-------------------->
			
			$message = 'Your account has been registered successfully';
                       
		}
		
	}
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
                wp_redirect(get_bloginfo('siteurl').'/login/');
                exit();
             }
}

get_header();
?>
 

        <section class="content-body registration">
        	<div class="container">
            	<div class="row">
                	<!--Main Conatent section-->
                    <div class="page-main-title">
                    	<h2 class="title">Create a service providers / sellers Account</h2>
                    </div>
                    <div class="col-md-10 col-xs-offset-1">
                        <div class="contact-frm">
                            <div class="col-md-12">
                                <h2 class="title">I'm a Seller</h2>
                             </div>
                             <form action="" method="POST" id="sign-in" data-toggle="validator" role="form">
                                  
                                <div class="form-group input-box has-feedback">
                                    <label for="" class="control-label"><star>*</star>First Name</label>
                                   <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" data-error="First name is required" required="">
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group input-box has-feedback">
                                   <label for="" class="control-label"><star>*</star>Last Name</label>
                                   <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" data-error="Last name is required" required="">
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group input-box has-feedback">
                                   <label for="" class="control-label">Company Name</label>
                                   <input type="text" name="company" id="company" placeholder="Company Name">
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group input-box has-feedback">
                                   <label for="" class="control-label"><star>*</star>Phone Number</label>
                                   <input type="text"class="form-control" name="phone" id="phone" placeholder="Phone Number" data-error="Phone Number is required" required="">
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group input-box has-feedback">
                                   <label for="" class="control-label"><star>*</star>Country</label>
                                   <?php sw_dropdown_country(
                                        array(
                                            'name'=>'country',
                                            'id' => 'select-country',
                                            'class' => 'form-control',
                                            'selected' => '',
                                            'required' => 'required',
                                            'blank'=>'Select Country',
                                            )); ?>
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group input-box has-feedback">
                                   <label for="" class="control-label"><star>*</star>Email Address</label>
                                   <input type="email" name="email" id="email" class="form-control" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" data-error="Please enter a valid email address" placeholder="Email Address" required="">
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group input-box has-feedback">
                                   <label for="" class="control-label"><star>*</star>Password</label>
                                   <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" data-error="Password is required" required="">
                                </div>
                                <div class="form-group input-box has-feedback end-section">
                                   <label for="" class="control-label"><star>*</star>Confirm Password</label>
                                   <input type="password" name="cpwd" id="cpwd" class="form-control" placeholder="Confirm Password" data-match="#pwd" data-match-error="Password do not match" required="">
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group input-box has-feedback second-section">
                                   <label for="" class="control-label"><star>*</star>Category</label>
                                   <select name="category" id="select-category" class="form-control" multiple="multiple">
                                        <option>Web Design</option>
                                        <option>Adobe Photoshop</option>
                                        <option>Grapic Desing</option>
                                        <option>Print Media</option>
                                        <option>Video Editing</option>
                                        <option>Multimedia</option>
                                   </select>
                                </div>
                                <div class="form-group input-box has-feedback">
                                   <label for="" class="control-label"><star>*</star>Specialized in</label>
                                   <input type="text" name="specialized" id="specialized" class="form-control" placeholder="specialized in" data-error="Specialized in is required" required="">
                                   <div class="help-block with-errors error"></div>
                                </div>
                                <div class="form-group input-box has-feedback">
                                    <label></label>
                                   <input type="checkbox" name="tnc" id="tnc" class="form-control" data-error="You must agree to the Terms and Conditions" required="">
                                   <b><star>*</star>terms and conditions</b>
                                   <div class="help-block with-errors error"></div>
                                </div>
                                <div class="input-box btn-submit">
                                    <label></label>
                                    <input type="submit" name="task" value="register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php 
get_footer();
