<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/21/15
 * Time: 8:04 AM
 */

abstract class Shape
{
    protected $name; //name of shape

    abstract public function CalculateSize(); //abstract method

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}