<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register widget area
 */

function instive_widget_init()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Blog widget area', 'instive'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Appears on posts.', 'instive'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            )
        );
    }

    if (function_exists('register_sidebar') && defined('WC_VERSION')) {
        register_sidebar(
        [
           'name'			 => esc_html__( 'WooCommerce Sidebar Area', 'instive' ),
           'id'			 => 'sidebar-woo',
           'description'	 => esc_html__( 'Appears on woocommerce pages.', 'instive' ),
           'before_widget'	 => '<div id="%1$s" class="widgets %2$s">',
           'after_widget'	 => '</div> <!-- end widget -->',
           'before_title'	 => '<h3 class="widget-title">',
           'after_title'	 => '</h3>',
           ] 
        );
    } 
}

add_action('widgets_init', 'instive_widget_init');



