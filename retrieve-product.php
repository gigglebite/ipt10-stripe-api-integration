<?php
require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIJ9HWY2LQExUOBiR11QxU63qGuKwiMbMBAw7bebBKViwEFwY0bM37JmnaXz6gwBTXVgxXyNaYmGpS0CTNjlY600Qok2kL3p'
);

$result = $stripe->products->retrieve(
    'prod_MP707YHKLDFbZS',
    []
  );

  var_dump($result);
?>