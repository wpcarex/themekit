<?php
/**
 * The template for displaying 404 Page.
 *
 * The structure of the page that contains the 404 content.
 *
 * @package themekit
 * @author themekit
 * @since 1.0.0
 */

use Theme\Kit;

Kit::layout(
	'default',
	function () {
		?>

	<div class="flex flex-col gap-2 text-center">

		<h1 class="text-5xl font-semibold tracking-[-0.015em] text-gray-900">
			<?php esc_html_e( '404', 'themekit' ); ?>
		</h1>

	</div>

	<?php


	}
);
