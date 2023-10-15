<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 */
?>
<footer class="padding-50 ui-bg-color02">
	<div class="container-fluid nopadding">
		<div class="row nopadding">
			<?php get_sidebar('footer'); ?>
		</div>
		<div class="row">
			<div class="col-md-12 copyrights">
				<?php
				$copyright = get_theme_mod( 'copyright', esc_html__( '2016 Samuel Anderson.', 'gridus' ) );
				?>
				<p><?php echo $copyright; ?></p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
