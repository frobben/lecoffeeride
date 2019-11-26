<?php
/**
 * Created by PhpStorm.
 * User: robbie
 * Date: 23/01/19
 * Time: 2:11 PM
 *
 * Template Name: Custom main page
 */


get_header(); ?>

    <div id="primary" class="content-area fullw">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('custom-apparel'); ?>>

                <h1><?php the_title();?></h1>

                <?php the_post_thumbnail( 'full' ); ?>

                <div class="entry-content">


					<?php the_content(); ?>

				</div><!-- .entry-content -->
                <div class="title">
                    <h2><?php the_field('title_categorie');?></h2>
                </div>
                <div class="row">
                    <?php
                        $descendant= array('child_of'=>60,
                            'orderby' => 'description',
                            'order'   => 'ASC');
                        $categories = get_categories($descendant);

                        foreach($categories as $cat) :?>
                        <a class="custom-panel panel-four overable" href="<?php echo get_category_link( $cat->term_id ); ?>">
                            <?php if (function_exists('z_taxonomy_image')) z_taxonomy_image($cat->term_id); ?>
                            <?php echo $cat->name; ?>
                        </a>

                        <?php endforeach; ?>
                </div>

                <?php if( have_rows('Process') ):

                    $i = count( get_field( 'Process' ) );
                    $i = round($i)/2;
                    $u = 1;

                    ?>

                    <div class="process-background">
                        <h2><?php the_field('title_process')?></h2>
                        <div class="col-process">

                            <?php while( have_rows('Process') ): the_row();



                            ?>

                            <a href="#process-popup-<?php echo $u ?>" class="process-panel btn btn-default">
                                <?php the_sub_field('Title');?>
                            </a>
                            <div id="process-popup-<?php echo $u ?>" class="process-text mfp-hide">
                                <div class="popup-title">
                                    <h1><?php the_sub_field('Title');?></h1>
                                </div>

                                <?php the_sub_field('Text'); ?>
                            </div>

                            <?php

                            if ($i == $u):?>
                        </div><div class="col-process">
                            <?php endif;
                            $u++;
                            endwhile;

                            ?>
                        </div>

                    </div>

                <?php endif; ?>

                <div class="canvas">
                    <a href="<?php the_field('canvas'); ?>" class="btn btn-default" download >Download our canvas</a>
                </div>

                <div class="contactus">
                    <h2><?php the_field('title_order') ?></h2>
                    <div>
                        <?php the_field('order_text')?>
                    </div>

                    <a class="btn btn-default" href="<?php the_field('order_link') ?>"><?php the_field('order_button_text'); ?></a>
                </div>




            </article><!-- #post-## -->


        <?php endwhile; ?>

    </div><!-- #primary -->

<?php get_footer();
