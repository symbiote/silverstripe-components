<?php

$PROJECT_DIR = dirname(__FILE__).'/../../..';

// Find Composer autoloader (for local dev)
$CORE_FILEPATH = $PROJECT_DIR.'/autoload.php';
if (!file_exists($CORE_FILEPATH)) {
    // If not found, find Composer autoloader (for Travis CI)
    $PROJECT_DIR = dirname(__FILE__).'/../vendor';
    $CORE_FILEPATH = $PROJECT_DIR.'/autoload.php';
    if (!file_exists($CORE_FILEPATH)) {
        echo 'Unable to find "vendor/autoload.php" file generated from Composer.';
        exit(1);
    }
}
require_once $CORE_FILEPATH;

//
// This file is required to setup Silverstripe class autoloader
//
$CORE_FILEPATH = $PROJECT_DIR.'/silverstripe/framework/tests/bootstrap.php';
if (!file_exists($CORE_FILEPATH)) {
    echo 'Unable to find "vendor/silverstripe/framework" folder for Silverstripe 4.X project.';
    exit(2);
}
require_once $CORE_FILEPATH;
