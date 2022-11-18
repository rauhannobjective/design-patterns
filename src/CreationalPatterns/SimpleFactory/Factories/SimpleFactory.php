<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\SimpleFactory\Factories;

use DesignPatterns\Src\CreationalPatterns\SimpleFactory\Services\AirDelivery;
use DesignPatterns\Src\CreationalPatterns\SimpleFactory\Services\MaritimeDelivery;
use DesignPatterns\Src\CreationalPatterns\SimpleFactory\Services\RoadDelivery;

class SimpleFactory
{
    public function __construct(
        private readonly RoadDelivery $roadDelivery,
        private readonly AirDelivery $airDelivery,
        private readonly MaritimeDelivery $maritimeDelivery
    ) {
    }

    public function createRoadDelivery(): RoadDelivery
    {
        return $this->roadDelivery;
    }

    public function createMaritimeDelivery(): MaritimeDelivery
    {
        return $this->maritimeDelivery;
    }

    public function createAirDelivery(): AirDelivery
    {
        return $this->airDelivery;
    }
}