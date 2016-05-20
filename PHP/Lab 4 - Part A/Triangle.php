<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/21/15
 * Time: 8:22 AM
 */
require_once("Shape.php");
require_once("iResizable.php");
class Triangle extends Shape implements iResizable
{

    protected $base, $height;

    public function __construct($name, $base, $height)
    {
        parent::__construct($name);
        $this->base = $base;
        $this->height = $height;
    }

    public function CalculateSize()
    {
        $result = ($this->base*$this->height) / 2;
        return $result;
    }

    public function Resize($size)
    {
        if($size>=100)
        {
            $this->height = $this->height*($size/100);
        }
        elseif($size<100){
            $this->height = $this->height*(1 - ($size/100));
        }
    }
}