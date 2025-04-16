<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    // protected string $size;
    // protected string $crustType;
    // protected string $sauce;
    // protected array $cheeses = [];
    // protected array $toppings = [];
    // protected string $cookingInstructions;

    // public function __construct(
    //     string $size,
    //     string $crustType,
    //     string $sauce,
    //     array $cheeses = [],
    //     array $toppings = [],
    //     string $cookingInstructions,
    // )
    // {
    //     $this->size = $size;
    //     $this->crustType = $crustType;
    //     $this->sauce = $sauce;
    //     $this->cheeses = $cheeses;
    //     $this->toppings = $toppings;
    //     $this->cookingInstructions = $cookingInstructions;
    // }

    public function __construct(
        protected string $size,
        protected string $crustType,
        protected string $sauce,
        protected string $cookingInstructions,
        protected array $cheeses = [],
        protected array $toppings = [],
    ) {}

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
}
