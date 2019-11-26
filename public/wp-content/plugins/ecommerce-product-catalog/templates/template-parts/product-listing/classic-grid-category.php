<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The template to display product listing or category page title
 *
 * Copy it to your theme implecode folder to edit the output: your-theme-folder-name/implecode/product-title.php
 *
 * @version		1.1.2
 * @package		ecommerce-product-catalog/templates/template-parts/product-listing
 * @author 		impleCode
 */
$product_cat = ic_get_global( 'ic_current_product_cat' );
if ( empty( $product_cat ) ) {
	return;
}

$classic_grid_settings = get_classic_grid_settings();
?>


<div class="archive-listing category-<?php echo $product_cat->term_id ?> classic-grid <?php echo product_category_class( $product_cat->term_id ) ?>">
	<a href="<?php echo get_term_link( $product_cat ) ?>">
		<div class="classic-grid-image-wrapper"><div class="pseudo"></div><div class="image"><?php echo $product_cat->listing_image_html ?></div></div>
		<h3 class="product-name"><?php echo $product_cat->name ?></h3>
	</a>
</div>

<?php
