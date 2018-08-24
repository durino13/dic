<?php


namespace yuma\factory;


use yuma\model\Engine;

class EngineFactory
{

    public function create()
    {
        return new Engine();
    }

}