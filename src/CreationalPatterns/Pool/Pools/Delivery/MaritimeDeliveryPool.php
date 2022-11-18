<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Pool\Pools\Delivery;

use DesignPatterns\Src\CreationalPatterns\Pool\Interfaces\Delivery\Pool;

class MaritimeDeliveryPool implements Pool
{
    public function getTax(): float
    {
        return 22.22;
    }
}