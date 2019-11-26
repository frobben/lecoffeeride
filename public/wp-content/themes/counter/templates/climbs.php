<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Climbs
 *
 * 
 */

get_header();

$search = strtolower(get_the_title()); 

$args = array(
	'numberposts'	=> -1,
	'nopaging'      => true,
	'post_type'		=> 'ride',
	'meta_key'		=> 'type_of_ride',
	'meta_value'	=> $search
);



?>

	<div id="primary" class="content-area">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="hero">


					<?php 
						$image = get_field('main_image');

						if( !empty($image) ): ?>

							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />


					<?php endif;    ?>
			</div>
			<div class="entry-content">

					<?php the_content(); ?>
			</div>
		<div class="row">

		<?php $the_query = new WP_Query( $args ); if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<a class="custom-panel panel-three overable"  href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php 

				$image = get_field('main_image');

				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

				<?php endif; ?>
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