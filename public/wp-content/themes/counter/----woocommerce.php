<?php get_header( 'shop' ); ?>

<?php

 if ( is_singular( 'product' ) ) {

    while ( have_posts() ) :
        the_post();
        wc_get_template_part( 'content', 'single-product' );
    endwhile;

} else if ( is_shop() ) {

     global $post; // required

     $the_slug = 'shop-text-and-images';
     $args = array(
         'name'        => $the_slug,
         'post_type'   => 'post',
         'post_status' => 'publish',
         'numberposts' => 1
     );
    $custom_posts = get_posts($args);
    foreach($custom_posts as $post) :
        setup_postdata($post); ?>

        <?php the_post_thumbnail('', array('class' => 'full-width'));?>
        <div class="center">
            <?php the_content();?>
        </div>



    <?php endforeach;
        wp_reset_postdata();



     $orderby = 'name';
     $order = 'asc';
     $hide_empty = false;
     $cat_args = array(
         'orderby' => $orderby,
         'order' => $order,
         'hide_empty' => $hide_empty,
     );

     $product_categories = get_terms('product_cat', $cat_args);


     ?>

     <div id="primary" class="content-area">
         <div class="row">

             <?php
             foreach ($product_categories as $key => $category) {
             if ($category->slug !== 'uncategorized'){ ?>
             <a class="custom-panel panel-three overable" href="<?php echo get_term_link($category) ?>"
                title="<?php $category->name; ?>">
                 <?php
                 $thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
                 $image = wp_get_attachment_url($thumbnail_id);
                 if ($image) {
                     echo '<img src="' . $image . '" alt="' . $category->name . '" />';
                 }
                 ?>

                 <div class="text-panel">
                     <p class="title-panel"><?php echo $category->name; ?></p>
                 </div>
             </a>

                 <?php
                 }

             } ?>

         </div>
     </div><!-- #primary -->


     <?php

 }else{
    ?>


    <?php do_action( 'woocommerce_archive_description' ); ?>

    <?php if ( have_posts() ) : ?>

        <?php do_action( 'woocommerce_before_shop_loop' ); ?>

        <?php woocommerce_product_loop_start(); ?>

        <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>
                <?php wc_get_template_part( 'content', 'product' ); ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php woocommerce_product_loop_end(); ?>

        <?php do_action( 'woocommerce_after_shop_loop' ); ?>

    <?php else : ?>

        <?php do_action( 'woocommerce_no_products_found' ); ?>

    <?php
    endif;

}



?>

<div id="message-shop"></div>

<?php get_footer(); ?>