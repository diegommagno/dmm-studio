<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Customizer Option: General
 */
CSF::createSection( $prefix, [
	'parent' => 'theme_settings',
	'title'  => esc_html__( 'General Settings', 'instive' ),
	'fields' => [
		[
			'id'       => 'preloader_show',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Preloader show', 'instive' ),
			'subtitle' => esc_html__( 'Do you want to show preloader on your site ?', 'instive' ),
			'default'  => false,
			'text_on'  => esc_html__( 'Yes', 'instive' ),
			'text_off' => esc_html__( 'No', 'instive' ),
		],
		[
			'id'             => 'general_main_logo',
			'type'           => 'media',
			'title'          => esc_html__( 'Dark logo', 'instive' ),
			'subtitle'       => esc_html__( 'It\'s the main logo, mostly it will be shown on "Default Menu" type area.', 'instive' ),
			'url'            => false,
			'preview_width'  => 50,
			'preview_height' => 50,
		],
		[
			'id'             => 'general_light_logo',
			'type'           => 'media',
			'title'          => esc_html__( 'Light logo', 'instive' ),
			'subtitle'       => esc_html__( 'It\'s the main logo, mostly it will be shown on "Default Menu" type area.', 'instive' ),
			'url'            => false,
			'preview_width'  => 50,
			'preview_height' => 50,
		],
	],
] );
