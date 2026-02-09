<?php
/**
 * Single product content template.
 *
 * @package Astra
 */

defined( 'ABSPATH' ) || exit;

global $product;

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'ssx-single-product', $product ); ?>>
	<div class="ssx-single-product__gallery">
		<?php woocommerce_show_product_images(); ?>
	</div>
	<div class="ssx-single-product__summary">
		<div class="ssx-product-heading">
			<?php woocommerce_template_single_title(); ?>
			<?php woocommerce_template_single_price(); ?>
		</div>
		<?php woocommerce_template_single_excerpt(); ?>
		<?php woocommerce_template_single_add_to_cart(); ?>
		<?php sextysix_output_product_accordion(); ?>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
