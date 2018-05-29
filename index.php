<?php
/*
Plugin Name: Iesay Sharing
Version: 1.0.0
Plugin URI: https://www.iesay.com/iesay-social-sharing/
Description: Adds super lightweight (no-scripts) social share buttons to your posts.
Author: 99839
Author URI: https://www.iesay.com/
Text Domain: iesay-sharing
Domain Path: /languages/
License: GPL v3

Iesay Social Sharing By 99839
Copyright (C) 2010-2018, 99839, support@iesay.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

define( 'IESAY_VERSION', '1.3.2' );
define( 'IESAY_PLUGIN_DIR', dirname( __FILE__ ) );

require_once IESAY_PLUGIN_DIR . '/includes/functions.php';
add_action( 'plugins_loaded', 'ie_load_textdomain' );

if( ! is_admin() ) {

	// PUBLIC SECTION
	require_once IESAY_PLUGIN_DIR . '/includes/template-functions.php';
	require_once IESAY_PLUGIN_DIR . '/includes/class-public.php';
	$public = new IESAY_Public( __FILE__ );
	$public->hook();

} elseif( ! defined("DOING_AJAX") || ! DOING_AJAX ) {
	
	// ADMIN SECTION
	require IESAY_PLUGIN_DIR . '/includes/class-admin.php';
	$admin = new IESAY_Admin( __FILE__ );
	$admin->hook();
}
