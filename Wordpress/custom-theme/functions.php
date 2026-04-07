<?php

function lemonade_stand_enqueue_styles() {
	wp_enqueue_style(
		'lemonade-stand-main',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'lemonade-stand-app',
		get_template_directory_uri() . '/css/app.css',
		array( 'lemonade-stand-main' ),
		filemtime( get_template_directory() . '/css/app.css' )
	);
}
add_action( 'wp_enqueue_scripts', 'lemonade_stand_enqueue_styles' );
