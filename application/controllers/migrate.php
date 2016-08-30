<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class migrate extends CI_Controller {

  public function index() {
    $this->load->library( 'migration' );

    // Try to run migrations to current migration version
    $version = $this->migration->current();

    if ( $version ) {
      if ( $version == 1 ) {
        if ( $this->config->item( 'migration_version' ) == 1 ) {
          // Upgraded to version 1
          echo 'upgraded to: ' . $version;
        }
        else {
          // No upgrade, at current
          echo 'current: ' . $this->config->item( 'migration_version' );
        }
      }
      else {
        // Upgraded to version > 1
        echo 'upgraded to: ' . $version;
      }
    }
    else {
      echo 'error: ' . $this->migration->error_string();
    }
  }
}
