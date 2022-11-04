<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Singleton\Services\Delivery;

use DesignPatterns\Src\CreationalPatterns\Singleton\Singletons\Singleton;

class AirDeliveryService extends Singleton
{
    private array $items = [];

    public function getValue(string $key): float
    {
        return $this->items[$key];
    }

    public function setValue(string $key, float $value): void
    {
        $this->items[$key] = $value;
    }
}