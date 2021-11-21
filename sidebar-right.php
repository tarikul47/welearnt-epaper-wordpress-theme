<?php
/**
 * The right sidebar.
 * 
 * @package welearntStart
 */


global $bootstrapbasic4_sidebar_right_size;
if (null == $bootstrapbasic4_sidebar_right_size || !is_numeric($bootstrapbasic4_sidebar_right_size)) {
    $bootstrapbasic4_sidebar_right_size = 3;
}

if (is_active_sidebar('sidebar-right')) {
?> 
                <div id="sidebar-right" class="col-md-<?php echo $bootstrapbasic4_sidebar_right_size; ?>">
                    <?php do_action('before_sidebar'); ?> 
                    <?php dynamic_sidebar('sidebar-right'); ?> 
                </div>
<?php
}