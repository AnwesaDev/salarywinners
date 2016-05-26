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
    
    print_r($query_args_array);
    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'sw_job',
        'paged' => $paged // required for pagination
        ); 
    
    if(isset($query_args_array['job_category']) && !empty($query_args_array['job_category'])){
        $tax_query[] = array(
            'taxonomy' => 'sw_category',
            'field' => 'id',
            'terms' => $query_args_array['job_category']
        );
    }
    
    if(!empty($tax_query)){
        $args['tax_query'] = $tax_query;
    }
    
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
                                <input type="text" placeholder="" name="keywords" id="keywords" class="form-control">
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
                                            'selected'           => 0,
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
                                	<select name="country" id="select-country" class="form-control" >
                                        <option selected value="">Select Country</option>
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
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                                    <div class="filter-tab">
                        	<div class="form-group">
<!--                            	<label>Rating:</label>
                                <select type="search" placeholder="" class="form-control">
                                	<option selected>Location</option>
                                    <option>Location</option>
                                    <option>Location</option>
                                    <option>Location</option>
                                </select>
                                <i class="fa fa-angle-down"></i>-->
<!--
-->				<label>Price($):</label>
<input id="ex2" type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000" data-slider-step="5" data-slider-value="<?php if(!empty($query_args_array['price'])){ ?>[<?php echo $min_price;?>,<?php echo $max_price;?>]<?php } else { ?>[0,0]<?php } ?>" name="price" >


<!--								please include bootstrap slider.css and bootstrap-slider.js-->
                            </div>
                        </div>
                                    <div class="filter-tab">
                        	<a href="">X</a>
                            <small>Clear All</small>
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
<script>
    jQuery(document).ready(function($){
        $("#keywords").keypress(function(event) {
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
