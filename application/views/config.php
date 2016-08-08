<?php
  require_once('../stripe/lib/Stripe.php');
  $stripe = array(
    'secret_key'      => '',
    'publishable_key' => ''
    );
  Stripe::setApiKey($stripe['secret_key']);
?>