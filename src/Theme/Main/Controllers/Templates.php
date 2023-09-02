<?php

namespace Theme\Main;

use Theme\Core\Registrable;
use Theme\Core\Config;

class Templates implements Registrable {

	public function register() {
		\add_filter( 'theme_page_templates', [ $this, 'register_templates' ], 10 );
		\add_filter( 'page_template', [ $this, 'register_template_paths' ] );

		\add_filter( '404_template', [ $this, 'register_404_template' ] );
		\add_filter( 'home_template', [ $this, 'register_index_template' ] );
	}

	public static function templates() {
		return [ 
			'404' => [ 
				'file' => '404.php',
				'name' => '404',
			],
		];
	}

	public function register_templates( array $templates ): array {
		foreach ( Templates::templates() as $template ) {
			$templates[ $template['file'] ] = __( $template['name'] );
		}
		return $templates;
	}

	/**
	 * Retrieve path to our custom defined templates from {@see register_templates()}
	 *
	 * @param string $template_path Path to the template. {@see \locate_template()}.
	 * @return mixed|string
	 *
	 * @see \get_query_template() for filter reference
	 */
	public function register_template_paths( string $template_path ) {
		foreach ( Templates::templates() as $template ) {
			if ( \is_page_template( $template['file'] ) ) {
				return Config::theme_path( 'src/Theme/Page/Static/templates' ) . '/' . $template['file'];
			}
		}
		return $template_path;
	}

	public function register_404_template() {
		if ( file_exists( Config::theme_path( 'src/Theme/Page/Static/templates' ) . '/404.php' ) ) {
			return Config::theme_path( 'src/Theme/Page/Static/templates' ) . '/404.php';
		}
		return;
	}

	public function register_index_template() {
		if ( file_exists( Config::theme_path( 'src/Theme/Page/Static/templates' ) . '/index.php' ) ) {
			return Config::theme_path( 'src/Theme/Page/Static/templates' ) . '/index.php';
		}
	}

}
