<?php
/**
 * Plugin Name:       Yums Order Lookup
 * Plugin URI:        https://www.universalyums.com
 * Description:       A WooCommerce extension that allows order lookups by email.
 * Version:           0.1.0
 * Author:            Full-Stack Engineer
 * Author URI:        https://www.universalyums.com
 * Text Domain:       yums-order-lookup
 * Domain Path:       /languages
 * License:           GNU General Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package YumsOrderLookup
 */

defined( 'ABSPATH' ) || exit;

// Autoload Dependencies
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload_packages.php';

use YumsOrderLookup\Scripts;
use YumsOrderLookup\API;

/**
 * Main Plugin Class.
 */
class YumsOrderLookup {
	/**
	 * Singleton instance.
	 *
	 * @var self|null
	 */
	private static ?self $instance = null;

	/**
	 * Gets the main instance of the plugin.
	 *
	 * @return self
	 */
	public static function instance(): self {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor - Initializes the plugin.
	 */
	private function __construct() {
		// Prevent loading the plugin if WooCommerce is not active
		if ( ! class_exists( 'WooCommerce' ) ) {
			add_action( 'admin_notices', array( $this, 'missing_wc_notice' ) );
			return;
		}

		$this->init_hooks();
	}

	/**
	 * Initialize hooks and dependencies.
	 *
	 * @return void
	 */
	private function init_hooks(): void {
		load_plugin_textdomain( 'yums-order-lookup', false, plugin_basename( __DIR__ ) . '/languages' );

		new Scripts();
		new API();
	}

	/**
	 * Display Admin Notice if WooCommerce is Missing.
	 *
	 * @return void
	 */
	public function missing_wc_notice(): void {
		echo '<div class="error"><p><strong>' . sprintf(
			esc_html__( 'Yums Order Lookup requires WooCommerce to be installed and active. You can download %s here.', 'yums-order-lookup' ),
			'<a href="https://woo.com/" target="_blank">WooCommerce</a>'
		) . '</strong></p></div>';
	}
}

/**
 * Initialize the plugin on `plugins_loaded` action.
 *
 * @return void
 */
function yums_order_lookup_init(): void {
	YumsOrderLookup::instance();
}
add_action( 'plugins_loaded', 'yums_order_lookup_init' );
