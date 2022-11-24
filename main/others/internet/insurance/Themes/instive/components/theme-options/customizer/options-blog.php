<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Customizer Option: Blog
 */

CSF::createSection( $prefix, [
	'parent' => 'theme_settings',
	'title'  => esc_html__( 'Blog Settings', 'instive' ),
	'fields' => [
		[
			'id'      => 'post_layout',
			'type'    => 'image_select',
			'title'   => esc_html__( 'Post layout', 'instive' ),
			'desc'    => esc_html__( 'blog post\'s layout style.', 'instive' ),
			'options' => array(
				'style1' => INSTIVE_IMG . '/admin/post-layout/style1.png',
				'style2' => INSTIVE_IMG . '/admin/post-layout/style2.png',
			),
			'default' => 'style1'
		],
		[
			'id'       => 'blog_sidebar',
			'type'     => 'select',
			'multiple' => false,
			'label'    => esc_html__( 'Blog Sidebar', 'instive' ),
			'desc'     => esc_html__( 'Select blog sidebar', 'instive' ),
			'options'  => array(
				'1' => esc_html__( 'No sidebar', 'instive' ),
				'2' => esc_html__( 'Left Sidebar', 'instive' ),
				'3' => esc_html__( 'Right Sidebar', 'instive' ),
			),
			'default'  => '3'
		],
		[
			'id'       => 'blog_author',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Blog author', 'instive' ),
			'subtitle' => esc_html__( 'Do you want to show blog author?', 'instive' ),
			'default'  => false,
			'text_on'  => esc_html__( 'Yes', 'instive' ),
			'text_off' => esc_html__( 'No', 'instive' ),
		],
		[
			'id'       => 'blog_related_post',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Blog related post', 'instive' ),
			'subtitle' => esc_html__( 'Do you want to show single blog related post?', 'instive' ),
			'default'  => false,
			'text_on'  => esc_html__( 'Yes', 'instive' ),
			'text_off' => esc_html__( 'No', 'instive' ),
		],
		[
			'id'      => 'blog_related_post_number',
			'type'    => 'text',
			'title'   => esc_html__( 'Related post count', 'instive' ),
			'default' => '3'
		],
		[
			'id'       => 'blog_meta_post',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Blog post meta', 'instive' ),
			'subtitle' => esc_html__( 'Do you want to show blog meta?', 'instive' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'instive' ),
			'text_off' => esc_html__( 'No', 'instive' ),
		],
	],
] );