<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

interface CanBuildPizza
{
    public function reset(): self;


    public function setSize(string $size): self;

    public function small(): self;
    public function medium(): self;
    public function large(): self;

    public function setCrustType(string $crustType): self;

    public function thin(): self;
    public function regular(): self;
    public function thick(): self;

    public function setSauce(string $sauce): self;

    public function tomato(): self;
    public function bbq(): self;
    public function white(): self;

    public function addCheese(string $cheese): self;

    public function addMozzarella(): self;
    public function addCheddar(): self;
    public function mixedCheese(): self;

    public function addTopping(string $topping): self;

    public function setCookingInstructions(string $instructions): self;

    public function light(): self;
    public function normal(): self;
    public function wellDone(): self;


    public function build(): Pizza;
}
