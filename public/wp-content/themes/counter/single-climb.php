<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Cafe
 *
 * 
 */

get_header(); ?>

	<div id="primary">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php counter_post_thumbnail(); ?>

				<div class="entry-content climb-content">

					<?php the_content(); ?>

					<div class="img-container">
						<div>
							<?php 

							$image = get_field('image1');

							if( !empty($image) ): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>
						</div>

						<div>
							
							<?php $image = get_field('image2');

							if( !empty($image) ): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>

						</div>

					</div>
					
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'counter' ),
							'after'  => '</div>',
						) );

					?>

				</div><!-- .entry-content -->

			</article><!-- #post-## -->
			
		<?php endwhile; ?>

	</div><!-- #primary -->

<?php get_footer();