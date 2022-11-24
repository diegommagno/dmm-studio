<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
//die('cpt found');
/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------

if ( class_exists( 'InstiveCustomPost\Instive_CustomPost' ) ) {
    //service 

   $project = new InstiveCustomPost\Instive_CustomPost( 'instive' );
 
   $slug = sanitize_title(get_option('instive_setting_slug','service'));
   $plural_name = esc_html(get_option('instive_plural_name','Services'));
   $singular_name = esc_html(get_option('instive_singular_name','Service'));

   if($plural_name==''){
      $plural_name = esc_html__('Services','instive');
   }
   if($singular_name==''){
      $singular_name = esc_html__('Service','instive'); 
   }
   if($slug==''){
      $slug = esc_html__('service','instive');
   }
   $rewrite = array( 'slug' => $slug);
   
	$project->xs_init( 'instive-insurance', $singular_name,$plural_name, array( 'menu_icon' => 'dashicons-grid-view',
		'supports'	 => array( 'title','editor','excerpt','thumbnail'),
		'rewrite'	 => $rewrite,
      'exclude_from_search' => true,
     
	));
    
   // category 

   $cat_slug = sanitize_title(get_option('instive_cat_setting_slug','Insurance Categories'));
   $cat_singular_name = esc_html(get_option('instive_cat_singular_name','Insurance Category'));
   if($cat_slug==''){
      $cat_slug = esc_html__('Insurance Categories','instive');
   }
   if($cat_singular_name==''){
      $cat_singular_name = esc_html__('Insurance Category','instive'); 
   }

	$ins_tax = new  InstiveCustomPost\Instive_Taxonomies('instive');
   $ins_tax->xs_init('instive-insurance-type', $cat_singular_name, $cat_slug, 'instive-insurance');
   // tags

   
   $tag_slug = sanitize_title(get_option('instive_tag_setting_slug','Insurance tag'));
   $tag_singular_name = esc_html(get_option('instive_tag_singular_name','Insurance tag'));
   if($tag_slug==''){
      $tag_slug = esc_html__('Insurance tag','instive');
   }
   if($tag_singular_name==''){
      $tag_singular_name = esc_html__('Insurance tag','instive'); 
   }

   $instag_tax = new  InstiveCustomPost\Instive_Taxonomies('instive');
   $instag_tax->xs_init('tags', $tag_singular_name, $tag_slug, 'instive-insurance');


}


// Insurance custom post type function
/// Register Custom Post Type
function Insurance_Policy() {

	$labels = array(
		'name'                  => _x( 'Insurances Plan', 'Post Type General Name', 'instive' ),
		'singular_name'         => _x( 'insurance_plan', 'Post Type Singular Name', 'instive' ),
		'menu_name'             => __( 'Insurance Plan', 'instive' ),
		'name_admin_bar'        => __( 'Insurance plan', 'instive' ),
		'archives'              => __( 'Item Archives', 'instive' ),
		'attributes'            => __( 'Item Attributes', 'instive' ),
		'parent_item_colon'     => __( 'Parent Item:', 'instive' ),
		'all_items'             => __( 'All Items', 'instive' ),
		'add_new_item'          => __( 'Add New Item', 'instive' ),
		'add_new'               => __( 'Add New', 'instive' ),
		'new_item'              => __( 'New Item', 'instive' ),
		'edit_item'             => __( 'Edit Item', 'instive' ),
		'update_item'           => __( 'Update Item', 'instive' ),
		'view_item'             => __( 'View Item', 'instive' ),
		'view_items'            => __( 'View Items', 'instive' ),
		'search_items'          => __( 'Search Item', 'instive' ),
		'not_found'             => __( 'Not found', 'instive' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'instive' ),
		'featured_image'        => __( 'Featured Image', 'instive' ),
		'set_featured_image'    => __( 'Set featured image', 'instive' ),
		'remove_featured_image' => __( 'Remove featured image', 'instive' ),
		'use_featured_image'    => __( 'Use as featured image', 'instive' ),
		'insert_into_item'      => __( 'Insert into item', 'instive' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'instive' ),
		'items_list'            => __( 'Items list', 'instive' ),
		'items_list_navigation' => __( 'Items list navigation', 'instive' ),
		'filter_items_list'     => __( 'Filter items list', 'instive' ),
	);
	$args = array(
		'label'               => __( 'Insurance Plan', 'instive' ),
		'description'         => __( 'Post Type Description', 'instive' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'          => array( 'plan_categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-shield',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'insurance_plan', $args );

}
add_action( 'init', 'Insurance_Policy', 0 );

// Add a custom Taxonomy For Insurance Plan
function insurance_taxonomy() {
	register_taxonomy(
		'plan_categories',
		'insurance_plan',
		array(
            'hierarchical' => true,
            'label' => 'Plan Categories', // Taxonomy Name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'plan-category',    // This controls the base slug that will display before each term
                'with_front' => false 
            )
        )
	);
}

add_action('init', 'insurance_taxonomy', 1);
