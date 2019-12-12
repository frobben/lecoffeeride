<?php
/**
 * Created by PhpStorm.
 * User: robbie
 * Date: 23/01/19
 * Time: 2:11 PM
 *
 * Template Name: Page Podcasts
 * Template Post Type: podcast
 */


get_header(); ?>

    <div id="primary" class="content-area fullw">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                llldldldlddldld

                <?php //the_post_thumbnail( 'full' ); ?>

                <!-- 				<div class="entry-content">

					<?php the_content(); ?>

				</div> .entry-content -->

                <div class="row">
                    <?php

                    $args = array(
                        'post_type'      => 'podcast',
                        'posts_per_page' => -1,
                        'orderby'		 => 'date',
                        'order'      	 => 'DESC'
                    );

                    $parent = new WP_Query( $args );

                    if ( $parent->have_posts() ) : ?>

                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                            <a class="custom-panel panel-two overable"  href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail();?>

                                <p class="title-panel-acticles"><?php the_title(); ?></p>
                                <!--                                <p class="date-panel-acticles">--><?php //the_field('date'); ?><!--</p>-->

                            </a>

                        <?php endwhile;

                    endif; ?>

                </div>

            </article><!-- #post-## -->


        <?php endwhile; ?>

    </div><!-- #primary -->

<?php get_footer();
