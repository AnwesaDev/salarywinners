<?php

/* 
 * Template Name: Check Activation
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

global $wpdb, $wp_session;
        $token = $_GET['token'];
        $users = get_users(array('meta_query' => array(array('key' => 'activation_token', 'value' => $token))));

        if ($users[0]->ID > 0) {

            update_user_meta($users[0]->ID, 'status', 'active');
            update_user_meta($users[0]->ID, 'activation_token', '');
            $message = 'Activation Successfull';
        }
         else {
             $message = 'Invalid token';
             $error = true;
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
            //if(!$error){
                wp_redirect(get_bloginfo('siteurl').'/login/');
                exit();
             //}
get_header();
?>

<?php
get_footer();