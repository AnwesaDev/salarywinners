<?php
    if(is_user_logged_in()) {
        wp_redirect(get_bloginfo('siteurl'));
    }
    $token = $_GET['token'];
    
    $email = $_GET['email'];
    $user = check_password_reset_key($token,$email);
    
    if(is_wp_error($user)){
        $message = 'Invalid token';
        //echo $error;
    }
    else
    {
        $show_form = true;
    }
/* 
 * Template Name: Reset Password
 */
global $wpdb;
        
        $err = '';
        $success = '';
        
        if(isset($_POST['task']) && $_POST['task'] == 'Get New Password' )
        {
            //We shall SQL escape all inputs to avoid sql injection.
            $email = $wpdb->escape($_POST['email']);
            $npassword = $wpdb->escape($_POST['npwd']);
            $cpassword = $wpdb->escape($_POST['cpwd']);  
            
            if( $npassword == $cpassword ){
                $user = get_user_by( 'email', $email );
                reset_password($user,$npassword);
                wp_redirect(get_bloginfo('siteurl').'/login/');
            }
        }
get_header();
?>
        <?php //get_template_part('template-parts/block', 'search'); ?>
     <section class="content-body login-page">
        	<div class="container">
            	<div class="row">
                	<div class="login-box">
                        <div class="content">
                        	<div class="normal">
                            	<h2 class="title">Reset Password</h2>
                            </div>
                            <?php if($show_form): ?>
                            <form id="resetpassform" data-toggle="validator" role="form" method="post">
                                <input type="hidden" name="email" id="email" value="<?php echo $_GET['email'];?>"/>
                                <input type="hidden" name="token" id="token" value="<?php echo $_GET['token'];?>"/>
                            	
                                <div class="input-box form-group">
                                    <input type="password" placeholder="New Password" name="npwd" id="npwd" class="form-control" required="">
                                </div>
                                <div class="form-group input-box has-feedback end-section">                               
                               <input type="password" name="cpwd" id="cpwd" class="form-control" placeholder="Confirm Password" data-match="#npwd" data-match-error="Password do not match" required="">
                               <div class="help-block with-errors"></div>
                                </div>
                                <div class="input-box form-group">
                                    <input type="submit" value="Get New Password" id="task" name="task" class="form-control">
                                </div>
                            </form>
                           <?php else: ?>
                            <?php echo $message;?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
   
get_footer();