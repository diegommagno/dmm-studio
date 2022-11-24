<?php
/*
 * One Click Demo Import added
 * */
function instive_import_files() {
	$demo_content_installer = INSTIVE_REMOTE_CONTENT;

	return [
		[
			'import_file_name'           => 'Instive Demo',
			'import_file_url'            => $demo_content_installer . '/default/main.xml',
			'import_customizer_file_url' => $demo_content_installer . '/default/customizer.dat',
			'import_widget_file_url'     => $demo_content_installer . '/default/widgets.wie',
			'import_preview_image_url'   => $demo_content_installer . '/default/screenshot.png',
			'preview_url'                => INSTIVE_LIVE_URL
		],
		[
			'import_file_name'           => 'Instive Health Insurance Demo',
			'import_file_url'            => $demo_content_installer . '/health-insurance/main.xml',
			'import_customizer_file_url' => $demo_content_installer . '/health-insurance/customizer.dat',
			'import_widget_file_url'     => $demo_content_installer . '/health-insurance/widgets.wie',
			'import_preview_image_url'   => $demo_content_installer . '/health-insurance/screenshot.png',
			'preview_url'                => INSTIVE_LIVE_URL
		],
	];
}

add_action( 'pt-ocdi/import_files', 'instive_import_files' );

function instive_after_import( $selected_import ) {
	// Set homepage in imported demo
	$page_setup_array = [
		"Instive Demo" => [
			"slug" => "Home",
		]
	];

	// RevSlider import when importing the demo content.
	if ( class_exists( 'RevSliderSlider' ) ) {

		// Now you can use it!
		$slider_url_one = INSTIVE_REMOTE_CONTENT . '/default/slider/home-1.zip';
		$slider_url_two = INSTIVE_REMOTE_CONTENT . '/default/slider/home-2.zip';
		$slider_url_three = INSTIVE_REMOTE_CONTENT . '/default/slider/home-3.zip';
		$slider_url_four = INSTIVE_REMOTE_CONTENT . '/default/slider/home-4.zip';
		$slider_url_five = INSTIVE_REMOTE_CONTENT . '/default/slider/home-5.zip';
		$slider_url_six = INSTIVE_REMOTE_CONTENT . '/default/slider/home-6.zip';


		$sliders_array = array(
			download_url( $slider_url_one ),
			download_url( $slider_url_two ),
			download_url( $slider_url_three ),
			download_url( $slider_url_four ),
			download_url( $slider_url_five ),
			download_url( $slider_url_six )
		);

		$slider = new RevSlider();
		if(is_array( $sliders_array )) {
			foreach( $sliders_array as $filepath ) {
				$slider->importSliderFromPost( true, true, $filepath );
			}
		}
	}


	if ( is_array( $page_setup_array ) ) {
		foreach ( $page_setup_array as $i => $values ) {
			if ( $i === $selected_import['import_file_name'] ) {
				foreach ( $values as $key => $value ) {
					//Set Front page
					$page = get_page_by_title( $values['slug'] );
					if ( isset( $page->ID ) ) {
						update_option( 'page_on_front', $page->ID );
						update_option( 'show_on_front', 'page' );
					}
				}
			}
		}
	}

	// Set menu after demo import
	$primary_menu    = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$footer_menu     = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
	$sub_header_menu = get_term_by( 'name', 'Sub Header Menu', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', [
			'primary'    => $primary_menu->term_id,
			'footermenu' => $footer_menu->term_id,
			'submenu'    => $sub_header_menu->term_id,
		]
	);
}

add_action( 'pt-ocdi/after_import', 'instive_after_import' );
