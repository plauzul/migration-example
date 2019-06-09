<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });

    $app->group('/v1', function () use ($app) {

        $app->post('/login', src\controllers\AuthController::class . ':login');
        $app->get('/noticia', src\controllers\NoticiaController::class . ':fetchAll');

    });
};
