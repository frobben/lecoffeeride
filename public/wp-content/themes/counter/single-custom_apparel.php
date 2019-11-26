<?php
/**
 * Created by PhpStorm.
 * User: robbie
 * Date: 23/01/19
 * Time: 2:11 PM
 *
 * Template Name: Single Custom Apparel
 */


get_header(); ?>

    <div id="primary" class="content-area fullw">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('custom-apparel'); ?>>
                <h1 class="center"><?php the_title(); ?></h1>


                <div class="row custom-apparel-img">
                    <?php the_post_thumbnail( ); ?>
                    <img src="<?php the_field('secondary_image');?>" alt="">
                </div>


                <div class="entry-content">

					<?php the_content(); ?>

				</div>

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

                <div class="contactus">

                    <a class="btn btn-default" href="<?php echo get_permalink(1684); ?>">Contact us</a>

                </div>

            </article><!-- #post-## -->


        <?php endwhile; ?>

    </div><!-- #primary -->

<?php get_footer();
