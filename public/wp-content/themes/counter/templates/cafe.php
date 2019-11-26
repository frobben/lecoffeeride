<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Cafe
 *
 * 
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="hero">
					<?php the_post_thumbnail(); ?>
				</div>
				

				<div class="entry-content">

					<?php the_content();


					$images = get_field('gallery');

					if( $images ): ?>


						<div class="gallery">
							<?php  foreach( $images as $image ): ?>
									<a href="<?php echo $image['url']; ?>" class="no-text">
					        	        <div class="img-w">
								    		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
										</div>
									</a>
				            <?php endforeach; ?>
						</div>

					  
					<?php endif; ?>

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