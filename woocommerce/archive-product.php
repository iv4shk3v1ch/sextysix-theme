<?php
/**
 * Product archive (catalog) template.
 *
 * @package Astra
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="site-main ssx-catalog">
	<div class="ssx-catalog__inner">
		<?php if ( woocommerce_product_loop() ) : ?>
			<?php woocommerce_product_loop_start(); ?>

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php wc_get_template_part( 'content', 'product' ); ?>
			<?php endwhile; ?>

			<?php woocommerce_product_loop_end(); ?>
		<?php else : ?>
			<?php do_action( 'woocommerce_no_products_found' ); ?>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
