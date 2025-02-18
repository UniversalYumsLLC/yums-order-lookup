<?php
namespace YumsOrderLookup\Tests\Integration;

use WP_UnitTestCase;
use WC_Helper_Order;

class BasicTest extends WP_UnitTestCase {
	/**
	 * Example integration test.
	 *
	 * Please add integrations tests to test plugin functionality.
	 */
	public function test_endpoint() {
		$test_email = 'yums@test.com';

		// Here's how you can create an order.
		$order = WC_Helper_Order::create_order();
		$order->set_billing_email( $test_email );
		$order->set_status( 'processing' );
		$order->save();

		// Here's where you would write tests to check the plugin's functionality.

		// Example assertion.
		$this->assertEquals( 'processing', $order->get_status() );
	}
}
