<?php
/**
 * Theme Functions
 *
 * The area where you can write the functions for your theme.
 *
 * @package themekit
 * @author themekit
 * @since 1.0.0
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if ( ! file_exists( $composer = __DIR__ . '/vendor/autoload.php' ) ) {
	wp_die( __( 'Error locating autoloader. Please run <code>composer install</code>.', 'kit' ) );
}

require $composer;


/*
|--------------------------------------------------------------------------
| Load Environment Variables
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->safeLoad();


/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Theme\Core\Bootstrap::instance();

// try {
// 	Theme\Core\Bootstrap::instance();
// } catch (Throwable $e) {
// 	wp_die(
// 		__( 'You need to install composer to use this theme.', 'kit' )
// 	);
// }
