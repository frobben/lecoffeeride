<?php

/*
Plugin Name: WooCommerce Coffeeride
Description: Adaptation of Woocommerce for the coffeeride
Version:     1
Author: Spykovic
License:     GPL-2.0+
*/

//add_action('template_redirect', 'remove_shop_breadcrumbs' );
function remove_shop_breadcrumbs(){

    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

}

add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0
 * @return      void
 */
function woo_hide_page_title() {

    return false;

}

//* Used when the widget is displayed as a dropdown
add_filter( 'woocommerce_product_categories_widget_dropdown_args', 'rv_exclude_wc_widget_categories' );
//* Used when the widget is displayed as a list
add_filter( 'woocommerce_product_categories_widget_args', 'rv_exclude_wc_widget_categories' );
function rv_exclude_wc_widget_categories( $cat_args ) {
    $cat_args['exclude'] = array('42'); // Insert the product category IDs you wish to exclude
    return $cat_args;
}


function coffeeride_product_subcategories( $args = array() ) {

    $parentid = get_queried_object_id();

    $args = array(
        'parent' => $parentid
    );

    $terms = get_terms( 'product_cat', $args );

    if ( $terms ) {

        echo '<div id="primary" class="content-area"><div class="row">';

        foreach ( $terms as $term ) {

            if ( $term->slug !== 'uncategorized'){

                echo '<a class="custom-panel panel-three overable" href="' .  esc_url( get_term_link( $term ) ) . '" title="'.  $term->name .'">';

                woocommerce_subcategory_thumbnail( $term );

                echo '<div class="text-panel"><p class="title-panel">'.$term->name.'</p></div></a>';

            }




        }

        echo '</div></div><!-- #primary -->';

    }

}

add_action( 'woocommerce_before_shop_loop', 'coffeeride_product_subcategories', 50 );
