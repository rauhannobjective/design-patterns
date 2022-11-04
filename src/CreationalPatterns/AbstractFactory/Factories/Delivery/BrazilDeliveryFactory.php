<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Factories\Delivery;

use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractDelivery;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractFactory;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Air\BrazilAirDeliveryService;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Maritime\BrazilMaritimeDeliveryService;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Road\BrazilRoadDeliveryService;

class BrazilDeliveryFactory implements AbstractFactory
{
    public function __construct(
        public readonly string $logisticTypeEnum,
        private readonly float $distance,
        private readonly float $weight
    ) {
    }

    public function createRoadDelivery(): AbstractDelivery
    {
        return new BrazilRoadDeliveryService($this->distance, $this->weight);
    }

    public function createMaritimeDelivery(): AbstractDelivery
    {
        return new BrazilMaritimeDeliveryService($this->distance, $this->weight);
    }

    public function createAirDelivery(): AbstractDelivery
    {
        return new BrazilAirDeliveryService($this->distance, $this->weight);
    }

    public function getLogisticTypeEnum(): string
    {
        return $this->logisticTypeEnum;
    }
}