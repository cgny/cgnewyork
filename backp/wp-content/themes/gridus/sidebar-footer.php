<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
	<aside id="sidebar-footer" class="sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar-footer' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
