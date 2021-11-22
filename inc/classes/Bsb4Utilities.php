<?php
/**
 * Bootstrap Basic 4 utilities.
 * 
 * @package welearntStart
 */


namespace BootstrapBasic5;

if (!class_exists('\\BootstrapBasic5\\Bsb4Utilities')) {
    /**
     * This class works as Bootstrap Basic 4 utilities.
     */
    class Bsb4Utilities
    {


        /**
         * Get the link in post content.
         * 
         * @return string Return link that were found in content or return permalink of that post if not found.
         */
        public static function getLinkInContent()
        {
            $content = get_the_content();
            $has_url = get_url_in_content($content);

            if ($has_url) {
                return $has_url;
            } else {
                return apply_filters('the_permalink', get_permalink());
            }
        }// getLinkInContent


    }
}