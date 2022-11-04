<?php

declare(strict_types=1);

namespace DesignPatterns\Tests\Functional\CreationalPatterns;

use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Enums\Delivery\CountryFactoryEnum;
use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Tests\TestCase;

class PatternAbstractFactoryFTest extends TestCase
{
    public function testCreateBrazilRoadDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::BRAZIL->value,
            'logistic_type' => LogisticTypeEnum::ROAD->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(2500.00, $responseData['price']);
        $this->assertEquals('Brazil road delivery created.', $responseData['status']);
    }

    public function testCreateBrazilMaritimeDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::BRAZIL->value,
            'logistic_type' => LogisticTypeEnum::MARITIME->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(125.00, $responseData['price']);
        $this->assertEquals('Brazil maritime delivery created.', $responseData['status']);
    }

    public function testCreateBrazilAirDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::BRAZIL->value,
            'logistic_type' => LogisticTypeEnum::AIR->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(75.00, $responseData['price']);
        $this->assertEquals('Brazil air delivery created.', $responseData['status']);
    }

    public function testCreateGermanyRoadDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::GERMANY->value,
            'logistic_type' => LogisticTypeEnum::ROAD->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(2501.00, $responseData['price']);
        $this->assertEquals('Germany road delivery created.', $responseData['status']);
    }

    public function testCreateGermanyMaritimeDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::GERMANY->value,
            'logistic_type' => LogisticTypeEnum::MARITIME->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(126.00, $responseData['price']);
        $this->assertEquals('Germany maritime delivery created.', $responseData['status']);
    }

    public function testCreateGermanyAirDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::GERMANY->value,
            'logistic_type' => LogisticTypeEnum::AIR->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(76.00, $responseData['price']);
        $this->assertEquals('Germany air delivery created.', $responseData['status']);
    }

    public function testCreateJapanRoadDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::JAPAN->value,
            'logistic_type' => LogisticTypeEnum::ROAD->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(2502.00, $responseData['price']);
        $this->assertEquals('Japan road delivery created.', $responseData['status']);
    }

    public function testCreateJapanMaritimeDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::JAPAN->value,
            'logistic_type' => LogisticTypeEnum::MARITIME->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(127.00, $responseData['price']);
        $this->assertEquals('Japan maritime delivery created.', $responseData['status']);
    }

    public function testCreateJapanAirDeliverySuccess(): void
    {
        $response = $this->runApp("POST", "/patterns/abstract-factory/delivery/create", [
            'country' => CountryFactoryEnum::JAPAN->value,
            'logistic_type' => LogisticTypeEnum::AIR->value,
            'distance' => 100.00,
            'weight' => 25.00
        ]);

        $responseData = json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(77.00, $responseData['price']);
        $this->assertEquals('Japan air delivery created.', $responseData['status']);
    }
}