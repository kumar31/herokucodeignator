<?php



require_once (APPPATH.'libraries/Stripe_lib/lib/Stripe.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/Util/Set.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/Util/RequestOptions.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/Util/Util.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/Error/Base.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/Error/InvalidRequest.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/Object.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/ApiRequestor.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/ApiResource.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/SingletonApiResource.php') ;

require_once (APPPATH.'libraries/Stripe_lib/lib/Charge.php') ;



$files = glob(APPPATH.'libraries/Stripe_lib/lib/*.php');

foreach ($files as $file) {

    require_once($file);   

}



$files = glob(APPPATH.'libraries/Stripe_lib/lib/Error/*.php');

foreach ($files as $file) {

    require_once($file);   

}



$files = glob(APPPATH.'libraries/Stripe_lib/lib/Util/*.php');

foreach ($files as $file) {

    require_once($file);   

}





\Stripe\Stripe::setApiKey("sk_test_ltfJsp4aGQdCldUjRsi7IpIr");



?>

