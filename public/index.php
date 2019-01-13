<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new Slim\App();

// TODO: controllerとして切り出す
$app->get("/margin_stocks", function (Request $request, Response $response) {
    $facade = \Pink\MarginStock\Facade::create();
    $stocks = $facade->fetch();

    $response->getBody()->write(json_encode($stocks, JSON_PRETTY_PRINT));

    return $response;
});

$app->run();
