<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Builder\Interfaces\Delivery;

interface DeliveryBuilder
{
    public function reset(): void;

    public function produceDeliveryDistance(float $distance): DeliveryBuilder;

    public function produceDeliveryWeight(float $weight): DeliveryBuilder;

    public function produceDeliveryPrice(float $distance, float $weight): DeliveryBuilder;
}