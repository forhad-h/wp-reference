<?php

/*
 * autoloader for namespaces
 * folder structure:
 *   - classes
 *    - class-test.php
*/

/* autoloader script */
// Class autoloader
function bpgci_auto_loader( $classname ) {

  if( false !== strpos( $classname, BPGCI_NAMESPACE ) ) {

    $parts = explode( '\\', $classname );
    $filename = 'class-' . str_replace( '_', '-', strtolower( array_pop( $parts ) ) ) ;
    $filepath     = BPGCI_PATH . 'classes' . DIRECTORY_SEPARATOR . $filename . '.php';

    if(  file_exists( $filepath ) ) {
        include_once $filepath;
    }

  }

}

spl_autoload_register('bpgci_auto_loader');
/* uses */

// define namespace
namespace NAMESPACE;

// use namespace
use NAMESPACE\Test;
// or
$admin_notices = new \NAMESPACE\Test();


