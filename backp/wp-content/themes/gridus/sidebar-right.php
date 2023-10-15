<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
	<aside id="sidebar-right" class="sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
