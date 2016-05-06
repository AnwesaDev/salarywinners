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
                                   <select name="country" id="select-country" class="form-control" required>
                                        <option selected value="">Choose Country</option>
                                        <option value="AFG">Afghanistan</option>
                                        <option value="ALA">Åland Islands</option>
                                        <option value="ALB">Albania</option>
                                        <option value="DZA">Algeria</option>
                                        <option value="ASM">American Samoa</option>
                                        <option value="AND">Andorra</option>
                                        <option value="AGO">Angola</option>
                                        <option value="AIA">Anguilla</option>
                                        <option value="ATA">Antarctica</option>
                                        <option value="ATG">Antigua and Barbuda</option>
                                        <option value="ARG">Argentina</option>
                                        <option value="ARM">Armenia</option>
                                        <option value="ABW">Aruba</option>
                                        <option value="AUS">Australia</option>
                                        <option value="AUT">Austria</option>
                                        <option value="AZE">Azerbaijan</option>
                                        <option value="BHS">Bahamas</option>
                                        <option value="BHR">Bahrain</option>
                                        <option value="BGD">Bangladesh</option>
                                        <option value="BRB">Barbados</option>
                                        <option value="BLR">Belarus</option>
                                        <option value="BEL">Belgium</option>
                                        <option value="BLZ">Belize</option>
                                        <option value="BEN">Benin</option>
                                        <option value="BMU">Bermuda</option>
                                        <option value="BTN">Bhutan</option>
                                        <option value="BOL">Bolivia, Plurinational State of</option>
                                        <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BIH">Bosnia and Herzegovina</option>
                                        <option value="BWA">Botswana</option>
                                        <option value="BVT">Bouvet Island</option>
                                        <option value="BRA">Brazil</option>
                                        <option value="IOT">British Indian Ocean Territory</option>
                                        <option value="BRN">Brunei Darussalam</option>
                                        <option value="BGR">Bulgaria</option>
                                        <option value="BFA">Burkina Faso</option>
                                        <option value="BDI">Burundi</option>
                                        <option value="KHM">Cambodia</option>
                                        <option value="CMR">Cameroon</option>
                                        <option value="CAN">Canada</option>
                                        <option value="CPV">Cape Verde</option>
                                        <option value="CYM">Cayman Islands</option>
                                        <option value="CAF">Central African Republic</option>
                                        <option value="TCD">Chad</option>
                                        <option value="CHL">Chile</option>
                                        <option value="CHN">China</option>
                                        <option value="CXR">Christmas Island</option>
                                        <option value="CCK">Cocos (Keeling) Islands</option>
                                        <option value="COL">Colombia</option>
                                        <option value="COM">Comoros</option>
                                        <option value="COG">Congo</option>
                                        <option value="COD">Congo, the Democratic Republic of the</option>
                                        <option value="COK">Cook Islands</option>
                                        <option value="CRI">Costa Rica</option>
                                        <option value="CIV">Côte d'Ivoire</option>
                                        <option value="HRV">Croatia</option>
                                        <option value="CUB">Cuba</option>
                                        <option value="CUW">Curaçao</option>
                                        <option value="CYP">Cyprus</option>
                                        <option value="CZE">Czech Republic</option>
                                        <option value="DNK">Denmark</option>
                                        <option value="DJI">Djibouti</option>
                                        <option value="DMA">Dominica</option>
                                        <option value="DOM">Dominican Republic</option>
                                        <option value="ECU">Ecuador</option>
                                        <option value="EGY">Egypt</option>
                                        <option value="SLV">El Salvador</option>
                                        <option value="GNQ">Equatorial Guinea</option>
                                        <option value="ERI">Eritrea</option>
                                        <option value="EST">Estonia</option>
                                        <option value="ETH">Ethiopia</option>
                                        <option value="FLK">Falkland Islands (Malvinas)</option>
                                        <option value="FRO">Faroe Islands</option>
                                        <option value="FJI">Fiji</option>
                                        <option value="FIN">Finland</option>
                                        <option value="FRA">France</option>
                                        <option value="GUF">French Guiana</option>
                                        <option value="PYF">French Polynesia</option>
                                        <option value="ATF">French Southern Territories</option>
                                        <option value="GAB">Gabon</option>
                                        <option value="GMB">Gambia</option>
                                        <option value="GEO">Georgia</option>
                                        <option value="DEU">Germany</option>
                                        <option value="GHA">Ghana</option>
                                        <option value="GIB">Gibraltar</option>
                                        <option value="GRC">Greece</option>
                                        <option value="GRL">Greenland</option>
                                        <option value="GRD">Grenada</option>
                                        <option value="GLP">Guadeloupe</option>
                                        <option value="GUM">Guam</option>
                                        <option value="GTM">Guatemala</option>
                                        <option value="GGY">Guernsey</option>
                                        <option value="GIN">Guinea</option>
                                        <option value="GNB">Guinea-Bissau</option>
                                        <option value="GUY">Guyana</option>
                                        <option value="HTI">Haiti</option>
                                        <option value="HMD">Heard Island and McDonald Islands</option>
                                        <option value="VAT">Holy See (Vatican City State)</option>
                                        <option value="HND">Honduras</option>
                                        <option value="HKG">Hong Kong</option>
                                        <option value="HUN">Hungary</option>
                                        <option value="ISL">Iceland</option>
                                        <option value="IND">India</option>
                                        <option value="IDN">Indonesia</option>
                                        <option value="IRN">Iran, Islamic Republic of</option>
                                        <option value="IRQ">Iraq</option>
                                        <option value="IRL">Ireland</option>
                                        <option value="IMN">Isle of Man</option>
                                        <option value="ISR">Israel</option>
                                        <option value="ITA">Italy</option>
                                        <option value="JAM">Jamaica</option>
                                        <option value="JPN">Japan</option>
                                        <option value="JEY">Jersey</option>
                                        <option value="JOR">Jordan</option>
                                        <option value="KAZ">Kazakhstan</option>
                                        <option value="KEN">Kenya</option>
                                        <option value="KIR">Kiribati</option>
                                        <option value="PRK">Korea, Democratic People's Republic of</option>
                                        <option value="KOR">Korea, Republic of</option>
                                        <option value="KWT">Kuwait</option>
                                        <option value="KGZ">Kyrgyzstan</option>
                                        <option value="LAO">Lao People's Democratic Republic</option>
                                        <option value="LVA">Latvia</option>
                                        <option value="LBN">Lebanon</option>
                                        <option value="LSO">Lesotho</option>
                                        <option value="LBR">Liberia</option>
                                        <option value="LBY">Libya</option>
                                        <option value="LIE">Liechtenstein</option>
                                        <option value="LTU">Lithuania</option>
                                        <option value="LUX">Luxembourg</option>
                                        <option value="MAC">Macao</option>
                                        <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MDG">Madagascar</option>
                                        <option value="MWI">Malawi</option>
                                        <option value="MYS">Malaysia</option>
                                        <option value="MDV">Maldives</option>
                                        <option value="MLI">Mali</option>
                                        <option value="MLT">Malta</option>
                                        <option value="MHL">Marshall Islands</option>
                                        <option value="MTQ">Martinique</option>
                                        <option value="MRT">Mauritania</option>
                                        <option value="MUS">Mauritius</option>
                                        <option value="MYT">Mayotte</option>
                                        <option value="MEX">Mexico</option>
                                        <option value="FSM">Micronesia, Federated States of</option>
                                        <option value="MDA">Moldova, Republic of</option>
                                        <option value="MCO">Monaco</option>
                                        <option value="MNG">Mongolia</option>
                                        <option value="MNE">Montenegro</option>
                                        <option value="MSR">Montserrat</option>
                                        <option value="MAR">Morocco</option>
                                        <option value="MOZ">Mozambique</option>
                                        <option value="MMR">Myanmar</option>
                                        <option value="NAM">Namibia</option>
                                        <option value="NRU">Nauru</option>
                                        <option value="NPL">Nepal</option>
                                        <option value="NLD">Netherlands</option>
                                        <option value="NCL">New Caledonia</option>
                                        <option value="NZL">New Zealand</option>
                                        <option value="NIC">Nicaragua</option>
                                        <option value="NER">Niger</option>
                                        <option value="NGA">Nigeria</option>
                                        <option value="NIU">Niue</option>
                                        <option value="NFK">Norfolk Island</option>
                                        <option value="MNP">Northern Mariana Islands</option>
                                        <option value="NOR">Norway</option>
                                        <option value="OMN">Oman</option>
                                        <option value="PAK">Pakistan</option>
                                        <option value="PLW">Palau</option>
                                        <option value="PSE">Palestinian Territory, Occupied</option>
                                        <option value="PAN">Panama</option>
                                        <option value="PNG">Papua New Guinea</option>
                                        <option value="PRY">Paraguay</option>
                                        <option value="PER">Peru</option>
                                        <option value="PHL">Philippines</option>
                                        <option value="PCN">Pitcairn</option>
                                        <option value="POL">Poland</option>
                                        <option value="PRT">Portugal</option>
                                        <option value="PRI">Puerto Rico</option>
                                        <option value="QAT">Qatar</option>
                                        <option value="REU">Réunion</option>
                                        <option value="ROU">Romania</option>
                                        <option value="RUS">Russian Federation</option>
                                        <option value="RWA">Rwanda</option>
                                        <option value="BLM">Saint Barthélemy</option>
                                        <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KNA">Saint Kitts and Nevis</option>
                                        <option value="LCA">Saint Lucia</option>
                                        <option value="MAF">Saint Martin (French part)</option>
                                        <option value="SPM">Saint Pierre and Miquelon</option>
                                        <option value="VCT">Saint Vincent and the Grenadines</option>
                                        <option value="WSM">Samoa</option>
                                        <option value="SMR">San Marino</option>
                                        <option value="STP">Sao Tome and Principe</option>
                                        <option value="SAU">Saudi Arabia</option>
                                        <option value="SEN">Senegal</option>
                                        <option value="SRB">Serbia</option>
                                        <option value="SYC">Seychelles</option>
                                        <option value="SLE">Sierra Leone</option>
                                        <option value="SGP">Singapore</option>
                                        <option value="SXM">Sint Maarten (Dutch part)</option>
                                        <option value="SVK">Slovakia</option>
                                        <option value="SVN">Slovenia</option>
                                        <option value="SLB">Solomon Islands</option>
                                        <option value="SOM">Somalia</option>
                                        <option value="ZAF">South Africa</option>
                                        <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SSD">South Sudan</option>
                                        <option value="ESP">Spain</option>
                                        <option value="LKA">Sri Lanka</option>
                                        <option value="SDN">Sudan</option>
                                        <option value="SUR">Suriname</option>
                                        <option value="SJM">Svalbard and Jan Mayen</option>
                                        <option value="SWZ">Swaziland</option>
                                        <option value="SWE">Sweden</option>
                                        <option value="CHE">Switzerland</option>
                                        <option value="SYR">Syrian Arab Republic</option>
                                        <option value="TWN">Taiwan, Province of China</option>
                                        <option value="TJK">Tajikistan</option>
                                        <option value="TZA">Tanzania, United Republic of</option>
                                        <option value="THA">Thailand</option>
                                        <option value="TLS">Timor-Leste</option>
                                        <option value="TGO">Togo</option>
                                        <option value="TKL">Tokelau</option>
                                        <option value="TON">Tonga</option>
                                        <option value="TTO">Trinidad and Tobago</option>
                                        <option value="TUN">Tunisia</option>
                                        <option value="TUR">Turkey</option>
                                        <option value="TKM">Turkmenistan</option>
                                        <option value="TCA">Turks and Caicos Islands</option>
                                        <option value="TUV">Tuvalu</option>
                                        <option value="UGA">Uganda</option>
                                        <option value="UKR">Ukraine</option>
                                        <option value="ARE">United Arab Emirates</option>
                                        <option value="GBR">United Kingdom</option>
                                        <option value="USA">United States</option>
                                        <option value="UMI">United States Minor Outlying Islands</option>
                                        <option value="URY">Uruguay</option>
                                        <option value="UZB">Uzbekistan</option>
                                        <option value="VUT">Vanuatu</option>
                                        <option value="VEN">Venezuela, Bolivarian Republic of</option>
                                        <option value="VNM">Viet Nam</option>
                                        <option value="VGB">Virgin Islands, British</option>
                                        <option value="VIR">Virgin Islands, U.S.</option>
                                        <option value="WLF">Wallis and Futuna</option>
                                        <option value="ESH">Western Sahara</option>
                                        <option value="YEM">Yemen</option>
                                        <option value="ZMB">Zambia</option>
                                        <option value="ZWE">Zimbabwe</option>
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
