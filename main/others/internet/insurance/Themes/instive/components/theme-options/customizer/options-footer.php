<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Customizer Option: Footer
 */
CSF::createSection( $prefix, [
	'parent' => 'theme_settings',
	'title'  => esc_html__( 'Footer Settings', 'instive' ),
	'fields' => [
		[
			'id'       => 'footer_bg_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Copyright Background color', 'instive' ),
			'subtitle' => esc_html__( 'You can change the copyright background color with rgba color or solid color', 'instive' ),
			'default'  => '#003478',
		],
		[
			'id'       => 'footer_copyright_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Footer Copyright color', 'instive' ),
			'subtitle' => esc_html__( 'You can change the footer\'s background color with rgba color or solid color', 'instive' ),
		],
		[
			'id'       => 'footer_copyright',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Copyright text', 'instive' ),
			'subtitle' => esc_html__( 'This text will be shown at the footer of all pages.', 'instive' ),
			'default'  => esc_html__( '&copy; 2022, Instive. All rights reserved', 'instive' ),
		],
		[
			'id'       => 'footer_social_links',
			'type'     => 'group',
			'title'    => esc_html__( 'Social links', 'instive' ),
			'subtitle' => esc_html__( 'Add social links and it\'s icon class below. These are all fontaweseome-4.7 icons.', 'instive' ),
			'fields'   => [
				[
					'id'      => 'title',
					'title'   => esc_html__( 'Title', 'instive' ),
					'type'    => 'text',
					'default' => esc_html__( 'Facebook', 'instive' ),
				],
				[
					'id'      => 'icon_class',
					'title'   => esc_html__( 'Social icon', 'instive' ),
					'type'    => 'icon',
					'default' => 'fa fa-facebook'
				],
				[
					'id'      => 'url',
					'title'   => esc_html__( 'Social link', 'instive' ),
					'type'    => 'text',
					'default' => '#'
				],
			],
		],
	],
] );