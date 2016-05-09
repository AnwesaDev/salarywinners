<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class-ai-post
 *
 * @author Sandeep
 */

if(!class_exists('AI_Post')){
    class AI_Post extends AI_Base {
        static $instance;
        public $meta;

        /**
         * store instance current after converted post data
         */
        public $current_post;
        public $current_main_post;
        public $wp_query;

        /**
         * return class $instance
         */
        public static function get_instance() {
            if (self::$instance == null) {

                self::$instance = new AI_Post('post');
            }
            return self::$instance;
        }

        /**
         * contruct a object post with meta data
         * @param string $post_type object post name
         * @param array $taxs array of tax name assigned to post type
         * @param array $meta_data all post meta data you want to control
         * @author Sandeep
         * @since 1.0
         */
        public function __construct($post_type = '', $taxs = array() , $meta_data = array() , $localize = array()) {

            $post_type = ($post_type) ? $post_type : 'post';
            if ($post_type == 'post' && empty($taxs)) {
                $taxs = array(
                    'tag',
                    'category'
                );
            }

            $this->post_type = $post_type;
            $this->taxs = apply_filters('ai_post_taxs', $taxs, $post_type);
            $defaults = array(
                'address',
                'avatar',
                'post_count',
                'comment_count',
            );
            $this->meta = apply_filters('ai_post_meta_fields', wp_parse_args($meta_data, $defaults) , $post_type);

            /**
             * setup convert field of post data
             */
            $this->convert = array(
                'post_parent',
                'post_title',
                'post_name',
                'post_content',
                'post_excerpt',
                'post_author',
                'post_status',
                'ID',
                'post_type',
                'comment_count',
                'guid'
            );

            $this->localize = $localize;
        }
        
        /**
        * convert post data to an object with meta data
        * @param object $post
        * @param string $thubnail Post thumbnail size
        * @param bool $excerpt convert excerpt
        * @param bool $singular convert in singular or a listing
        * @return post object after convert
        *         - wp_error object if post invalid
        * @author Sandeep
        * @since 1.0
        */
        public function convert($post_data, $thumbnail = 'medium_post_thumbnail', $excerpt = true, $singular = false) {
            $result = array();
            $post = (array)$post_data;

            /**
             * convert need post data
             */
            foreach ($this->convert as $key) {
                if (isset($post[$key])) $result[$key] = $post[$key];
            }

            
            $result['post_date'] = get_the_date('', $post['ID']);

            // generate post taxonomy
            if (!empty($this->taxs)) {

                foreach ($this->taxs as $name) {
                    $terms = wp_get_object_terms($post['ID'], $name);
                    $arr = array();
                    if (is_wp_error($terms)) continue;

                    foreach ($terms as $term) {
                        $arr[] = $term->term_id;
                    }
                    $result[$name] = $arr;
                    $result['tax_input'][$name] = $terms;
                }
            }

            // generate meta data
            if (!empty($meta)) {
                foreach ($meta as $key) {
                    $result[$key] = get_post_meta($post['ID'], $key, true);
                }
            }

            if (!empty($this->localize)) {
                foreach ($this->localize as $key => $localize) {
                    $a = array();
                    foreach ($localize['data'] as $loc) {
                        array_push($a, $result[$loc]);
                    }

                    $result[$key] = vsprintf($localize['text'], $a);
                }
            }

            unset($result['post_password']);
            $result['id'] = $post['ID'];
            $result['permalink'] = get_permalink($result['ID']);
            $result['unfiltered_content'] = $result['post_content'];

            /**
             * get post content in loop
             */
            ob_start();
            echo apply_filters('the_content', $result['post_content']);
            $the_content = ob_get_clean();

            $result['post_content'] = $the_content;

            /* set post excerpt */
            if (isset($result['post_excerpt']) && $result['post_excerpt'] == '') {
                $result['post_excerpt'] = wp_trim_words($the_content, 20);
            }

            /**
             * return post thumbnail url
             */
            if (has_post_thumbnail($result['ID'])) {
                $result['featured_image'] = get_post_thumbnail_id($result['ID']);
                $feature_image = wp_get_attachment_image_src($result['featured_image'], $thumbnail);
                $result['the_post_thumnail'] = $feature_image[0];
            } else {
                $result['the_post_thumnail'] = '';
                $result['featured_image'] = '';
            }
            $result['the_post_thumbnail'] = $result['the_post_thumnail'];
            /**
             * assign convert post to current post
             */
            $this->current_post = apply_filters('ai_convert_' . $this->post_type, (object)$result);

            return $this->current_post;
        }
        /**
        * return instance current post data after convert
        * @since 1.0
        * @return object $post
        * @author Sandeep
        */
        public function get_current_post() {
            return $this->current_post;
        }
        
        /**
        * update post meta and taxonomy
        * @param object $result post
        * @param array $data post data
        * @param array $args
        * @author Sandeep
        * @since version 1.0
        */
        public function update_custom_field($result, $args) {

            // update post meta
            if (!empty($this->meta)) {
                foreach ($this->meta as $key => $meta) {

                    if (isset($args[$meta])) {
                        if (!is_array($args[$meta])) {
                            $args[$meta] = esc_attr($args[$meta]);
                        }
                        update_post_meta($result, $meta, $args[$meta]);
                    }
                }
            }
        }
        
        /**
        * get postdata
        * @param int $ID post id want to get
        * @return object $post
        * @author Sandeep
        * @since version 1.0
        */
        public function get($ID) {
            $result = $this->convert(get_post($ID));
            return $result;
        }
    }
}