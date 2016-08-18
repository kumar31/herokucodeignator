<?php
class variableconfig {
  function mailurl() {
    return getenv( 'SOIREE_BASE_URL' ) . '/webservice/index.php/verify/';
  }

  function fpassurl() {
    return getenv( 'SOIREE_BASE_URL' ) . '/webservice/index.php/reset_password/';
  }

  function from_email() {
    return "support@beta.outfitstaff.com";
  }

  function smsurl() {
    return getenv( 'SOIREE_BASE_URL' ) . '/twilio/Services/sms.php';
  }
}
