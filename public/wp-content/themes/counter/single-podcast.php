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

                <div class="entry-content climb-content">

                    <?php the_content(); ?>
                    <?php
                    $link = get_field('lien_spotify');

                    if ($link !== ""):  ?>
                        <a href="<?php echo $link ?>" class="btn btn-default">SEE ON SPOTIFY</a>
                    <?php endif;

                    ?>

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