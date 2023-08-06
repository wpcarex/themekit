<?php

namespace Theme\Core;

class Config {

	/**
	 * Returns the current environment (prod|dev).
	 */
	public static function env() {
		return ( defined( WP_ENVIRONMENT ) ) ? WP_ENVIRONMENT : '';
	}

	/**
	 * Get ViteJS generated manifest to get our asset paths
	 */
	public static function manifest( string $key ) {
		$manifest = \json_decode( \file_get_contents( static::build_path( 'manifest.json' ) ), true );

		return $manifest[ $key ] ?? '';
	}

	/**
	 * Path to templates
	 */
	public static function template_path( string $path, string $template ) {
		return "src/{$path}/Static/templates/{$template}";
	}

	/**
	 * Path to wp_content
	 */
	public static function wp_content_path( string $relative_path = '' ) {
		return WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $relative_path;
	}

	/**
	 * Returns the root path of the theme
	 */
	public static function theme_path( string $relative_path = '' ) {
		return \get_stylesheet_directory() . DIRECTORY_SEPARATOR . $relative_path;
	}

	/**
	 * Url to the build folder
	 */
	public static function build_path( string $relative_path = '' ) {
		return static::theme_path( 'build' ) . DIRECTORY_SEPARATOR . $relative_path;
	}

	/**
	 * Full path to templates
	 */
	public static function template_full_path( string $path, string $template ) {
		return static::theme_path( static::template_path( $path, $template ) );
	}

	/**
	 * Path to static folder
	 */
	public static function static_path( string $path, string $file ) {
		return static::theme_path( "src/{$path}/Static/{$file}" );
	}

	/**
	 * Path to image files
	 */
	public static function images_path( string $path, string $file ) {
		return static::theme_path( "src/{$path}/Static/images/{$file}" );
	}

	/**
	 * Path to js files
	 */
	public static function js_path( string $path, string $file ) {
		return static::theme_path( "src/{$path}/Static/js/{$file}" );
	}

	/**
	 * Path to css files
	 */
	public static function css_path( string $path, string $file ) {
		return static::theme_path( "src/{$path}/Static/css/{$file}" );
	}

	/**
	 * Returns the root url of the theme
	 */
	public static function theme_url( string $relative_path = '' ) {
		return \get_stylesheet_directory_uri() . '/' . $relative_path;
	}

	/**
	 * Url to the build folder
	 */
	public static function build_url( string $file_path ): string {
		return static::theme_url( "build/{$file_path}" );
	}

	/**
	 * Url to the static folder
	 */
	public static function static_url( string $path, string $file_path ) {
		return static::theme_url( "src/{$path}/Static/{$file_path}" );
	}

	/**
	 * Url to image files
	 */
	public static function images_url( string $path, string $file, bool $versioning = false ) {
		return static::theme_url( "src/{$path}/Static/images/{$file}" );
	}

	/**
	 *In case you want to prefix a slug
	 */
	public static function slugify( $relative = '' ) {
		return static::slug() . '-' . \sanitize_title( $relative );
	}

	/**
	 *In case you want to prefix a slug
	 */
	public static function underscore( $relative = '' ) {
		return static::slug() . '_' . $relative;
	}
}
