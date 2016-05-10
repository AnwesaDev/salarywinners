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
$user = new WP_User( $user_id );
$user_roles = $user->roles;
        if(!in_array(SW_ROLE_CUSTOMER, $user_roles))
        {
             wp_redirect(get_bloginfo('siteurl'));
        }
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

                                <li><a data-toggle="tab" href="#my-self"><span class="my-self"></span>about myself</a></li>

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
                                        <form action="" id="form-profile" method="post" data-toggle="validator" role="form" name="form-setting">
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
                                        <div class="col-xs-4">
                                        <button class="btn btn-edit pull-right">edit</button></div>
                                    </div>
                                    <div class="">

                                    </div>
                                </div>

                                <div id="my-self" class="tab-pane fade">
                                	<div class="content-head">
                                        <div class="col-xs-8"><h2 class="title">About myself</h2></div>
                                        <div class="col-xs-4">
                                        <button class="btn btn-edit pull-right" id="btn-about-edit">edit</button></div>
                                    </div>
                                    <div class="">
                                    	<form action="" id="form-customer-about" method="post" data-toggle="validator" role="form" name="form-setting">
                                        	<div class="form-group input-box">
                                            	<label for="">Profile image</label>
                                                <div class="profile-img"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-image.png" alt="" title=""></div>
                                            </div>
                                            <div class="attachment ">
                                            	<label class="sub-label">Change Image</label>
                                                <button class="disabled btn-uplaod">Choose file</button>
                                                 <input type="file" placeholder="">
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
                                        <form action="" id="form-customer-location" method="post" data-toggle="validator" role="form" name="form-social-setting">                                          
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
                                                <select name="country" id="select-country" class="form-control" disabled="" >
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
                                        <form action="" id="form-customer-social-profile" method="post" data-toggle="validator" role="form" name="form-social-setting">                                          
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
        $("#btn-about-save").attr("disabled", false);
    });
});
</script>
<?php
get_footer();
