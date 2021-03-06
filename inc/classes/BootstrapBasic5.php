<?php

/**
 * The Bootstrap Basic 4 main functional file.
 *
 * @package welearntStart
 */


namespace BootstrapBasic5;

if (!class_exists('\\BootstrapBasic5\\BootstrapBasic5')) {
    /**
     * Bootstrap Basic 4 main functional in class style.
     *
     * This class will be handle all the main hooks that work with theme features such as add theme support features, register widgets area or sidebar, enqueue scripts and styles.<br>
     * If you want to hook into WordPress and make changes or modification, please use \BootstrapBasic5\Hooks\Bsb4Hooks() class.<br>
     * To use, just code as follows:
     *
     * $BootstrapBasic5 = new \BootstrapBasic5\BootstrapBasic5();
     * $BootstrapBasic5->addActionsFilters();
     *
     * That's it.
     */
    class BootstrapBasic5
    {


        /**
         * Add actions and filters to make main theme functional works.
         */
        public function addActionsFilters()
        {
            // Change main content width up to columns available.
            add_action('template_redirect', array($this, 'detectContentWidth'));
            // Add theme feature.
            add_action('after_setup_theme', array($this, 'themeSetup'));
            // Register sidebars.
            add_action('widgets_init', array($this, 'registerSidebars'));
            // Enqueue scripts and styles.
            add_action('wp_enqueue_scripts', array($this, 'registerCommonScriptsAndStyles'));
            add_action('admin_enqueue_scripts', array($this, 'registerCommonScriptsAndStyles'));
            add_action('wp_enqueue_scripts', array($this, 'enqueueScriptsAndStyles'));
            // Add Bootstrap styles into editor.
            add_action('admin_init', array($this, 'addEditorStyles'));
            // Add Bootstrap styles into Gutenberg editor.
            add_action('enqueue_block_editor_assets', array($this, 'enqueueBlockEditorAssets'));
        } // addActionsFilters


        /**
         * Add Bootstrap styles into classic editor.
         */
        public function addEditorStyles()
        {
            add_editor_style('assets/css/bootstrap.min.css');
        } // addEditorStyles


        /**
         * Detect main content width upto columns available.
         */
        public function detectContentWidth()
        {
            global $content_width, $BootstrapBasic5_sidebar_left_size, $BootstrapBasic5_sidebar_right_size;

            if (is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
                $content_width = 540;
            } elseif (is_active_sidebar('sidebar-left') || is_active_sidebar('sidebar-right')) {
                $content_width = 825;
            }

            $content_width = apply_filters('bootstrap_basic4_content_width', $content_width, $BootstrapBasic5_sidebar_left_size, $BootstrapBasic5_sidebar_right_size);
        } // detectContentWidth


        /**
         * Add Bootstrap styles into Gutenberg editor.
         */
        public function enqueueBlockEditorAssets()
        {
            if (!wp_script_is('bootstrap5', 'registered')) {
                $this->registerCommonScriptsAndStyles();
            }
            wp_enqueue_style('bootstrap5');
        } // enqueueBlockEditorAssets


        /**
         * Enqueue scripts and styles.
         *
         * @access private Do not access this method directly. This is for hook callback not for direct call.
         */
        public function enqueueScriptsAndStyles()
        {
            wp_enqueue_style('welearntStart-wp-main', get_stylesheet_uri(), array(), '1.2.7');

            wp_enqueue_style('bootstrap5');
            // font awesome. choose css fonts instead of svg, see more at https://fontawesome.com/how-to-use/on-the-web/other-topics/performance
            wp_enqueue_style('welearntStart-font-awesome5', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css', array(), '5.15.4');
            wp_enqueue_style('welearntStart-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.2.7');

            if (is_singular() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
            wp_enqueue_script('bootstrap5-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '5.1', true); // bundled with popper. see https://getbootstrap.com/docs/4.0/getting-started/contents/#comparison-of-css-files
            wp_enqueue_script('welearntStart-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.2.7', true);
        } // enqueueScriptsAndStyles


        /**
         * Register commonly use scripts and styles for back-end and front-end.
         */
        public function registerCommonScriptsAndStyles()
        {
            wp_register_style('bootstrap5', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.6.0');
        } // registerCommonScriptsAndStyles


        /**
         * Register sidebars
         *
         * @access private Do not access this method directly. This is for hook callback not for direct call.
         */
        public function registerSidebars()
        {
            register_sidebar(array(
                'name'          => __('Sidebar left', 'welearntStart'),
                'id'            => 'sidebar-left',
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));

            register_sidebar(array(
                'name'          => __('Sidebar right', 'welearntStart'),
                'id'            => 'sidebar-right',
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));

            register_sidebar(array(
                'name'          => __('Header right', 'welearntStart'),
                'id'            => 'header-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));

            register_sidebar(array(
                'name'          => __('Navigation bar right', 'welearntStart'),
                'id'            => 'navbar-right',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => '',
            ));

            register_sidebar(array(
                'name'          => __('Footer left', 'welearntStart'),
                'id'            => 'footer-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));

            register_sidebar(array(
                'name'          => __('Footer right', 'welearntStart'),
                'id'            => 'footer-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
        } // registerSidebars


        /**
         * Add theme feature.
         *
         * @access private Do not access this method directly. This is for hook callback not for direct call.
         */
        public function themeSetup()
        {
            // load theme textdomain for translation
            load_theme_textdomain('welearntStart', get_template_directory() . '/languages');

            // add theme support title-tag
            add_theme_support('title-tag');

            // add theme support post and comment automatic feed links
            add_theme_support('automatic-feed-links');

            // allow the use of html5 markup
            // @link https://codex.wordpress.org/Theme_Markup
            add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

            // add support menu
            register_nav_menus(array(
                'primary' => __('Primary Menu', 'welearntStart'),
            ));

            // add post formats support
            add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

            // add post thumbnails support. **This is REQUIRED for post editor to show featured image field.**
            // To display featured image, please use post thumbnail functions.
            // See https://codex.wordpress.org/Post_Thumbnails for reference.
            add_theme_support('post-thumbnails');

            // add support custom background
            add_theme_support(
                'custom-background',
                apply_filters(
                    'bootstrap_basic4_custom_background_args',
                    array(
                        'default-color' => 'ffffff',
                        'default-image' => ''
                    )
                )
            );

            // @since 1.2 or WordPress 5.0+
            // make gutenberg support. --------------------------------------------------------------------------------------
            // @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/ reference.
            // add wide alignment ( https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment )
            add_theme_support('align-wide');

            // support default block styles for front-end ( https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#default-block-styles )
            add_theme_support('wp-block-styles');

            // support editor styles ( https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#editor-styles )
            // this one make appearance in editor more close to Bootstrap 4.
            add_theme_support('editor-styles');

            // support responsive embeds for front-end ( https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content )
            add_theme_support('responsive-embeds');
            // end make gutenberg support. ---------------------------------------------------------------------------------
            /** custom log **/
            add_theme_support('custom-logo', array(
                'height'      => '100%',
                'width'       => 'auto',
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array('site-title', 'site-description'),
            ));
        } // themeSetup


    }
}
