<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Customizer Option: General
 */

CSF::createSection( $prefix, [
	'parent' => 'theme_settings',
	'title'  => esc_html__( 'Style Settings', 'instive' ),
	'fields' => [
		[
			'id'       => 'style_body_bg',
			'type'     => 'color',
			'title'    => esc_html__( 'Body background', 'instive' ),
			'subtitle' => esc_html__( 'Site\'s main background color.', 'instive' ),
		],
		[
			'id'       => 'style_body_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Body color', 'instive' ),
			'subtitle' => esc_html__( 'Site\'s main body color color.', 'instive' ),
		],
		[
			'id'       => 'style_primary',
			'type'     => 'color',
			'title'    => esc_html__( 'Primary color', 'instive' ),
			'subtitle' => esc_html__( 'Site\'s main color.', 'instive' ),
		],
		[
			'id'       => 'secondary_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Secondary color', 'instive' ),
			'subtitle' => esc_html__( 'Secondary color.', 'instive' ),
		],
		[
			'id'       => 'title_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Title color', 'instive' ),
			'subtitle' => esc_html__( 'Blog title color.', 'instive' ),
		],
		[
			'id'       => 'load_google_fonts',  // Need to check with Rasel vai
			'type'     => 'switcher',
			'title'    => esc_html__( 'Google Fonts Load', 'instive' ),
			'subtitle' => esc_html__( 'Do you want to load google fonts?', 'instive' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'instive' ),
			'text_off' => esc_html__( 'No', 'instive' ),
		],
		[
			'id'             => 'body_font',
			'type'           => 'typography',
			'title'          => esc_html__( 'Body Font', 'instive' ),
			'desc'           => esc_html__( 'Choose the typography for the title', 'instive' ),
			'output'         => 'body',
			'default'        => array(
				'font-family' => 'Rubik',
				'font-weight' => '400',
				'font-size'   => '16',
				'unit'        => 'px',
				'type'        => 'google',
			),
			'font_style'     => true,
			'line_height'    => true,
			'text_align'     => false,
			'letter_spacing' => false,
			'text_transform' => false,
			'color'          => false,
			'subset'         => false,
			'preview'        => 'always'
		],
		[
			'id'             => 'heading_font_one',
			'type'           => 'typography',
			'title'          => esc_html__( 'Heading H1 Fonts', 'instive' ),
			'desc'           => esc_html__( 'This is for heading google fonts', 'instive' ),
			'output'         => 'h1',
			'default'        => array(
				'font-family' => 'Open Sans',
				'font-size'   => '36',
				'font-weight' => '800',
				'unit'        => 'px',
				'type'        => 'google',
			),
			'font_style'     => true,
			'line_height'    => true,
			'text_align'     => false,
			'letter_spacing' => false,
			'text_transform' => false,
			'color'          => false,
			'subset'         => false,
			'preview'        => 'always'
		],
		[
			'id'             => 'heading_font_two_style',
			'type'           => 'typography',
			'title'          => esc_html__( 'Heading H2 Fonts', 'instive' ),
			'desc'           => esc_html__( 'This is for heading google fonts', 'instive' ),
			'output'         => 'h2',
			'default'        => array(
				'font-family' => 'Open Sans',
				'font-size'   => '30',
				'font-weight' => '800',
				'unit'        => 'px',
				'type'        => 'google',
			),
			'font_style'     => true,
			'line_height'    => true,
			'text_align'     => false,
			'letter_spacing' => false,
			'text_transform' => false,
			'color'          => false,
			'subset'         => false,
			'preview'        => 'always'
		],
		[
			'id'             => 'heading_font_two',
			'type'           => 'typography',
			'title'          => esc_html__( 'Heading H3 Fonts', 'instive' ),
			'desc'           => esc_html__( 'This is for heading google fonts', 'instive' ),
			'output'         => 'h3',
			'default'        => array(
				'font-family' => 'Open Sans',
				'font-size'   => '24',
				'font-weight' => '800',
				'unit'        => 'px',
				'type'        => 'google',
			),
			'font_style'     => true,
			'line_height'    => true,
			'text_align'     => false,
			'letter_spacing' => false,
			'text_transform' => false,
			'color'          => false,
			'subset'         => false,
			'preview'        => 'always'
		],
		[
			'id'             => 'heading_font_three',
			'type'           => 'typography',
			'title'          => esc_html__( 'Heading H4 Fonts', 'instive' ),
			'desc'           => esc_html__( 'This is for heading google fonts', 'instive' ),
			'output'         => 'h4',
			'default'        => array(
				'font-family' => 'Open Sans',
				'font-size'   => '18',
				'font-weight' => '800',
				'unit'        => 'px',
				'type'        => 'google',
			),
			'font_style'     => true,
			'line_height'    => true,
			'text_align'     => false,
			'letter_spacing' => false,
			'text_transform' => false,
			'color'          => false,
			'subset'         => false,
			'preview'        => 'always'
		],
	],
] );