<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Custom Taxonomy: Insurance
 */

CSF::createTaxonomyOptions( 'insurance_taxonomy', array(
	'taxonomy'  => 'instive-insurance-type',
	'data_type' => 'serialize'
) );
CSF::createSection( 'insurance_taxonomy', array(
	'fields' => [
		[
			'id'             => 'instive_insurance_cat',
			'type'           => 'media',
			'title'          => esc_html__( 'Category Image', 'instive' ),
			'desc'           => esc_html__( 'Upload Category image', 'instive' ),
			'url'            => false,
			'preview_width'  => 100,
			'preview_height' => 100,
		]
	]
) );