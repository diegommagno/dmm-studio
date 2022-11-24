<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue static files: javascript and css for backend
 */
 

wp_enqueue_style('instive-admin', INSTIVE_CSS . '/instive-admin.css', null, INSTIVE_VERSION);

wp_enqueue_script('instive-customize', INSTIVE_JS . '/instive-customize.js', array('jquery'), INSTIVE_VERSION, true);
wp_localize_script( 'instive-customize', 'admin_url_object',array( 'admin_url' => esc_url(admin_url( '?action=elementor&post=' ) ) ) );