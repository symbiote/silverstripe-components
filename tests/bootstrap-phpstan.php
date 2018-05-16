<?php

$PROJECT_DIR = dirname(__FILE__).'/../..';

// Load Composer autoload first. (This is required to find Test classes in Travis CI)
require_once $PROJECT_DIR.'/vendor/autoload.php';

//
// This file is required to setup Silverstripe class autoloader
//
$CORE_PATH = $PROJECT_DIR.'/framework/core';
if (!file_exists($CORE_PATH.'/Core.php')) {
    echo 'Unable to find "framework" folder for Silverstripe 3.X project.';
    exit;
}
require_once $CORE_PATH.'/Core.php';
