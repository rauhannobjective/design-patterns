<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Builder\Builders\Delivery;

use DesignPatterns\Src\CreationalPatterns\Builder\Interfaces\Delivery\DeliveryBuilder;

class RoadDeliveryBuilder implements DeliveryBuilder
{
    public \stdClass $delivery;

    public function reset(): void
    {
        $this->delivery = new \stdClass();
    }

    public function produceDeliveryDistance(float $distance): DeliveryBuilder
    {
        $this->delivery->distance = $distance;

        return $this;
    }

    public function produceDeliveryWeight(float $weight): DeliveryBuilder
    {
        $this->delivery->weight = $weight;

        return $this;
    }

    public function produceDeliveryPrice(float $distance, float $weight): DeliveryBuilder
    {
        $this->delivery->price = $distance * $weight;

        return $this;
    }
}