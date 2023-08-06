<?php
/**
 *
 * Default layout.
 *
 * @package themekit
 * @author themekit
 * @since 1.0.0
 */

use Theme\Kit;

Kit::component( 'Page', 'header/header' );
?>

<div id="layout-<?php esc_attr_e( $layout_name ); ?>" class="flex items-center justify-center h-full h-screen max-w-6xl mx-auto">

	<?php $layout_content(); ?>

</div>

<?php
Kit::component( 'Page', 'footer/footer' );
