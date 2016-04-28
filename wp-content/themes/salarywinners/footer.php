<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Salary_Winners
 */

?>    
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