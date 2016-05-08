<?php

/* 
 * General functions
 */

/**
 *
 * Get the page template link
 * @param string $pages: page template type (slug)
 * @param array $params: array of query var
 * @return $link
 * @author Sandeep
 * @version 1.0
 * @copyright Anwesa Infotech
 */
if( !function_exists( 'ai_get_page_link' ) ){
    function ai_get_page_link($pages, $params = array() , $create = true) {

        $page_args = array(
            'post_title' => '',
            'post_content' => __('Please fill out the form below ', '') ,
            'post_type' => 'page',
            'post_status' => 'publish'
        );

        if (is_array($pages)) {

            // page data is array (using this for insert page content)
            $page_type = $pages['page_type'];
            $page_args = wp_parse_args($pages, $page_args);
        } else {

            // pages is page_type string (using this only insert a page template)
            $page_type = $pages;
            $page_args['post_title'] = $page_type;
        }
        /**
         * get page template link option and will return if it not empty
         */
        $link = get_option($page_type, '');
        if ($link) {
            $return = add_query_arg($params, $link);
            return $return;
        }

        // find post template
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-templates/' . $page_type . '.php',
            'numberposts' => 1
        ));

        // page not existed
        if (empty($pages) || !is_array($pages)) {

            // return false if set create is false and do not generate page
            if (!$create) return false;
            
            $id = wp_insert_post($page_args);

            if ($id) {

                // update page template option
                update_post_meta($id, '_wp_page_template', 'page-templates/' . $page_type . '.php');
            }
            
        } else {

            // page exists
            $page = array_shift($pages);
            $id = $page->ID;
        }
        if($id != -1 ){
            $return = get_permalink($id);
        }
        else{
            $return = home_url();
        }
        /**
         * update transient page link
         */
        update_option('page-templates/' . $page_type . '.php', $return);

        if (!empty($params) && is_array($params)) {
            $return = add_query_arg($params, $return);
        }

        return $return;
    }
}