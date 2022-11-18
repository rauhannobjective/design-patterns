<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\SimpleFactory\Actions\Delivery;

use DesignPatterns\Src\Action;
use DesignPatterns\Src\CreationalPatterns\SimpleFactory\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Src\CreationalPatterns\SimpleFactory\Factories\SimpleFactory;
use Exception;
use Slim\Psr7\Message;
use Slim\Psr7\Response;

class CreateDeliveryAction extends Action
{
    public function __construct(private readonly SimpleFactory $factory)
    {}

    /**
     * @throws Exception
     */
    public function __invoke($request, $response, $args): Response|Message
    {
        $params = $request->getParsedBody();
        $logistic = $this->defineDeliveryType($params['logistic_type']);

        $result = $this->factory->$logistic();
        $tax = $result->getTax();

        return $this->toJson($response, ['tax' => $tax]);
    }

    /**
     * @throws Exception
     */
    private function defineDeliveryType(string $logisticType): string
    {
        return match ($logisticType) {
            LogisticTypeEnum::ROAD->value => 'createRoadDelivery',
            LogisticTypeEnum::MARITIME->value => 'createMaritimeDelivery',
            LogisticTypeEnum::AIR->value => 'createAirDelivery',
            default => throw new Exception('Invalid logistic type.')
        };
    }
}