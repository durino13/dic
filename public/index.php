<?php

use yuma\factory\CarFactory;

// Grab the container from the bootstrap file
$container = require __DIR__ . '/../bootstrap.php';

// Always return a factory from the container
$carFactory = $container->get('CarFactory');

// Now, you can use the factory to create new instances of the object
$audi = $carFactory->create(CarFactory::CAR_AUDI);

var_dump($audi);
