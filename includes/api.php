<?php
namespace YumsOrderLookup;

/**
 * Registers a custom REST API endpoint to retrieve orders by email.
 * https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
 */
class API {
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	public function register_routes() {
		// Registers the route for the custom endpoint.
	}

	public function get_orders_by_email( $request ) {
		// Returns data in this format:
		// [["id": 123, "status": "processing"], ["id": 124, "status": "completed"]]
	}
}

new API();
