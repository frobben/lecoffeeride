<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: RentBike
 *
 * 
 */

get_header(); 

       




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
		
		<?php     // needed to use $post
		    global $post;

		    $args = array(
		        'post_type' => 'page',
		        'orderby' => 'title',
		        'order' => 'DESC',
		        'posts_per_page' => -1
		    );
		    $the_query = new WP_Query( $args );

		    while ( $the_query->have_posts() ) {
		        $the_query->the_post();
		        if (get_the_title() == "Pro Peloton Bikes" || get_the_title() == "Enduro Bikes") { ?>
		        	<div class="climb-panel rent-bike">
					<?php the_post_thumbnail(); ?>
					<a class="btn btn-default" href="<? the_permalink(); ?>"><? the_title(); ?></a>
				</div>


	        	<?php
		        }

		    }
		    wp_reset_postdata(); ?>
		 
		</div>
		<?php endwhile; ?>
	</div><!-- #primary -->

<?php get_footer();