<?php

class IESAY_Public {

	private $plugin_file;
	
	/**
	* Constructor
	*/
	public function __construct( $plugin_file ) {
		$this->plugin_file = $plugin_file;
	}

	public function hook() {
		add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ), 99 );
		add_filter( 'the_content', array( $this, 'add_links' ) );
		add_shortcode( 'ie_social_sharing', 'ie_social_sharing' );
	}

	/**
	* Load plugin stylesheets and scripts
	*/
	public function load_assets() 
	{
		$opts = iesay_get_options();
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_style( 'iesay-sharing', plugins_url( '/assets/css/styles' . $suffix . '.css', $this->plugin_file ), array(), IESAY_VERSION );
		wp_enqueue_style( 'iesay-sharing', plugins_url( '/assets/css/styles.css', $this->plugin_file ), array(), IESAY_VERSION );

		if( $opts['load_popup_js'] ) {
			wp_enqueue_script( 'iesay-sharing', plugins_url( '/assets/js/script' . $suffix . '.js', $this->plugin_file ), array( ), IESAY_VERSION, true );
		}
		if( $opts['load_popup_js'] ) {
			wp_enqueue_script( 'iesay-sharing', plugins_url( '/assets/js/script.js', $this->plugin_file ), array( ), IESAY_VERSION, true );
		}
	}

	/**
	 * Automatically adds links to post content
	 *
	 * @param string $content
	 * @return string
	 */
	public function add_links( $content )
	{
		$opts = iesay_get_options();
		$show_buttons = false;

		if( ! empty( $opts['auto_add_post_types'] ) && in_array( get_post_type(), $opts['auto_add_post_types'] ) && is_singular( $opts['auto_add_post_types'] ) ) {
			$show_buttons = true;
		}

		// allow custom conditionals
		$show_buttons = apply_filters( 'iesay_display', $show_buttons );

		if( ! $show_buttons ) { 
			return $content; 
		}

		// add buttons to content
		return $content . ie_social_sharing();
	}
}
