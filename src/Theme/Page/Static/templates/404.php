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

		<span class="text-xl text-gray-400">
			<?php esc_html_e( 'Welcome to the', 'themekit' ); ?>
		</span>

		<h1 class="text-5xl font-semibold tracking-tight text-gray-900">
			<?php esc_html_e( 'Newbiess', 'themekit' ); ?>
		</h1>

		<div class="mt-3">

			<a class="inline-flex items-center justify-center gap-1 font-medium border-b-2 text-sky-500 hover:text-sky-700 border-sky-500 hover:border-sky-700" href="<?php echo esc_url( 'https://github.com/atakanoz/themekit' ); ?>" target="_blank">

				<?php esc_html_e( 'Read the docs', 'themekit' ); ?>

				<span>
					<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ai ai-ChevronRight">
						<path d="M8 4l8 8-8 8" />
					</svg>
				</span>

			</a>

		</div>

	</div>

	<?php

	}
);
