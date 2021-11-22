<?php
/**
 * The right sidebar.
 * 
 * @package welearntStart
 */


global $BootstrapBasic5_sidebar_right_size;
if (null == $BootstrapBasic5_sidebar_right_size || !is_numeric($BootstrapBasic5_sidebar_right_size)) {
    $BootstrapBasic5_sidebar_right_size = 3;
}

if (is_active_sidebar('sidebar-right')) {
?> 
                <div id="sidebar-right" class="col-md-<?php echo $BootstrapBasic5_sidebar_right_size; ?>">
                    <?php do_action('before_sidebar'); ?> 
                    <?php dynamic_sidebar('sidebar-right'); ?> 
                </div>
<?php
}