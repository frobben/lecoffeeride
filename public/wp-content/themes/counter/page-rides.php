<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Fullwidth
 *
 * @package Counter
 */

get_header(); ?>

	<div id="primary" class="content-area fullw">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php //the_post_thumbnail( 'full' ); ?>

<!-- 				<div class="entry-content">

					<?php the_content(); ?>

				</div> .entry-content -->

				<div class="row">
					<?php

					$args = array(
					    'post_type'      => 'any',
					    'posts_per_page' => -1,
					    'post_parent'    => get_the_ID(),
					    'orderby'		 => 'menu_order',
					    'order'      	 => 'ASC'
					 );

					$parent = new WP_Query( $args );

					if ( $parent->have_posts() ) : ?>

					    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

					    	<a class="custom-panel panel-three overable"  href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail();?>
								<div class="text-panel">
									<p class="title-panel"><?php the_title(); ?></p>
								</div>

							</a>

					    <?php endwhile;

					endif; ?>

				</div>

			</article><!-- #post-## -->


		<?php endwhile; ?>

	</div><!-- #primary -->

<?php get_footer();
