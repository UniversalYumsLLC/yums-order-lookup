<?php

namespace YumsOrderLookup;

/**
 * Loads scripts to register the block.
 */
class Scripts {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_block' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_script' ) );
	}

	/**
	 * Registers the block.
	 *
	 * @since 1.0.0
	 */
	public function register_block() {
		// Get the absolute path to the root of the plugin.
		$plugin_dir = dirname( __DIR__ );

		// Register the block using the path to the root of the plugin where block.json resides.
		register_block_type( $plugin_dir . '/block.json' );
	}

	/**
	 * Enqueue frontend script.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_frontend_script() {
		wp_enqueue_script(
			'yums-order-lookup',
			plugins_url( 'build/frontend.js', __DIR__ ),
			array( 'react', 'react-dom', 'wp-element' ),
			filemtime( plugin_dir_path( __DIR__ ) . 'build/frontend.js' ),
			true
		);
	}
}
