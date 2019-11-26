<?php
/**
 * Created by PhpStorm.
 * User: robbie
 * Date: 23/01/19
 * Time: 2:11 PM
 *
 * Template Name: Category Custom apparel
 */


get_header();

//Custom taxonomy is project_type, custom term is web-design
$cat = get_queried_object();

?>



    <div id="primary" class="content-area fullw">
        <article>

            <div class="entry-content">
                <div class="row">

                <?php
                $args = array(
                    'post_type' => 'custom_apparel',
                    'category_name'  => $cat->slug
                );
                $the_query = new WP_Query( $args );

                $t = [];
                $types = [];


                while ( $the_query->have_posts() ) : $the_query->the_post();

                    $type = strtolower(get_field('type'));

                    if (in_array($type, $t)){
                        array_push($types[$type], get_the_ID());
                    }else{
                        array_push($t, $type);
                        $types[$type] = [get_the_ID()];
                    }

                endwhile;

                foreach ($types as $type => $sorted):?>

                    <div class="title">
                        <h2><?php echo ucwords($type) ?></h2>
                    </div>
                    <div class="row">


                        <?php foreach ($sorted as $id):
                            $mypost = get_post($id);
                            $meta = get_post_meta($id);
                        ?>

                        <a class="custom-panel panel-four overable" href="<?php the_permalink($id); ?>">
                            <img class="custom-apparel-thumb" src="<?php echo get_the_post_thumbnail_url($id);?>" alt="">
                            <img class="custom-apparel-secondary-image" src="<?php echo get_field('secondary_image', $id)?>" alt="">
                            <?php echo get_the_title($id);?>
                        </a>


                        <?php endforeach;?>
                    </div>
                <?php endforeach; ?>


                </div>
            </div><!-- .entry-content -->

        </article><!-- #post-## -->

    </div><!-- #primary -->

<?php get_footer();
