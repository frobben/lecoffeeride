<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Counter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php counter_post_thumbnail(); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'counter' ),
				'after'  => '</div>',
			) );

		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
