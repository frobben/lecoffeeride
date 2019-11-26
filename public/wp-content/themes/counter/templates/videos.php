<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: Videos
 *
 * @package Counter
 */

get_header();

global $post;
$args = array( 'post_type' => 'videos', 'orderby'=> 'date', 'order' => 'DESC');

$myposts = get_posts( $args );

?>

    <div id="primary" class="content-area">
        <?php while ( have_posts() ) : the_post(); ?>
<!--            <div class="hero">-->
<!--                --><?php //the_post_thumbnail(); ?>
<!--            </div>-->
            <div class="entry-content">

                <?php the_content(); ?>
            </div>
            <div class="row">

                <?php
                $i=0;
                foreach ( $myposts as $post ) : setup_postdata( $post );

                     if($i%2 == 0){
                     	$class = "";
                     }else{
                     	$class = "reverse";
                     }
                    ?>

                    <div class="video-box <? echo $class ?>">

                        <div class="player">
                            <iframe id="ytplayer" type="text/html" width="640" height="360"
                                    src="https://www.youtube.com/embed/<?php the_field('youtube_link')?>?autoplay=0"
                                    frameborder="0"></iframe>
                            <?php // the_post_thumbnail(); ?>

                        </div>
                        <div class="video-content">
                            <h2><? the_title(); ?></h2>
                            <? the_content() ?>
                        </div>


                    </div>

                <?php
                $i++;
                endforeach;
                wp_reset_postdata();?>

            </div>
        <?php endwhile; ?>
    </div><!-- #primary -->

<?php get_footer();
