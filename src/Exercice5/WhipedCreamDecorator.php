<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class WhipedCreamDecorator implements Beverage
{
    public function __construct(
        private Beverage $beverage,
    ) {}

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ', Whiped Cream';
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.0;
    }
}
