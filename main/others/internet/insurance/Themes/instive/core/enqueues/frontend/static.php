<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	// 3rd party css
	if(!defined('FW')){
		wp_enqueue_style( 'instive-fonts', instive_google_fonts_url(['Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap', 'Open Sans:300,300i,400,400i,700,700i,800,900,900i']), null,  INSTIVE_VERSION );
	}
	
	wp_enqueue_style( 'bootstrap-min',  INSTIVE_CSS . '/bootstrap.min.css', null,  INSTIVE_VERSION );
	wp_enqueue_style( 'font-awesome',  INSTIVE_CSS . '/font-awesome.css', null,  INSTIVE_VERSION );
	wp_enqueue_style( 'icon-font',  INSTIVE_CSS . '/icon-font.css', null,  INSTIVE_VERSION );
	wp_enqueue_style( 'owl-carousel-min',  INSTIVE_CSS . '/owl.carousel.min.css', null,  INSTIVE_VERSION );
	wp_enqueue_style( 'overlay-scrollbars-min',  INSTIVE_CSS . '/OverlayScrollbars.min.css', null,  INSTIVE_VERSION );
	wp_enqueue_style( 'owl-theme-default-min',  INSTIVE_CSS . '/owl.theme.default.min.css', null,  INSTIVE_VERSION );
	wp_enqueue_style( 'magnific-popup',  INSTIVE_CSS . '/magnific-popup.css', null,  INSTIVE_VERSION );

	if( is_rtl() ){
		wp_enqueue_style( 'bootstrap-rtl',  INSTIVE_CSS . '/bootstrap.min-rtl.css', null,  INSTIVE_VERSION );
	}

	wp_enqueue_style( 'instive-woocommerce', INSTIVE_CSS . '/woocommerce.css', null, INSTIVE_VERSION );

   // theme css
	wp_enqueue_style( 'instive-blog',  INSTIVE_CSS . '/blog.css', null,  INSTIVE_VERSION );
	wp_enqueue_style( 'instive-gutenberg-custom',  INSTIVE_CSS . '/gutenberg-custom.css', null,  INSTIVE_VERSION );
	wp_enqueue_style( 'instive-master',  INSTIVE_CSS . '/master.css', null,  INSTIVE_VERSION );
}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	
	wp_enqueue_script( 'popper',  INSTIVE_JS . '/Popper.js', array( 'jquery' ),  INSTIVE_VERSION, true );
	wp_enqueue_script( 'bootstrap-min',  INSTIVE_JS . '/bootstrap.min.js', array( 'jquery' ),  INSTIVE_VERSION, true );
	if ( is_rtl() ) {
		wp_enqueue_script( 'bootstrap-rtl',  INSTIVE_JS . '/bootstrap.min-rtl.js', array( 'jquery' ),  INSTIVE_VERSION, true );
	}
   // 3rd party scripts

	// theme scripts
	wp_enqueue_script( 'owl-carousel-min',  INSTIVE_JS . '/owl.carousel.min.js', array( 'jquery' ),  INSTIVE_VERSION, true );

    // theme scripts
	wp_enqueue_script( 'jquery-overlay-scrollbars-min',  INSTIVE_JS . '/jquery.overlayScrollbars.min.js', array( 'jquery' ),  INSTIVE_VERSION, true );
	
	wp_enqueue_script( 'slick-js',  INSTIVE_JS . '/slick.min.js', array( 'jquery' ),  INSTIVE_VERSION, true );
	
	wp_enqueue_script( 'jquery-magnific-popup-min',  INSTIVE_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ),  INSTIVE_VERSION, true );
	// theme scripts
	wp_enqueue_script( 'instive-script',  INSTIVE_JS . '/script.js', array( 'jquery' ),  INSTIVE_VERSION, true );
	wp_localize_script( 'instive-script', 'instive_ajax', array(
		'ajax_url' => esc_url(admin_url( 'admin-ajax.php' )),
		 
		) );
	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}