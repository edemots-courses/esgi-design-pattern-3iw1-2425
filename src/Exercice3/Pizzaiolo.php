<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizzaiolo
{
    private CanBuildPizza $builder;

    public function setBuilder(CanBuildPizza $builder): void
    {
        $this->builder = $builder;
    }

    public function buildMargherita()
    {
        return $this->builder
            ->reset()
            ->medium()
            ->regular()
            ->tomato()
            ->addMozzarella()
            ->build();
    }

    public function buildPepperoni()
    {
        return $this->builder
            ->reset()
            ->medium()
            ->regular()
            ->tomato()
            ->addMozzarella()
            ->addTopping('pepperoni')
            ->build();
    }

    public function buildVegetarian()
    {
        return $this->builder
            ->reset()
            ->medium()
            ->thin()
            ->tomato()
            ->mixedCheese()
            ->addTopping('olives')
            ->addTopping('bell peppers')
            ->addTopping('onions')
            ->addTopping('mushrooms')
            ->addTopping('spinach')
            ->light()
            ->build();
    }
}
