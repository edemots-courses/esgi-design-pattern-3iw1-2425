<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;


class Car extends AbstractVehicle
{
    public function accelerate(): float
    {
        $this->speed += 3.5;
        return $this->speed;
    }

    public function brakes(): float
    {
        $this->speed -= 5.0;
        return parent::brakes();
    }
}
