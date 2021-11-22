<?php
/**
 * The left sidebar.
 * 
 * @package welearntStart
 */


global $BootstrapBasic5_sidebar_left_size;
if (null == $BootstrapBasic5_sidebar_left_size || !is_numeric($BootstrapBasic5_sidebar_left_size)) {
    $BootstrapBasic5_sidebar_left_size = 3;
}

if (is_active_sidebar('sidebar-left')) {
?> 
                <div id="sidebar-left" class="col-md-<?php echo $BootstrapBasic5_sidebar_left_size; ?>">
                    <?php do_action('before_sidebar'); ?> 
                    <?php dynamic_sidebar('sidebar-left'); ?> 
                </div>
<?php
}