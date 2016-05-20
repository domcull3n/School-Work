<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/21/15
 * Time: 8:21 AM
 */
require_once("Shape.php");
require_once("iResizable.php");
class Circle extends Shape implements iResizable
{

    protected $radius;

    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function CalculateSize()
    {
        $result = (pi()*($this->radius*$this->radius));
        return $result;
    }

    public function Resize($size)
    {
        if($size>100)
        {
            $this->radius = $this->radius*($size/100);
        }
        elseif($size<100){
            $this->radius = $this->radius*(1 - ($size/100));
        }

    }
}