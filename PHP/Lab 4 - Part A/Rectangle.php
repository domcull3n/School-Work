<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/21/15
 * Time: 8:22 AM
 */
require_once("Shape.php");
class Rectangle extends Shape
{

    protected $length, $width;

    public function __construct($name, $length, $width)
    {
        parent::__construct($name);
        $this->length = $length;
        $this->width = $width;
    }

    public function CalculateSize()
    {
        $result = $this->length*$this->width;
        return $result;
    }
}