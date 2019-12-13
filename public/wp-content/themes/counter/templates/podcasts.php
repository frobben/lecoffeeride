<?php
/**
 * Created by PhpStorm.
 * User: francois
 * Date: 5/10/18
 * Time: 22:21
 */
/**
 * The template for displaying full width pages
 *
 * Template Name: Podcasts
 *
 */

get_header();

global $post;
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => get_the_ID(),
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
);

$myposts = get_posts( $args );

?>

    <div id="primary" class="content-area">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1 class="text-center"><?php the_title(); ?></h1>
            <div class="hero">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="entry-content">

                <?php the_content(); ?>
            </div>
            <div class="row">
                <?php

                $args = array(
                    'post_type'      => 'podcast',
                    'posts_per_page' => -1,
                    'orderby'		 => 'date',
                    'order'      	 => 'ASC'
                );

                $parent = new WP_Query( $args );

                if ( $parent->have_posts() ) :
                    $i = $parent->post_count;


                    ?>

                    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                        <a class="custom-panel panel-two overable"  href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail();?>

                            <p class="podcast-episode-num">Episode <?php echo $i; ?></p>

                            <p class="title-panel-acticles"><?php the_title(); ?></p>
                            <!--                                <p class="date-panel-acticles">--><?php //the_field('date'); ?><!--</p>-->

                        </a>

                    <?php $i--; endwhile;

                endif; ?>

            </div>
        <?php endwhile; ?>
    </div><!-- #primary -->

<?php get_footer();
