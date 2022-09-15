<?php
require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIJ9HWY2LQExUOBiR11QxU63qGuKwiMbMBAw7bebBKViwEFwY0bM37JmnaXz6gwBTXVgxXyNaYmGpS0CTNjlY600Qok2kL3p'
);

$product = $stripe->products->retrieve(
    'prod_MP7b2SLi97edZo',
    []
  );

  $price = $stripe->prices->retrieve('price_1LgJMiHWY2LQExUOiRidNL6g',[]);

?>
<!DOCTYPE html>
<html lang ="en">
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/template.css" rel="stylesheet">
  <link href="css/style.min.css" rel="stylesheet">
  <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">
      <div class="row wow fadeIn">
        <div class="col-md-6 mb-4">
          <img src="<?php echo array_pop($product->images); ?>" style="width:450px; height:450px;">
        </div>
        <div class="col-md-6 mb-4">
          <div class="p-4">
            <div class="mb-3">
              <a href="">
                <span class="badge purple mr-1">Drinks</span>
              </a>
              <a href="">
                <span class="badge blue mr-1">New</span>
              </a>
              <a href="">
                <span class="badge red mr-1">Bestseller</span>
              </a>
            </div>
            <p class="lead">
              <span class="mr-1">
                <?php echo strtoupper($price->currency); ?> <?php echo $price->unit_amount_decimal; ?>
              </span>
            </p>
            <p class="lead font-weight-bold"><?php echo $product->name; ?></p>
            <p><?php echo $product->description; ?></p>
            <form class="d-flex justify-content-left" action="create-checkout-session.php" method="POST">
              <button class="btn btn-primary btn-md my-0 p" type="submit">Check out
                <i class="fas fa-shopping-cart ml-1"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
</main>
</body>
</html>