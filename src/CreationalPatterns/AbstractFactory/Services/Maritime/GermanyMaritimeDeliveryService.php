<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Maritime;

use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractDelivery;

class GermanyMaritimeDeliveryService implements AbstractDelivery
{
    public function __construct(
        private readonly float $distance,
        private readonly float $weight
    ) {
    }

    public function createDelivery(): string
    {
        return "Germany maritime delivery created.";
    }

    public function calculateDeliveryPrice(): float
    {
        return ($this->distance + $this->weight) + 1;
    }
}