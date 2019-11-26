<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Accomodation
 *
 * @package Counter
 */

get_header(); 

global $post;
$args = array( 'post_type' => 'rent_room', 'orderby'=> 'title', 'order' => 'DESC');

$myposts = get_posts( $args );

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

		<?php 
		//$i=1; 
		foreach ( $myposts as $post ) : setup_postdata( $post ); 

		// if($i%2 == 0){
		// 	$class = "split-right";
		// }else{
		// 	$class = "split-left";
		// }
		?>

		<div class="climb-panel two-panel">
				<?php the_post_thumbnail(); ?>
				<a class="btn btn-default" href="<? the_permalink(); ?>"><? the_title(); ?></a>
		</div>


	

			

		<?php endforeach; 
		wp_reset_postdata();?>

		</div>
		<?php endwhile; ?>
	</div><!-- #primary -->

<?php get_footer();
