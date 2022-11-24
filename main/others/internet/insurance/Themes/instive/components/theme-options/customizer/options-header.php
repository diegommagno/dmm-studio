<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Customizer Option: Header
 */
CSF::createSection( $prefix, [
	'parent' => 'theme_settings',
	'title'  => esc_html__( 'Header settings', 'instive' ),
	'fields' => [
		[
			'id'       => 'header_builder_enable',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Header builder Enable', 'instive' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'instive' ),
			'text_off' => esc_html__( 'No', 'instive' ),
		],
		[
			'id'         => 'edit_header',
			'type'       => 'heading',
			'title'      => esc_html__( 'Edit builder header from:', 'instive' ),
			'content'    => esc_html__( 'Dashboard -> ElementsKit -> Header Footer', 'instive' ),
			'dependency' => [ 'header_builder_enable', '==', 'true' ]
		],
		[
			'id'         => 'header_nav_search_section',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Search button show', 'instive' ),
			'desc'       => esc_html__( 'do you want to show search button in header ? ', 'instive' ),
			'default'    => false,
			'text_on'    => esc_html__( 'Yes', 'instive' ),
			'text_off'   => esc_html__( 'No', 'instive' ),
			'dependency' => [ 'header_builder_enable', '==', 'false' ]
		],
	],
] );