<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*Update user setting*/
add_action('wp_ajax_update_customer_profile', 'update_customer_profile');
function update_customer_profile() {
    extract($_POST);
    $error = false;

    $message = '';

    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    $data = array();

    for ($i = 0; $i < COUNT($values); $i++) {
        $data[$values[$i]['name']] = $values[$i]['value'];
    }
    
    $email = $data['profile-email'];

    if (!is_email($email)) {
        $error = true;
        $message .= 'Please enter a valid email';
    } else {

        $update['ID'] = $user_id;

        if (email_exists($email) && $user->user_email != $email) {
            $message .= '';

        } else {
            //$message .= 'Email Updated. ';
            $update['user_email'] = $email;
        }
        
        if(!empty($data['profile-password']))
        {
            if($data['profile-password']==$data['profile-confirm'])
            {
                //$message .= 'Password Updated. ';
                $update['user_pass'] = $data['profile-password'];
            }
            else 
            {
                $error = true;
                $message .= 'Password do not match.Password not Updated. ';                            
            }
            
        }
        wp_update_user($update);

        update_user_meta($user_id, 'first_name', $data['profile-fname']);
        update_user_meta($user_id, 'last_name',  $data['profile-lname']);


        $message .= 'Profile saved successfully';
    }

    $results['message'] = $message;
    $results['raw'] = $values;

    if($error){
        wp_send_json_error($results);
    } else {
        wp_send_json_success($results);
    }
    wp_die();
}
