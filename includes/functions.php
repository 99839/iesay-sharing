<?php

/**
* Get social sharing button options
* @return array Options in array format
*/
function iesay_get_options()
{	
	static $options;

	// load options from database
	if( ! $options ) {
		
		// default options
		$defaults = array(
			'load_popup_js' => 0,
			'icon_style' => 4,
			'twitter_username' => '',
			'auto_add_post_types' => array( 'post' ),
            'social_options' => array( 'twitter', 'facebook', 'googleplus', 'linkedin', 'qq', 'weibo', 'weixin' ),
		);

		// get options from db
		$db_option = get_option( 'ie_social_sharing', array() );

		// add option to database if not set, saves a query
		if( ! $db_option ) {
			update_option( 'ie_social_sharing', $defaults );
		}

		// merge with default options to prevent notices
		$options = wp_parse_args( $db_option, $defaults );
	}

	return $options;
}

/**
* Load the plugin translation strings
*/
function ie_load_textdomain() {
	load_plugin_textdomain( 'iesay-sharing', false, 'iesay-sharing/languages/' );
}
