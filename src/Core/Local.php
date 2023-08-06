<?php

namespace Theme\Core;

class Local implements Registrable {
	public function register() {
		\add_action( 'wp_head', [ $this, 'inject_vite_into_wp_head' ], -99 );
	}

	public function inject_vite_into_wp_head() {

	}
}
