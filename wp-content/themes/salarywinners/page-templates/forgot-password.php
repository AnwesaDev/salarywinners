<?php
/* 
 * Template Name: Forgot Password
 */
 global $wpdb, $mail, $wp_session;
        
        $error = false;
        
        // check if we're in reset form
        if( isset( $_POST['task'] ) && $_POST['task'] == 'Get New Password') 
        {
            $email = trim($_POST['email']);
            
            if( empty( $email ) ) {
                $message = __('Enter a username or e-mail address..','salarywinners');
                $error = true;
                
            } else if( ! is_email( $email )) {
                $message = 'Invalid username or e-mail address.';
                $error = TRUE;
                
            } else if( ! email_exists( $email ) ) {
                $message = 'There is no user registered with that email address.';
                $error = true;
            } else {
                 // <-----------Mail Part----------------->
                 $message = 'A reset password link has been sent to you. Please check your email.';
                 
                $mail->forgotPassword(array('user_id'=>$user_id, 'email'=>$email));
                
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
           
        }
get_header();
?>
       
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