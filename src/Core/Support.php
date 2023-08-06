<?php

namespace Theme\Core;

class Support implements Registrable {
	public function register() {
		\add_theme_support( 'title-tag' );
		\add_theme_support( 'automatic-feed-links' );
		\add_theme_support( 'post-thumbnails' );
		\add_theme_support( 'custom-logo' );
		\add_theme_support( 'woocommerce' );
		\add_theme_support( 'menus' );
		\add_theme_support( 'html5', [ 
			'navigation-widgets',
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		] );
	}
}
