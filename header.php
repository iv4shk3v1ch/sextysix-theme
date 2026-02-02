<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	<link rel="profile" href="https://gmpg.org/xfn/11"> 
	<?php
}
?>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo wp_kses_post(
		astra_attr(
			'site',
			array(
				'id'    => 'page',
				'class' => 'hfeed site',
			)
		)
	);
	?>
>
	<?php
	astra_header_before();
	?>
	<header class="ssx-header" role="banner">
		<div class="ssx-container">
			<div class="ssx-header__inner">
				<nav class="ssx-header__nav ssx-header__nav--left" aria-label="<?php esc_attr_e( 'Primary', 'sextysix' ); ?>">
					<?php
					if ( has_nav_menu( 'ssx_header_left' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'ssx_header_left',
								'container'      => false,
								'menu_class'     => 'ssx-nav',
								'fallback_cb'    => false,
							)
						);
					} else {
						$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
						?>
						<a class="ssx-nav__link" href="<?php echo esc_url( $shop_url ); ?>">
							<?php echo esc_html__( 'КАТАЛОГ', 'sextysix' ); ?>
						</a>
						<?php
					}
					?>
				</nav>

				<div class="ssx-header__logo">
					<?php
					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
						the_custom_logo();
					} else {
						$logo_path = get_stylesheet_directory() . '/assets/svg/logo.svg';
						$logo_uri  = get_stylesheet_directory_uri() . '/assets/svg/logo.svg';
						if ( file_exists( $logo_path ) ) {
							?>
							<a class="ssx-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url( $logo_uri ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
							</a>
							<?php
						} else {
							?>
							<a class="ssx-logo-text" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
							</a>
							<?php
						}
					}
					?>
				</div>

				<div class="ssx-header__nav ssx-header__nav--right">
					<?php
					$cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' );
					?>
					<a class="ssx-nav__link ssx-header__cart" href="<?php echo esc_url( $cart_url ); ?>">
						<?php echo esc_html__( 'КОРЗИНА ( . )', 'sextysix' ); ?>
					</a>
				</div>
			</div>
		</div>
	</header>
	<?php

	astra_header_after();

	astra_content_before();
	?>
	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>
