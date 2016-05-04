<?php

/* 
 * Template Name: Forgot Password
 */
 global $wpdb;
        
        $error = '';
        $success = '';
        
        // check if we're in reset form
        if( isset( $_POST['task'] ) && $_POST['task'] == 'Get New Password') 
        {
            $email = trim($_POST['email']);
            
            if( empty( $email ) ) {
                $error = 'Enter a username or e-mail address..';
            } else if( ! is_email( $email )) {
                $error = 'Invalid username or e-mail address.';
            } else if( ! email_exists( $email ) ) {
                $error = 'There is no user registered with that email address.';
            } else {
                               
                 // <-----------Mail Part----------------->
                $user_data = get_user_by('email', $email);
                $token = get_password_reset_key( $user_data );
                
                $link  = add_query_arg(array('token'=>$token,'email'=>$email), get_bloginfo('siteurl').'/reset-password/');
                    $to = $email;
                    $subject = 'Reset Password';
                    $sender = get_option('name');
                    
                    $message = '<a href="'.$link.'">'.$link.'</a>';
                    
                    $headers[] = 'MIME-Version: 1.0' . "\r\n";
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers[] = "X-Mailer: PHP \r\n";
                    $headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";
                    
                    $mail = wp_mail( $to, $subject, $message, $headers );
                    echo $message;exit();
                    if( $mail ){
                        $success = 'A reset password link has been sent to you. Please check your email.';
                        
                } else {
                    $error = 'Oops something went wrong.Please try again';
                }
                
            }
            
            if( ! empty( $error ) )
                echo '<div class="message"><p class="error"><strong>ERROR:</strong> '. $error .'</p></div>';
            
            if( ! empty( $success ) )
                echo '<div class="error_login"><p class="success">'. $success .'</p></div>';
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
                            	<h2 class="title">Forgot Password</h2>
                            </div>
                            <form id="forgot" data-toggle="validator" role="form" method="post">
                            	<div class="input-box form-group">
                                    <input type="text" placeholder="Email" name="email" id="email" class="form-control" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" data-error="Please enter a valid email address" required="">
                                </div>
                                
                                
                                <div class="input-box form-group">
                                    <input type="submit" value="Get New Password" id="task" name="task" class="form-control">
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php 
get_footer();