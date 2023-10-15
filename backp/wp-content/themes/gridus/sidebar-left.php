<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
	<aside id="left-sidebar" class="sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar-left' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
