<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Factories\Delivery;

use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractDelivery;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractFactory;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Air\JapanAirDeliveryService;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Maritime\JapanMaritimeDeliveryService;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\Road\JapanRoadDeliveryService;

class JapanDeliveryFactory implements AbstractFactory
{
    public function __construct(
        public readonly string $logisticTypeEnum,
        public readonly float $distance,
        public readonly float $weight
    ) {
    }

    public function createRoadDelivery(): AbstractDelivery
    {
        return new JapanRoadDeliveryService($this->distance, $this->weight);
    }

    public function createMaritimeDelivery(): AbstractDelivery
    {
        return new JapanMaritimeDeliveryService($this->distance, $this->weight);
    }

    public function createAirDelivery(): AbstractDelivery
    {
        return new JapanAirDeliveryService($this->distance, $this->weight);
    }

    public function getLogisticTypeEnum(): string
    {
        return $this->logisticTypeEnum;
    }
}