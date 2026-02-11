<?php
/**
 * Template Name: Privacy Policy
 *
 * @package Astra
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main ssx-legal ssx-legal--privacy">
	<div class="ssx-legal__content">
		<?php
		while ( have_posts() ) {
			the_post();
			the_content();
		}
		?>
	</div>
</main>

<?php
get_footer();
