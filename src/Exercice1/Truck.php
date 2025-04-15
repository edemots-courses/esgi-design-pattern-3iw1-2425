<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;

class Truck extends AbstractVehicle
{
    public function accelerate(): float
    {
        $this->speed += 1.75;
        return $this->speed;
    }

    public function brakes(): float
    {
        $this->speed -= 2;
        return parent::brakes();
    }
}
