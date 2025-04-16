<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    private string $size = '';
    private string $crustType = '';
    private ?string $sauce = null;
    private ?array $cheeses = [];
    private ?array $toppings = [];
    private ?string $cookigInstructions = null;

    public function getSize() {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getCrustType() {
        return $this->crustType;
    }

    public function setCrustType($crustType) {
        $this->crustType = $crustType;
    }

    public function getSauce() {
        return $this->sauce;
    }

    public function setSauce($sauce)
    {
        $this->sauce = $sauce;
    }

    public function getCheeses() {
        return $this->cheeses;
    }

    public function setCheeses($cheese) {
        array_push($this->cheeses, $cheese);
    }

    public function getToppings() {
        return $this->toppings;
    }

    public function setToppings($topping) {
        array_push($this->toppings, $topping);
    }

    public function getCookingInstructions() {
        return $this->cookigInstructions;
    }

    public function setCookingInstructions($cookingInstructions) {
        $this->cookigInstructions = $cookingInstructions;
    }
}
