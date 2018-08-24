<?php

/*
|--------------------------------------------------------------------------
| Bootstrap.php
|--------------------------------------------------------------------------
| The purpose of the bootstrap file is to setup the application. At
| the end of the bootstrap file, return the dependency injection
| container, so you can use it later in the application to resolve the
| object instances.
|
*/

use DI\ContainerBuilder;

require __DIR__ . '/vendor/autoload.php';

// Display errors ..
ini_set("display_errors", 1);
error_reporting(E_ALL);

// Init config
$containerConfigPath = __DIR__ . '/config/container-defs.php';

// The purpose of the bootstrap file is to return the dic container.
// The definition of the continer can be found in /config/container-defs.php file
$builder = new ContainerBuilder();
$builder->addDefinitions($containerConfigPath);
$container = $builder->build();

return $container;