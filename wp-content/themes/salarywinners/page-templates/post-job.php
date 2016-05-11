<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Template Name: Post a Job
 */

get_header();
?>

<section class="content-body post-a-job">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-8 col-sm-8">
                    	<div class="contact-frm">
                            <div class="col-md-12">
                            	<h2 class="title">Contact</h2>
                            </div>
                            <form id="" name="" method="" action="">
                                <div class="input-box">
                                    <label for="">Job Title</label>
                                    <input type="text" placeholder="Job Title" name="">
                                </div>
                                <div class="input-box">
                                    <label for="">Category</label>
                                    <select>
                                    	<option selected>Web desing</option>
                                        <option>Graphic desing</option>
                                        <option>Photoshop desing</option>
                                        <option>others</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <label for="">Desired skill</label>
                                    <input type="text" placeholder="Desired skill" name="">
                                </div>
                                <div class="input-box">
                                    <label for="">Job Description</label>
                                    <textarea placeholder="Job Description" name="" cols="" rows="6"></textarea>
                                </div>
                                <div class="input-box dollar">
                                    <label for="">Price range</label>
                                    <strong>$</strong><input type="text" value="100.00"> <em>To</em> <strong>$</strong><input type="text" 
                                    value="100.00">
                                </div>
                                
                                <div class="input-box attachment">
                                    <strong for=""><span class="fa fa-paperclip"></span>attachment</strong>
                                    <button class="disabled">Choose file</button>
                                    <input  type="file" value="">
                                    <small>(Fileformat: PDF, DOC, DOCX, PNG, JPEG)</small>
                                </div>
                                
                                <div class="input-box">
                                    <input type="submit" value="Post the job">
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
                    <div class="col-md-4 col-sm-4">
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
        </section>
<?php 
get_footer();