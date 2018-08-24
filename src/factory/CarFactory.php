<?php

namespace yuma\factory;

use yuma\model\Car;

class CarFactory
{

    const CAR_RENAULT = 'CAR_RENAULT';

    const CAR_AUDI = 'CAR_AUDI';

    protected $tiresFactory;

    protected $engineFactory;

    protected $lightsFactory;


    public function __construct(EngineFactory $engineFactory, TiresFactory $tiresFactory, LightsFactory $lightsFactory)
    {
        $this->tiresFactory = $tiresFactory;
        $this->engineFactory = $engineFactory;
        $this->lightsFactory = $lightsFactory;
    }

    /**
     * @param $type
     * @return Car
     */
    public function create($type): Car
    {

        switch($type) {
            case self::CAR_AUDI:
                $engine = $this->engineFactory->create();
                $tires = $this->tiresFactory->create('Goodyear', 17);
                $lights = $this->lightsFactory->create();
                return new Car('Audi', 'blue', $engine, $tires, $lights);
            case self::CAR_RENAULT:
                $tires = $this->tiresFactory->create('Michelin', 14);
                return new Car('Renault', 'red', $tires);
            default:
                throw new Exception('No such model!');
        }

    }

}