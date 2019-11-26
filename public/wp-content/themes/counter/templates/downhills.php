<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Downhills
 *
 */

get_header();


 $args = array(
	'numberposts'	=> -1,
	'nopaging'      => true,
	'post_type'		=> 'ride',
	'meta_key'		=> 'type_of_ride',
	'meta_value'	=> 'downhill'
);          

?>

	<div id="primary" class="content-area">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="hero">
					<?php the_post_thumbnail(); ?>
			</div>
			<div class="entry-content">

					<?php the_content(); ?>
			</div>
		<div class="row">

		<?php $the_query = new WP_Query( $args ); if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<a class="custom-panel panel-three overable"  href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(); ?>
				<div class="text-panel">
					<p class="title-panel"><? the_title(); ?></p>
					<p class="ride-panel-bold"><? the_field('subtitle'); ?></p>
					<p><? the_field('price'); ?></p>
				</div>
			</a>				
		
			
		<?php endwhile;endif; ?>
		</div>
		<?php endwhile; ?>
	</div><!-- #primary -->

<?php get_footer();
