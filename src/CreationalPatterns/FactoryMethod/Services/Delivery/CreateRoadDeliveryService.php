<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\FactoryMethod\Services\Delivery;

use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Interfaces\Delivery\Logistic;

class CreateRoadDeliveryService implements Logistic
{
    public function __construct(
        private readonly float $distance,
        private readonly float $weight
    ) {
    }

    public function createDelivery(): string
    {
        return "Road delivery created.";
    }

    public function calculateDeliveryPriceInBRL(): float
    {
        return $this->distance * $this->weight;
    }
}