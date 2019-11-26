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
					</div>
				</div>
				
				<div class="rent-widget">
					
					<? get_template_part( 'template-parts/booking-activities', 'booking-activities' ) ?>

				</div>				
			</article>
			
		<?php endwhile; ?>

	</div><!-- #primary -->

<?php get_footer();