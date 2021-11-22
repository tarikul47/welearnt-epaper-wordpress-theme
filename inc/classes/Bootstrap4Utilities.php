<?php
/**
 * Bootstrap 4 utilities.
 * 
 * @package welearntStart
 */


namespace BootstrapBasic5;

if (!class_exists('\\BootstrapBasic5\\Bootstrap4Utilities')) {
    /**
     * Bootstrap 4 utilities such as grid column size, classes, element styles.
     */
    class Bootstrap4Utilities
    {


        /**
         * Calculate main column size base on each sidebar column size and their widgets activated.
         * 
         * @global integer $BootstrapBasic5_sidebar_left_size The left sidebar column size.
         * @global integer $BootstrapBasic5_sidebar_right_size The right sidebar column size.
         */
        public static function getMainColumnSize()
        {
            global $BootstrapBasic5_sidebar_left_size, $BootstrapBasic5_sidebar_right_size;
            if (!is_numeric($BootstrapBasic5_sidebar_left_size)) {
                $BootstrapBasic5_sidebar_left_size = 3;
            }
            if (!is_numeric($BootstrapBasic5_sidebar_right_size)) {
                $BootstrapBasic5_sidebar_right_size = 3;
            }

            $full_column_size = apply_filters('bootstrap_basic4_full_column_size', 12);
            if (!is_numeric($full_column_size)) {
                $full_column_size = 12;
            }

            if (is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
                $main_column_size = ($full_column_size - $BootstrapBasic5_sidebar_left_size - $BootstrapBasic5_sidebar_right_size);
            } elseif (is_active_sidebar('sidebar-left') && !is_active_sidebar('sidebar-right')) {
                $main_column_size = ($full_column_size - $BootstrapBasic5_sidebar_left_size);
            } elseif (!is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
                $main_column_size = ($full_column_size - $BootstrapBasic5_sidebar_right_size);
            } else {
                $main_column_size = $full_column_size;
            }

            return $main_column_size;
        }// getMainColumnSize


    }
}