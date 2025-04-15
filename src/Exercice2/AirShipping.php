<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class AirShipping implements ShippingMethod {
    private float $base_tarif = 50;
    private float $cost_by_km = 2;
    private float $cost_by_kg = 3;
    private array $shipping_time = [1,2];
    public function calculateCost(float $weight, float $distance): float {
        $result = $this->base_tarif;
        $result += $distance * $this->cost_by_km;
        $result += $weight * $this->cost_by_kg;

        return $result;
    }

    public function getEstimatedDays(): array {
        return $this->shipping_time;
    }
    public function formatTracking(string $trackingNumber): string {
        return "AIR-" . $trackingNumber;
    }
}