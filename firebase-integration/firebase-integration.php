<?php

  /**
  * Firebase integration in wordpress
  * Documentation - https://firebase-php.readthedocs.io/
  */

  define('CF_PATH', plugin_dir_path(__FILE__));

  require_once CF_PATH . 'vendor/autoload.php';

  use Kreait\Firebase\Factory;

  $factory = (new Factory)->withServiceAccount( CF_PATH . 'firebase_credentials.json' );


  $auth = $factory->createAuth();

  $uid = md5(uniqid());

  $customToken = (string) $auth->createCustomToken($uid);

  $email = "testing@cerebriam.com";
  $pass = "thisISPass234";

  try {
    $signInResult = $auth->signInWithEmailAndPassword($email, $pass);
    $uid = $signInResult->data()['localId'];
    $customAtts = [
      'plan' => 'standard',
      'vidLimit' => 15,
    ];
    $updateUser = $auth->setCustomUserAttributes($uid, $customAtts);
    $user = $auth->getUser($uid);
    echo('Plan: ' . $user->customAttributes['plan']);
    echo '<br />';
    echo('Video Limit: ' . $user->customAttributes['vidLimit']);
  }catch(Exception $e) {
    echo "Error: Invalid username of password.";
  }
