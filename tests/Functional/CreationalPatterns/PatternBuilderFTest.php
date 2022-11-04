<?php

declare(strict_types=1);

namespace DesignPatterns\Tests\Functional\CreationalPatterns;

use DesignPatterns\Src\CreationalPatterns\Builder\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Tests\TestCase;

class PatternBuilderFTest extends TestCase
{
    public function testCreateRoadBuilderDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/builder/delivery/create", [
            'logistic_type' => LogisticTypeEnum::ROAD->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(2500.00, $responseData['price']);
        $this->assertEquals('Road delivery created.', $responseData['status']);
    }

    public function testCreateMaritimeBuilderDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/builder/delivery/create", [
            'logistic_type' => LogisticTypeEnum::MARITIME->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(2501.00, $responseData['price']);
        $this->assertEquals('Maritime delivery created.', $responseData['status']);
    }

    public function testCreateAirBuilderDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/builder/delivery/create", [
            'logistic_type' => LogisticTypeEnum::AIR->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(2502.00, $responseData['price']);
        $this->assertEquals('Air delivery created.', $responseData['status']);
    }
}