<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Pool\Actions\Delivery;

use DesignPatterns\Src\Action;
use DesignPatterns\Src\CreationalPatterns\Pool\Pools\Delivery\DeliveryPool;
use Exception;
use Slim\Psr7\Message;
use Slim\Psr7\Response;

class CreateDeliveryAction extends Action
{
    public function __construct(private readonly DeliveryPool $deliveryPool)
    {}

    /**
     * @throws Exception
     */
    public function __invoke($request, $response, $args): Response|Message
    {
        $params = $request->getParsedBody();

        $result = $this->deliveryPool->get($params['logistic_type']);

        return $this->toJson($response, [$result]);
    }
}