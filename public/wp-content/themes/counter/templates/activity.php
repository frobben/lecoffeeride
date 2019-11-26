<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Activity
 *
 * 
 */

get_header(); 

$args = array(
    'post_type'=> 'activities',
    'nopaging'               => true,
    'meta_key'			=> 'distance',
	'orderby'			=> 'meta_value',
    'order'    => 'ASC'
    );              




?>

	<div id="primary" class="content-area">
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