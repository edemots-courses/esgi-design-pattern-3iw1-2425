<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3\Exceptions;

class UndefinedSizeException extends \LogicException
{
    public function __construct()
    {
        parent::__construct('The size of the pizza is not defined.');
    }
}
