<?php

declare(strict_types=1);

namespace DesignPatterns\Tests\Functional\CreationalPatterns;

use DesignPatterns\Src\CreationalPatterns\Builder\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Tests\TestCase;

class PatternSingletonFTest extends TestCase
{
    public function testCreateRoadSingletonDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/singleton/delivery/create", [
            'logistic_type' => LogisticTypeEnum::ROAD->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals($responseData['distance_service_1'], $responseData['distance_service_2']);
        $this->assertEquals($responseData['weight_service_1'], $responseData['weight_service_2']);

        $this->assertEquals(100.00, $responseData['distance_service_1']);
        $this->assertEquals(100.00, $responseData['distance_service_2']);

        $this->assertEquals(25.00, $responseData['weight_service_1']);
        $this->assertEquals(25.00, $responseData['weight_service_2']);
    }

    public function testCreateMaritimeSingletonDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/singleton/delivery/create", [
            'logistic_type' => LogisticTypeEnum::MARITIME->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals($responseData['distance_service_1'], $responseData['distance_service_2']);
        $this->assertEquals($responseData['weight_service_1'], $responseData['weight_service_2']);

        $this->assertEquals(100.00, $responseData['distance_service_1']);
        $this->assertEquals(100.00, $responseData['distance_service_2']);

        $this->assertEquals(25.00, $responseData['weight_service_1']);
        $this->assertEquals(25.00, $responseData['weight_service_2']);
    }

    public function testCreateAirSingletonDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/singleton/delivery/create", [
            'logistic_type' => LogisticTypeEnum::AIR->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals($responseData['distance_service_1'], $responseData['distance_service_2']);
        $this->assertEquals($responseData['weight_service_1'], $responseData['weight_service_2']);

        $this->assertEquals(100.00, $responseData['distance_service_1']);
        $this->assertEquals(100.00, $responseData['distance_service_2']);

        $this->assertEquals(25.00, $responseData['weight_service_1']);
        $this->assertEquals(25.00, $responseData['weight_service_2']);
    }
}