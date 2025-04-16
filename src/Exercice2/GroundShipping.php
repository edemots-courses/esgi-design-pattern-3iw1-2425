
<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class GroundShipping implements ShippingMethod
{
    private const BASE_COST = 10;
    private const COST_PER_KM = 0.5;
    private const COST_PER_KG = 1;

    public function calculateCost(float $weight, float $distance): float
    {
        return self::BASE_COST + $distance * self::COST_PER_KM + $weight * self::COST_PER_KG;
    }

    public function getEstimatedDays(): array
    {
        return [3, 5];
    }

    public function formatTracking(string $trackingNumber): string
    {
        // return sprintf("GRD-%s", $trackingNumber);
        // return 'GRD-'.$trackingNumber;
        return "GRD-{$trackingNumber}";
    }
}

