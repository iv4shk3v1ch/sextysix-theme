<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php
	astra_content_after();

	astra_footer_before();
	?>
	<footer class="ssx-footer" role="contentinfo">
		<div class="ssx-container">
			<div class="ssx-footer__top">
				<div class="ssx-footer__col ssx-footer__newsletter">
					<p class="ssx-footer__title"><?php echo esc_html__( 'РАССЫЛКА', 'sextysix' ); ?></p>
					<form class="ssx-footer__form" action="#" method="post">
						<label class="screen-reader-text" for="ssx-footer-email"><?php echo esc_html__( 'Email address', 'sextysix' ); ?></label>
						<input
							type="email"
							id="ssx-footer-email"
							name="ssx-footer-email"
							placeholder="<?php echo esc_attr__( 'Введите свой email', 'sextysix' ); ?>"
							autocomplete="email"
						>
						<button class="ssx-footer__submit" type="submit" aria-label="<?php esc_attr_e( 'Submit', 'sextysix' ); ?>">
							<?php
							$email_icon_path = get_stylesheet_directory() . '/assets/svg/Email icon.svg';
							$email_icon_uri  = get_stylesheet_directory_uri() . '/assets/svg/Email icon.svg';
							if ( file_exists( $email_icon_path ) ) {
								?>
								<img src="<?php echo esc_url( $email_icon_uri ); ?>" alt="">
								<?php
							} else {
								echo esc_html( '→' );
							}
							?>
						</button>
					</form>
					<p class="ssx-footer__note">
						<?php echo esc_html__( 'Нажав на «Подписаться», вы соглашаетесь с', 'sextysix' ); ?>
						<a class="ssx-footer__underline" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php echo esc_html__( 'политикой конфиденциальности.', 'sextysix' ); ?>
						</a>
					</p>
				</div>

				<div class="ssx-footer__col ssx-footer__links">
					<div class="ssx-footer__links-col">
						<p class="ssx-footer__title"><?php echo esc_html__( 'КЛИЕНТСКИЙ СЕРВИС', 'sextysix' ); ?></p>
						<?php
						if ( has_nav_menu( 'ssx_footer_service' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'ssx_footer_service',
									'container'      => false,
									'menu_class'     => 'ssx-footer__menu',
									'fallback_cb'    => false,
								)
							);
						}
						?>
					</div>
					<div class="ssx-footer__links-col">
						<p class="ssx-footer__title"><?php echo esc_html__( 'СЛЕДИТЕ ЗА НАМИ', 'sextysix' ); ?></p>
						<?php
						if ( has_nav_menu( 'ssx_footer_social' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'ssx_footer_social',
									'container'      => false,
									'menu_class'     => 'ssx-footer__menu',
									'fallback_cb'    => false,
								)
							);
						}
						?>
					</div>
				</div>

				<div class="ssx-footer__col ssx-footer__col--spacer" aria-hidden="true"></div>
			</div>

			<div class="ssx-footer__bottom">
				<p class="ssx-footer__copyright"><?php echo esc_html__( '©Sexty Six. All rights reserved.', 'sextysix' ); ?></p>
				<div class="ssx-footer__logo">
					<?php
					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
						echo get_custom_logo();
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
			</div>
		</div>
	</footer>
	<?php

	astra_footer_after();
?>
	</div><!-- #page -->
<?php
	astra_body_bottom();
	wp_footer();
?>
	</body>
</html>
