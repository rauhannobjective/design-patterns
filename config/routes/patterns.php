<?php

declare(strict_types=1);

namespace DesignPatterns\Src\Routes;

use DesignPatterns\Src\Middlewares\JsonBodyParserMiddleware;
use Slim\Routing\RouteCollectorProxy;

$GLOBALS['app']->group('/patterns/factory-method', function (RouteCollectorProxy $group) {
    $group->post('/delivery/create', \DesignPatterns\Src\CreationalPatterns\FactoryMethod\Actions\Delivery\CreateDeliveryAction::class);
})->add(JsonBodyParserMiddleware::class);

$GLOBALS['app']->group('/patterns/abstract-factory', function (RouteCollectorProxy $group) {
    $group->post('/delivery/create', \DesignPatterns\Src\CreationalPatterns\AbstractFactory\Actions\Delivery\CreateDeliveryAction::class);
})->add(JsonBodyParserMiddleware::class);

$GLOBALS['app']->group('/patterns/builder', function (RouteCollectorProxy $group) {
    $group->post('/delivery/create', \DesignPatterns\Src\CreationalPatterns\Builder\Actions\Delivery\CreateDeliveryAction::class);
})->add(JsonBodyParserMiddleware::class);

$GLOBALS['app']->group('/patterns/prototype', function (RouteCollectorProxy $group) {
    $group->post('/delivery/create', \DesignPatterns\Src\CreationalPatterns\Prototype\Actions\Delivery\CreateDeliveryAction::class);
})->add(JsonBodyParserMiddleware::class);

$GLOBALS['app']->group('/patterns/singleton', function (RouteCollectorProxy $group) {
    $group->post('/delivery/create', \DesignPatterns\Src\CreationalPatterns\Singleton\Actions\Delivery\CreateDeliveryAction::class);
})->add(JsonBodyParserMiddleware::class);
