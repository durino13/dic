<?php

use Psr\Container\ContainerInterface;
use yuma\factory\CarFactory;
use yuma\factory\TiresFactory;

return array(

    'CarFactory' => function(ContainerInterface $c) {
        $tiresFactory = $c->get('TiresFactory');
        return new CarFactory($tiresFactory);
    },

    'TiresFactory' => function(ContainerInterface $c) {
        return new TiresFactory();
    }

);
