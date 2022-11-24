<?php

/**
 * Theme's main functions and globally usable variables, contants etc
 * Added: v1.0
 * Textdomain: instive, class: INSTIVE, var: $instive_, constants: INSTIVE_, function: instive_
 */

// shorthand contants
// ------------------------------------------------------------------------
define( 'INSTIVE_THEME', 'INSTIVE Insurance Agency WordPress Theme' );
define( 'INSTIVE_VERSION', '1.2.1' );
define( 'INSTIVE_MINWP_VERSION', '5.3' );


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define( 'INSTIVE_THEME_URI', get_template_directory_uri() );
define( 'INSTIVE_IMG', INSTIVE_THEME_URI . '/assets/images' );
define( 'INSTIVE_CSS', INSTIVE_THEME_URI . '/assets/css' );
define( 'INSTIVE_JS', INSTIVE_THEME_URI . '/assets/js' );


// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define( 'INSTIVE_THEME_DIR', get_template_directory() );
define( 'INSTIVE_IMG_DIR', INSTIVE_THEME_DIR . '/assets/images' );
define( 'INSTIVE_CSS_DIR', INSTIVE_THEME_DIR . '/assets/css' );
define( 'INSTIVE_JS_DIR', INSTIVE_THEME_DIR . '/assets/js' );

define( 'INSTIVE_CORE', INSTIVE_THEME_DIR . '/core' );
define( 'INSTIVE_COMPONENTS', INSTIVE_THEME_DIR . '/components' );
define( 'INSTIVE_EDITOR', INSTIVE_COMPONENTS . '/editor' );
define( 'INSTIVE_EDITOR_ELEMENTOR', INSTIVE_EDITOR . '/elementor' );
define( 'INSTIVE_EDITOR_GUTENBERG', INSTIVE_EDITOR . '/gutenberg' );
define( 'INSTIVE_SHORTCODE_DIR_STYLE', INSTIVE_EDITOR_ELEMENTOR . '/widgets/style' );
define( 'INSTIVE_INSTALLATION', INSTIVE_CORE . '/installation-fragments' );
define( 'INSTIVE_REMOTE_CONTENT', esc_url( 'https://demo.themewinter.com/wp/demo-content/instive' ) );
define( 'INSTIVE_LIVE_URL', esc_url( 'https://demo.themewinter.com/wp/instive/' ) );


// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function instive_setup() {

	// make the theme available for translation
	$lang_dir = INSTIVE_THEME_DIR . '/languages';
	load_theme_textdomain( 'instive', $lang_dir );

	// add support for post formats
	add_theme_support( 'post-formats', [
		'standard',
		'image',
		'video',
		'audio',
		'gallery'
	] );

	// add support for automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// add support for post thumbnails
	add_theme_support( 'post-thumbnails' );

	// hard crop center center
	set_post_thumbnail_size( 750, 465, [ 'center', 'center' ] );
	add_image_size( 'instive-small', 350, 250, [ 'center', 'center' ] );
	add_image_size( 'instive-case-study-box', 320, 200, [ 'center', 'center' ] );

	// woocommerce support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width'         => 600,
		'gallery_thumbnail_image_width' => 300,
		'single_image_width'            => 600,
	) );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// register navigation menus
	register_nav_menus(
		[
			'primary'    => esc_html__( 'Primary Menu', 'instive' ),
			'footermenu' => esc_html__( 'Footer Menu', 'instive' ),
			'submenu'    => esc_html__( 'Sub Header Menu', 'instive' ),
		]
	);

	// HTML5 markup support for search form, comment form, and comments
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );


}

add_action( 'after_setup_theme', 'instive_setup' );


add_action( 'enqueue_block_editor_assets', 'instive_action_enqueue_block_editor_assets' );
function instive_action_enqueue_block_editor_assets() {
	wp_enqueue_style( 'instive-google-fonts', instive_google_fonts_url( [
		'Open Sans:300,300i,400,400i,700,700i,800,900,900i',
		'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i'
	] ), null, INSTIVE_VERSION );
	wp_enqueue_style( 'instive-gutenberg-editor-font-awesome-styles-5', INSTIVE_CSS . '/font-awesome.css', null, INSTIVE_VERSION );
	wp_enqueue_style( 'instive-gutenberg-editor-customizer-styles', INSTIVE_CSS . '/gutenberg-editor-custom.css', null, INSTIVE_VERSION );
	wp_enqueue_style( 'instive-gutenberg-editor-styles', INSTIVE_CSS . '/gutenberg-custom.css', null, INSTIVE_VERSION );
	wp_enqueue_style( 'instive-gutenberg-blog-styles', INSTIVE_CSS . '/blog.css', null, INSTIVE_VERSION );
}


/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function instive_custom_icon() {
	wp_register_style( 'instive-icon-css',  INSTIVE_CSS . '/icon-font.css', null, INSTIVE_VERSION );
	wp_enqueue_style( 'instive-icon-css' );
}
add_action( 'admin_enqueue_scripts', 'instive_custom_icon' );

// include the init.php
// ----------------------------------------------------------------------------------------
require_once( INSTIVE_CORE . '/init.php' );
require_once( INSTIVE_COMPONENTS . '/editor/elementor/elementor.php' );

// Framework option include
// ----------------------------------------------------------------------------------------
require_once( INSTIVE_COMPONENTS . '/theme-options/init.php' );
// Preloader function
// ----------------------------------------------------------------------------------------

function instive_preloader_function() {
	$preloader_show = instive_option( 'preloader_show', false );
	if ( $preloader_show == true ) {
		?>
        <div id="preloader">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
            <div class="preloader-cancel-btn-wraper">
                <span class="btn btn-primary preloader-cancel-btn"><?php echo esc_html__( 'Cancel Preloader', 'instive' ); ?></span>
            </div>
        </div>
		<?php
	}
}

add_action( 'wp_head', 'instive_preloader_function' );
