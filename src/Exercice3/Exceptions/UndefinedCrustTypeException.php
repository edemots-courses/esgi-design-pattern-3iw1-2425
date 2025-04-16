<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3\Exceptions;

class UndefinedCrustTypeException extends \LogicException
{
    public function __construct()
    {
        parent::__construct('The crust type of the pizza is not defined.');
    }
}
