<?php

require_once 'shared.php';

function calculateOrderAmount($items) {
	// Replace this constant with a calculation of the order's amount
	// Calculate the order total on the server to prevent
	// people from directly manipulating the amount on the client
	return 1400;
}

// Load configuration file
$config = parse_ini_file('config.ini', true);

// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey($config['stripe']['secret_key']);

$intent = \Stripe\PaymentIntent::create([
  'amount' => 1099,
  'currency' => 'usd',
  // Verify your integration in this guide by including this parameter
  'metadata' => ['integration_check' => 'accept_a_payment'],
]);



$output = [
	'publishableKey' => $config['stripe_publishable_key'],
	'clientSecret' => $paymentIntent->client_secret,
];

echo json_encode($output);