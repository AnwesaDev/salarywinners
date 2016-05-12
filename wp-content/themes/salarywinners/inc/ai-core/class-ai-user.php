<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class-ai-user
 *
 * @author sandeep
 */
if(!class_exists('AI_User')){
    class AI_User {
        static $instance;
        public $current_user;
        
        private $user_confirm = true; // user registration requires email confirmation TODO: check this

        /**
         * return class $instance
         */
        public static function get_instance() {
            if ( null == self::$instance ) {

                self::$instance = new AE_Users();
            }
            return self::$instance;
        }
        
        /**
        * contruct a object user with meta data
        * @param array $meta_data all user meta data you want to control
        * @author Sandeep
        * @since 1.0
        */
        public function __construct($meta_data = array()) {
            $defaults = array(
                'phone',
                'address',
            );
            $this->meta_data = wp_parse_args($meta_data, $defaults);
            $this->meta_data = apply_filters( 'ai_define_user_meta', $this->meta_data );
        }
        
        /**
        * get userdata from id
        * @param string $id
        * @return user userdata object after convert
        *         - wp_error object if id invalid
        * @author Sandeep
        * @since 1.0
        */
        public function get($id) {
            $user = get_userdata($id);
            return $this->convert($user);
        }
        
        /**
        * convert userdata to an object
        * @param object $user
        * @return user object after convert
        *         - wp_error object if user invalid
        * @author Sandeep
        * @since 1.0
        */
        public function convert($user) {
            global $current_user, $user_ID;
            if (!isset($user->ID) || !$user->ID ) return new WP_Error('ai_invalid_user_data', __("Input invalid", ''));
            $result = isset($user->data) ? $user->data : $user;

            foreach ($this->meta_data as $key) {
                $result->$key = get_user_meta($result->ID, $key, true);
            }

            $result->avatar = get_avatar($user->ID, '150');
            
            /**
            * get user role
            */
            if (current_user_can('edit_users') && isset($user->roles)) {
                $user_role = $user->roles;
                $result->role = array_pop($user_role);
                $result->roles = $user->roles;
            }

            /**
             * get all user meta data
             */
            $author_metas = array(
                'display_name',
                'first_name',
                'last_name',
                'description',
                'user_url'
            );
            
            foreach ($author_metas as $key => $author_meta) {
                $result->$author_meta = get_the_author_meta($author_meta, $result->ID);
            }

            //$result->label = sprintf(__('Logged in as <span class="name">%s<span>', '') , $result->display_name);
            $result->author_url = get_author_posts_url($result->ID);
            
            $result->id = $result->ID;
            unset($result->user_pass);
            unset($result->user_activation_key);

            $this->current_user = apply_filters('ai_convert_user', $result);
            return $this->current_user;

        }
        
        /**
         * insert userdata and user metadata to an database
         # used wp_insert_user
         # used update_user_meta
         # used function convert
         * @param   array $user data
         # wordpress user fields data
         # user custom meta data
         * @return  user object after insert
         # wp_error object if user data invalid
         * @author Sandeep
         * @since 1.0
         */
        public function insert($user_data) {

            //the insert function could not have the ID
            if(isset($user_data['ID'])) {
                unset($user_data['ID']);
            }

            if (!$user_data['user_login'] || !preg_match('/^[a-z\d_]{2,20}$/i', $user_data['user_login'])) {
                return new WP_Error('username_invalid', __("Username only lowercase letters (a-z) and numbers are allowed.", ''));
            }
            if (!isset($user_data['user_email']) || !$user_data['user_email'] || $user_data['user_email'] == '' || !is_email($user_data['user_email']) ) {
                return new WP_Error('email_invalid', __("Email field is invalid.", ''));
            }
            if (!isset($user_data['user_pass']) || !$user_data['user_pass'] || $user_data['user_pass'] == '' ) {
                return new WP_Error('pass_invalid', __("Password field is required.", ''));
            }
            if (isset($user_data['repeat_pass']) && $user_data['user_pass'] != $user_data['repeat_pass']) {
                return new WP_Error('pass_invalid', __("Repeat Passwords mismatch.", ''));
            }
            $user_data = apply_filters( 'ai_pre_insert_user', $user_data );
            if(!$user_data || is_wp_error( $user_data )) {
                return $user_data;
            }
            /**
             * prevent normal user try to insert user with role is administrator or editor
             * 
             */
            if( isset( $user_data['role'] ) ){
                if(  strtolower($user_data['role']) == 'administrator' || strtolower($user_data['role']) == 'editor' ) {
                    return new WP_Error('user_role_error', __("You can't create an administrator account.", ''));
                    exit();
                }
            }
            //check role for users
            if( !isset($user_data['role']) ) {
                $user_data['role'] = 'subscriber'; // default role
            }
            /**
             * insert user by wp_insert_user
             */
            $result = wp_insert_user($user_data);

            if ($result != false && !is_wp_error($result)) {

                /**
                 * update user meta data
                 */
                foreach ($this->meta_data as $key => $value) {

                    // update if meta data exist
                    if (isset($user_data[$value])) update_user_meta($result, $value, $user_data[$value]);
                }

                // people can modify here
                do_action('ai_insert_user', $result, $user_data);

                /**
                 * add ID to user data and return object
                 */
                $user_data['ID'] = $result;

                // sign on user
                if( !$this->user_confirm && !is_user_logged_in() ) {
                    return $this->login($user_data);
                }else {
                    return $this->convert(get_userdata($user_data['ID']));
                }
               
            }
            //set return message
            if(!isset($result->msg)){
                $result->msg = $this->user_confirm ? __("You have registered successfully!", '') : __("You have registered successfully. Please check your mailbox to activate your account.", '');
            }

            return apply_filters( 'ai_after_insert_user', $result);
        }

        /**
         * update userdata and user metadata to an database
         # used wp_update_user , wp_authenticate, email_exists ,get_userdata
         # used update_user_meta
         # used  function convert
         * @param   array $user data
         # wordpress user fields data
         # user custom meta data
         * @return  user object after insert
         # wp_error object if user data invalid
         * @author Sandeep
         * @since 1.0
         */
        public function update($user_data) {
            global $current_user, $user_ID, $wpdb;

            /**
             * prevent user edit other user profile
             */
            if (!ai_user_can('edit_users') && $user_data['ID'] != $user_ID) {
                return new WP_Error('denied', __("Permission Denied!", ''));
            }

            /**
             * check user password if have new password update
             */
            if (isset($user_data['new_password']) && !empty($user_data['new_password'])) {
                $validate = $this->check_password($user_data);
                if($validate){
                    $user_data['user_pass'] = $user_data['new_password'];
                } else {
                    return new WP_Error('wrong_pass', __("Old password does not match!", ''));
                }

                if($user_data['new_password'] !== $user_data['renew_password']) {
                    return new WP_Error('pass_mismatch', __("Retype password is not equal.", ''));   
                }
            }

            if (isset($user_data['user_email'])) {
                $email = $user_data['user_email'];

                /**
                 * current user also update his email
                 */
                if ($user_ID == $user_data['ID'] && $email != $current_user->user_email) {
                    if (email_exists($email)) {
                        return new WP_Error('email_existed', __("This email is already used. Please enter a new email.", ''));
                    }
                }
            }

            // don't allow upgrade from common user to admin
            if (!ai_user_can('edit_users')) {
                unset($user_data['role']);
                unset($user_data['user_login']);
            }

            /**
             * insert user
             */
            $result = wp_update_user($user_data);

            if ($result != false && !is_wp_error($result)) {

                /**
                 * update user meta data
                 */
                foreach ($this->meta_data as $key => $value) {                
                    // update if meta data exist
                    if (isset($user_data[$value])){
                      //$usermeta = $this->ai_filter_usermeta($user_data[$value]); //TODO: check whats this for?
                      update_user_meta($result, $value, $usermeta);  
//                      $wpdb->insert('user_info_changes', array(
//                        'timestamp' => time(),
//                        'user_id' => $user_ID,
//                        'keyname' => $value,
//                        'newvalue' => $user_data[$value]
//                        ));
                    } 
                }


                // hook to add custom
                do_action('ai_update_user', $result, $user_data);

                /**
                 * get user data and return a full profile
                 */
                $result = $this->convert(get_userdata($result));
            }
            if (isset($user_data['do'])) {
                switch ($user_data['do']) {
                    case 'profile':
                        $result->msg = __("Your profile has been saved successfully!", '');
                        break;
                    case 'changepass':
                        $result->msg = __("Your password has been changed successfully!", '');
                        break;
                    default:
                        $result->msg = __("User's data update successfully!", '');
                        break;
                }
            } else {
                $result->msg = __("User's data update successfully!", '');
            }
            return $result;
        }

        /**
         * login user into website
         # used wp_signon
         # used function convert
         * @param   array $user data
         # wordpress user fields data
         # user custom meta data
         * @return  user object after insert
         # wp_error object if user data invalid
         * @author Sandeep
         * @since 1.0
         */
        public function login($user_data, $remember = false) {
            global $current_user;

            // check users if he is member
            $user = get_user_by('login', $user_data['user_login']);
            // if login by username failed check by email
            if (is_wp_error($user) || !$user) {
                $user = get_user_by('email', $user_data['user_login']);
            }
            /**
             * check user infomation
            */
            if (!$user) {
                return new WP_Error('login_failed', __("The login information you entered were incorrect. Please try again!", ''));
            }

            if(is_multisite() && !is_user_member_of_blog($user->ID)) {
                $roles = $user->roles;
                $role = array_pop($roles);
                add_user_to_blog(get_current_blog_id(), $user->ID, $role);
            }

            $user_login             = $user->user_login;

            $creds                  = array();
            $creds['user_login']    = $user_login;
            $creds['user_password'] = $user_data['user_pass'];
            $creds['remember']      = $remember;

            $result                 = wp_signon($creds, false);

            /**
             * get user data and return a full profile
             */
            if ($result && !is_wp_error($result)) {
                // set current user to logged in 
                wp_set_current_user($result->ID);
                $result = $this->convert($result);
                
                do_action('ai_login_user', $result);
            }
            if(!isset($result->msg)){
                $result->msg = __("You have signed in successfully!", '');
            }
            return apply_filters( 'ai_after_login_user', $result);
        }
        
        
        
        /** @todo: complete this function */
        function check_activation_key(){
            
        }
    }
}