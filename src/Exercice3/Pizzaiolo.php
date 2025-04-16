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
        $pizza = $this->builder->reset()->setSize('medium')->setCrustType('regular')->setSauce('tomato')->addCheese('mozzarella')->setCookingInstructions('normal')->build();
        return $pizza;
    }

    public function buildPepperoni() 
    {
        $pizza = $this->builder->setSize('medium')->setCrustType('regular')->setSauce('tomato')->addCheese('mozzarella')->addTopping('pepperoni')->setCookingInstructions('normal')->build();
        return $pizza;
    }

    public function buildVegetarian() 
    {
        $pizza = $this->builder->setSize('medium')->setCrustType('thin')->setSauce('tomato')->addCheese('mozzarella')->addCheese('cheddar')->addTopping('vegetables')->setCookingInstructions('light')->build();
        return $pizza;
    }
}
