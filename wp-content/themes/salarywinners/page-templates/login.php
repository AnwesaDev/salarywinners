<?php

/* 
 * Template Name: Login
 */
global $wpdb, $wp_session;
        
        $err = '';
        $success = '';
        
        if(isset($_POST['task']) && $_POST['task'] == 'login' )
        {
            //We shall SQL escape all inputs to avoid sql injection.
            $username = $wpdb->escape($_POST['email']);
            $password = $wpdb->escape($_POST['pwd']);
            $remember = $wpdb->escape($_POST['remember']);
            
            
            
                $user_data = array();
                $user_data['user_login'] = $username;
                $user_data['user_password'] = $password;
                $user_data['remember'] = $remember;  
                $user = wp_signon( $user_data, false );
                
                if ( is_wp_error($user) ) {
                    $message = $user->get_error_message();
                    $error = true;
                } else {
                    wp_set_current_user( $user->ID, $username );
                    do_action('set_current_user');
                    $message = 'Logged in successfully';
                    
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
                wp_redirect(get_bloginfo('siteurl'));
             }
        }
       
get_header();
?>

        
      
     <section class="content-body login-page">
        	<div class="container">
            	<div class="row">
                	<div class="login-box">
                        <div class="content">
                        	<div class="normal">
                            	<h2 class="title">Log in and get to work</h2>
                            </div>
                            <form id="sign-in" data-toggle="validator" role="form" method="post">
                            	<div class="input-box form-group has-feedback">
                                    <input type="text" placeholder="Username or Email" name="email" id="email" class="form-control" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" data-error="Please enter a valid email address" required="">
                                    <div class="help-block with-errors text-left"></div>
                                </div>
                                
                                <div class="input-box form-group has-feedback">
                                    <input type="password" placeholder="Password" name="pwd" id="pwd" class="form-control" required="">
                                    <div class="help-block with-errors text-left"></div>
                                </div>
                                <div class="input-box form-group">
                                    <input type="checkbox" class="form-control" name="remember" id="remember" value="true">
                                    <b> Remember me next time</b>
                                </div>
                                <div class="input-box form-group">
                                    <input type="submit" value="login" id="task" name="task" class="form-control">
                                </div>
                            </form>
                            <a class="text-left" href="<?php echo esc_url( get_bloginfo('siteurl').'/forgot-password' ); ?>">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php 
get_footer();
