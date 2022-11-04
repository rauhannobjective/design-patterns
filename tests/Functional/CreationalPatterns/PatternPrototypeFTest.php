<?php

declare(strict_types=1);

namespace DesignPatterns\Tests\Functional\CreationalPatterns;

use DesignPatterns\Src\CreationalPatterns\Builder\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Tests\TestCase;

class PatternPrototypeFTest extends TestCase
{
    public function testCreateRoadPrototypeDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/prototype/delivery/create", [
            'logistic_type' => LogisticTypeEnum::ROAD->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals('(Road cloned) - Created', $responseData['title']);
        $this->assertEquals(100.00, $responseData['distance']);
        $this->assertEquals(25.00, $responseData['weight']);
    }

    public function testCreateMaritimePrototypeDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/prototype/delivery/create", [
            'logistic_type' => LogisticTypeEnum::MARITIME->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals('(Maritime cloned) - Created', $responseData['title']);
        $this->assertEquals(100.00, $responseData['distance']);
        $this->assertEquals(25.00, $responseData['weight']);
    }

    public function testCreateAirPrototypeDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/prototype/delivery/create", [
            'logistic_type' => LogisticTypeEnum::AIR->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals('(Air cloned) - Created', $responseData['title']);
        $this->assertEquals(100.00, $responseData['distance']);
        $this->assertEquals(25.00, $responseData['weight']);
    }
}