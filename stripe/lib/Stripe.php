<?php

// Tested on PHP 5.2, 5.3

// This snippet (and some of the curl code) due to the Facebook SDK.
if (!function_exists('curl_init')) {
  throw new Exception('Stripe needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Stripe needs the JSON PHP extension.');
}
if (!function_exists('mb_detect_encoding')) {
  throw new Exception('Stripe needs the Multibyte String PHP extension.');
}

// Stripe singleton
require(__DIR__ . '/Stripe/Stripe.php');

// Utilities
require(__DIR__ . '/Stripe/Util.php');
require(__DIR__ . '/Stripe/Util/Set.php');

// Errors
require(__DIR__ . '/Stripe/Error.php');
require(__DIR__ . '/Stripe/ApiError.php');
require(__DIR__ . '/Stripe/ApiConnectionError.php');
require(__DIR__ . '/Stripe/AuthenticationError.php');
require(__DIR__ . '/Stripe/CardError.php');
require(__DIR__ . '/Stripe/InvalidRequestError.php');
require(__DIR__ . '/Stripe/RateLimitError.php');

// Plumbing
require(__DIR__ . '/Stripe/Object.php');
require(__DIR__ . '/Stripe/ApiRequestor.php');
require(__DIR__ . '/Stripe/ApiResource.php');
require(__DIR__ . '/Stripe/SingletonApiResource.php');
require(__DIR__ . '/Stripe/AttachedObject.php');
require(__DIR__ . '/Stripe/List.php');

// Stripe API Resources
require(__DIR__ . '/Stripe/Account.php');
require(__DIR__ . '/Stripe/Card.php');
require(__DIR__ . '/Stripe/Balance.php');
require(__DIR__ . '/Stripe/BalanceTransaction.php');
require(__DIR__ . '/Stripe/Charge.php');
require(__DIR__ . '/Stripe/Customer.php');
require(__DIR__ . '/Stripe/Invoice.php');
require(__DIR__ . '/Stripe/InvoiceItem.php');
require(__DIR__ . '/Stripe/Plan.php');
require(__DIR__ . '/Stripe/Subscription.php');
require(__DIR__ . '/Stripe/Token.php');
require(__DIR__ . '/Stripe/Coupon.php');
require(__DIR__ . '/Stripe/Event.php');
require(__DIR__ . '/Stripe/Transfer.php');
require(__DIR__ . '/Stripe/Recipient.php');
require(__DIR__ . '/Stripe/ApplicationFee.php');

