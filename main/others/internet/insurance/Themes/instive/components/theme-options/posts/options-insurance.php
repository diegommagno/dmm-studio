<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/*
 * Insurance post meta
 * */


CSF::createMetabox( 'instive_insurance_meta', array(
	'title'     => esc_html__( 'Insurance Settings', 'instive' ),
	'post_type' => 'instive-insurance',
	'theme'     => 'light',
	'data_type' => 'unserialize',

) );
CSF::createSection( 'instive_insurance_meta', [
	'fields' => [
		[
			'id'             => 'intro_image',
			'type'           => 'media',
			'title'          => esc_html__( 'Intro Image', 'instive' ),
			'subtitle'       => esc_html__( 'Set Intro Image', 'instive' ),
			'url'            => false,
			'preview_width'  => 50,
			'preview_height' => 50,
		],
		[
			'id'      => 'quote_btn',
			'type'    => 'text',
			'title'   => esc_html__( 'Get a quote btn text', 'instive' ),
			'default' => esc_html__( 'Get a quote', 'instive' ),
		],
		[
			'id'    => 'quote_btn_url',
			'type'  => 'text',
			'title' => esc_html__( 'Get a quote btn url', 'instive' ),
		],
		[
			'id'    => 'quote_btn_icon',
			'type'  => 'icon',
			'title' => esc_html__( 'Get a quote icon', 'instive' ),
			'desc'  => esc_html__( 'Add your get a quote icon', 'instive' ),
		],
		[
			'id'       => 'instive_service_banner_override',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Banner override?', 'instive' ),
			'subtitle' => esc_html__( 'Override the banner', 'instive' ),
			'default'  => false,
			'text_on'  => esc_html__( 'Yes', 'instive' ),
			'text_off' => esc_html__( 'No', 'instive' ),
		],
		[
			'id'         => 'instive_service_show_banner',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Show banner?', 'instive' ),
			'subtitle'   => esc_html__( 'Show or hide the banner', 'instive' ),
			'default'    => true,
			'text_on'    => esc_html__( 'Yes', 'instive' ),
			'text_off'   => esc_html__( 'No', 'instive' ),
			'dependency' => [ 'instive_service_banner_override', '==', 'true' ]
		],
		[
			'id'         => 'instive_service_show_breadcrumb',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Show Breadcrumb?', 'instive' ),
			'subtitle'   => esc_html__( 'Show or hide the Breadcrumb', 'instive' ),
			'default'    => true,
			'text_on'    => esc_html__( 'Yes', 'instive' ),
			'text_off'   => esc_html__( 'No', 'instive' ),
			'dependency' => [ 'instive_service_banner_override', '==', 'true' ]
		],
		[
			'id'         => 'instive_banner_service_title',
			'type'       => 'text',
			'title'      => esc_html__( 'Banner title', 'instive' ),
			'default'    => esc_html__( 'Welcome to our Service', 'instive' ),
			'dependency' => [ 'instive_service_banner_override', '==', 'true' ]
		],
		[
			'id'             => 'instive_banner_service_image',
			'type'           => 'media',
			'title'          => esc_html__( 'Banner image', 'instive' ),
			'subtitle'       => esc_html__( 'Banner Service image', 'instive' ),
			'url'            => false,
			'preview_width'  => 50,
			'preview_height' => 50,
			'dependency'     => [ 'instive_service_banner_override', '==', 'true' ]
		],
	],
] );
