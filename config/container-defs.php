<?php

use Psr\Container\ContainerInterface;
use yuma\factory\CarFactory;
use yuma\factory\EngineFactory;
use yuma\factory\LightsFactory;
use yuma\factory\TiresFactory;

return array(

    'CarFactory' => function(ContainerInterface $c) {
        $engineFactory = $c->get('EngineFactory');
        $tiresFactory = $c->get('TiresFactory');
        $lightsFactory = $c->get('LightsFactory');
        return new CarFactory($engineFactory, $tiresFactory, $lightsFactory);
    },

    'TiresFactory' => function(ContainerInterface $c) {
        return new TiresFactory();
    },

    'EngineFactory' => function(ContainerInterface $c) {
        return new EngineFactory();
    },

    'LightsFactory' => function(ContainerInterface $c) {
        return new LightsFactory();
    }

);
