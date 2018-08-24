<?php


namespace yuma\model;


class Car
{

    protected $brand;

    protected $tires;

    protected $color;

    public function __construct($brand, $color, Tires $tires)
    {
        $this->brand = $brand;
        $this->tires = $tires;
        $this->color = $color;
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

    public function toString()
    {
        echo $this->getBrand() . ', color:' . $this->getColor() . ', tires: ' . $this->getTires()->getBrand();
    }

}