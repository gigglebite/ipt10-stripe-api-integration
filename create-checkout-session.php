<?php

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LgIJ9HWY2LQExUOBiR11QxU63qGuKwiMbMBAw7bebBKViwEFwY0bM37JmnaXz6gwBTXVgxXyNaYmGpS0CTNjlY600Qok2kL3p');

header('Content-Type: application/json');

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1LgJMiHWY2LQExUOiRidNL6g',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => "http://localhost/ipt10-stripe-api-integration/success.html",
  'cancel_url' => "http://localhost/ipt10-stripe-api-integration/cancel.html",
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);