<?php

/* 
 * Template Name: Signup Seller
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
		$error = true;
		$error_type = 'password';
		$message = 'Please enter your password';
                $wp_session = $message;
                //echo '$message';die();
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$message = 'Invalid email address.';
                $wp_session = $message;
                //echo $err;die();
	} else if(email_exists($email) ) {
		$message = 'Email already exist.';
                $wp_session = $message;
                //echo $err;die();
	} else if($pwd != $cpwd){
		$message = 'Password do not match.';
                $wp_session['reg_msg'] = $message;
                //echo $err;die();
	} else {
               
		$user_id = wp_insert_user( array ('first_name' => $fname, 'last_name' => $lname, 'user_login' => $email, 'user_pass' => $pwd, 'user_email' => $email, 'role' => 'subscriber' ) );
		if( is_wp_error($user_id) ) {
			$message = 'Error on user creation.';
                        $wp_session['reg_msg'] = $message;
                         //echo $err;die();
		} else {
			do_action('user_register', $user_id);
                        
                    update_user_meta($user_id, 'company', $company);                    
                    update_user_meta($user_id, 'phone',   $phone);
                    update_user_meta($user_id, 'country', $country);
                    update_user_meta($user_id, 'category', $category);
                    update_user_meta($user_id, 'specialized', $specialized);
                    
                    
//                 <--------- Resistration Mail----------->
                        $mail->userRegistration($user_id);
                      
//                        $to         = $email;
//                        $subject    = 'Registration successful on '.get_bloginfo('name');
//                                $message    = 'Thank you for signing up with'.get_bloginfo('name');
//                               
//
//                        $headers = array('Content-Type: text/html; charset=UTF-8');
//                        $headers[] = 'From: '.get_bloginfo('name').' <' . get_bloginfo('admin_email') . '>';
//
//                        wp_mail( $to, $subject, $message, $headers);
                        
 //    <------------------------Registration Mail End-------------------->
			
			$message = 'You\'re successfully register';
                        $wp_session['reg_msg'] = $message;
                        
                        wp_redirect(get_bloginfo('siteurl').'/login/');
		}
		
	}
	
}

get_header();
?>

        <?php get_template_part('template-parts/block', 'search'); ?>

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
                                <h2 class="title">Create a Account</h2>
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
                                   <select name="country" id="country" class="form-control">
                                        <option selected>Choose Country</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                        <option>American Samoa</option>
                                        <option>Andorra</option>
                                        <option>Angola</option>
                                        <option>Anguilla</option>
                                        <option>Antarctica</option>
                                        <option>Antigua and Barbuda</option>
                                        <option>Argentina</option>
                                        <option>Armenia</option>
                                        <option>Aruba</option>
                                        <option>Australia</option>
                                        <option>Austria</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                        <option>Belarus</option>
                                        <option>Belgium</option>
                                        <option>Belize</option>
                                        <option>Benin</option>
                                        <option>Bermuda</option>
                                        <option>Bhutan</option>
                                        <option>Bolivia</option>
                                        <option>Bosnia and Herzegovina</option>
                                        <option>Botswana</option>
                                        <option>Bouvet Island</option>
                                        <option>Brazil</option>
                                        <option>British Indian Ocean Territory</option>
                                        <option>Brunei Darussalam</option>
                                        <option>Bulgaria</option>
                                        <option>Burkina Faso</option>
                                        <option>Burundi</option>
                                        <option>Cambodia</option>
                                        <option>Cameroon</option>
                                        <option>Canada</option>
                                        <option>Cape Verde</option>
                                        <option>Cayman Islands</option>
                                        <option>Central African Republic</option>
                                        <option>Chad</option>
                                        <option>Chile</option>
                                        <option>China</option>
                                        <option>Christmas Island</option>
                                        <option>Cocos Islands</option>
                                        <option>Colombia</option>
                                        <option>Comoros</option>
                                        <option>Congo</option>
                                        <option>Congo, Democratic Republic of the</option>
                                        <option>Cook Islands</option>
                                        <option>Costa Rica</option>
                                        <option>Cote d'Ivoire</option>
                                        <option>Croatia</option>
                                        <option>Cuba</option>
                                        <option>Cyprus</option>
                                        <option>Czech Republic</option>
                                        <option>Denmark</option>
                                        <option>Djibouti</option>
                                        <option>Dominica</option>
                                        <option>Dominican Republic</option>
                                        <option>Ecuador</option>
                                        <option>Egypt</option>
                                        <option>El Salvador</option>
                                        <option>Equatorial Guinea</option>
                                        <option>Eritrea</option>
                                        <option>Estonia</option>
                                        <option>Ethiopia</option>
                                        <option>Falkland Islands</option>
                                        <option>Faroe Islands</option>
                                        <option>Fiji</option>
                                        <option>Finland</option>
                                        <option>France</option>
                                        <option>French Guiana</option>
                                        <option>French Polynesia</option>
                                        <option>Gabon</option>
                                        <option>Gambia</option>
                                        <option>Georgia</option>
                                        <option>Germany</option>
                                        <option>Ghana</option>
                                        <option>Gibraltar</option>
                                        <option>Greece</option>
                                        <option>Greenland</option>
                                        <option>Grenada</option>
                                        <option>Guadeloupe</option>
                                        <option>Guam</option>
                                        <option>Guatemala</option>
                                        <option>Guinea</option>
                                        <option>Guinea-Bissau</option>
                                        <option>Guyana</option>
                                        <option>Haiti</option>
                                        <option>Heard Island and McDonald Islands</option>
                                        <option>Honduras</option>
                                        <option>Hong Kong</option>
                                        <option>Hungary</option>
                                        <option>Iceland</option>
                                        <option>India</option>
                                        <option>Indonesia</option>
                                        <option>Iran</option>
                                        <option>Iraq</option>
                                        <option>Ireland</option>
                                        <option>Israel</option>
                                        <option>Italy</option>
                                        <option>Jamaica</option>
                                        <option>Japan</option>
                                        <option>Jordan</option>
                                        <option>Kazakhstan</option>
                                        <option>Kenya</option>
                                        <option>Kiribati</option>
                                        <option>Kuwait</option>
                                        <option>Kyrgyzstan</option>
                                        <option>Laos</option>
                                        <option>Latvia</option>
                                        <option>Lebanon</option>
                                        <option>Lesotho</option>
                                        <option>Liberia</option>
                                        <option>Libya</option>
                                        <option>Liechtenstein</option>
                                        <option>Lithuania</option>
                                        <option>Luxembourg</option>
                                        <option>Macao</option>
                                        <option>Madagascar</option>
                                        <option>Malawi</option>
                                        <option>Malaysia</option>
                                        <option>Maldives</option>
                                        <option>Mali</option>
                                        <option>Malta</option>
                                        <option>Marshall Islands</option>
                                        <option>Martinique</option>
                                        <option>Mauritania</option>
                                        <option>Mauritius</option>
                                        <option>Mayotte</option>
                                        <option>Mexico</option>
                                        <option>Micronesia</option>
                                        <option>Moldova</option>
                                        <option>Monaco</option>
                                        <option>Mongolia</option>
                                        <option>Montenegro</option>
                                        <option>Montserrat</option>
                                        <option>Morocco</option>
                                        <option>Mozambique</option>
                                        <option>Myanmar</option>
                                        <option>Namibia</option>
                                        <option>Nauru</option>
                                        <option>Nepal</option>
                                        <option>Netherlands</option>
                                        <option>Netherlands Antilles</option>
                                        <option>New Caledonia</option>
                                        <option>New Zealand</option>
                                        <option>Nicaragua</option>
                                        <option>Niger</option>
                                        <option>Nigeria</option>
                                        <option>Norfolk Island</option>
                                        <option>North Korea</option>
                                        <option>Norway</option>
                                        <option>Oman</option>
                                        <option>Pakistan</option>
                                        <option>Palau</option>
                                        <option>Palestinian Territory</option>
                                        <option>Panama</option>
                                        <option>Papua New Guinea</option>
                                        <option>Paraguay</option>
                                        <option>Peru</option>
                                        <option>Philippines</option>
                                        <option>Pitcairn</option>
                                        <option>Poland</option>
                                        <option>Portugal</option>
                                        <option>Puerto Rico</option>
                                        <option>Qatar</option>
                                        <option>Romania</option>
                                        <option>Russian Federation</option>
                                        <option>Rwanda</option>
                                        <option>Saint Helena</option>
                                        <option>Saint Kitts and Nevis</option>
                                        <option>Saint Lucia</option>
                                        <option>Saint Pierre and Miquelon</option>
                                        <option>Saint Vincent and the Grenadines</option>
                                        <option>Samoa</option>
                                        <option>San Marino</option>
                                        <option>Sao Tome and Principe</option>
                                        <option>Saudi Arabia</option>
                                        <option>Senegal</option>
                                        <option>Serbia</option>
                                        <option>Seychelles</option>
                                        <option>Sierra Leone</option>
                                        <option>Singapore</option>
                                        <option>Slovakia</option>
                                        <option>Slovenia</option>
                                        <option>Solomon Islands</option>
                                        <option>Somalia</option>
                                        <option>South Africa</option>
                                        <option>South Georgia</option>
                                        <option>South Korea</option>
                                        <option>Spain</option>
                                        <option>Sri Lanka</option>
                                        <option>Sudan</option>
                                        <option>Suriname</option>
                                        <option>Svalbard and Jan Mayen</option>
                                        <option>Swaziland</option>
                                        <option>Sweden</option>
                                        <option>Switzerland</option>
                                        <option>Syrian Arab Republic</option>
                                        <option>Taiwan</option>
                                        <option>Tajikistan</option>
                                        <option>Tanzania</option>
                                        <option>Thailand</option>
                                        <option>The Former Yugoslav Republic of Macedonia</option>
                                        <option>Timor-Leste</option>
                                        <option>Togo</option>
                                        <option>Tokelau</option>
                                        <option>Tonga</option>
                                        <option>Trinidad and Tobago</option>
                                        <option>Tunisia</option>
                                        <option>Turkey</option>
                                        <option>Turkmenistan</option>
                                        <option>Tuvalu</option>
                                        <option>Uganda</option>
                                        <option>Ukraine</option>
                                        <option>United Arab Emirates</option>
                                        <option>United Kingdom</option>
                                        <option>United States</option>
                                        <option>United States Minor Outlying Islands</option>
                                        <option>Uruguay</option>
                                        <option>Uzbekistan</option>
                                        <option>Vanuatu</option>
                                        <option>Vatican City</option>
                                        <option>Venezuela</option>
                                        <option>Vietnam</option>
                                        <option>Virgin Islands, British</option>
                                        <option>Virgin Islands, U.S.</option>
                                        <option>Wallis and Futuna</option>
                                        <option>Western Sahara</option>
                                        <option>Yemen</option>
                                        <option>Zambia</option>
                                        <option>Zimbabwe</option>
                                   </select>
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
                                   <select name="category" id="category" class="form-control">
                                        <option selected>Web Design</option>
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
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group input-box has-feedback">
                                   <input type="checkbox" name="tnc" id="tnc" class="form-control" data-error="You must agree to the Terms and Conditions" required="">
                                   <b><star>*</star>terms and conditions</b>
                                   <div class="help-block with-errors"></div>
                                </div>
                                <div class="input-box">
                                   <input type="checkbox">
                                   <b><star>*</star>newsletter subscription</b>
                                </div>
                                <div class="input-box btn-submit">
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