<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------
function instive_excerpt( $words = 20, $more = 'BUTTON' ) {
	if($more == 'BUTTON'){
		$more = '<a class="btn btn-primary">'.esc_html__('read more', 'instive').'</a>';
	}
	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $words, $more );
	echo instive_kses( $trimmed_content );
}


// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function instive_move_comment_textarea_to_bottom( $fields ) {
	$comment_field		 = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'instive_move_comment_textarea_to_bottom' );


// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function instive_search_form( $form ) {
    $form = '
        <form  method="get" action="' . esc_url( home_url( '/' ) ) . '" class="instive-serach xs-search-group">
            <div class="input-group">
                <input type="search" class="form-control" name="s" placeholder="' .esc_attr__( 'Search...', 'instive' ) . '" value="' . get_search_query() . '">
                <button class="input-group-btn search-button"><i class="fa fa-search"></i></button>
            </div>
        </form>';
	return $form;
}
add_filter( 'get_search_form', 'instive_search_form' );

function instive_body_classes( $classes ) {

    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'sidebar-active';
    }else{
        $classes[] = 'sidebar-inactive';
    }
    $box_class =  instive_option('general_body_box_layout');
    if(isset($box_class['style'])){
        if($box_class['style']=='yes'){
         $classes[] = 'body-box-layout';
        }
    }
 
    return $classes;
 }
 
 add_filter( 'body_class','instive_body_classes' );

 function instive_insurance_tag() {
   register_taxonomy_for_object_type('post_tag', 'instive-insurance');
}
add_action('init', 'instive_insurance_tag');


/*************************************
/*******  Load More  ********
**************************************/
add_action( 'wp_ajax_nopriv_instive_post_ajax_loading', 'instive_post_ajax_loading_cb' );
add_action( 'wp_ajax_instive_post_ajax_loading', 'instive_post_ajax_loading_cb' );
function instive_post_ajax_loading_cb()
{
   global $post;
   
   $settings['post_title_crop'] = $_POST['ajax_json_data']['post_title_crop'];
   $settings['post_content_crop'] = $_POST['ajax_json_data']['post_content_crop'];
   $settings['readmore'] = $_POST['ajax_json_data']['readmore'];
   $settings['post_readmore_text'] = $_POST['ajax_json_data']['post_readmore_text'];
   $feature_icon_show = $_POST['ajax_json_data']['feature_icon_show'];

   $args = array(
       'post_type'         =>'instive-insurance',
       'post_status'       =>'publish',
       'order'             => $_POST['ajax_json_data']['order'],
       'posts_per_page'    => $_POST['ajax_json_data']['posts_per_page'],
       'paged'             => $_POST['paged'],
       'page'              => $_POST['paged'],
   );

    if(is_array($_POST['ajax_json_data']['category']) && count($_POST['ajax_json_data']['category']) ):
        $args['tax_query'] = array(
            array(
            'taxonomy' => 'instive-insurance-type',
            'field' => 'slug',
            'terms' => $_POST['ajax_json_data']['category'],
            'operator' => 'IN'
        ) 
        );
    endif; 

    
   $allpostloding = new WP_Query($args);
   $index = 0;
   while($allpostloding->have_posts()){ $allpostloding->the_post(); ?>
           
          <?php require INSTIVE_EDITOR_ELEMENTOR.'/widgets/style/service/style4.php'; ?>
         <?php
      $index ++;
   }
   wp_reset_postdata();
   wp_die();
}

function instive_service_main_category_query_with_conditional_tags( $query ) {
   
    if ( ! is_admin() && $query->is_main_query() ) {
     
        if ( is_tax('instive-insurance-type') ) {
            $query->set( 'post_type', 'instive-insurance' );
        }

    }
    
}
add_action( 'pre_get_posts', 'instive_service_main_category_query_with_conditional_tags' );


