<?php
/**
 * The template for displaying full width pages
 *
 * 
 *
 * 
 */

get_header(); ?>

	<div id="primary">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<div class="rent">
					<?php the_post_thumbnail( 'large' ); ?>
					<div class="rent-content">
						<?php the_content(); ?>

						<?php 

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
					</div>
				</div>
				
				<div class="rent-widget">
					
					<? get_template_part( 'template-parts/booking-rooms', 'booking-rooms' ) ?>

				</div>				
			</article>
			
		<?php endwhile; ?>

	</div><!-- #primary -->

<?php get_footer();