<?php
/**
 * The template part for displaying single posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-block col-md-12 post hentry' ); ?>>
	<div class="post-detail">
		<div class="meta-cat">
			<?php echo get_the_category_list(', ') ?>
		</div>
		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h3>
		<div class="metas">
			Posted on: <span class="meta-date"><?php the_date( "F j, Y" ) ?></span>/&nbsp;
			Posted by: <?php the_author_posts_link() ?>&nbsp;/&nbsp;
			<a href="<?php comments_link() ?>" class="meta-comment"><?php comments_number() ?></a>
		</div>
	</div>
	<div class="img-wrap">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive' ) ) ?>
	</div>
	<div class="post-excerpt">
		<?php the_excerpt() ?>
	</div>
	<footer class="entry-footer">
		<?php
		edit_post_link(
			sprintf(
				wp_kses(__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'gridus' ), 'post'),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</footer><!-- .entry-footer -->
</article>