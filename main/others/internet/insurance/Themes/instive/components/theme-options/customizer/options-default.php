<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	// Prefix slug (ID) for theme settings.
	$prefix = 'instive_theme_settings';

	// Create customize options
	CSF::createCustomizeOptions( $prefix, [
		'save_defaults'   => true,
		'enqueue_webfont' => true,
		'async_webfont'   => true
	] );

	// Creating theme settings parent section
	CSF::createSection( $prefix, array(
		'id'       => 'theme_settings', // Parent slug for assigning items inside this tab.
		'title'    => esc_html__( 'Theme Settings', 'instive' ),
		'priority' => 1,
	) );

}