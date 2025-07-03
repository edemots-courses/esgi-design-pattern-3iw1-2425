<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class MilkDecorator implements Beverage
{
    public function __construct(
        private Beverage $beverage,
    ) {}

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ', Milk';
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + .5;
    }
}
