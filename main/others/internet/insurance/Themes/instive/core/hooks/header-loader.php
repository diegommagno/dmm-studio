<?php


// function instive_header_builder_kit(){

//     if(!is_customize_preview()){
//         return;
//     }
//     $selected_header_id = null;
//     $selected_header = instive_option('theme_header_default_settings');
//     if(isset($selected_header['yes'])){
//         $selected_header =  $selected_header['yes'];
//         if($selected_header['instive_header_builder_select']){
//             $selected_header_id = $selected_header['instive_header_builder_select'];
//         }
//     }
//     $header_settings       = instive_option('theme_header_default_settings');
//     $header_builder_enable = instive_option('header_builder_enable');
//     $_SESSION['selected_header_id'] = $selected_header_id; 

//     $args = [

//         'posts_per_page'   => -1,
//         'orderby'          => 'id',
//         'order'            => 'DESC',
//         'post_status'      => 'publish',
//         'post_type'        => 'elementskit_template',
        
//     ];

//     $headers = get_posts($args);
//     if($header_builder_enable=='yes'){
      
      
//         foreach($headers as $header){

//             if(isset($_SESSION['selected_header_id']) && $_SESSION['selected_header_id'] == $header->ID){
               
//                 update_post_meta($header->ID, 'elementskit_template_activation', 'yes');
//             }else{
//                 update_post_meta($header->ID, 'elementskit_template_activation', '');
//             }
            
//         }
        
//     }else{
       
//         foreach($headers as $header){
//            update_post_meta($header->ID, 'elementskit_template_activation', '');
//         }
         
//     }
// }

// add_action( 'customize_preview_init', 'instive_header_builder_kit' );