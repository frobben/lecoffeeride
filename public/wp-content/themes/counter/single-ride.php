<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Ride
 *
 * @package Counter
 */



get_header(); ?>

	<div id="primary" class="content-area fullw">


		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_title('<h1>', '</h1>');

/*			    if(get_field('subtitle') != ""): ?>

			    	<h2><?the_field('subtitle')?></h2>

			    <?php endif; */

				$image = get_field('main_image');

				if( !empty($image) ): ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

				<?php else:

				 the_post_thumbnail( 'full' ); 

				endif;  ?>

				<div class="entry-content">

					<?php the_content(); ?>

				</div><!-- .entry-content -->

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

				<? if (get_field('gpx_shortcode')): ?>


				<div class="gpx_shortcode">
						<? the_field('gpx_shortcode'); ?>
				</div>

				<? endif;?>

                <?php if ( comments_open() || get_comments_number() ) : ?>

                    <?php comments_template(); ?>

                <?php endif; ?>




            </article><!-- #post-## -->


		<?php endwhile; ?>

	</div><!-- #primary -->

<?php get_footer();
