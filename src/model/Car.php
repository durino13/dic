<?php


namespace yuma\model;


class Car
{

    protected $brand;

    protected $tires;

    protected $color;

    protected $engine;

    protected $lights;

    public function __construct($brand, $color, Engine $engine, Tires $tires, Lights $lights)
    {
        $this->brand = $brand;
        $this->tires = $tires;
        $this->color = $color;
        $this->engine = $engine;
        $this->lights = $lights;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return Tires
     */
    public function getTires()
    {
        return $this->tires;
    }

    /**
     * @param Tires $tires
     */
    public function setTires($tires)
    {
        $this->tires = $tires;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @param Engine $engine
     */
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return Lights
     */
    public function getLights(): Lights
    {
        return $this->lights;
    }

    /**
     * @param Lights $lights
     */
    public function setLights(Lights $lights)
    {
        $this->lights = $lights;
    }

    public function toString()
    {
        echo $this->getBrand() . ', color:' . $this->getColor() . ', engine: ' . $this->getEngine() . ' tires: ' . $this->getTires()->getBrand();
    }

}