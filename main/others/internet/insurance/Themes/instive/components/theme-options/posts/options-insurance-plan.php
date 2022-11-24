<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/*
 * Insurance plan post meta
 * 
 * */


CSF::createMetabox( 'instive_insurance_plan_default_value', array(
	'title'     => esc_html__( 'Insurance Plans Icon and Button', 'instive' ),
	'post_type' => 'insurance_plan',
	'context'   => 'normal',
	'theme'     => 'light',
	'data_type' => 'unserialize',
) );

CSF::createSection('instive_insurance_plan_default_value', [

	'fields' => [
		[
			'id'    => 'plan_icon',
			'type'  => 'icon',
			'title' => esc_html__( 'Plan Icon', 'instive' ),
			'desc'  => esc_html__( 'Add list icon', 'instive' ),
		],
		[
			'id'         => 'btn_text',
			'type'       => 'text',
			'title'      => esc_html__( 'Button Text', 'instive' ),
		],	
		[
			'id'    => 'btn_icon',
			'type'  => 'icon',
			'title' => esc_html__( 'Button Icon', 'instive' ),
			'desc'  => esc_html__( 'Add Button icon', 'instive' ),
		]
	]
]);



CSF::createMetabox( 'instive_insurance_plan_lists', array(
	'title'     => esc_html__( 'Insurance Plan Lists', 'instive' ),
	'post_type' => 'insurance_plan',
	'context'   => 'normal',
	'theme'     => 'light',
	'data_type' => 'unserialize',
) );

CSF::createSection('instive_insurance_plan_lists', [
	'fields' => [
		[
			'id' => 'insurace_plans',
			'type' => 'group',
			'title' => esc_html__('Insurance Plan List Item', 'exhibz'),
			'fields' => [
				[
					'id'      => 'subtitle_text',
					'type'    => 'text',
					'title'   => esc_html__( 'List Title', 'instive' ),
				],
				[
					'id'      => 'des_text',
					'type'    => 'text',
					'title'   => esc_html__( 'Description Text', 'instive' ),
				]
			]
		]
	]
]);
