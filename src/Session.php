<?php
// wrapper class to session
namespace oldspice;

class Session {
  // method to initialise session
  public static function init() {
    // check if session is initialised
    if( session_status() == 'PHP_SESSION_NONE' ) {
      session_start();
    }
  }
  // method to set a session variable
  public static function set( $name, $value ) {
    // initialise session if not initialised
    self::init();
    $_SESSION[$name] = $value;
  }
  // method to get a value of a session variable
  public static function get( $name ) {
    // initialise session if not initialised
    self::init();
    if ( isset( $_SESSION[$name] ) ) {
      return $_SESSION[$name];
    }
    else {
      return false;
    }
  }
  // method to unset a session variable
  public static function unset( $name ) {
    self::init();
    unset( $_SESSION[$name] );
  }
}
?>