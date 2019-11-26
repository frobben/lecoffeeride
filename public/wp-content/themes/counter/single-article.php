<?php
/**
 * Created by PhpStorm.
 * User: robbie
 * Date: 23/01/19
 * Time: 1:40 PM
 */


get_header(); ?>

    <div id="primary">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h1 class="center"><?php the_title(); ?></h1>

                <div class="hero">

                    <img src="<?php the_field('main_image'); ?>" alt="">

                <?php //the_post_thumbnail(); ?>


                </div>

                <div class="entry-content climb-content">

                    <?php the_content(); ?>


                    <?php if ( get_field('video') != ''): ?>
                    <div class="videoWrapper">

                        <iframe width="560" height="349" frameborder="0" allowfullscreen
                                src="https://www.youtube.com/embed/<?php the_field('video'); ?>">
                        </iframe>
                    </div>

                    <?php endif; ?>


                    <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'counter' ),
                        'after'  => '</div>',
                    ) );

                    ?>

                </div><!-- .entry-content -->

            </article><!-- #post-## -->

        <?php endwhile; ?>

    </div><!-- #primary -->

<?php get_footer();