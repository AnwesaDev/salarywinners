<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class-ai-mailing
 *
 * @author sandeep
 */
if(!class_exists('AI_Mailing')){
    class AI_Mailing extends AI_Base {
        public static $instance;

        static function get_instance() {
            if (self::$instance == null) {
                self::$instance = new AE_Mailing();
            }

            return self::$instance;
        }

        function __construct() {
        }
        /**
         * Send mail
         * @param $to  
         * @param $subject
         * $param $content message
         * @param array $filter array of variable name as key with its value
         * @param string $headers
         */
        public function wp_mail($to, $subject, $content, $filter = array() , $headers = '') {        
            if ($headers == '') {

                // $headers = 'MIME-Version: 1.0' . "\r\n";
                // $headers.= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers.= "From: " . get_option('blogname') . " < " . get_option('admin_email') . "> \r\n";
            }

            /**
             * site info url, name, admin email
             */
            $content = str_ireplace('[site_url]', get_bloginfo('url') , $content);
            $content = str_ireplace('[blogname]', get_bloginfo('name') , $content);
            $content = str_ireplace('[admin_email]', get_option('admin_email') , $content);

            // filter variables
            if(!empty($filter)){
                foreach ($filter as $variable => $value) {
                    $content = str_ireplace('{{' . $variable . '}}', $value, $content);
                }
            }
            
            $content = html_entity_decode((string)$content, ENT_QUOTES, 'UTF-8');
            $subject = html_entity_decode((string)$subject, ENT_QUOTES, 'UTF-8');

            add_filter('wp_mail_content_type', array(
                $this,
                'set_html_content_type'
            ));
            $a = wp_mail($to, $subject, $this->get_mail_header() . $content . $this->get_mail_footer() , $headers);
            remove_filter('wp_mail_content_type', array(
                $this,
                'set_html_content_type'
            ));
            return $a;
        }
        
        function set_html_content_type() {
            return 'text/html';
        }
        
        function get_mail_header(){
            return '';
        }
        
        function get_mail_footer(){
            return '';
        }
    }
}