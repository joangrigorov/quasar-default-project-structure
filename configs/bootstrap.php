<?php

require_once ROOT_PATH . '/vendor/autoload.php';

defined('DS') || define('DS', DIRECTORY_SEPARATOR);

// Define application environment
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// create the injector
$injector = new Quasar\Di\Container(include ROOT_PATH . '/configs/di/global.php');

// add common configuration
$injector->addConfig(include ROOT_PATH . '/configs/di/common.php');
// add environment specific configuration
$injector->addConfig(include ROOT_PATH . '/configs/di/env.' . APPLICATION_ENV . '.php');

// set the container to inject itself and use single instance
$injector->forVariable('injector')->willUse($injector);

// first we create the environment configuration
$injector->get('Quasar\Env\Config');

// create the dispatcher object
/* @var $dispatcher Quasar\Dispatcher\Dispatcher */
$dispatcher = $injector->create('dispatcher');
echo $dispatcher->dispatch()->output();
