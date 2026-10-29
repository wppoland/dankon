<?php
/**
 * The tip is recorded on block checkout orders, and dropped again when the
 * draft order is reused without one.
 *
 * Run inside wp-env:  wp eval-file tests/blocks-tip-meta-check.php
 */

// No declare(strict_types=1): wp-cli eval-file wraps this in eval().

$fails = 0;
$ok    = static function (bool $cond, string $label) use (&$fails): void {
    echo ($cond ? '  ok   ' : '  FAIL ') . $label . "\n";
    if (! $cond) {
        ++$fails;
    }
};

$request = new WP_REST_Request('POST', '/wc/store/v1/checkout');
$order   = wc_create_order();
$tip     = static fn (): float => 5.0;

add_filter('tipping/fee_amount', $tip);
do_action('woocommerce_store_api_checkout_update_order_from_request', $order, $request);
$ok($order->get_meta('_tipping_amount') === '5', 'Store API checkout stores the tip amount');

remove_filter('tipping/fee_amount', $tip);
do_action('woocommerce_store_api_checkout_update_order_from_request', $order, $request);
$ok($order->get_meta('_tipping_amount') === '', 'a reused draft without a tip loses the old amount');

$order->delete(true);

echo $fails === 0 ? "PASS\n" : "FAIL: {$fails}\n";
