<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Factories\Delivery;

use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractDelivery;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractFactory;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Air\GermanyAirDeliveryService;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Maritime\GermanyMaritimeDeliveryService;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Road\GermanyRoadDeliveryService;

class GermanyDeliveryFactory implements AbstractFactory
{
    public function __construct(
        public readonly string $logisticTypeEnum,
        public readonly float $distance,
        public readonly float $weight
    ) {
    }

    public function createRoadDelivery(): AbstractDelivery
    {
        return new GermanyRoadDeliveryService($this->distance, $this->weight);
    }

    public function createMaritimeDelivery(): AbstractDelivery
    {
        return new GermanyMaritimeDeliveryService($this->distance, $this->weight);
    }

    public function createAirDelivery(): AbstractDelivery
    {
        return new GermanyAirDeliveryService($this->distance, $this->weight);
    }

    public function getLogisticTypeEnum(): string
    {
        return $this->logisticTypeEnum;
    }
}