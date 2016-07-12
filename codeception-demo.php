<?php
/**
 * Plugin Name: Codeception demo
 * Description: TBD
 * Version: 0.0.1
 * Author: Jonathan Bardo
 * Author URI: https://jonathanbardo.com
 * Text Domain: codeception-demo
 * License: GPL-2.0
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace  CodeceptionDemo;

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

if ( ! class_exists( 'CodeceptionDemo\Loader' ) ) {

	require 'includes/class-plugin.php';

	class Loader {

		const FILE = __FILE__;

		/**
		 * Plugin instanciator
		 *
		 * @return Codeception_Demo|null
		 */
		public static function instance() {

			static $instance = null;

			if ( ! is_null( $instance ) ) {

				return $instance;

			}

			$composer_autoloader = __DIR__ . '/vendor/autoload.php';

			// If we are running the wp codeception command we need to
			if ( defined( 'WP_CLI' ) && WP_CLI && file_exists( $composer_autoloader ) ) {

				// This is for enabling codeception
				require_once $composer_autoloader;

			}

			$plugin   = new Plugin;
			$instance = new self;

			return $instance;

		}

	}

	add_action( 'plugins_loaded', 'CodeceptionDemo\Loader::instance' );

}
