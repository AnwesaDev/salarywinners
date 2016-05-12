<?php

/**
 * Description of class-ai-post
 *
 * @author Sandeep
 */

if(!class_exists('AI_Post')){
    class AI_Post {
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
            
            $meta = apply_filters('ai_' . $this->post_type . '_convert_metadata', $this->meta, $post, $singular);

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
            // if($this->wp_query && $this->wp_query->is_main_query()){
            //     return $this->current__main_post;
            // }
            return $this->current_post;
        }
        
        /**
        * insert postdata and post metadata to an database
        # used wp_insert_post
        # used update_post_meta
        # post function convert
        * @param   array $post data
        # wordpress post fields data
        # post custom meta data
        * @return  post object after insert
        # wp_error object if post data invalid
        * @author Sandeep
        * @since the beginning of time
        */
        public function insert($args) {
            global $current_user, $user_ID;

            // check user submit post too fast
            // if(!current_user_can( 'edit_others_posts' )) {
            //     $post = get_posts( array('post_author' => $user_ID, 'post_type' => $this->post_type, 'posts_per_page' => 1 ) );

            // }
            // strip tags
            foreach ($args as $key => $value) {
                if ((in_array($key, $this->meta) || in_array($key, $this->convert)) && is_string($args[$key]) && $key != 'post_content') {
                    $args[$key] = strip_tags($args[$key]);
                }
            }

            // pre filter filter post args
            $args = apply_filters('ai_pre_insert_' . $this->post_type, $args);
            if (is_wp_error($args)) return $args;

            $args = wp_parse_args($args, array(
                'post_type' => $this->post_type
            ));

            if (!isset($args['post_status'])) {
                $args['post_status'] = 'draft'; // default post status
            }

            // could not create with an ID
            if (isset($args['ID'])) {
                return new WP_Error('invalid_data', __("The ID already existed!", ''));
            }

            if (!isset($args['post_author']) || empty($args['post_author'])) $args['post_author'] = $current_user->ID;
            // Check again for empty author
            if ( empty( $args['post_author'] ) ) return new WP_Error('missing_author', __('You must login to submit listing.', ''));

            // filter tax_input
            $args = $this->_filter_tax_input($args);
            if(isset($args['post_content'])){
                // filter post content strip invalid tag
                $args['post_content'] = $this->filter_content($args['post_content']);
            }
            /**
             * insert post by wordpress function
             */
            $result = wp_insert_post($args, true);

            /**
             * update custom field and tax
             */
            if ($result != false && !is_wp_error($result)) {
                $this->update_custom_field($result, $args);
                $args['ID'] = $result;
                $args['id'] = $result;

                /**
                 * do action ai_insert_{$this->post_type}
                 * @param Int $result Inserted post ID
                 * @param Array $args The array of post data
                 */
                do_action('ai_insert_' . $this->post_type, $result, $args);

                $result = (object)$args;

                /**
                 * do action ai_insert_post
                 * @param object $args The object of post data
                 */
                do_action('ai_insert_post', $result);

                // localize text for js
                if (!empty($this->localize)) {
                    foreach ($this->localize as $key => $localize) {
                        $a = array();
                        foreach ($localize['data'] as $loc) {
                            array_push($a, $result->$loc);
                        }

                        $result->$key = vsprintf($localize['text'], $a);
                    }
                }
                $result->permalink = get_permalink($result->ID);

                if (current_user_can('manage_options') || $result->post_author == $user_ID) {

                    /**
                     * featured image not null and should be in array data
                     */
                    if (isset($args['featured_image'])) {
                        set_post_thumbnail($result->ID, $args['featured_image']);
                    }
                }
            }

            return $result;
        }

        /**
         * filter tax input args and check existed
         * @since the beginning of time
         * @author Sandeep
         * @return array
         */
        function _filter_tax_input($args) {
            $args['tax_input'] = array();
            if (!empty($this->taxs)) {
                foreach ($this->taxs as $tax_name) {
                    if (is_taxonomy_hierarchical($tax_name)) {
                        if (isset($args[$tax_name]) && !empty($args[$tax_name])) {

                            /**
                             * check term existed
                             */
                            if (is_array($args[$tax_name])) {

                                // if tax input is array
                                foreach ($args[$tax_name] as $key => $value) {
                                    $term = get_term_by('id', $value, $tax_name);
                                    if (!$term) {
                                        unset($args[$tax_name][$key]);
                                    }
                                }
                            } else {

                                // if tax input ! is array
                                $term = get_term_by('id', $args[$tax_name], $tax_name);
                                if (!$term) {
                                    unset($args[$tax_name]);
                                }
                            }

                            // check term exist

                            /**
                             * assign tax input
                             */
                            if (isset($args[$tax_name])) {
                                $args['tax_input'][$tax_name] = $args[$tax_name];
                            }
                        } else {
                            $args['tax_input'][$tax_name] = array();
                        }
                    } else {

                        /**
                         * assign tax input
                         */
                        if (isset($args[$tax_name])) {
                            if (is_array($args[$tax_name])) {
                                $temp = array();
                                foreach ($args[$tax_name] as $key => $value) {
                                    if (isset($value['name'])) {
                                        $temp[] = $value['name'];
                                    }
                                }
                                $args['tax_input'][$tax_name] = $temp;
                            } else {
                                $args['tax_input'][$tax_name] = $args[$tax_name];
                            }
                        } else {
                            $args['tax_input'][$tax_name] = array();
                        }
                    }
                }
            }
            return $args;
        }

        /**
         * filter content insert and skip invalid tag
         * @param string $content the post content be filter
         * @return String the string filtered
         * @author Sandeep
         * @since the beginning of time
         */
        function filter_content($content) {
            $pattern = "/<[^\/>]*>(&nbsp;)*([\s]?)*<\/[^>]*>/";

            //use this pattern to remove any empty tag '<a target="_blank" rel="nofollow" href="$1">$3</a>'

            $content = preg_replace($pattern, '', $content);

            // $link_pattern = "/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/";
            $content = str_replace('<a', '<a target="_blank" rel="nofollow"', $content);
            $content = strip_tags($content, '<p><a><ul><ol><li><h6><span><b><em><strong><br>');

            return $content;
        }

        /**
         * update postdata and post metadata to an database
         # used wp_update_post ,get_postdata
         # used update_post_meta
         # used function convert
         * @param   array $post data
         # wordpress post fields data
         # post custom meta data
         * @return  post object after insert
         # wp_error object if post data invalid
         * @author Sandeep
         * @since the beginning of time
         */
        public function update($args) {
            global $current_user, $user_ID;

            // $args = wp_parse_args($args);
            // strip tags
            foreach ($args as $key => $value) {
                if ((in_array($key, $this->meta) || in_array($key, $this->convert)) && is_string($args[$key]) && $key != 'post_content') {
                    $args[$key] = strip_tags($args[$key]);
                }
            }

            // unset post date
            if (isset($args['post_date'])) unset($args['post_date']);

            // filter args
            $args = apply_filters('ai_pre_update_' . $this->post_type, $args);
            if (is_wp_error($args)) return $args;

            // if missing ID, return errors
            if (empty($args['ID'])) return new WP_Error('ai_missing_ID', __('Post not found!', ''));

            if (!ae_user_can('edit_others_posts')) {
                $post = get_post($args['ID']);
                if ($post->post_author != $user_ID) {
                    return new WP_Error('permission_deny', __('You can not edit other posts!', ''));
                }

                /**
                 * check and prevent user publish post
                 */
                if (isset($args['post_status']) && $args['post_status'] != $post->post_status && $args['post_status'] == 'publish') {
                    unset($args['post_status']);
                }

            }
          
            $args = $this->_filter_tax_input($args);

            // filter post content strip invalid tag
            $args['post_content'] = $this->filter_content($args['post_content']);

            // update post data into database use wordpress function
            $result = wp_update_post($args, true);

            /**
             * update custom field and tax
             */

            if ($result != false && !is_wp_error($result)) {
                $this->update_custom_field($result, $args);

                $post = get_post($result);

                if (current_user_can('manage_options') || $post->post_author == $user_ID) {

                    /**
                     * featured image not null and should be in carousels array data
                     */
                    if (isset($args['featured_image'])) {
                        set_post_thumbnail($post->ID, $args['featured_image']);
                    }
                }

                // make an action so develop can modify it
                do_action('ai_update_' . $this->post_type, $result, $args);
                $result = $this->convert($post);
            }

            return $result;
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
        * delete post from site
        * @param int $ID post id want to delete
        * @param bool $force_delete default is false
        * @author Sandeep
        * @since Since the beginning of time
        */
        public function delete($ID, $force_delete = false) {

            if (!ae_user_can('edit_others_posts')) {
                global $user_ID;
                $post = get_post($ID);
                if ($user_ID != $post->post_author) {
                    return new WP_Error('permission_deny', __("You do not have permission to delete post.", ''));
                }
            }

            if ($force_delete) {
                $result = wp_delete_post($ID, true);
            } else {
                $result = wp_trash_post($ID);
            }
            if ($result) do_action('ai_delete_' . $this->post_type, $ID);

            return $this->convert($result);
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