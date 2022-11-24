<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * register required plugins
 */

function instive_register_required_plugins() {
	$plugins = array(
		array(
			'name'     => esc_html__( 'Codestar Framework', 'instive' ),
			'slug'     => 'codestar-framework',
			'required' => true,
			'version'  => '2.2.6',
			'source'   => 'https://demo.themewinter.com/wp/plugins/online/codestar-framework.zip',
		),
		array(
			'name'     => esc_html__( 'One Click Demo Import', 'instive' ),
			'slug'     => 'one-click-demo-import',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'Elementor', 'instive' ),
			'slug'     => 'elementor',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Elementskit Light', 'instive' ),
			'slug'     => 'elementskit-lite',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'Instive Essentials', 'instive' ),
			'slug'     => 'instive-essential',
			'required' => true,
			'version'  => '1.9',
			'source'   => 'https://demo.themewinter.com/wp/plugins/instive/instive-essential.zip'
		),
		array(
			'name'     => esc_html__( 'Contact form 7', 'instive' ),
			'slug'     => 'contact-form-7',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'MetForm', 'instive' ),
			'slug'     => 'metform',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'revslider', 'instive' ),
			'slug'     => 'revslider',
			'required' => true,
			'source'   => 'http://demo.themewinter.com/wp/plugins/online/rev_slider.zip'
		)
	);


	$config = array(
		'id'           => 'instive',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu'         => 'instive-install-plugins',
		// Menu slug.
		'parent_slug'  => 'themes.php',
		// Parent menu slug.
		'capability'   => 'edit_theme_options',
		// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'instive_register_required_plugins' );