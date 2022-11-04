<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\FactoryMethod\Creators\Delivery;

use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Interfaces\Delivery\Logistic;
use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Services\Delivery\CreateMaritimeDeliveryService;

class CreateMaritimeDeliveryCreator extends CreateDeliveryCreator
{
    public function __construct(
        private readonly float $distance,
        private readonly float $weight
    ) {
    }

    public function factoryDeliveryCreation(): Logistic
    {
        return new CreateMaritimeDeliveryService($this->distance, $this->weight);
    }
}