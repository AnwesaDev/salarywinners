<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*Update Customer setting*/
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

/*Update Provider setting*/
add_action('wp_ajax_update_provider_profile', 'update_provider_profile');
function update_provider_profile() {
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

/*Update Customer social setting*/
add_action('wp_ajax_update_customer_social_profile', 'update_customer_social_profile');
function update_customer_social_profile() {
    extract($_POST);
    $error = false;

    $message = '';

    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    $data = array();

    for ($i = 0; $i < COUNT($values); $i++) {
        $data[$values[$i]['name']] = $values[$i]['value'];
    }    
    
        if(empty($data['social-facebook']) && empty($data['social-twitter']) && empty($data['social-gplus']) && empty($data['social-instagram']))
        {
            $error = true;
            $message .= 'There is no data to save. ';
        }
        else 
        {
            if(!empty($data['social-facebook']))
            {
               update_user_meta($user_id, 'social_facebook', $data['social-facebook']); 
            }
            if(!empty($data['social-twitter']))
            {
               update_user_meta($user_id, 'social_twitter', $data['social-twitter']); 
            }
            if(!empty($data['social-gplus']))
            {
               update_user_meta($user_id, 'social_gplus', $data['social-gplus']); 
            }
            if(!empty($data['social-instagram']))
            {
               update_user_meta($user_id, 'social_instagram', $data['social-instagram']); 
            }
            
           $message .= 'Social profile saved successfully'; 
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

/*Update Provider social setting*/
add_action('wp_ajax_update_provider_social_profile', 'update_provider_social_profile');
function update_provider_social_profile() {
    extract($_POST);
    $error = false;

    $message = '';

    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    $data = array();

    for ($i = 0; $i < COUNT($values); $i++) {
        $data[$values[$i]['name']] = $values[$i]['value'];
    }    
    
        if(empty($data['social-facebook']) && empty($data['social-twitter']) && empty($data['social-gplus']) && empty($data['social-instagram']))
        {
            $error = true;
            $message .= 'There is no data to save. ';
        }
        else 
        {
            if(!empty($data['social-facebook']))
            {
               update_user_meta($user_id, 'social_facebook', $data['social-facebook']); 
            }
            if(!empty($data['social-twitter']))
            {
               update_user_meta($user_id, 'social_twitter', $data['social-twitter']); 
            }
            if(!empty($data['social-gplus']))
            {
               update_user_meta($user_id, 'social_gplus', $data['social-gplus']); 
            }
            if(!empty($data['social-instagram']))
            {
               update_user_meta($user_id, 'social_instagram', $data['social-instagram']); 
            }
            
           $message .= 'Social profile saved successfully'; 
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

/*Update Customer location setting*/
add_action('wp_ajax_update_customer_location', 'update_customer_location');
function update_customer_location() {
    extract($_POST);
    $error = false;

    $message = '';

    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    $data = array();

    for ($i = 0; $i < COUNT($values); $i++) {
        $data[$values[$i]['name']] = $values[$i]['value'];
    }    
    
        if(empty($data['street']) && empty($data['city']) && empty($data['state']) && empty($data['country']) && empty($data['zip']))
        {
            $error = true;
            $message .= 'There is no data to save. ';
        }
        else 
        {
            if(!empty($data['street']))
            {
               update_user_meta($user_id, 'street', $data['street']); 
            }
            if(!empty($data['city']))
            {
               update_user_meta($user_id, 'city', $data['city']); 
            }
            if(!empty($data['state']))
            {
               update_user_meta($user_id, 'state', $data['state']); 
            }
            if(!empty($data['country']))
            {
               update_user_meta($user_id, 'country', $data['country']); 
            }
            if(!empty($data['zip']))
            {
               update_user_meta($user_id, 'zip', $data['zip']); 
            }
           $message .= 'Location saved successfully'; 
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
/*Update Provider location setting*/
add_action('wp_ajax_update_provider_location', 'update_provider_location');
function update_provider_location() {
    extract($_POST);
    $error = false;

    $message = '';

    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    $data = array();

    for ($i = 0; $i < COUNT($values); $i++) {
        $data[$values[$i]['name']] = $values[$i]['value'];
    }    
    
        if(empty($data['street']) && empty($data['city']) && empty($data['state']) && empty($data['country']) && empty($data['zip']))
        {
            $error = true;
            $message .= 'There is no data to save. ';
        }
        else 
        {
            if(!empty($data['street']))
            {
               update_user_meta($user_id, 'street', $data['street']); 
            }
            if(!empty($data['city']))
            {
               update_user_meta($user_id, 'city', $data['city']); 
            }
            if(!empty($data['state']))
            {
               update_user_meta($user_id, 'state', $data['state']); 
            }
            if(!empty($data['country']))
            {
               update_user_meta($user_id, 'country', $data['country']); 
            }
            if(!empty($data['zip']))
            {
               update_user_meta($user_id, 'zip', $data['zip']); 
            }
           $message .= 'Location saved successfully'; 
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

/*Update Provider about myself*/
add_action('wp_ajax_update_customer_about', 'update_customer_about');
function update_customer_about() {
    extract($_POST);
    $error = false;

    $message = '';
    
    $picture_url = '';

    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    $data = array();

//    for ($i = 0; $i < COUNT($values); $i++) {
//        $data[$values[$i]['name']] = $values[$i]['value'];
//    }    
        if(true)
        {
            if(!empty($description))
            {
               update_user_meta($user_id, 'description', $description); 
            }
            
            // These files need to be included as dependencies when on the front end.
            require_once( ABSPATH . 'wp-admin/includes/image.php' );
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            require_once( ABSPATH . 'wp-admin/includes/media.php' );
            // Let WordPress handle the upload.
            // Remember, 'avatar' is the name of our file input.
            $attachment_id = media_handle_upload( 'avatar', 0 );
            if ( !is_wp_error( $attachment_id ) ) {
                update_user_meta($user_id, 'avatar', $attachment_id); 
                $image_data = wp_get_attachment_image_src($attachment_id);
                if(!is_wp_error($image_data)){
                    $picture_url = $image_data[0];
                }
            } else {
                $results['uperror'] = $attachment_id;
            }
            $message .= 'About myself saved successfully'; 
        } 
    $results['message'] = $message;
    $results['picture'] = $picture_url;
    $results['raw'] = $_POST;

    if($error){
        wp_send_json_error($results);
    } else {
        wp_send_json_success($results);
    }
    wp_die();
}

/*Update Provider about myself*/
add_action('wp_ajax_update_provider_about', 'update_provider_about');
function update_provider_about() {
    extract($_POST);
    $error = false;

    $message = '';

    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    $data = array();

    for ($i = 0; $i < COUNT($values); $i++) {
        $data[$values[$i]['name']] = $values[$i]['value'];
    }    
    
        if(empty($data['description']))
        {
            $error = true;
            $message .= 'There is no data to save. ';
        }
        else 
        {
            if(!empty($data['description']))
            {
               update_user_meta($user_id, 'description', $data['description']); 
            }
            
           $message .= 'About myself saved successfully'; 
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