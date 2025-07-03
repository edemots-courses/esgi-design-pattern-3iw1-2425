<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class Expresso implements Beverage
{
    public function getDescription(): string
    {
        return 'Expresso';
    }

    public function getCost(): float
    {
        return 2.0;
    }
}
