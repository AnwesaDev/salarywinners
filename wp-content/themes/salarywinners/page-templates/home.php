<?php

/*
 * Template Name: Home
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. 
 */
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">	
	<?php wp_head();?>
</head>
<body>
	<div class="main-wrapper">
    	<!--Header Section-->
		<header class="header-section">
        	<!--To Navigaion Section-->
            
        	<div class="row"> 
                <div class="top-nav">
                	<nav class="navbar-right">
                        <ul>
                            <li><a href=""><span class="user"></span>Providers</a></li>
                            <li><a href=""><span class="login"></span>Login</a></li>
                            <li><a href=""><span class="join-now"></span>Join Now</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <!--Primery Navigaion Section-->
            <div class="row">
            	<div class="primery-nav" id="navigation">
                	<div class="col-md-4 col-sm-12 col-xs-8">
                    	<div class="logo">
                            <a href=""><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="" title="" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-4" id="navigaition">
                    <button class="button" id="btn-s-nav"><span class="fa fa-navicon"></span></button>
                    	<nav class="nav-right">
                        <button id="hide-nav" class="button"><span class="fa fa-times"></span></button>
                        <a class="on-mobile" href=""><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="" title="" class="img-responsive"></a>
                            <ul class="">
                                <li><a href=""><span class="h-wrk"></span>How it works</a></li>
                                <li><a href=""><span class="br-job"></span>browse job</a></li>
                                <li><a href=""><span class="prdct"></span>products</a></li>
                                <li><a href=""><span class="job"></span>post a job</a></li>
                                <li><a href=""><span class="cart"></span>cart</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        
        
        <!--Banner Section-->
        <section class="banner-section">
        	<div class="row">
            	<div class="banner">
                	<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/banner1.jpg" alt="" title="">
                </div>
            </div>
        </section>
        
        <!--Section-->
        <section class="search-section">
        	<div class="row">
            	<form method="" action="" id="search-frm" name="">
                    <div class="input-group search-box">
                    	<span class="larg">Search</span>
                        <input type="search" placeholder="Enter your Search keywords" >
                       <span class="input-group-btn">
                           <button class="btn btn-submit" type="button">
                              <span class="fa fa-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </section>
        
        <!--Section-->
        <section class="how-to-work">
        	<div class="row">
            	<div class="container">
                	<div class="normal">
                    	<h2 class="title">how it work</h2>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque, aliquet ut interdum nec, tristique non felis. Duis posuere congue nunc, quis consequat metus fermentum quis. Nulla interdum auctor nulla, vitae fringilla justo blandit in. Aenean non augue interdum, luctus urna ac, posuere dui.
                        </p>
                    </div>
                    
                    <div class="normal">
                    	<div class="watch-vedio">
                        <button class="btn vedio-btn">Watch Vedio</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="big-icon">
        	<div class="row">
            	<div class="container">
                	<div class="col-md-3 col-sm-6 col-xs-12">
                    	<div class="icon-holder"><img src="<?php echo get_template_directory_uri();?>/images/big-icon1.png" class="img-responsive" alt="" title=""></div>
                        <div class="content">
                        	<h3>Search</h3>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    	<div class="icon-holder"><img src="<?php echo get_template_directory_uri();?>/images/big-icon2.png" class="img-responsive" alt="" title=""></div>
                        <div class="content">
                        	<h3>Review</h3>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    	<div class="icon-holder"><img src="<?php echo get_template_directory_uri();?>/images/big-icon3.png" class="img-responsive" alt="" title=""></div>
                        <div class="content">
                        	<h3>Select</h3>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    	<div class="icon-holder"><img src="<?php echo get_template_directory_uri();?>/images/big-icon4.png" class="img-responsive" alt="" title=""></div>
                        <div class="content">
                        	<h3>Purchase</h3>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                            </p>
                        </div>
                    </div>
                    <div class="thik-border"></div>
                </div>
            </div>
        </section>
        
        <section class="gallery">
          <div class="row">
              <div class="gallery-box">
                  <div class="thumb">
                  	<img src="<?php echo get_template_directory_uri();?>/images/img-thumb1.jpg" alt="" title="">
                  </div>
                  <div class="thumb-content">
                  	<h3 class="title">Hi, this is title</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                    </p>
                    <i></i>
                  </div>
              </div>
              
              <div class="gallery-box">
                  <div class="thumb">
                  	<img src="<?php echo get_template_directory_uri();?>/images/img-thumb2.jpg" alt="" title="">
                  </div>
                  <div class="thumb-content">
                  	<h3 class="title">Hi, this is title</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                    </p>
                    <i></i>
                  </div>
              </div>
              
              <div class="gallery-box">
                  <div class="thumb-content">
                  	<h3 class="title">Hi, this is title</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                    </p>
                    <i></i>
                  </div>
                   <div class="thumb">
                  	<img src="<?php echo get_template_directory_uri();?>/images/img-thumb3.jpg" alt="" title="">
                  </div>
              </div>
              
              <div class="gallery-box">
                  <div class="thumb-content">
                  	<h3 class="title">Hi, this is title</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacus neque.
                    </p>
                    <i></i>
                  </div>
                   <div class="thumb">
                  	<img src="<?php echo get_template_directory_uri();?>/images/img-thumb4.jpg" alt="" title="">
                  </div>
              </div>
            
              
           </div>
        </section>
        <!--Clients Sectoin-->
        <section class="clients">
        	<div class="row">
            	<div class="container">
                	<h2 class="title">Happy Clients</h2>
                    
                	<div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="list-group-item box">
                        	<img src="<?php echo get_template_directory_uri();?>/images/clients-pic1.png" alt="" title="">
                            <h3 class="name">thomas</h3>
                        	<P>
                             "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin urna risus, congue quis nisi eu, condimentum condimentum ex."
                            </P>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="list-group-item box">
                        	<img src="<?php echo get_template_directory_uri();?>/images/clients-pic2.png" alt="" title="">
                            <h3 class="name">thomas</h3>
                        	<P>
                             "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin urna risus, congue quis nisi eu, condimentum condimentum ex."
                            </P>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="list-group-item box">
                        	<img src="<?php echo get_template_directory_uri();?>/images/clients-pic3.png" alt="" title="">
                            <h3 class="name">thomas</h3>
                        	<P>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin urna risus, congue quis nisi eu, condimentum condimentum ex."
                            </P>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        
        <!--Footer Section-->
        <footer class="footer-section">
        	<div class="row">
            	<div class="social">
                	<a href=""><span class="fa fa-facebook"></span></a>
                    <a href=""><span class="fa fa-twitter"></span></a>
                    <a href=""><span class="fa fa-linkedin"></span></a>
                    <a href=""><span class="fa fa-instagram"></span></a>
                    <a href=""><span class="fa fa-pinterest"></span></a>
                </div>
                <div class="container">
                    <div class="col-md-6 padd0">
                        <div class="footer-nav">
                            <nav class="">
                                <ul>
                                    <li><a href="">About</a></li>
                                    <li><a href="">contact</a></li>
                                    <li><a href="">FAQ</a></li>
                                    <li><a href="">blog</a></li>
                                    <li><a href="">terms & condition</a></li>
                                    <li><a href="">Privacy policy</a></li>
                                </ul>
                            </nav>
                            <div class="copyright">
                                <p>Copyright &copy; salarywinners.com<a href=""></a> All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="payment">
                       		<a href=""><img src="<?php echo get_template_directory_uri();?>/images/visa.png" alt="" title=""></a>
                            <a href=""><img src="<?php echo get_template_directory_uri();?>/images/master.png" alt="" title=""></a>
                            <a href=""><img src="<?php echo get_template_directory_uri();?>/images/payple.png" alt="" title=""></a>
                            <a href=""><img src="<?php echo get_template_directory_uri();?>/images/american.png" alt="" title=""></a>
                       </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <div class="navbar-fixed-bottom">
        	<div class="back-to-top">
            	<a href=""><img src="<?php echo get_template_directory_uri();?>/images/top.png" alt="" title=""></a>
            </div>
        </div>
        
	</div> <!-- end main Wrapper class -->
<?php wp_footer();?>
</body>
</html>