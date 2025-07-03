<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class SyrupDecorator implements Beverage
{
    public function __construct(
        private Beverage $beverage,
    ) {}

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ', Syrup';
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + .75;
    }
}
