<?php

class mail {
    public function userRegistration($user_id) {
       $user = get_user_by('id', $user_id);
       $meta = get_user_meta($user_id); 
       $to         = $user->user_email;
       $subject    = 'Registration successful on '.get_bloginfo('name');	
		
		
        $message   = $salarywinnersOptions['email-user-registration'];
        
		
        $emailVars = array(
            'firstname' => $user->first_name,
            'lastname' => $user->last_name,
            'company'  => $meta['company'][0],
            'phone'  => $meta['phone'][0],
            'email' => $user->user_email
            
        );

        foreach ($emailVars as $key => $value) {
            $message = str_replace('{{' . $key . '}}', $value, $message);
        }
      
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $headers[] = 'From: '.get_bloginfo('name').' <' . get_bloginfo('admin_email') . '>';
        
        wp_mail( $to, $subject, $message, $headers);
        
    }
    
    public function forgotPassword($cred = array()) {
        extract($cred);
       $user = get_user_by('email', $email);
       $token = get_password_reset_key( $user );
                
                $link  = add_query_arg(array('token'=>$token,'email'=>$email), get_bloginfo('siteurl').'/reset-password/');
                $resetlink = '<a href="'.$link.'">'.$link.'</a>';
                    $to = $email;
                    $subject = 'Reset Password';
                    $sender = get_option('name');
                    
                    $message = $salarywinnersOptions['email-forgot-password'];
		
        $emailVars = array(
            'firstname' => $user->first_name,
            'lastname' => $user->last_name,
            'company'  => $meta['company'][0],
            'phone'  => $meta['phone'][0],
            'email' => $user->user_email,
            'resetlink' => $resetlink
            
        );

        foreach ($emailVars as $key => $value) {
            $message = str_replace('{{' . $key . '}}', $value, $message);
        }
      
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $headers[] = 'From: '.get_bloginfo('name').' <' . get_bloginfo('admin_email') . '>';
        
        wp_mail( $to, $subject, $message, $headers);
        
    }
}