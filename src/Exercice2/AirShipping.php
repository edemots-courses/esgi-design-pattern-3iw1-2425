<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class AirShipping implements ShippingMethod
{
    private const BASE_COST = 50;
    private const COST_PER_KM = 2;
    private const COST_PER_KG = 3;

    public function calculateCost(float $weight, float $distance): float
    {
        return self::BASE_COST + $distance * self::COST_PER_KM + $weight * self::COST_PER_KG;
    }

    public function getEstimatedDays(): array
    {
        return [1, 2];
    }

    public function formatTracking(string $trackingNumber): string
    {
        // return sprintf("AIR-%s", $trackingNumber);
        // return 'AIR-'.$trackingNumber;
        return "AIR-{$trackingNumber}";
    }
}
