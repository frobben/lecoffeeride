<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Downhills
 *
 */

get_header();

$args = array(
    'post_type'=> 'downhills',
    'order'    => 'ASC'
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

		
			<div class="climb-panel">

				<?php the_post_thumbnail(); ?>

				<a class="btn btn-default" href="<? //the_permalink(); ?>#" style='cursor: default;'><? the_title(); ?></a>
			</div>
		
			
		<?php endwhile;endif; ?>
		</div>
		<?php endwhile; ?>
	</div><!-- #primary -->

<?php get_footer();
