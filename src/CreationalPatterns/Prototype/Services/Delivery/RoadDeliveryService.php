<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Prototype\Services\Delivery;

class RoadDeliveryService
{
    public function __construct(
        public string $title,
        public float $distance,
        public float $weight
    ) {
    }

    public function __clone()
    {
        $this->title = '(Road cloned) - ' . $this->title;
    }
}