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

            //$result->label = sprintf(__('Logged in as <span class="name">%s<span>', ET_DOMAIN) , $result->display_name);
            $result->author_url = get_author_posts_url($result->ID);

        }
        
        /** @todo: complete this function */
        function check_activation_key(){
            
        }
    }
}