<?php
/**
 * Display no results from condition if not have posts.
 * 
 * @package welearntStart
 */
?> 
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e('Nothing Found', 'welearntStart'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content row-with-vspace">
		<?php if (is_home() && current_user_can('publish_posts')) { ?> 
			<p><?php 
                        /* translators: %1$s: URL to add new post. */
                        printf(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'welearntStart'), esc_url(admin_url('post-new.php'))); 
                        ?></p>
		<?php } elseif (is_search()) { ?> 
			<?php get_template_part('template-parts/partial', 'search-form'); ?> 
			<p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'welearntStart'); ?></p>
		<?php } else { ?> 
			<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'welearntStart'); ?></p>
			<?php get_template_part('template-parts/partial', 'search-form'); ?> 
		<?php } //endif; ?> 
	</div><!-- .page-content -->
</section><!-- .no-results -->