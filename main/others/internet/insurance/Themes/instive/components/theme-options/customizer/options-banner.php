<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Customizer option: Banner
 */
CSF::createSection( $prefix, [
	'parent' => 'theme_settings',
	'title'  => esc_html__( 'Banner Settings', 'instive' ),
	'fields' => [
		[
			'id'      => 'sub_page_banner_overlay_style',
			'type'    => 'color',
			'title'   => esc_html__( 'Banner Overlay Color', 'instive' ),
			'default' => 'rgba(0, 0, 0, 0.4)',
		],
		[
			'id'         => 'page_banner_setting',
			'type'       => 'accordion',
			'accordions' => [
				[
					'title'  => esc_html__( 'Page banner settings', 'instive' ),
					'icon'   => '',
					'fields' => [
						[
							'id'       => 'page_show_banner',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Show banner?', 'instive' ),
							'subtitle' => esc_html__( 'Show or hide the banner', 'instive' ),
							'default'  => true,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'No', 'instive' ),
						],
						[
							'id'       => 'page_show_breadcrumb',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Show Breadcrumb?', 'instive' ),
							'subtitle' => esc_html__( 'Show or hide the Breadcrumb', 'instive' ),
							'default'  => false,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'No', 'instive' ),
						],
						[
							'id'       => 'page_title_disable',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Disable Page Title', 'instive' ),
							'default'  => false,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'NO', 'instive' ),
						],
						[
							'id'    => 'banner_page_title',
							'type'  => 'text',
							'title' => esc_html__( 'Banner title', 'instive' ),
						],
						[
							'id'             => 'banner_page_image',
							'type'           => 'media',
							'title'          => esc_html__( 'Banner image', 'instive' ),
							'subtitle'       => '',
							'url'            => false,
							'preview_width'  => 50,
							'preview_height' => 50,
						],
					],
				],
			],
		],
		[
			'id'         => 'blog_banner_setting',
			'type'       => 'accordion',
			'accordions' => [
				[
					'title'  => esc_html__( 'Blog banner settings', 'instive' ),
					'icon'   => '',
					'fields' => [
						[
							'id'       => 'blog_show_banner',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Show Banner?', 'instive' ),
							'subtitle' => esc_html__( 'Show or hide the banner', 'instive' ),
							'default'  => true,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'No', 'instive' ),
						],
						[
							'id'       => 'blog_show_breadcrumb',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Show Breadcrumb?', 'instive' ),
							'subtitle' => esc_html__( 'Show or hide the Breadcrumb', 'instive' ),
							'default'  => false,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'No', 'instive' ),
						],
						[
							'id'       => 'page_title_disable',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Disable Page Title', 'instive' ),
							'default'  => false,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'NO', 'instive' ),
						],
						[
							'id'      => 'banner_blog_title',
							'type'    => 'text',
							'title'   => esc_html__( 'Banner title', 'instive' ),
							'default' => esc_html__( 'Instive Blog', 'instive' ),
						],
						[
							'id'             => 'banner_blog_image',
							'type'           => 'media',
							'title'          => esc_html__( 'Image', 'instive' ),
							'subtitle'       => esc_html__( 'Banner blog image', 'instive' ),
							'url'            => false,
							'preview_width'  => 50,
							'preview_height' => 50,
						],
					],
				],
			],
		],
		[
			'id'         => 'insurance_banner_setting',
			'type'       => 'accordion',
			'accordions' => [
				[
					'title'  => esc_html__( 'Insurance banner settings', 'instive' ),
					'icon'   => '',
					'fields' => [
						[
							'id'       => 'blog_show_banner',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Show banner?', 'instive' ),
							'subtitle' => esc_html__( 'Show or hide the banner', 'instive' ),
							'default'  => true,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'No', 'instive' ),
						],
						[
							'id'       => 'blog_show_breadcrumb',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Show Breadcrumb?', 'instive' ),
							'subtitle' => esc_html__( 'Show or hide the Breadcrumb', 'instive' ),
							'default'  => false,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'No', 'instive' ),
						],
						[
							'id'       => 'page_title_disable',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Disable Banner Title', 'instive' ),
							'default'  => false,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'NO', 'instive' ),
						],
						[
							'id'    => 'banner_blog_title',
							'type'  => 'text',
							'title' => esc_html__( 'Banner title', 'instive' ),
						],
						[
							'id'             => 'banner_blog_image',
							'type'           => 'media',
							'title'          => esc_html__( 'Image', 'instive' ),
							'subtitle'       => esc_html__( 'Banner blog image', 'instive' ),
							'url'            => false,
							'preview_width'  => 50,
							'preview_height' => 50,
						],
					],
				],
			],
		],
		[
			'id'         => 'shop_banner_settings',
			'type'       => 'accordion',
			'accordions' => [
				[
					'title'  => esc_html__( 'Shop banner settings', 'instive' ),
					'icon'   => '',
					'fields' => [
						[
							'id'       => 'show',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Show banner?', 'instive' ),
							'default'  => true,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'No', 'instive' ),
						],
						[
							'id'       => 'show_breadcrumb',
							'type'     => 'switcher',
							'title'    => esc_html__( 'Show breadcrumb?', 'instive' ),
							'default'  => true,
							'text_on'  => esc_html__( 'Yes', 'instive' ),
							'text_off' => esc_html__( 'No', 'instive' ),
						],
						[
							'id'    => 'title',
							'type'  => 'text',
							'title' => esc_html__( 'Shop Banner title', 'instive' ),
						],
						[
							'id'    => 'single_title',
							'type'  => 'text',
							'title' => esc_html__( 'Single Shop Banner title', 'instive' ),
						],
						[
							'id'             => 'banner_shop_image',
							'type'           => 'media',
							'title'          => esc_html__( 'Banner image', 'instive' ),
							'subtitle'       => '',
							'url'            => false,
							'preview_width'  => 50,
							'preview_height' => 50,
						],
					],
				],
			],
		],
	],
] );