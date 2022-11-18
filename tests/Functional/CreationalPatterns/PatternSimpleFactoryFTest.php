<?php

declare(strict_types=1);

namespace DesignPatterns\Tests\Functional\CreationalPatterns;

use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Tests\TestCase;

class PatternSimpleFactoryFTest extends TestCase
{
    public function testGetTaxRoadDeliverySuccess(): void
    {
        $response = $this->runApp("GET", "/patterns/simple-factory/delivery/tax", [
            'logistic_type' => LogisticTypeEnum::ROAD->value,
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(11.11, $responseData['tax']);
    }

    public function testGetTaxMaritimeDeliverySuccess(): void
    {
        $response = $this->runApp("GET", "/patterns/simple-factory/delivery/tax", [
            'logistic_type' => LogisticTypeEnum::MARITIME->value,
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(22.22, $responseData['tax']);
    }

    public function testGetTaxAirDeliverySuccess(): void
    {
        $response = $this->runApp("GET", "/patterns/simple-factory/delivery/tax", [
            'logistic_type' => LogisticTypeEnum::AIR->value,
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(33.33, $responseData['tax']);
    }
}