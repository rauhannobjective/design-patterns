<?php

declare(strict_types=1);

namespace DesignPatterns\Tests\Functional\CreationalPatterns;

use DesignPatterns\Src\CreationalPatterns\Pool\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Src\CreationalPatterns\Pool\Pools\Delivery\DeliveryPool;
use DesignPatterns\Tests\TestCase;

class PatternPoolFTest extends TestCase
{
    public function testGetPoolDeliverySuccess(): void
    {
        $pool = new DeliveryPool();

        $roadPool = $pool->get(LogisticTypeEnum::ROAD->value);
        $maritimePool = $pool->get(LogisticTypeEnum::MARITIME->value);
        $airPool = $pool->get(LogisticTypeEnum::AIR->value);

        $this->assertCount(3, $pool);
        $this->assertNotSame($roadPool, $maritimePool);
        $this->assertNotSame($maritimePool, $airPool);
        $this->assertNotSame($roadPool, $airPool);
    }

    public function testGetPoolDeliveryWhenDisposeSuccess(): void
    {
        $pool = new DeliveryPool();

        $roadPool = $pool->get(LogisticTypeEnum::ROAD->value);
        $pool->dispose($roadPool);
        $maritimePool = $pool->get(LogisticTypeEnum::MARITIME->value);
        $pool->dispose($maritimePool);
        $airPool = $pool->get(LogisticTypeEnum::AIR->value);

        $this->assertCount(1, $pool);
        $this->assertSame($roadPool, $maritimePool);
        $this->assertSame($maritimePool, $airPool);
        $this->assertSame($roadPool, $airPool);
    }
}