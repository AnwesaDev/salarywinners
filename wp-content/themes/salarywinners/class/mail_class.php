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
        
        $mailStatus = wp_mail( $to, $subject, $message, $headers);
        
    }
}