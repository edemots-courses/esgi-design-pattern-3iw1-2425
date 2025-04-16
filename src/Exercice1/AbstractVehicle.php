<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;

abstract class AbstractVehicle implements Vehicle
{
    public float $speed = 0.0;

    abstract public function accelerate(): float;

    public function brakes(): float
    {
        if ($this->speed < 0) {
            $this->speed = 0;
        }
        return $this->speed;
    }
}
