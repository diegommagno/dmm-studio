<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/*
 * Single post meta
 * */

// Post featured video metabox
CSF::createMetabox( 'settings-featured-video', array(
	'title'     => esc_html__( 'Featured Video', 'instive' ),
	'post_type' => 'post',
	'context'   => 'side',
	'theme'     => 'light',
	'data_type' => 'unserialize',
) );
// Featured video url
CSF::createSection( 'settings-featured-video', array(
	'fields' => array(
		array(
			'id'    => 'featured_video',
			'type'  => 'text',
			'title' => esc_html__( 'Video URL', 'instive' ),
			'desc'  => esc_html__( 'Paste a video link from Youtube, Vimeo, Dailymotion, Facebook or Twitter it will be embedded in the post and the thumb used as the featured image of this post. 
				You need to choose "Video Format" as post format to use "Featured Video".', 'instive' ),
		),
	)
) );