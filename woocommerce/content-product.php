<?php
/**
 * Product loop card.
 *
 * @package Astra
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$badge_text = '';
if ( function_exists( 'sextysix_get_product_badge_text' ) ) {
	$badge_text = sextysix_get_product_badge_text( $product );
}
?>
<li <?php wc_product_class( 'ssx-product-card', $product ); ?>>
	<a class="ssx-product-card__link" href="<?php the_permalink(); ?>">
		<div class="ssx-product-card__media">
			<?php if ( $badge_text ) : ?>
				<span class="ssx-product-card__badge"><?php echo esc_html( $badge_text ); ?></span>
			<?php endif; ?>
			<?php echo $product->get_image( 'woocommerce_single' ); ?>
		</div>
		<div class="ssx-product-card__meta">
			<h2 class="ssx-product-card__title"><?php the_title(); ?></h2>
			<span class="ssx-product-card__price"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
		</div>
	</a>
</li>
