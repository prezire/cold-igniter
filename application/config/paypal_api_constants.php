<?php  
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  //
  define('DIRECT_PAYMENT_METHOD', 'DoDirectPayment');
  define('EXPRESS_CHECKOUT_METHOD', 'DoExpressCheckoutPayment');
  define('EXPRESS_CHECKOUT_DETAILS', 'GetExpressCheckoutDetails');
  define('EXPRESS_CHECKOUT', 'SetExpressCheckout');