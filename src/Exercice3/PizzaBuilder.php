<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

use Exception;
use LogicException;

class PizzaBuilder implements CanBuildPizza
{
    private Pizza $pizza;

    public function __construct() {
        $this->pizza = new Pizza;
    }
    public function setSize(string $size): PizzaBuilder {
        $this->pizza->setSize($size);
        return $this;
    }

    public function setCrustType(string $crust): PizzaBuilder {
        $this->pizza->setCrustType($crust);
        return $this;
    }

    public function setSauce(string $sauce): PizzaBuilder {
        $this->pizza->setSauce($sauce);
        return $this;
    }

    public function addCheese(string $cheese): PizzaBuilder {
        $this->pizza->setCheeses($cheese);
        return $this;
    }

    public function addTopping(string $topping): PizzaBuilder {
        $this->pizza->setToppings($topping);
        return $this;
    }

    public function setCookingInstructions(string $cookingInstruction): PizzaBuilder {
        $this->pizza->setCookingInstructions($cookingInstruction);
        return $this;
    }

    public function build(): Pizza {
        if (sizeof($this->pizza->getCheeses()) < 1) {
            throw new LogicException("Pas assez de fromage");
        }
        if (sizeof($this->pizza->getToppings()) > 8) {
            throw new LogicException("Trop de toppings");
        }
        if (!$this->pizza->getSize()) {
            throw new LogicException("Pas de taille");
        }

        if (!$this->pizza->getCrustType()) {
            throw new LogicException("Pas de crust");
        }
        return $this->pizza;
    }

    public function reset(): self {
        return new self();
    }
}
