<?php
require('vendor/autoload.php');

use oldspice\Navigation;
use oldspice\Account;

$navigation = Navigation::getNavigation();

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $acc = new Account();
  $register = $acc -> register($email,$password);
}
else{
  $register = '';
}

//Twig
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment( $loader );
//load the template
$template = $twig -> load( 'register.twig' );
//output the template to page
echo $template -> render([
  'navigation' => $navigation,
  'register' => $register,
  'title' => 'Register for a free account'
]);


?>