<?php
/**
 * Front page template for Sextysix.
 *
 * @package Astra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$first_image  = get_stylesheet_directory_uri() . '/assets/img/first.jpeg';
$second_image = get_stylesheet_directory_uri() . '/assets/img/second.JPEG';
$logo_path    = get_stylesheet_directory() . '/assets/svg/logo.svg';
$logo_uri     = get_stylesheet_directory_uri() . '/assets/svg/logo.svg';
?>
<main id="primary" class="site-main ssx-home">
	<section class="ssx-home__hero ssx-full-bleed">
		<img src="<?php echo esc_url( $first_image ); ?>" alt="<?php echo esc_attr__( 'Sextysix hero', 'sextysix' ); ?>">
		<?php if ( file_exists( $logo_path ) ) : ?>
			<div class="ssx-home__logo ssx-home__logo--invert">
				<img src="<?php echo esc_url( $logo_uri ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			</div>
		<?php endif; ?>
	</section>

	<section class="ssx-home__hero ssx-home__hero--welcome ssx-full-bleed">
		<img src="<?php echo esc_url( $second_image ); ?>" alt="<?php echo esc_attr__( 'Sextysix club', 'sextysix' ); ?>">
		<div class="ssx-home__welcome">
			<?php echo esc_html__( 'WELCOME TO THE SEXTYSIX CLUB', 'sextysix' ); ?>
		</div>
	</section>
</main>
<?php
get_footer();
