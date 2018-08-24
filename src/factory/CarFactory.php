<?php

namespace yuma\factory;

use yuma\model\Car;

class CarFactory
{

    const CAR_RENAULT = 'CAR_RENAULT';

    const CAR_AUDI = 'CAR_AUDI';

    private $tiresFactory;

    public function __construct(TiresFactory $tiresFactory)
    {
        $this->tiresFactory = $tiresFactory;
    }

    /**
     * @param $type
     * @return Car
     */
    public function create($type): Car
    {

        switch($type) {
            case self::CAR_AUDI:
                // TODO Replace with builder ..
                $tires = $this->tiresFactory->create('Goodyear', 17);
                return new Car('Audi', 'blue', $tires);
            case self::CAR_RENAULT:
                $tires = $this->tiresFactory->create('Michelin', 14);
                return new Car('Renault', 'red', $tires);
            default:
                throw new Exception('No such model!');
        }

    }

}