<?php
/**
 * The template for displaying Header.
 *
 * The area of the page that contains <head> and header area.
 *
 * @package themekit
 * @author themekit
 * @since   1.0.0
 */

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<?php Theme\Kit::component( 'Page', 'header/head' ); ?>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>
