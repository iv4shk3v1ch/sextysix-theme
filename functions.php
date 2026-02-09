<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.12.1' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.12.0' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-command-palette.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-memory-limit-notice.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-learn.php';
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-elementor-editor-settings.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-buddypress.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

/**
 * Sextysix theme base assets.
 */
function sextysix_enqueue_base_assets() {
	$css_path = get_stylesheet_directory() . '/assets/css/sextysix.css';
	$css_uri  = get_stylesheet_directory_uri() . '/assets/css/sextysix.css';
	$version  = file_exists( $css_path ) ? filemtime( $css_path ) : ASTRA_THEME_VERSION;

	wp_enqueue_style( 'sextysix-base', $css_uri, array(), $version );

	$scale_path = get_stylesheet_directory() . '/assets/js/sextysix-scale.js';
	if ( file_exists( $scale_path ) ) {
		$scale_uri     = get_stylesheet_directory_uri() . '/assets/js/sextysix-scale.js';
		$scale_version = filemtime( $scale_path );
		wp_enqueue_script( 'sextysix-scale', $scale_uri, array(), $scale_version, true );
	}

	if ( function_exists( 'is_product' ) && is_product() ) {
		$accordion_path = get_stylesheet_directory() . '/assets/js/sextysix-accordion.js';
		if ( file_exists( $accordion_path ) ) {
			$accordion_uri     = get_stylesheet_directory_uri() . '/assets/js/sextysix-accordion.js';
			$accordion_version = filemtime( $accordion_path );
			wp_enqueue_script( 'sextysix-accordion', $accordion_uri, array(), $accordion_version, true );
		}

		$variations_path = get_stylesheet_directory() . '/assets/js/sextysix-variations.js';
		if ( file_exists( $variations_path ) ) {
			$variations_uri     = get_stylesheet_directory_uri() . '/assets/js/sextysix-variations.js';
			$variations_version = filemtime( $variations_path );
			wp_enqueue_script( 'sextysix-variations', $variations_uri, array( 'jquery' ), $variations_version, true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'sextysix_enqueue_base_assets', 20 );

/**
 * Register Sextysix menus.
 */
function sextysix_register_menus() {
	register_nav_menus(
		array(
			'ssx_header_left'   => __( 'Header Left', 'sextysix' ),
			'ssx_footer_service'=> __( 'Footer Service', 'sextysix' ),
			'ssx_footer_social' => __( 'Footer Social', 'sextysix' ),
		)
	);
}
add_action( 'after_setup_theme', 'sextysix_register_menus' );

/**
 * Disable Astra scroll-to-top.
 */
add_filter( 'astra_get_option_scroll-to-top-enable', '__return_false' );

/**
 * WooCommerce catalog cleanup.
 */
function sextysix_woocommerce_catalog_cleanup() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
}
add_action( 'wp', 'sextysix_woocommerce_catalog_cleanup' );

add_filter( 'woocommerce_show_page_title', '__return_false' );

/**
 * Single product tweaks.
 */
function sextysix_is_product_in_cart( $product_id ) {
	if ( ! class_exists( 'WooCommerce' ) || null === WC()->cart ) {
		return false;
	}

	foreach ( WC()->cart->get_cart() as $cart_item ) {
		if ( isset( $cart_item['product_id'] ) && (int) $cart_item['product_id'] === (int) $product_id ) {
			return true;
		}
	}

	return false;
}

function sextysix_single_product_setup() {
	if ( ! is_product() ) {
		return;
	}

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
}
add_action( 'wp', 'sextysix_single_product_setup' );

function sextysix_output_product_accordion() {
	if ( ! is_product() ) {
		return;
	}

	$product_id  = get_the_ID();
	$product     = wc_get_product( $product_id );
	$description = $product ? $product->get_description() : '';
	$excerpt     = $product ? $product->get_short_description() : '';

	$sections = array(
		array(
			'key'     => 'description',
			'title'   => __( 'ОПИСАНИЕ ТОВАРА', 'sextysix' ),
			'content' => $description,
		),
		array(
			'key'     => 'care',
			'title'   => __( 'СОСТАВ И УХОД', 'sextysix' ),
			'content' => get_post_meta( $product_id, 'ssx_care', true ),
		),
		array(
			'key'     => 'size',
			'title'   => __( 'РАЗМЕРНАЯ СЕТКА', 'sextysix' ),
			'content' => get_post_meta( $product_id, 'ssx_size_guide', true ),
		),
		array(
			'key'     => 'delivery',
			'title'   => __( 'ДОСТАВКА И ВОЗВРАТ', 'sextysix' ),
			'content' => get_post_meta( $product_id, 'ssx_delivery_returns', true ),
		),
		array(
			'key'     => 'question',
			'title'   => __( 'ЗАДАТЬ ВОПРОС ПРО ТОВАР', 'sextysix' ),
			'content' => get_post_meta( $product_id, 'ssx_question', true ),
		),
	);

	if ( empty( $sections[1]['content'] ) ) {
		$sections[1]['content'] = $excerpt;
	}

	?>
	<div class="ssx-accordion" data-ssx-accordion>
		<?php foreach ( $sections as $section ) : ?>
			<?php
			$panel_id = 'ssx-accordion-' . esc_attr( $section['key'] );
			$content  = trim( (string) $section['content'] );
			if ( '' === $content ) {
				$content = '&nbsp;';
			}
			?>
			<div class="ssx-accordion__item">
				<button
					class="ssx-accordion__trigger"
					type="button"
					aria-expanded="false"
					aria-controls="<?php echo esc_attr( $panel_id ); ?>"
				>
					<span class="ssx-accordion__title"><?php echo esc_html( $section['title'] ); ?></span>
					<span class="ssx-accordion__icon" aria-hidden="true"></span>
				</button>
				<div id="<?php echo esc_attr( $panel_id ); ?>" class="ssx-accordion__panel" hidden>
					<?php echo wp_kses_post( wpautop( $content ) ); ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
}

add_filter(
	'woocommerce_is_sold_individually',
	function( $sold, $product ) {
		if ( is_product() ) {
			return true;
		}
		return $sold;
	},
	10,
	2
);

add_filter(
	'woocommerce_product_single_add_to_cart_text',
	function( $text ) {
		if ( is_product() && sextysix_is_product_in_cart( get_the_ID() ) ) {
			return __( 'ОФОРМИТЬ ЗАКАЗ', 'sextysix' );
		}
		return __( 'ДОБАВИТЬ В КОРЗИНУ', 'sextysix' );
	}
);

add_filter(
	'body_class',
	function( $classes ) {
		if ( is_product() && sextysix_is_product_in_cart( get_the_ID() ) ) {
			$classes[] = 'ssx-product-in-cart';
		}
		return $classes;
	}
);

add_filter(
	'woocommerce_output_related_products_args',
	function( $args ) {
		$args['posts_per_page'] = 4;
		$args['columns']        = 4;
		return $args;
	}
);

add_filter(
	'woocommerce_get_image_size_single',
	function() {
		return array(
			'width'  => 1200,
			'height' => 0,
			'crop'   => 0,
		);
	}
);

add_filter(
	'woocommerce_get_image_size_gallery_thumbnail',
	function() {
		return array(
			'width'  => 91,
			'height' => 120,
			'crop'   => 1,
		);
	}
);

/**
 * Product badge helper.
 *
 * Uses "best-seller" product tag or Featured flag.
 */
function sextysix_get_product_badge_text( $product ) {
	if ( ! $product instanceof WC_Product ) {
		return '';
	}

	$is_best_seller = has_term( 'best-seller', 'product_tag', $product->get_id() );
	if ( $is_best_seller || $product->is_featured() ) {
		return __( 'BEST SELLER', 'sextysix' );
	}

	return '';
}
