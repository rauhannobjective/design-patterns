<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Pool\Pools\Delivery;

use DesignPatterns\Src\CreationalPatterns\Pool\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Src\CreationalPatterns\Pool\Interfaces\Delivery\Pool;
use Exception;

class DeliveryPool implements \Countable
{
    private array $occupiedDeliveries = [];

    private array $freeDeliveries = [];

    /**
     * @throws Exception
     */
    public function get(string $deliveryType): Pool
    {
        if (count($this->freeDeliveries) === 0) {
            $delivery = match($deliveryType) {
                LogisticTypeEnum::ROAD->value => new RoadDeliveryPool(),
                LogisticTypeEnum::AIR->value => new AirDeliveryPool(),
                LogisticTypeEnum::MARITIME->value => new MaritimeDeliveryPool(),
                default => throw new Exception('Invalid logistic type.')
            };
        } else {
            $delivery = array_pop($this->freeDeliveries);
        }

        $this->occupiedDeliveries[spl_object_hash($delivery)] = $delivery;

        return $delivery;
    }

    public function dispose(Pool $pool): void
    {
        $key = spl_object_hash($pool);

        if (isset($this->occupiedDeliveries[$key])) {
            unset($this->occupiedDeliveries[$key]);
            $this->freeDeliveries[$key] = $pool;
        }
    }


    public function count(): int
    {
        return count($this->occupiedDeliveries) + count($this->freeDeliveries);
    }
}