<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*Update user setting*/
add_action('wp_ajax_update_user_profile', 'update_user_profile');
function update_user_profile() {
	extract($_POST);
	$error = false;
        
        $message = '';

        $user_id = get_current_user_id();
	$user = get_user_by('id', $user_id);

//	for ($i = 0; $i < COUNT($values); $i++) {
//            $data[$values[$i]['name']] = $values[$i]['value'];
//	}

	if (!is_email($email)) {
            $error = true;
            $message = 'Please enter a valid email';
	} else {
            
            $update['ID'] = $user_id;

            if (email_exists($email) && $user->user_email != $email) {
                $message = '';
                
            } else {
                $message = 'Email Updated. ';
                $update['user_email'] = $email;
            }
            if(isset($password))
            {
                $message = 'Password Updated. ';
                $update['user_pass'] = $password;
            }
            wp_update_user($update);

            update_user_meta($user_id, 'first_name', $first_name);
            update_user_meta($user_id, 'last_name',  $last_name);
            

            $message .= 'Profile saved successfully';
	}
        
	$results['message'] = $message;

        if($error){
            wp_send_json_error($results);
        } else {
            wp_send_json_success($results);
        }
	wp_die();
}
