<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class VegetalMilkDecorator implements Beverage
{
    public function __construct(
        private Beverage $beverage,
    ) {}

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ', Vegetal Milk';
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.0;
    }
}
