<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice1;


class Truck implements Vehicle
{
    public float $speed = 0;

    public function accelerate(): float {
        $this->speed += 1.75;
        return $this->speed;
    }

    public function breaks(): float {
        if ($this->speed > 2) {
            $this->speed -= 2;
        } else {
            $this->speed = 0;
        }
        return $this->speed;
    }

}