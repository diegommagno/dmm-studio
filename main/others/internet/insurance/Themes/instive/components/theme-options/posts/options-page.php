<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Page meta options
 */
CSF::createMetabox( 'settings-page', array(
	'title'     => esc_html__( 'Page Settings', 'instive' ),
	'post_type' => 'page',
	'context'   => 'normal',
	'theme'     => 'light',
	'data_type' => 'unserialize',
) );
CSF::createSection( 'settings-page', [
	'fields' => [
		[
			'id'       => 'page_meta_override',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Banner Override?', 'instive' ),
			'subtitle' => esc_html__( 'Override the banner', 'instive' ),
			'default'  => false,
			'text_on'  => esc_html__( 'Yes', 'instive' ),
			'text_off' => esc_html__( 'No', 'instive' ),
		],
		[
			'id'         => 'header_title',
			'type'       => 'text',
			'title'      => esc_html__( 'Banner Title', 'instive' ),
			'dependency' => [ 'page_meta_override', '==', 'true' ]
		],
		[
			'id'             => 'header_image',
			'type'           => 'media',
			'title'          => esc_html__( 'Banner Image', 'instive' ),
			'subtitle'       => esc_html__( 'Upload a page header image', 'instive' ),
			'url'            => false,
			'preview_width'  => 50,
			'preview_height' => 50,
			'dependency'     => [ 'page_meta_override', '==', 'true' ]
		]
	],
] );