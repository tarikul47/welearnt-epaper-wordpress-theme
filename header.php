<?php

/**
 * The theme header.
 * 
 * @package welearntStart
 */

$container_class = apply_filters('bootstrap_basic4_container_class', 'container');
if (!is_scalar($container_class) || empty($container_class)) {
    $container_class = 'container';
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!--WordPress head-->
    <?php wp_head(); ?>
    <!--end WordPress head-->
</head>

<body <?php body_class(); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>
    <div class="<?php echo $container_class; ?> page-container shadow p-3 mb-5 bg-body rounded">
        <header class="page-header page-header-sitebrand-topbar">
            <div class="row row-with-vspace">
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="site-branding align-items-center">
                        <?php
                        $title = get_bloginfo('name') ? get_bloginfo('name') : 'Website tag title';
                        $tagLine = get_bloginfo('description') ? get_bloginfo('description') : 'Website tag line set ';
                        if (get_theme_mod('header_text') == true) {
                        ?>
                            <h1><?php echo $title ?></h1>
                            <p><?php echo $tagLine ?></p>
                            <?php
                        } else {
                            if (has_custom_logo()) {
                                //echo "<pre>";
                                //var_dump(get_theme_mods());
                                $logo_id = get_theme_mod('custom_logo');
                                $custom_logo = wp_get_attachment_image_url($logo_id, 'medium');
                            ?>
                                <img class="img-fluid" src="<?php echo esc_url($custom_logo); ?>" alt="logo">
                                <p><?php echo $tagLine ?></p>
                            <?php
                            } else {
                            ?>
                                <h1><?php echo $title ?></h1>
                                <p><?php echo $tagLine ?></p>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="col-lg-9 page-header-top-right">
                    <?php if (is_active_sidebar('header-right')) {
                        dynamic_sidebar('header-right');
                    } // endif; 
                    ?>
                </div>
            </div>
            <!--.site-branding-->
            <?php if (has_nav_menu('primary') || is_active_sidebar('navbar-right')) { ?>
                <div class="row main-navigation">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#welearntStart-topnavbar" aria-controls="welearntStart-topnavbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'welearntStart'); ?>">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div id="welearntStart-topnavbar" class="collapse navbar-collapse">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'depth' => '2',
                                        'theme_location' => 'primary',
                                        'container' => false,
                                        'menu_id' => 'bb4-primary-menu',
                                        'menu_class' => 'navbar-nav mr-auto',
                                        'walker' => new \BootstrapBasic5\BootstrapBasic5WalkerNavMenu()
                                    )
                                );
                                ?>
                                <div class="float-md-right">
                                    <?php dynamic_sidebar('navbar-right'); ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!--.navbar-collapse-->
                            <div class="clearfix"></div>
                        </nav>
                    </div>
                </div>
                <!--.main-navigation-->
            <?php } else { ?>
                <!-- the navigation is skipped due to there is no menu or active widgets on navbar-right. -->
            <?php } // endif; 
            ?>
        </header>
        <!--.page-header-->


        <div id="content" class="site-content row row-with-vspace">