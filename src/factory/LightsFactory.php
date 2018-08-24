<?php


namespace yuma\factory;


use yuma\model\Lights;

class LightsFactory
{

    public function create()
    {
        return new Lights();
    }

}