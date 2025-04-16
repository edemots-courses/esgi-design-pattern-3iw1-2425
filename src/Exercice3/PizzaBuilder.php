<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

use EdemotsCourses\EsgiDesignPattern\Exercice3\Exceptions\UndefinedCrustTypeException;
use EdemotsCourses\EsgiDesignPattern\Exercice3\Exceptions\UndefinedSizeException;

use LogicException;

class PizzaBuilder implements CanBuildPizza
{
    protected string $size;
    protected string $crustType;
    protected string $sauce;
    protected array $cheeses = [];
    protected array $toppings = [];
    protected string $cookingInstructions = 'normal';

    public function setSize(string $size): CanBuildPizza
    {
        $this->size = $size;
        return $this;
    }

    public function small(): CanBuildPizza
    {
        return $this->setSize('small');
    }

    public function medium(): CanBuildPizza
    {
        return $this->setSize('medium');
    }

    public function large(): CanBuildPizza
    {
        return $this->setSize('large');
    }

    public function setCrustType(string $crustType): CanBuildPizza
    {
        $this->crustType = $crustType;
        return $this;
    }

    public function thin(): CanBuildPizza
    {
        return $this->setCrustType('thin');
    }

    public function regular(): CanBuildPizza
    {
        return $this->setCrustType('regular');
    }

    public function thick(): CanBuildPizza
    {
        return $this->setCrustType('thick');
    }

    public function setSauce(string $sauce): CanBuildPizza
    {
        $this->sauce = $sauce;
        return $this;
    }

    public function tomato(): CanBuildPizza
    {
        return $this->setSauce('tomato');
    }

    public function bbq(): CanBuildPizza
    {
        return $this->setSauce('bbq');
    }

    public function white(): CanBuildPizza
    {
        return $this->setSauce('white');
    }

    public function addCheese(string $cheese): CanBuildPizza
    {
        $this->cheeses[] = $cheese;
        return $this;
    }

    public function addMozzarella(): CanBuildPizza
    {
        return $this->addCheese('mozzarella');
    }

    public function addCheddar(): CanBuildPizza
    {
        return $this->addCheese('cheddar');
    }

    public function mixedCheese(): CanBuildPizza
    {
        $this->addCheese('mozzarella');
        $this->addCheese('cheddar');
        return $this;
    }

    public function addTopping(string $topping): CanBuildPizza
    {
        if (count($this->toppings) >= 8) {
            throw new LogicException('Cannot add more than 8 toppings.');
        }

        $this->toppings[] = $topping;
        return $this;
    }

    public function setCookingInstructions(string $instructions): CanBuildPizza
    {
        $this->cookingInstructions = $instructions;
        return $this;
    }

    public function light(): CanBuildPizza
    {
        return $this->setCookingInstructions('light');
    }

    public function normal(): CanBuildPizza
    {
        return $this->setCookingInstructions('normal');
    }

    public function wellDone(): CanBuildPizza
    {
        return $this->setCookingInstructions('well done');
    }

    public function reset(): CanBuildPizza
    {
        return new self();
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getCrustType(): string
    {
        return $this->crustType;
    }

    public function getSauce(): string
    {
        return $this->sauce;
    }

    public function getCheeses(): array
    {
        return $this->cheeses;
    }

    public function getToppings(): array
    {
        return $this->toppings;
    }

    public function getCookingInstructions(): string
    {
        return $this->cookingInstructions;
    }

    public function build(): Pizza
    {
        if (!isset($this->size)) {
            throw new UndefinedSizeException();
        }
        if (!isset($this->crustType)) {
            throw new UndefinedCrustTypeException();
        }
        if (count($this->cheeses) === 0) {
            throw new LogicException('At least one cheese must be added.');
        }

        return new Pizza(
            $this->size,
            $this->crustType,
            $this->sauce,
            $this->cookingInstructions,
            $this->cheeses,
            $this->toppings,
        );
    }
}
