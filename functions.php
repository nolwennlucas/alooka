<?php

add_action( 'wp_enqueue_scripts', 'alooka_enqueue_styles' );
function alooka_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}
add_action('wp_enqueue_scripts', 'alooka_enqueue_js');
function alooka_enqueue_js() {
    wp_enqueue_script(
		'app',
		get_theme_file_uri( '/assets/js/app.js' ),
 		array('jquery'),
		wp_get_theme()->get( 'Version' ),
		true
	);
}

add_filter( 'woocommerce_product_tabs', 'wpm_remove_product_tabs', 98 );
function wpm_remove_product_tabs( $tabs ) {
	// Supprime le bloc "Information complémentaires"
    unset($tabs['additional_information']);

    return $tabs;
}
