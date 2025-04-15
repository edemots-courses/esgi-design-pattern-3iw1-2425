<?php 
namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class GroundShipping implements ShippingMethod {
    private float $base_tarif = 10;
    private float $cost_by_km = 0.5;
    private float $cost_by_kg = 1;
    private array $shipping_time = [3,5];
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
        return "GRD-" . $trackingNumber;
    }

}