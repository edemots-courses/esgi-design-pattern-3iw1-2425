<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

interface CanBuildPizza
{
    public function reset(): self;
    /* setters, adders */
    public function setSize(string $size): PizzaBuilder;
    public function setCrustType(string $crust): PizzaBuilder;
    public function setSauce(string $sauce): PizzaBuilder;
    public function addCheese(string $cheese): PizzaBuilder;
    public function addTopping(string $topping): PizzaBuilder;
    public function setCookingInstructions(string $cookingInstruction): PizzaBuilder;
    public function build(): Pizza;
}
