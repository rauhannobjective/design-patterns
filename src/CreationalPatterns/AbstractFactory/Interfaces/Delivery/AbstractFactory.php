<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery;

interface AbstractFactory
{
    public function createRoadDelivery(): AbstractDelivery;

    public function createMaritimeDelivery(): AbstractDelivery;

    public function createAirDelivery(): AbstractDelivery;
}