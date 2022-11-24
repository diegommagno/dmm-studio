<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/*
 * Control core classes for avoid errors
 * */
if ( class_exists( 'CSF' ) ) {

	// Include customizer options
	include_framework_options(
		$option_list = [
			'default',
			'general',
			'style',
			'header',
			'banner',
			'blog',
			'footer',
		],
		// Folder name
		"customizer",
	);

	// Include posts options
	include_framework_options(
		$option_list = [
			'post',
			'page',
			'insurance',
			'insurance-plan',
		],
		// Folder name
		"posts",
	);

	// Include taxonomies options
	include_framework_options(
		$option_list = [
			'insurance-taxonomies'
		],
		// Folder name
		"taxonomies",
	);
}


if( ! function_exists( 'instive_custom_icons' ) ) {

	function instive_custom_icons( $icons ) {
	
		// Adding new icons
		$icons[] = array(
			'title' => 'Instive Icons',
			'icons' => array(
				'tsicon tsicon-network',
				'tsicon tsicon-benefit_icon_4',
				'tsicon tsicon-benefit_icon_5',
				'tsicon tsicon-benefit_icon_6',
				'tsicon tsicon-benefit_icon_7',
				'tsicon tsicon-benefit_icon_8',
				'tsicon tsicon-best_offer_icon1',
				'tsicon tsicon-best_offer_icon2',
				'tsicon tsicon-call_add',
				'tsicon tsicon-companies',
				'tsicon tsicon-contact_icon_2',
				'tsicon tsicon-contact_icon_3',
				'tsicon tsicon-cover_icon_1',
				'tsicon tsicon-cover_icon_2',
				'tsicon tsicon-cover_icon_4',
				'tsicon tsicon-cover_icon_5',
				'tsicon tsicon-cover_icon_6',
				'tsicon tsicon-credit-card',
				'tsicon tsicon-critical_illness_icon',
				'tsicon tsicon-customer',
				'tsicon tsicon-fixed_benefit_icon_1',
				'tsicon tsicon-fixed_benefit_icon_2',
				'tsicon tsicon-indeminity_plan_icon',
				'tsicon tsicon-insurance',
				'tsicon tsicon-join_our_team',
				'tsicon tsicon-left-arrow3',
				'tsicon tsicon-life_dream',
				'tsicon tsicon-lives_covered_icon',
				'tsicon tsicon-medal-star',
				'tsicon tsicon-messages',
				'tsicon tsicon-our_benefit',
				'tsicon tsicon-our_faq',
				'tsicon tsicon-our_protection_icon',
				'tsicon tsicon-our_reason',
				'tsicon tsicon-Our_story',
				'tsicon tsicon-our_team',
				'tsicon tsicon-plan_icon_1',
				'tsicon tsicon-plan_icon_2',
				'tsicon tsicon-plan_icon_3',
				'tsicon tsicon-review',
				'tsicon tsicon-right-arrow3',
				'tsicon tsicon-team_services_benefit',
				'tsicon tsicon-testimonial_icon',
				'tsicon tsicon-top_up_health_icon_1',
				'tsicon tsicon-top_up_health_icon_3',
				'tsicon tsicon-top_up_plan_icon',
				'tsicon tsicon-what_covered_icon',
				'tsicon tsicon-why_do_i_need_1',
				'tsicon tsicon-why_need_1',
				'tsicon tsicon-why_need_2',
				'tsicon tsicon-why_need_3',
				'tsicon tsicon-why_need_4',
				'tsicon tsicon-why_need_5',
				'tsicon tsicon-why_need_icon_2',
				'tsicon tsicon-why_need_icon_3',
				'tsicon tsicon-about_us',
				'tsicon tsicon-award',
				'tsicon tsicon-benefit_icon_1',
				'tsicon tsicon-benefit_icon_2',
				'tsicon tsicon-benefit_icon_3',
			)
		);
	
		//
		// Move custom icons to top of the list.
		$icons = array_reverse( $icons );
	
		return $icons;
	
	}

	add_filter( 'csf_field_icon_add_icons', 'instive_custom_icons' );
}
	