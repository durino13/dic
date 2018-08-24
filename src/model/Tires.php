<?php


namespace yuma\model;


class Tires
{

    protected $size;

    protected $brand;

    /**
     * Tires constructor.
     * @param $brand
     * @param $size
     */
    public function __construct($brand, $size)
    {
        $this->size = $size;
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
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

}