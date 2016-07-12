<?php

namespace CodeceptionDemo;

class Plugin {

	/**
	 * Codeception_Demo_Plugin constructor.
	 */
	public function __construct() {

		// Load all languages pack
		load_plugin_textdomain( 'codeception-demo', false, plugin_basename( basename( Loader::FILE ) ) . '/languages' );

		// Add our filters
		add_filter( 'pre_option_blogdescription', [ $this, 'filter_description' ] );
		add_action( 'admin_menu',                 [ $this, 'change_dashboard_text' ] );

	}

	/**
	 * Filter the site description option to return "Just another Codeception demo" all the time
	 *
	 * @filter pre_option_blogdescription
	 *
	 * @return string
	 */
	public function filter_description() {

		return __( 'Codeception demo', 'codeception-demo' );

	}

	/**
	 * Change Dashboard text to something else
	 *
	 * @action admin_menu
	 *
	 * @return string|void
	 */
	public function change_dashboard_text() {

		global $menu;

		if ( isset( $menu[2][0] ) ) {

			$menu[2][0] = __( 'Codeception demo', 'codeception-demo' );

		}

	}

}
