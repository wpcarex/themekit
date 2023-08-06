<?php

namespace Theme\Core;

use Theme\Kit;

class Layouts implements Registrable {

	public function register() {
		\add_filter( 'body_class', [ $this, 'classes' ] );
	}

	public function classes( $classes ) {
		return array_merge( $classes, Kit::$custom_classes );
	}
}
