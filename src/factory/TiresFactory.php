<?php


namespace yuma\factory;


use yuma\model\Tires;

class TiresFactory
{

    public function create($brand, $size)
    {
        return new Tires($brand, $size);
    }

}