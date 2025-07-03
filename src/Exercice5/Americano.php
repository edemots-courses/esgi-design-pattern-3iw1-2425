<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class Americano implements Beverage
{
    public function getDescription(): string
    {
        return 'Americano';
    }

    public function getCost(): float
    {
        return 2.5;
    }
}
